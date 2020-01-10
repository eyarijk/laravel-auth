@extends('base')

@section('title') Verification error @endsection

@section('body')
    {{ Session::get('message', 'Verification failed') }}
@endsection
