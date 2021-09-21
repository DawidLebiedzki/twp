<!DOCTYPE html>
<html>

<head>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TWP Infoboard</title>

    <link rel="icon" type="image/png" href="{{ asset('img/favicon.ico') }}">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('css/plugins/iCheck/custom.css') }}" rel="stylesheet">

    <link href="{{ asset('css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet">

    <link href="{{ asset('css/plugins/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">

    <link href="{{ asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}"
        rel="stylesheet">

    <link href="{{ asset('css/plugins/select2/select2.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/plugins/select2/select2-bootstrap4.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
    <!-- Toastr style -->
    <link href="{{ asset('css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{ asset('js/plugins/gritter/jquery.gritter.css') }}" rel="stylesheet">
    <!-- Stepper -->
    <link href="{{ asset('css/plugins/steps/jquery.steps.css') }}" rel="stylesheet">

    <link href="{{ asset('css/plugins/footable/footable.core.css') }}" rel="stylesheet">

    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


</head>

<body>
    <div id="app">
        <div id="wrapper">
            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav metismenu" id="side-menu">
                        <li class="nav-header">
                            <div class="dropdown profile-element">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    @auth
                                        <a href="{{ route('admin.users.show', Auth::user()->id) }}"
                                            class=""><img
                                                alt=" image"
                                            class="rounded-circle" src="{{ Auth::user()->getFirstMediaUrl('avatars') }}"
                                            height="50" width="50"></a>

                                        <span class="block m-t-xs font-bold">{{ Auth::user()->fname }}
                                            {{ Auth::user()->lname }}</span>
                                        <span
                                            class="block m-t-xs font-bold text-muted">{{ implode(
    ', ',
    Auth::user()->roles()->get()->pluck('displayed_name')->toArray(),
) }}</span>

                                    @endauth
                                    @guest
                                        <img alt="image" class="rounded-circle"
                                            src="{{ asset('img/default_avatar.png') }}" height="50" width="50">
                                        <span class="block m-t-xs font-bold">Gast</span>
                                    @endguest

                                </a>

                            </div>
                            {{-- Left menu --}}
                            <div class="logo-element">
                                TWP
                            </div>
                        </li>

                        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> <span
                                    class="nav-label">Dashboard</span></a>
                          
                        </li>





                        <li><a href="#"><i class="fa fa-calendar"></i> <span
                                    class="nav-label">Schichtplan</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="">Profilabteilung</a></li>
                                <li><a href="#">Stanzabteilung</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-database"></i> <span
                                    class="nav-label">Stammdaten</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="{{ route('drawings.index') }}">Zeichnung</a></li>
                                <li><a href="#">Lehrenbeschreibung</a></li>
                                <li><a href="#">Aufbauplan</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube"></i> <span class="nav-label">Artikel</span> </a>
                        </li>

                        <li><a href="{{ route('noticeboards.index') }}"><i class="fa fa-info-circle"></i> <span class="nav-label">Schwarzes
                                    Brett</span></a>
                            
                        </li>

                        <li>
                            @hasrole('admin')
                            <a href="#"><i class="fa fa-gears"></i> <span
                                    class="nav-label">Administration</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-user"></i> <span
                                            class="nav-label">Benutzer</span></a>


                                </li>
                                <li><a href="{{ route('admin.machines.index') }}"><i class="fa fa-gear"></i>
                                        <span class="nav-label">Maschinen</span></a>


                                </li>
                                <li><a href="{{ route('admin.customers.index') }}"><i class="fa fa-users"></i>
                                        <span class="nav-label">Kunden</span></a>

                                </li>
                                <li><a href="{{ route('admin.drawings.index') }}"><i class="fa fa-picture-o"></i>
                                        <span class="nav-label">Zeichnung</span></span></a>

                                </li>
                                <li><a href="{{ route('admin.articles.index') }}"><i class="fa fa-cube"></i>
                                        <span class="nav-label">Artikel</span></span></a>

                                </li>
                                <li><a href="#"><i class="fa fa-calendar"></i> <span
                                            class="nav-label">Schichtplan</span></a>

                                </li>
                                <li><a href="#"><i class="fa fa-tasks"></i> <span
                                            class="nav-label">Auftrag</span></a>

                                </li>
                                <li><a href="{{ route('admin.operations.index') }}"><i class="fa fa-tasks"></i>
                                        <span class="nav-label">Arbeitsgang</span></a>

                                </li>
                                <li><a href="{{ route('admin.noticeboards.index') }}"><i
                                            class="fa fa-info-circle"></i>
                                        <span class="nav-label">Aushang</span></a>

                                </li>
                                <li><a href="#"><i class="fa fa-gears"></i> <span
                                            class="nav-label">Einstellungen</span></a>

                                </li>


                            </ul>
                            @endhasrole
                        </li>
                        @auth
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();"><i
                                        class="fa fa-sign-out"></i> <span class="nav-label"> Log out</span> </a></li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endauth
                    </ul>

                </div>
            </nav>
            {{-- Right navbar side --}}
            <div id="page-wrapper" class="gray-bg">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                    class="fa fa-bars"></i> </a>
                            <form role="search" class="navbar-form-custom" method="post" action="#">
                                <div class="form-group">
                                    <input type="text" placeholder="Suchen..." class="form-control"
                                        name="top-search" id="top-search">
                                </div>
                            </form>
                        </div>
                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                                <span class="m-r-sm text-muted welcome-message">Wilkommen im TWP Portal</span>
                            </li>
                            @auth
                                <li class="dropdown">
                                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                        <i class="fa fa-envelope"></i> <span class="label label-warning">16</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-messages">
                                        <li>
                                            <div class="dropdown-messages-box">
                                                <a class="dropdown-item float-left" href="profile.html">
                                                    <img alt="image" class="rounded-circle" src="img/a7.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <small class="float-right">46h ago</small>
                                                    <strong>Mike Loreipsum</strong> started following <strong>Monica
                                                        Smith</strong>. <br>
                                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dropdown-divider"></li>
                                        <li>
                                            <div class="dropdown-messages-box">
                                                <a class="dropdown-item float-left" href="profile.html">
                                                    <img alt="image" class="rounded-circle" src="img/a4.jpg">
                                                </a>
                                                <div class="media-body ">
                                                    <small class="float-right text-navy">5h ago</small>
                                                    <strong>Chris Johnatan Overtunk</strong> started following
                                                    <strong>Monica Smith</strong>. <br>
                                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dropdown-divider"></li>
                                        <li>
                                            <div class="dropdown-messages-box">
                                                <a class="dropdown-item float-left" href="profile.html">
                                                    <img alt="image" class="rounded-circle" src="img/profile.jpg">
                                                </a>
                                                <div class="media-body ">
                                                    <small class="float-right">23h ago</small>
                                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dropdown-divider"></li>
                                        <li>
                                            <div class="text-center link-block">
                                                <a href="mailbox.html" class="dropdown-item">
                                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                        <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-alerts">
                                        <li>
                                            <a href="mailbox.html" class="dropdown-item">
                                                <div>
                                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                                    <span class="float-right text-muted small">4 minutes ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="dropdown-divider"></li>
                                        <li>
                                            <a href="profile.html" class="dropdown-item">
                                                <div>
                                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                                    <span class="float-right text-muted small">12 minutes ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="dropdown-divider"></li>
                                        <li>
                                            <a href="grid_options.html" class="dropdown-item">
                                                <div>
                                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                                    <span class="float-right text-muted small">4 minutes ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="dropdown-divider"></li>
                                        <li>
                                            <div class="text-center link-block">
                                                <a href="notifications.html" class="dropdown-item">
                                                    <strong>See All Alerts</strong>
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                                </li>

                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();"><i
                                            class="fa fa-sign-out"></i> <span class="nav-label"> Log out</span> </a>
                                </li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            @endauth
                            @guest
                                <li>
                                    <a href="{{ route('login') }}"><i class="fa fa-sign-in"></i>Login</a>
                                </li>


                            @endguest
                        </ul>
                    </nav>
                    {{-- End navbar --}}
                </div>
                @yield('content-path-dashboard')
                <div class="row wrapper border-bottom white-bg page-heading">
                    @yield('content-path')
                </div>
                <main class="py-4">
                    @yield('content')
                </main>
                <div class="footer">
                    <div class="pull-right">
                        Letzte Aktivität: 25.02.2021
                    </div>
                    <div>
                        <strong>Copyright</strong> <a href="https://dawidlebiedzki.com">dawidlebiedzki.com </a> &copy; 2021
                    </div>
                </div>


            </div>
        </div>
    </div>


    <!-- Mainly scripts -->
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('js/inspinia.js') }}" defer></script>
    <script src="{{ asset('js/plugins/pace/pace.min.js') }}" defer></script>
    <script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- JSKnob -->
    <script src="{{ asset('js/plugins/jsKnob/jquery.knob.js') }}"></script>

    <!-- Input Mask-->
    <script src="{{ asset('js/plugins/jasny/jasny-bootstrap.min.js') }}"></script>

    <!-- Data picker -->
    <script src="{{ asset('js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>

    <!-- MENU -->
    <script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>

    <!-- DataTables -->
    <script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Flot -->
    <script src="{{ asset('js/plugins/flot/jquery.flot.js') }}" defer></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.tooltip.min.js') }}" defer></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.spline.js') }}" defer></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.resize.js') }}" defer></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.pie.js') }}" defer></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.symbol.js') }}" defer></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.time.js') }}" defer></script>

    <!-- Sparkline -->
    <script src="{{ asset('js/plugins/sparkline/jquery.sparkline.min.js') }}" defer></script>

    <!-- FooTable -->
    <script src="{{ asset('js/plugins/footable/footable.all.min.js') }}" defer></script>

    <!-- Steps -->
    <script src="{{ asset('js/plugins/steps/jquery.steps.min.js') }}" defer></script>

    <!-- FooTable -->
    <script src="{{ asset('js/plugins/validate/jquery.validate.min.js') }}" defer></script>
    <script>
        $(document).ready(function() {

            var sparklineCharts = function() {
                $("#sparkline1").sparkline([34, 43, 43, 35, 44, 32, 44, 52], {
                    type: 'line',
                    width: '100%',
                    height: '50',
                    lineColor: '#1ab394',
                    fillColor: "transparent"
                });

                $("#sparkline2").sparkline([32, 11, 25, 37, 41, 32, 34, 42], {
                    type: 'line',
                    width: '100%',
                    height: '50',
                    lineColor: '#1ab394',
                    fillColor: "transparent"
                });

                $("#sparkline3").sparkline([34, 22, 24, 41, 10, 18, 16, 8], {
                    type: 'line',
                    width: '100%',
                    height: '50',
                    lineColor: '#1C84C6',
                    fillColor: "transparent"
                });
            };

            var sparkResize;

            $(window).resize(function(e) {
                clearTimeout(sparkResize);
                sparkResize = setTimeout(sparklineCharts, 500);
            });

            sparklineCharts();




            var data1 = [
                [0, 4],
                [1, 8],
                [2, 5],
                [3, 10],
                [4, 4],
                [5, 16],
                [6, 5],
                [7, 11],
                [8, 6],
                [9, 11],
                [10, 20],
                [11, 10],
                [12, 13],
                [13, 4],
                [14, 7],
                [15, 8],
                [16, 12]
            ];
            var data2 = [
                [0, 0],
                [1, 2],
                [2, 7],
                [3, 4],
                [4, 11],
                [5, 4],
                [6, 2],
                [7, 5],
                [8, 11],
                [9, 5],
                [10, 4],
                [11, 1],
                [12, 5],
                [13, 2],
                [14, 5],
                [15, 2],
                [16, 0]
            ];
            $("#flot-dashboard5-chart").length && $.plot($("#flot-dashboard5-chart"), [
                data1, data2
            ], {
                series: {
                    lines: {
                        show: false,
                        fill: true
                    },
                    splines: {
                        show: true,
                        tension: 0.4,
                        lineWidth: 1,
                        fill: 0.4
                    },
                    points: {
                        radius: 0,
                        show: true
                    },
                    shadowSize: 2
                },
                grid: {
                    hoverable: true,
                    clickable: true,

                    borderWidth: 2,
                    color: 'transparent'
                },
                colors: ["#1ab394", "#1C84C6"],
                xaxis: {},
                yaxis: {},
                tooltip: false
            });

        });
    </script>
    @yield('script')

    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
</body>

</html>
