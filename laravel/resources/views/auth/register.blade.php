@extends('front')

@section('content')
  <section class="signin clearfix col6 contentcenter">

    <h1>Register</h1>

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

    {!! Form::open(['method' => 'POST', 'url' => '/auth/register']) !!}

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <!-- Email -->
    <div class="form-item {{ $errors->has('first_name') ? 'has-error' : ''}}">
      {!! Form::label('first_name', 'First name') !!}
      <input type="text" name="first_name" id="first_name" value="{!! Input::old('first_name') !!}" />
      {!! $errors->has('first_name') ? '<p class="error">' . $errors->first('first_name') .'</p>' : '' !!}
    </div>

    <!-- Email -->
    <div class="form-item {{ $errors->has('last_name') ? 'has-error' : ''}}">
      {!! Form::label('last_name', 'Last name') !!}
      <input type="text" name="last_name" id="last_name" value="{!! Input::old('last_name') !!}" />
      {!! $errors->has('last_name') ? '<p class="error">' . $errors->first('last_name') .'</p>' : '' !!}
    </div>

    <!-- Email -->
    <div class="form-item {{ $errors->has('email') ? 'has-error' : ''}}">
      {!! Form::label('email', 'E-mail') !!}
      <input type="email" name="email" id="email" value="{!! Input::old('email') !!}" />
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

    <div class="form-group">
      <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
          Register
        </button>
      </div>
    </div>

    {!! Form::close() !!}

  </section>

@endsection
