<div class="box-header">
  <h3 class="box-title">{{ trans('cases.titles.identity') }}</h3>
</div>

<div class="box-body">

  {!! Form::itemText('name', trans('users.first_name'), NULL, $errors) !!}

  {!! Form::itemText('email', trans('users.email'), NULL, $errors) !!}

</div>
