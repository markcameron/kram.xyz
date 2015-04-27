@extends('admin')

@section('header')
  <h1>{{ trans('roles.index.header') }}</h1>
@stop

@section('content')

  <div class="row">

    <div class="col-sm-12">

      <div class="box box-primary">

        <div class="box-header">

          {!! Form::buttonCreate(array('admin.roles.create')) !!}

          <div class="box-tools">

          </div>

        </div><!-- /.box-header -->

        <div class="box-body table-responsive no-padding">

          <table class="table table-hover" id="user-list">
            <tbody>

              <tr>
		<th style="width: 10px">{{ trans('roles.index.table.id') }}</th>
		<th>{{ trans('roles.index.table.name') }}</th>
		<th>{{ trans('roles.index.table.display_name') }}</th>
		<th>{{ trans('roles.index.table.description') }}</th>
		<th>{{ trans('roles.index.table.created_at') }}</th>
		<th></th>
	      </tr>

	      @if (!$roles->count())
		<tr>
		  <td colspan=5>{{ trans('roles.index.empty') }}</td>
		</tr>
	      @endif

	      @foreach ($roles as $row)
		<tr>
		  <td>{{ $row->id }}</td>
		  <td>{{ $row->name }}</td>
		  <td>{{ $row->display_name }}</td>
		  <td>{{ $row->description }}</td>
		  <td>{{ $row->created_at->diffForHumans() }}</td>
		  <td class="text-right">
		    {!! Form::buttonEdit(array('admin.roles.edit', $row->id)) !!}
		    {!! Form::buttonDelete(array('admin.roles.destroy', $row->id)) !!}
		  </td>
		</tr>
	      @endforeach

            </tbody>
          </table>

        </div>

	<div class="box-footer clearfix">
	  {!! $roles->render() !!}
	</div>

      </div>

    </div>
  </div>

@stop
