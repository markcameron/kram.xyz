@extends('front')

@section('title')
  {{ $page->title }} :: @parent
@stop

@section('content')

  <div id="page" class="contentcenter clearfix">

    <section class="clearfix col12 content-block">

      <h1>{{ $page->title }}</h1>

      @if ($image = Imagecache::get($media, '80x80'))
        {{ $image->img_nosize }}
      @endif

      <h6>{{ $page->teaser }}</h6>

      {!! $page->body !!}

    </section><!-- #event -->

  </div>

@stop
