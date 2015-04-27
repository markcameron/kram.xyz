<div class="btn-group">
  {!! Form::open(array('DELETE' => 'GET', 'route' => $route)) !!}
  {!! Form::button($text, array('class' => 'delete-confirm-dialog btn btn-xs btn-danger btn-flat', 'type' => 'submit')) !!}
  {!! Form::close() !!}
</div>
