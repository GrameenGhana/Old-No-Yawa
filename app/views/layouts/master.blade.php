<!DOCTYPE html>
<html>
    <head>
        @section('head')

        <meta charset="UTF-8">
        <title>No Yawa Admin Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        {{ HTML::style('css/bootstrap.min.css'); }} 
        <!-- font Awesome -->
        {{ HTML::style('css/font-awesome.min.css'); }} 
        <!-- Ionicons -->
        {{ HTML::style('css/ionicons.min.css'); }} 
        <!-- Morris chart 
        {{ HTML::style('css/morris/morris.css'); }} -->
        <!-- jvectormap -->
        {{ HTML::style('css/jvectormap/jquery-jvectormap-1.2.2.css'); }} 
        <!-- fullCalendar -->
        {{ HTML::style('css/fullcalendar/fullcalendar.css'); }} 
        <!-- Daterange picker -->
        {{ HTML::style('css/daterangepicker/daterangepicker-bs3.css'); }} 
        <!-- bootstrap wysihtml5 - text editor -->
        {{ HTML::style('css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); }} 
        <!-- Theme style -->
        {{ HTML::style('css/AdminLTE.css'); }} 
         <!-- Scrolling style -->
        {{ HTML::style('css/image.css'); }} 
        <!-- TableTool style -->
        {{ HTML::style('css/dataTables.tableTools.css'); }} 
        

        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        @show
    </head>

    <body class="skin-blue">
        <header class="header">
            <a href="/" class="logo">No Yawa Admin</a>

            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <?php
                        if (Auth::check() == false) {
                            Redirect::to('/');
                        }
                        ?>

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>{{{ Auth::user()->getName() }}}<i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <?php
                                    if (Auth::user()->getGender() == "f") {
                                        ?>
                                        {{ HTML::image('img/female.png','User Image',array('class'=>'img-circle')); }}

                                        <?php
                                    } else {
                                        ?>
                                        {{ HTML::image('img/male.png','User Image',array('class'=>'img-circle')); }}
                                        <?php
                                    }
                                    ?>

                                    <p>
                                        {{{ Auth::user()->getName() }}} ({{{Auth::user()->username}}})
                                        <small>{{{ ucfirst(Auth::user()->role) }}}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ URL::to('users/'.Auth::user()->id.'/edit') }}" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ URL::to('logout') }}" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <?php
                            if (Auth::user()->getGender() == "f") {
                                ?>
                                {{ HTML::image('img/female.png','User Image',array('class'=>'img-circle')); }}

                                <?php
                            } else {
                                ?>
                                {{ HTML::image('img/male.png','User Image',array('class'=>'img-circle')); }}
                                <?php
                            }
                            ?>
                        </div>
                        <div class="pull-left info">
                            <p>Hello, {{{ Auth::user()->first_name }}}</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class=" {{ Request::is('/') ? 'active' : '' }}">
                            <a href="{{ URL::to('/dashboard') }}">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </a>
                        </li>

                        @if (in_array(strtolower(Auth::user()->role), array('admin')))

                        <li class="treeview {{ (Request::is('subs*')) ? 'active' : '' }}">
                            <a href="#">
                                <i class="fa fa-cogs"></i>
                                <span>Actions</span>                  
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="{{ Request::is('subs/*') ? 'active' : '' }}"><a href="{{ URL::to('subs') }}"><i class="fa fa-users"></i>Subscribers</a></li>
                                <li class="{{ Request::is('uploads/*') ? 'active' : '' }}"><a href="{{ URL::to('exceluploads/show') }}"><i class="fa fa-file"></i>Upload Excel File</a></li>
                                <li class="{{ Request::is('uploads/*') ? 'active' : '' }}"><a href="{{ URL::to('exceluploads') }}"><i class="fa fa-files-o"></i>Excel Uploads</a></li>
                                <li class="{{ Request::is('broadcast/*') ? 'active' : '' }}"><a href="{{ URL::to('broadcast/show') }}"><i class="fa fa-files-o"></i>Broadcast A Message</a></li>
                                <li class="{{ Request::is('stopmsg/*') ? 'active' : '' }}"><a href="{{ URL::to('stopmsg/show') }}"><i class="fa fa-files-o"></i>Stop Subscription</a></li>
                            </ul>

                        </li>
                        @endif
                        
                        @if (in_array(strtolower(Auth::user()->role), array('demo')))

                        <li class="treeview {{ (Request::is('subs*')) ? 'active' : '' }}">
                            <a href="#">
                                <i class="fa fa-cogs"></i>
                                <span>Actions</span>                  
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="{{ Request::is('subs/*') ? 'active' : '' }}"><a href="{{ URL::to('subs') }}"><i class="fa fa-users"></i>Subscribers</a></li>
                                <li class="{{ Request::is('uploads/*') ? 'active' : '' }}"><a href="{{ URL::to('exceluploads') }}"><i class="fa fa-files-o"></i>Excel Uploads</a></li>
                                <li class="{{ Request::is('stopmsg/*') ? 'active' : '' }}"><a href="{{ URL::to('stopmsg/show') }}"><i class="fa fa-files-o"></i>Stop Subscription</a></li>
                            </ul>

                        </li>
                        @endif

                        @if (in_array(strtolower(Auth::user()->role), array('partner')))

                        <li class="treeview {{ (Request::is('subs*')) ? 'active' : '' }}">
                            <a href="#">
                                <i class="fa fa-cogs"></i>
                                <span>Actions</span>                  
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="{{ Request::is('subs/*') ? 'active' : '' }}"><a href="{{ URL::to('subs') }}"><i class="fa fa-users"></i>Subscribers</a></li>

                                <li class="{{ Request::is('stopmsg/*') ? 'active' : '' }}"><a href="{{ URL::to('stopmsg/show') }}"><i class="fa fa-files-o"></i>Stop Subscription</a></li>
                            </ul>

                        </li>

                        @endif

                        @if (in_array(strtolower(Auth::user()->role), array('volunteer')))

                        <li class="treeview {{ (Request::is('subs*')) ? 'active' : '' }}">
                            <a href="#">
                                <i class="fa fa-cogs"></i>
                                <span>Actions</span>                  
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="{{ Request::is('subs/*') ? 'active' : '' }}"><a href="{{ URL::to('subs') }}"><i class="fa fa-users"></i>Subscribers</a></li>
                            </ul>

                        </li>
                        @endif

                        @if (in_array(strtolower(Auth::user()->role), array('admin','demo')))

                        <li class="treeview {{ (Request::is('stats*')) ? 'active' : '' }}">
                            <a href="#">
                                <i class="fa fa-cogs"></i>
                                <span>Stats</span>

                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="{{ Request::is('stats/generalcharts') ? 'active' : '' }}"><a href="{{ URL::to('stats/generalcharts') }}"><i class="fa fa-bar-chart-o"></i>General Charts</a></li>
                                <li class="{{ Request::is('stats/detailcharts') ? 'active' : '' }}"><a href="{{ URL::to('stats/detailcharts') }}"><i class="fa fa-bar-chart-o"></i>Detail Charts</a></li>
                                <li class="{{ Request::is('stats/timeseries/*') ? 'active' : '' }}"><a href="{{ URL::to('stats/timeseriescharts') }}"><i class="fa fa-bar-chart-o"></i>Timeseries Charts</a></li>
                                <li class="{{ Request::is('stats/locationcharts') ? 'active' : '' }}"><a href="{{ URL::to('stats/locationcharts') }}"><i class="fa fa-map-marker"></i>Location Charts</a></li>
                            </ul>
                        </li>


                        <li class="treeview {{ (Request::is('system_setup*')) ? 'active' : '' }}">
                            <a href="#">
                                <i class="fa fa-cogs"></i>
                                <span>System Setup</span>

                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="{{ Request::is('system_setup/users*') ? 'active' : '' }}"><a href="{{ URL::to('system_setup/users') }}"><i class="fa fa-users"></i>Users</a></li>
                                <li class="{{ Request::is('system_setup/langs*') ? 'active' : '' }}"><a href="{{ URL::to('system_setup/langs') }}"><i class="fa fa-flag-o"></i>Languages</a></li>
                                <li class="{{ Request::is('system_setup/smslogs*') ? 'active' : '' }}"><a href="{{ URL::to('system_setup/smslogs') }}"><i class="fa fa-flag-o"></i>Sms Logs</a></li>
                                <li class="{{ Request::is('system_setup/voicelogs*') ? 'active' : '' }}"><a href="{{ URL::to('system_setup/voicelogs') }}"><i class="fa fa-flag-o"></i>Voice Logs</a></li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                @yield('content-header')

                <!-- Main content -->
                @yield('content')
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <script src="https://code.jquery.com/jquery-2.1.0.js"></script>
        
        <!-- jQuery 2.0.2 -->
        
        <!-- jQuery UI 1.10.3 -->
        {{ HTML::script('js/jquery-ui-1.10.3.min.js'); }}
        <!-- Bootstrap -->
        {{ HTML::script('js/bootstrap.min.js'); }}
        <!-- Morris.js charts 
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        {{ HTML::script('js/plugins/morris/morris.min.js'); }} -->
        <!-- Sparkline -->
        {{ HTML::script('js/plugins/sparkline/jquery.sparkline.min.js'); }}
        <!-- jvectormap -->
        {{ HTML::script('js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); }}
        {{ HTML::script('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); }}
        <!-- fullCalendar -->
        {{ HTML::script('js/plugins/fullcalendar/fullcalendar.min.js'); }}
        <!-- jQuery Knob Chart -->
        {{ HTML::script('js/plugins/jqueryKnob/jquery.knob.js'); }}
        <!-- daterangepicker -->
        {{ HTML::script('js/plugins/daterangepicker/daterangepicker.js'); }}
        <!-- Bootstrap WYSIHTML5 -->
        {{ HTML::script('js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); }}
        <!-- iCheck -->
        {{ HTML::script('js/plugins/iCheck/icheck.min.js'); }}
        <!-- data tables -->
        {{ HTML::script('js/plugins/datatables/jquery.dataTables.js'); }}
        {{ HTML::script('js/plugins/datatables/dataTables.bootstrap.js'); }}
        <script src="//cdn.datatables.net/tabletools/2.2.3/js/dataTables.tableTools.min.js"></script>
        <!-- AdminLTE App -->
        {{ HTML::script('js/AdminLTE/app.js'); }}
        <!-- Scrolling -->
        {{ HTML::script('js/jquery.scrollUp.min.js'); }}
        
        

        @yield('script')
    </body>
</html>
