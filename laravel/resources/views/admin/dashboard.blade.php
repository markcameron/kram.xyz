@extends('admin')

@section('content')

  <div class="row">

    <div class="col-md-6">

      <div class="box box-primary box-solid collapsed-box">

        <div class="box-header">
          <h3 class="box-title">Text field</h3>

          <div class="box-tools pull-right">
            <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-plus"></i></button>
          </div>
        </div>

        <div class="box-body">
          <code>
            Form::itemText($name, $label, $value = NULL, $errors = NULL, $extras = array())
          </code>
          <br>
          <h4>Example</h4>
          <code>
            &#123;!! Form::itemText('name', trans('text.label'), 'value', $errors, array('help' => 'help text', 'class' => 'extra-class')) !!&#125;
          </code>
          <br>
          <br>

          {!! Form::itemText('name', trans('text.label'), 'extras is optional, so pass []', $errors, array('help' => 'help text', 'class' => 'extra-class')) !!}

        </div>

      </div>

      <div class="box box-primary box-solid collapsed-box">

        <div class="box-header">
          <h3 class="box-title">Textarea field</h3>

          <div class="box-tools pull-right">
            <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-plus"></i></button>
          </div>
        </div>

        <div class="box-body">
          <code>
            Form::itemTextarea($name, $label, $value = NULL, $errors = NULL, $extras = array())
          </code>
          <br>
          <h4>Example</h4>
          <code>
            &#123;!! Form::itemTextarea('name', trans('textarea.label'), 'value', $errors, array('help' => 'help text', 'rows' => '3')) !!&#125;
          </code>
          <br>
          <br>

          {!! Form::itemTextarea('name', trans('textarea.label'), 'rows is 3 by default, so don\'t include everytime', $errors, array('help' => 'help text', 'rows' => '3')) !!}

        </div>

      </div>

      <div class="box box-primary box-solid collapsed-box">

        <div class="box-header">
          <h3 class="box-title">Select field</h3>

          <div class="box-tools pull-right">
            <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-plus"></i></button>
          </div>
        </div>

        <div class="box-body">
          <code>
            Form::itemSelect($name, $label, $options, $value = NULL, $errors = NULL, $extras = array())
          </code>
          <br>
          <h4>Example</h4>
          <code>
            &#123;!! Form::itemSelect('name', trans('select.label'), array(0 => 'Load this in', 1 => 'the controller'), 0, $errors, array('help' => 'help text')) !!&#125;
          </code>
          <br>
          <br>

          {!! Form::itemSelect('name', trans('select.label'), array(0 => 'Load this in', 1 => 'the controller'), 0, $errors, array('help' => 'help text')) !!}

        </div>

      </div>

      <div class="box box-primary box-solid collapsed-box">

        <div class="box-header">
          <h3 class="box-title">Date field</h3>

          <div class="box-tools pull-right">
            <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-plus"></i></button>
          </div>
        </div>

        <div class="box-body">
          <code>
            Form::itemDate($name, $label, $value = NULL, $errors = NULL, $extras = array())
          </code>
          <br>
          <h4>Example</h4>
          <code>
            &#123;!! Form::itemDate('name', trans('select.label'), NULL, $errors, array('help' => 'help text')) !!&#125;
          </code>
          <br>
          <br>

          {!! Form::itemDate('name', trans('select.label'), NULL, $errors, array('help' => 'help text')) !!}

        </div>

      </div>
    </div>

    <div class="col-md-6">

      <div class="box box-success box-solid collapsed-box">

        <div class="box-header">
          <h3 class="box-title">Single Image Uploads</h3>

          <div class="box-tools pull-right">
            <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-plus"></i></button>
          </div>
        </div>

        <div class="box-body">
          <code>
            Form::singleUpload($name, $label, $model, $type)
          </code>
          <br>
          <h4>Example</h4>
          <code>
            &#123;!! Form::singleUpload('name', trans('upload.label'), $current_user, 'profile_picture') !!&#125;
          </code>
          <br>
          <br>

          {!! Form::singleUpload('name', trans('upload.label'), NULL, 'profile_picture') !!}

        </div>

      </div>

      <div class="box box-success box-solid collapsed-box">

        <div class="box-header">
          <h3 class="box-title">Multiple Image Uploads</h3>

          <div class="box-tools pull-right">
            <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-plus"></i></button>
          </div>
        </div>

        <div class="box-body">
          <code>
            Form::multiUpload($model, $type)
          </code>
          <br>
          <h4>Example</h4>
          <code>
            &#123;!! Form::multiUpload($user, 'profile_picture') !!&#125;
          </code>
          <br>
          <br>

          {!! Form::multiUpload($current_user, 'profile_picture') !!}
        </div>

      </div>

    </div>

  </div>

@endsection
