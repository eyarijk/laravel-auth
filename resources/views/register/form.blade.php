@extends('base')

@section('title') Register @endsection

@section('body')
    <form action="{{ route('register.submit') }}" method="post">
        {{ csrf_field() }}
        <h4>Sign Up</h4>
        <p>Hello there, Sign up and start managing your Site</p>

        <label for="email">Email address</label>
        <input type="email" name="email" value="{{ old('email') }}" id="email">
        @if ($errors->register->has('email'))
            <p>{{ $errors->register->first('email') }}</p>
        @endif

        <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name') }}" id="name">
        @if ($errors->register->has('name'))
            <p>{{ $errors->register->first('name') }}</p>
        @endif

        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        @if ($errors->register->has('password'))
            <p>{{ $errors->register->first('password') }}</p>
        @endif

        <label for="password_confirmation">Password confirm</label>
        <input type="password" name="password_confirmation" id="password_confirmation">
        @if ($errors->register->has('password_confirmation'))
            <p>{{ $errors->register->first('password_confirmation') }}</p>
        @endif

        <button type="submit">Submit</button>
    </form>
@endsection
