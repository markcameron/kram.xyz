@extends('front')

@section('content')

  <section class="forgot-password clearfix col6 contentcenter">

    <div class="page-header">
      <h3>{{ trans('auth.lost_password') }}</h3>
    </div>

    {!! Form::open(['url' => '/password/email']) !!}

    <!-- Email -->
    <div class="form-item {{ $errors->has('email') ? 'has-error' : ''}}">
      {!! Form::label('email', 'E-mail') !!}
      {!! Form::email('email', '', array('class' => $errors->first('email', 'error'))) !!}
      {!! $errors->has('email') ? '<p class="error">' . $errors->first('email') .'</p>' : '' !!}
    </div>

    <button type="submit" class="btn">{{ trans('auth.lost_password.validate') }}</button>

    {!! Form::close() !!}

  </section>

@endsection
