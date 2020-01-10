<?php

namespace App\Http\Controllers;

use App\Repository\UserRepositoryInterface;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @var Hasher
     */
    private $hasher;

    /**
     * LoginController constructor.
     * @param UserRepositoryInterface $userRepository
     * @param Hasher $hasher
     */
    public function __construct(UserRepositoryInterface $userRepository, Hasher $hasher)
    {
        $this->hasher = $hasher;
        $this->userRepository = $userRepository;
    }

    /**
     * @return View
     */
    public function registerForm(): View
    {
        return view('register.form');
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function register(Request $request): Response
    {
        try {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|max:255|unique:users',
                'password' => 'required|min:8|confirmed|string',
            ]);
        } catch (ValidationException $validationException) {
            return redirect()
                ->route('register.form')
                ->withErrors($validationException->validator->errors()->getMessages(),'register')
                ->withInput()
            ;
        }

        $data = [
            'name' => $request->request->get('name'),
            'email' => $request->request->get('email'),
            'password' => $this->hasher->make($request->request->get('password')),
        ];

        $user = $this->userRepository->create($data);

        event(new Registered($user));

        return redirect()->route('login.form');
    }
}
