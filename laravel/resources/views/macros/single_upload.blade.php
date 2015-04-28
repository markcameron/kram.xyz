<div class="form-group">

  {!! Form::label($name, $label, array('class' => 'control-label')) !!}
  <div class="image-upload"{!! is_null($file) ? '' : ' style="display:none;"' !!}>
    {!! Form::file($name) !!}
    {!! $errors->has($name) ? Form::label('error', $errors->first($name), array('class' => 'control-label')) : '' !!}
    {{ $errors->has($name) ? '<span class="glyphicon glyphicon-remove form-control-feedback"></span>' : '' }}
  </div>

  @if (!is_null($file))
    <div class="row image-display" data-id="{{ $file->id }}" data-scope="{{ $type }}" data-model-id="{{ is_null($model) ? '' : $model->id }}" data-model-name="{{ $model_name }}">
      <div class="col-xs-2">
        @if ($image = Imagecache::get($file, '80x80'))
          {!! $image->img_nosize !!}
        @endif
      </div>
      <div class="col-xs-8">
        <div class="input-group">
          <span class="input-group-addon">Alt</span>
          {!! Form::text('media_alt', $file->alt, ['class' => 'alt form-control', 'data-type' => 'alt', 'autocomplete' => 'off']) !!}
        </div>
        <div class="input-group" style="margin-top:10px">
          <span class="input-group-addon">Title</span>
          {!! Form::text('media_title', $file->title, ['class' => 'title form-control', 'data-type' => 'title', 'autocomplete' => 'off']) !!}
        </div>
      </div>

      <div class="col-xs-2">
        <a href="#" class="btn btn-danger remove-single-image">
          <i class="glyphicon glyphicon-trash"></i>&nbsp;
          <span>Delete</span>
        </a>
      </div>

      {!! Form::hidden('old_file_'. $name, TRUE) !!}

    </div>


  @endif

</div>
