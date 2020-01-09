@extends('base')

@section('title') Login @endsection

@section('body')
    <form action="{{ route('login.submit') }}" method="post">
        {{ csrf_field() }}
            <h4>Sign In</h4>
            <p>Hello there, Sign in and start managing your Site</p>

            <label for="email">Email address</label>
            <input type="email" name="email" value="{{ old('email') }}" id="email">
            @if ($errors->login->has('email'))
                <p>{{ $errors->login->first('email') }}</p>
            @endif

            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            @if ($errors->login->has('password'))
                <p>{{ $errors->login->first('password') }}</p>
            @endif

            <input type="checkbox" class="custom-control-input" name="remember" id="remember">
            <label for="remember">Remember Me</label>

            <button type="submit">Submit</button>
    </form>
@endsection
