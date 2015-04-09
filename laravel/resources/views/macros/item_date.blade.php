<div class="form-group{{ ($errors->has($name)) ? ' has-error' : '' }}">
  {!! Form::label($name, $label) !!}
  <div class="input-group">
    {!! Form::text($name, $value, $options) !!}
    <div class="input-group-addon">
      <i class="fa fa-calendar-o"></i>
    </div>
  </div>
  @if (!empty($help))
    <p class="help-block">{{ $help }}</p>
  @endif
  {{ ($errors->has($name) ? '<p class="text-red">' . $errors->first($name) . '</p>' : '') }}
</div>
