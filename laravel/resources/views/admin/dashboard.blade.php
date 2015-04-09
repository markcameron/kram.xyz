@extends('admin')

@section('content')

  <div class="row">

    <div class="col-md-6">

      <div class="box box-primary">

        <div class="box-header">
          <h3 class="box-title">Text field</h3>
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
    </div>
  </div>

  <div class="row">

    <div class="col-md-6">

      <div class="box box-primary">

        <div class="box-header">
          <h3 class="box-title">Textarea field</h3>
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
    </div>
  </div>

  <div class="row">

    <div class="col-md-6">

      <div class="box box-primary">

        <div class="box-header">
          <h3 class="box-title">Select field</h3>
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
    </div>
  </div>

  <div class="row">

    <div class="col-md-6">

      <div class="box box-primary">

        <div class="box-header">
          <h3 class="box-title">Select field</h3>
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
  </div>

@endsection
