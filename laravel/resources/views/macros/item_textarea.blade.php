<div class="form-group {!! ($errors->has($name)) ? 'has-error' : '' !!}">
  {!! Form::label($name, $label) !!}
  {!! Form::textarea($name, $value, $options) !!}
  @if (!empty($help))
    <p class="help-block">{!! $help !!}</p>
  @endif
  {!! ($errors->has($name) ? $errors->first($name) : '') !!}
</div>
