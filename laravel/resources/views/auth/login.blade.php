@extends('front')

@section('content')

  <section class="signin clearfix col6 contentcenter">

    <h1>Login</h1>

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

    {!! Form::open(['method' => 'POST', 'url' => 'auth/login']) !!}

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

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

    <div class="form-item">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="remember"> Remember Me
        </label>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">Login</button>

        <a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
      </div>
    </div>

    {!! Form::close() !!}

  </section>

@endsection
