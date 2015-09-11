@extends('admin')

@section('header')
  <h1>{{ trans('logs.index.header') }}</h1>
@stop

@section('content')

  <div class="row">

    <div class="col-sm-12">

      <div class="box box-primary">

        <div class="box-header">

        </div><!-- /.box-header -->

        <div class="box-body table-responsive no-padding">

          <table class="table table-hover" id="user-list">
            <tbody>

              <tr>
		<th style="width: 10px">{{ trans('logs.index.table.id') }}</th>
		<th>{{ trans('logs.index.table.uri') }}</th>
		<th>{{ trans('logs.index.table.referer') }}</th>
		<th>{{ trans('logs.index.table.url') }}</th>
		<th>{{ trans('logs.index.table.created_at') }}</th>
		<th></th>
	      </tr>

	      @if (!$logs->count())
		<tr>
		  <td colspan=4>{{ trans('logs.index.empty') }}</td>
		</tr>
	      @endif

	      @foreach ($logs as $row)
		<tr>
		  <td>{{ $row->id }}</td>
		  <td>{{ $row->uri }}</td>
		  <td>{{ $row->referer }}</td>
		  <td>{{ $row->url }}</td>
		  <td>{{ $row->created_at->diffForHumans() }}</td>
		</tr>
	      @endforeach

            </tbody>
          </table>

        </div>

	<div class="box-footer clearfix">
	  {!! $logs->render() !!}
	</div>

      </div>

    </div>
  </div>

@stop
