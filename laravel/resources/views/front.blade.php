<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="UTF-8">
    <title>
      @section('title')
        {!! Variables::get('site_name') !!}
        @show
    </title>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700' rel='stylesheet' type='text/css'>

    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! HTML::style('//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/smoothness/jquery-ui.css') !!}

    {!! Minify::stylesheet(
    array(
    '/assets/css/reset.css',
    '/assets/css/typography.css',
    '/assets/css/forms.css',
    '/assets/css/tables.css',
    '/assets/css/grid.css',
    '/assets/css/base.css',
    '/assets/css/style.css'
    ))->withFullUrl()
    !!}

    @yield('css')

  </head>

  <body>
    <div class="clearfix">
      <header id="site-header">

        <nav id="menu">
          <ul class="nav clearfix">
            <li class="has-dropdown">
              <a href="#"><b>{!! Variables::get('site_name') !!}</b></a>
            </li>
            @if (Auth::guest())
              <li>
                <a href="{{ url('/auth/login') }}">Login</a>
              </li>
              <li>
                <a href="{{ url('/auth/register') }}">Register</a>
              </li>
            @else
              <li>
                <a href="#">My Account</a>
                <ul class="dropdown">
                  @if ($current_user->hasRole('admin'))
                  <li><a href="{{ route('admin') }}">Admin</a></li>
                  @endif
                  <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                </ul>
              </li>
            @endif
          </ul>
        </nav>

        @yield('header')

      </header><!-- #site-header -->

      <main id="site-content">

        @yield('content')

      </main>

      @yield('search-bar-bottom')

      <footer id="site-footer">

      </footer>

    </div>

    {!! HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') !!}
    {!! HTML::script('//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js') !!}

    {!! Minify::javascript(
    array(
    '/assets/js/selectivizr-min.js',
    '/assets/js/modernizr.js',
    ))->withFullUrl()
    !!}

    @yield('js')

  </body>
</html>
