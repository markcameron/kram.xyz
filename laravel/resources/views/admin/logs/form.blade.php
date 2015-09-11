<div class="box-header">
  <h3 class="box-title">{{ trans('logs.box.title') }}</h3>

  {!! \App\Libs\Helpers::getLangSelector() !!}
</div>

<div class="box-body">

  {!! Form::itemText('title', trans('logs.title'), NULL, $errors) !!}

</div>
