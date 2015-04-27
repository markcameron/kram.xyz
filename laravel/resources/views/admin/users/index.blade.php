@extends('admin')

@section('header')
  <h1>Users</h1>
@stop

@section('content')

  <div class="row">

    <div class="col-sm-12">

      <div class="box box-primary">

        <div class="box-header">

          {!! Form::buttonCreate(array('admin.users.create')) !!}

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
		<th>Last seen</th>
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
		  <td>{{ !is_null($user->last_seen) ? $user->last_seen->diffForHumans() : '-' }}</td>
		  <td class="text-right">
		    {!! Form::buttonEdit(array('admin.users.edit', $user->id)) !!}
		    {!! Form::buttonDelete(array('admin.users.destroy', $user->id)) !!}
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
