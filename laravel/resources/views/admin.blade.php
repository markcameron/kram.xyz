<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <!-- Font Awesome Icons -->
    {!! HTML::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') !!}
    <!-- Ionicons -->
    {!! HTML::style('http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css') !!}
    <!-- Theme style -->
    {!! Minify::stylesheet(array(
    '/assets/vendor/adminlte/bootstrap/css/bootstrap.min.css',
    '/assets/vendor/adminlte/dist/css/AdminLTE.min.css',
    '/assets/vendor/adminlte/dist/css/skins/skin-purple.min.css',
    '/assets/vendor/adminlte/plugins/datepicker/datepicker3.css',
    '/assets/custom/css/admin/macro-multi-upload.css',
    )) !!}


    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
    page. However, you can choose any other skin. Make sure you
    apply the skin class to the body tag so the changes take effect.
    -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    {!! HTML::script('//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') !!}
    {!! HTML::script('//oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') !!}
    <![endif]-->
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |---------------------------------------------------------|

  -->
  <body class="skin-purple">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="{{ route('admin') }}" class="logo"><b>Admin</b>LTE</a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">Alexander Pierce</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                      Alexander Pierce - Web Developer
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          {!! Menu::handler('admin')->addClass('sidebar-menu')->render() !!}

        </section>
        <!-- /.sidebar -->

      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            @yield('header')
          </h1>

          @yield('breadcrumb')
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Your Page Content Here -->
          @yield('content')

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      @if (isset($__env->getSections()['footer']))
        <footer class="main-footer">
          @yield('footer')
        </footer>
      @endif

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    {!! Minify::javascript(array(
    '/assets/vendor/adminlte/plugins/jQuery/jQuery-2.1.3.min.js',
    '/assets/vendor/adminlte/plugins/jQueryUI/jquery-ui-1.10.3.min.js',
    '/assets/vendor/adminlte/bootstrap/js/bootstrap.min.js',
    '/assets/vendor/adminlte/dist/js/app.min.js',
    '/assets/vendor/adminlte/plugins/datepicker/bootstrap-datepicker.js',
    '/assets/vendor/js/dropzone.min.js',
    '/assets/custom/js/adminlte.js',
    )) !!}

    <!-- jQuery 2.1.3 -->
    <!-- Bootstrap 3.3.2 JS -->
    <!-- AdminLTE App -->

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
    Both of these plugins are recommended to enhance the
    user experience -->

    @yield('js')

  </body>
</html>
