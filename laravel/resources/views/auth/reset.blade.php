@extends('front')

@section('content')

  <section class="signin clearfix col6 contentcenter">

    <h1>Reset Password</h1>

    @if (count($errors) > 0)
      <p class="alert error">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </p>
    @endif

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">

      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="token" value="{{ $token }}">

      <!-- Email -->
      <div class="form-item {{ $errors->has('email') ? 'has-error' : ''}}">
        {!! Form::label('email', 'E-mail') !!}
        <input type="text" name="email" id="email" value="{!! Input::old('email') !!}" />
        {!! $errors->has('email') ? '<p class="error">' . $errors->first('email') .'</p>' : '' !!}
      </div>

      <!-- Password -->
      <div class="form-item {{ $errors->has('password') ? 'has-error' : ''}}">
        {!! Form::label('password', Lang::get('auth.password')) !!}
        {!! Form::password('password') !!}
        {!! $errors->has('password') ? '<p class="error">' . $errors->first('password') .'</p>' : '' !!}
      </div>

      <!-- Password -->
      <div class="form-item {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
        {!! Form::label('password_confirmation', Lang::get('auth.password')) !!}
        {!! Form::password('password_confirmation') !!}
        {!! $errors->has('password_confirmation') ? '<p class="error">' . $errors->first('password_confirmation') .'</p>' : '' !!}
      </div>

      <button type="submit" class="btn btn-primary">
        Reset Password
      </button>

      {!! Form::close() !!}

  </section>

@endsection
