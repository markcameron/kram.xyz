@extends('admin')

@section('header')
  <h1>{{ trans('logs.create.header') }}</h1>
@stop

@section('content')

  <div class="row">

    {!! Form::open(array('method' => 'POST', 'route' => array('admin.logs.store'), 'files' => TRUE)) !!}

    <div class="col-md-8">

      <div class="box box-primary">

        @include('admin.logs.form')

        <div class="box-footer">
          {!! Form::submit(trans('buttons.add'), array('class' => 'btn btn-primary btn-flat')) !!}
        </div>

      </div>

    </div>

    {!! Form::close() !!}

  </div>

@stop
