@extends('admin')

@section('header')
  <h1>{{ trans('users.edit.header') }} - {{ $user->name }}</h1>
@stop

@section('content')

  <div class="row">

    <div class="col-lg-8">

      <div class="box box-primary">

        <div class="box-header">

        </div><!-- /.box-header -->

        {!! Form::model($user, array('method' => 'PUT', 'route' => array('admin.users.update', $user->id), 'files' => TRUE)) !!}

        @include('admin.users.partials.form')

        <div class="box-footer">
          {!! Form::submit(trans('buttons.save'), array('class' => 'btn btn-primary btn-flat')) !!}
        </div>

        {!! Form::close() !!}

      </div>

    </div>

  </div>

@stop
