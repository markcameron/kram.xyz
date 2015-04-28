@extends('admin')

@section('header')
  <h1>{{ trans('pages.index.header') }}</h1>
@stop

@section('content')

  <div class="row">

    <div class="col-sm-12">

      <div class="box box-primary">

        <div class="box-header">

          {!! Form::buttonCreate(array('admin.pages.create')) !!}

          <div class="box-tools">

          </div>

        </div><!-- /.box-header -->

        <div class="box-body table-responsive no-padding">

          <table class="table table-hover" id="user-list">
            <tbody>

              <tr>
		<th style="width: 10px">{{ trans('pages.index.table.id') }}</th>
		<th>{{ trans('pages.index.table.title') }}</th>
		<th>{{ trans('pages.index.table.created_at') }}</th>
		<th class="text-center" style="width:80px;">{{ trans('pages.index.table.published') }}</th>
		<th></th>
	      </tr>

	      @if (!$pages->count())
		<tr>
		  <td colspan=5>{{ trans('pages.index.empty') }}</td>
		</tr>
	      @endif

	      @foreach ($pages as $row)
		<tr>
		  <td>{{ $row->id }}</td>
		  <td>{{ $row->title }}</td>
		  <td>{{ $row->created_at->diffForHumans() }}</td>
                  <td class="text-center">{!! \App\Libs\Admin::renderStatusButton($row, 'Page') !!}</td>
		  <td class="text-right">
		    {!! Form::buttonEdit(array('admin.pages.edit', $row->id)) !!}
		    {!! Form::buttonDelete(array('admin.pages.destroy', $row->id)) !!}
		  </td>
		</tr>
	      @endforeach

            </tbody>
          </table>

        </div>

	<div class="box-footer clearfix">
	  {!! $pages->render() !!}
	</div>

      </div>

    </div>
  </div>

@stop
