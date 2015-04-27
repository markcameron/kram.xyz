<div class="box-tools pull-right">
  @foreach (config('translatable.locales') as $code)
    <a href="?lang={{ $code }}" {{ $lang == $code ? 'style="color:#ffffff"' : '' }} class="btn btn-flat{{ $lang == $code ? ' btn-success' : '' }}">{{ $code }}</a>
  @endforeach
</div>
