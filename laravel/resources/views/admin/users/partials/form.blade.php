<div class="box-header">
  <h3 class="box-title">{{ trans('users.titles.identity') }}</h3>
</div>

<div class="box-body">

  {!! Form::itemText('first_name', trans('users.first_name'), NULL, $errors) !!}

  {!! Form::itemText('last_name', trans('users.last_name'), NULL, $errors) !!}

  {!! Form::itemPassword('password', trans('users.password'), $errors) !!}

  {!! Form::itemPassword('password_confirmation', trans('users.password_confirmation'), $errors) !!}

  {!! Form::itemText('email', trans('users.email'), NULL, $errors) !!}

  {!! Form::singleUpload('image', trans('pages.image'), isset($user) ? $user : NULL, 'image') !!}

</div>
