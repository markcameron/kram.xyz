@extends('emails')

@section('body')
  Click below to reset your password.
@stop

@section('button-text')
  Reset Password
@stop

@section('button-link')
  {{ url('password/reset/'.$token) }}
@stop

@section('content-link')
  {!! link_to('password/reset/'.$token, 'password/reset/'.$token) !!}
@stop
