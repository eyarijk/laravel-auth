@extends('base')

@section('title') Dashboard @endsection

@section('body')
    Hello {{ Auth::user()->name  }}
@endsection
