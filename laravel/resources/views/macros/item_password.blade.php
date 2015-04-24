<div class="form-group{{ (!is_null($errors) && $errors->has($name)) ? ' has-error' : '' }}">
  {!! Form::label($name, $label) !!}
  {!! Form::password($name, $options) !!}
  @if (!empty($help))
    <p class="help-block">{{ $help }}</p>
  @endif
  {!! (!is_null($errors) && $errors->has($name) ? '<p class="text-red">' . $errors->first($name) . '</p>' : '') !!}
</div>
