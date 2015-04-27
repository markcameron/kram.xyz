<div class="box-header">
  <h3 class="box-title">{{ trans('roles.box.title') }}</h3>
</div>

<div class="box-body">

  {!! Form::itemText('name', trans('roles.name'), NULL, $errors) !!}

  {!! Form::itemText('display_name', trans('roles.display_name'), NULL, $errors) !!}

  {!! Form::itemText('description', trans('roles.description'), NULL, $errors) !!}

</div>
