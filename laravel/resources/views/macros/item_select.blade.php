<div class="form-group {!! ($errors->has($name)) ? 'has-error' : '' !!}">
  {!! Form::label($name, $label) !!}
  {!! Form::select($name, $options, $value, $input_options) !!}
  @if (!empty($help))
    <p class="help-block">{!! $help !!}</p>
  @endif
  {!! ($errors->has($name) ? $errors->first($name) : '') !!}
</div>
