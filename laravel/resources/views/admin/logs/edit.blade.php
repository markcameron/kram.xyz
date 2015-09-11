@extends('admin')

@section('header')
  <h1>{{ trans('logs.edit.header') }}</h1>
@stop

@section('content')

  <div class="row">

    <div class="col-lg-8">

      <div class="box box-primary">

        <div class="box-header">

        </div><!-- /.box-header -->

        {!! Form::model($log, array('method' => 'PUT', 'route' => array('admin.logs.update', $log->id), 'files' => TRUE)) !!}

        @include('admin.logs.form')

        <div class="box-footer">
          {!! Form::submit(trans('buttons.save'), array('class' => 'btn btn-primary btn-flat')) !!}
        </div>

        {!! Form::close() !!}

      </div>

    </div>

  </div>

@stop
