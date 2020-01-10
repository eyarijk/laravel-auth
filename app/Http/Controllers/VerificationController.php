<?php

namespace App\Http\Controllers;

use App\Components\VerificationHashTokenComponent;
use App\Repository\UserRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class VerificationController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @var VerificationHashTokenComponent
     */
    private $verificationHashTokenComponent;

    /**
     * VerificationController constructor.
     * @param UserRepositoryInterface $userRepository
     * @param VerificationHashTokenComponent $verificationHashTokenComponent
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        VerificationHashTokenComponent $verificationHashTokenComponent
    )
    {
        $this->userRepository = $userRepository;
        $this->verificationHashTokenComponent = $verificationHashTokenComponent;
    }

    /**
     * @param int $userID
     * @param Request $request
     * @return Response
     */
    public function verify(int $userID, Request $request): Response
    {
        $user = $this->userRepository->find($userID);

        try {
            if ($user === null) {
                throw new \RuntimeException('User not found');
            }

            $hash = $request->query->get('hash');

            if ($this->verificationHashTokenComponent->check($user, $hash) === false) {
                throw new \RuntimeException('Wrong hash');
            }

        } catch (\RuntimeException $exception) {
            return redirect()
                ->route('verification.error')
                ->with('message', $exception->getMessage())
            ;
        }

        return redirect()->route('verification.success');
    }

    /**
     * @param Request $request
     * @return View
     */
    public function error(Request $request): View
    {
        if ($request->session()->has('message') === false) {
            throw new NotFoundHttpException();
        }

        return \view('verification.error');
    }

    /**
     * @return View
     */
    public function success(): View
    {
        return \view('verification.success');
    }
}
