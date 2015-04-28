<div class="box-header">
  <h3 class="box-title">{{ trans('pages.box.title') }}</h3>

  {!! \App\Libs\Helpers::getLangSelector() !!}
</div>

<div class="box-body">

  {!! Form::itemText('title', trans('pages.title'), NULL, $errors) !!}

  {!! Form::itemTextarea('teaser', trans('pages.teaser'), NULL, $errors) !!}

  {!! Form::itemTextarea('body', trans('pages.body'), NULL, $errors) !!}

  {!! Form::hidden('lang', \App\Libs\Helpers::getLang()) !!}

</div>
