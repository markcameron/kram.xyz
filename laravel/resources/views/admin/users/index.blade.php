@extends('admin')

@section('header')
  <h1>Users</h1>
@stop

@section('content')

  <div class="row">

    <div class="col-sm-12">

      <div class="box box-primary">

        <div class="box-header">

          {!! Form::open(array('method'=>'GET','route' => array('admin.users.create'))) !!}
          {!! Form::submit('Create new user', array('class'=>'btn btn-primary btn-flat margin-bottom')) !!}
          {!! Form::close() !!}

          <div class="box-tools">

          </div>

        </div><!-- /.box-header -->

        <div class="box-body table-responsive no-padding">

          <table class="table table-hover" id="user-list">
            <tbody>

              <tr>
		<th style="width: 10px">ID</th>
		<th>Name</th>
		<th>E-mail</th>
		<th>Member since</th>
		<th></th>
	      </tr>

	      @if (!$users->count())
		<tr>
		  <td colspan=5>No users found</td>
		</tr>
	      @endif

	      @foreach ($users as $user)
		<tr>
		  <td>{{ $user->id }}</td>
		  <td>{{ $user->full_name }}</td>
		  <td>{{ $user->email }}</td>
		  <td>{{ $user->created_at->diffForHumans() }}</td>
		  <td>
		    <div class="btn-group pull-right">
		      {!! Form::open(array('style' => 'margin-right: 5px', 'class' => 'pull-left', 'method'=>'GET','route'=> array('admin.users.edit', $user->id))) !!}
		      {!! Form::button('Edit',array('class'=>'btn btn-xs btn-primary btn-flat', 'type' => 'submit')) !!}
		      {!! Form::close() !!}
		      {!! Form::open(array('class' => 'pull-left', 'method'=>'DELETE','route'=> array('admin.users.destroy', $user->id))) !!}
		      {!! Form::button('Delete',array('class'=>'delete-confirm-dialog btn btn-xs btn-danger btn-flat', 'type' => 'submit')) !!}
		      {!! Form::close() !!}
		    </div>
		  </td>
		</tr>
	      @endforeach

            </tbody>
          </table>

        </div>

	<div class="box-footer clearfix">
	  {!! $users->render() !!}
	</div>

      </div>

    </div>
  </div>

@stop
