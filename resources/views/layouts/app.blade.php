<!DOCTYPE html>
<html>

<head>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TWP Infoboard</title>

    <link rel="icon" type="image/png" href="{{ asset('img/favicon.ico') }}" > 

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">   
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/plugins/iCheck/custom.css') }}" rel="stylesheet">  
    
    <link href="{{ asset('css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet">  
    
    <link href="{{ asset('css/plugins/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">  
    
    <link href="{{ asset('css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">  
    
    <link href="{{ asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}" rel="stylesheet">  
    
    <link href="{{ asset('css/plugins/select2/select2.min.css') }}" rel="stylesheet">  
   
    <link href="{{ asset('css/plugins/select2/select2-bootstrap4.min.css') }}" rel="stylesheet">  
   
    <!-- Toastr style -->
    <link href="{{ asset('css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{ asset('js/plugins/gritter/jquery.gritter.css') }}" rel="stylesheet">

    
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
                                <img alt="image" class="rounded-circle" src="{{ asset('img/user-avatar.jpg') }}"/ height="50" width="50">
                                    @auth
                                       <span class="block m-t-xs font-bold">{{ Auth::user()->name }}</span>
                                       {{-- <span class="block m-t-xs font-bold">{{ Auth::user()->name }}</span> --}}
                                    @endauth                                      
                                    @guest
                                         <span class="block m-t-xs font-bold">Gast</span>
                                    @endguest                                
                                <span class="text-muted text-xs block">Menu <b class="caret"></b></span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                
                                @auth 
                                <li><a class="dropdown-item" href="{{ url('/home') }}">Profil</a></li>
                                <li><a class="dropdown-item" href="{{ url('/home') }}">Nachrichten</a></li>
                                <li class="dropdown-divider"></li>      
                                   
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout</a></li>
                                
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @endauth                                   
                                @guest
                                <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                                @endguest
                            </ul>
                        </div>
{{-- Left menu --}}
                        <div class="logo-element">
                            TWP
                        </div>
                    </li>
                   
                        <li><a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Arbeitskarte</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="#" id="damian">Profilabteilung <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level collapse">
                                        <li><a href="#">Stückzahl eingeben</a></li>
                                        <li><a href="#">Materialverbrauch</a></li>
                                        <li><a href="#">Schichtübergabe</a></li>
                                    </ul>
                                    </li>
                            <li><a href="#"> <span class="nav-label">Stanzabteilung</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level collapse">
                        <li><a href="#">Stückzahl eingeben</a></li>
                        <li><a href="#">Materialverbrauch</a></li>
                        <li><a href="#">Schichtübergabe</a></li>
                        </ul></li>
                        </ul>
                        </li>
                        
                         
                      
                   
                  
                    <li><a href="#"><i class="fa fa-calendar"></i> <span class="nav-label">Schichtplan</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{ route('shift.rolling') }}">Profilabteilung</a></li>
                            <li><a href="{{ route('shift.punching') }}">Stanzabteilung</a></li>
                        </ul>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-database"></i> <span class="nav-label">Stammdaten</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{ route('drawings.index') }}">Zeichnung</a></li>
                            <li><a href="{{ route('shift.punching') }}">Lehrenbeschreibung</a></li>
                        </ul>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-paint-brush"></i> <span class="nav-label">6S</span> </a>
                    </li>
                    
                    <li><a href="#"><i class="fa fa-info"></i> <span class="nav-label">Infoboard</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="#">Profilabteilung</a></li>
                            <li><a href="#">Stanzabteilung</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-info"></i> <span class="nav-label">QM</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{ route('requali.index') }}">Requalifikation</a></li>
                            <li><a href="#">Reklamation Auswertung</a></li>
                        </ul>
                    </li>
                    <li>
                        
                        <a href="#"><i class="fa fa-gears"></i> <span class="nav-label">Administration</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Benutzer</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('admin.users.index') }}">Verwalten</a></li>
                        
                        </ul></li>
                        <li><a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Maschinen</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('machines.index') }}">Verwalten</a></li>
                        
                        </ul></li>
                        <li><a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Kunden</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="#">Stückzahl eingeben</a></li>
                                <li><a href="#">Materialverbrauch</a></li>
                                <li><a href="#">Schichtübergabe</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Zeichnung</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="{{ route('drawings.index') }}">Verwalten</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Artikel</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="{{ route('articles.index') }}">Verwalten</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Schichtplan</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="{{ route('admin.shift.index') }}">Verwalten</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Auftrag</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="#">Stückzahl eingeben</a></li>
                                <li><a href="#">Materialverbrauch</a></li>
                                <li><a href="#">Schichtübergabe</a></li>
                            </ul>
                        </li>
                    </ul>
                    </li>
                </ul>

            </div>
        </nav>
{{-- Right navbar side --}}
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" method="post" action="#">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        @auth
                        <li>
                            <a href="#"><i class="fa fa-home"></i> Home</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sign-out"></i> Log out</a>
                        </li>
                        @endauth
                        @guest
                        <li>
                            <a href="{{ route('login') }}"><i class="fa fa-user"></i>Login</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}"><i class="fa fa-edit"></i>Register</a>
                        </li>    
                        
                        @endguest                        
                    </ul>
                </nav>
{{-- End navbar --}}
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Issue list</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>App views</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Issue list</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <main class="py-4">
                @yield('content')
            </main>
            <div class="footer">
                <div class="pull-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2019
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



<script>
        $(document).ready(function() {

            var sparklineCharts = function(){
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

                $("#sparkline3").sparkline([34, 22, 24, 41, 10, 18, 16,8], {
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
                [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,20],[11,10],[12,13],[13,4],[14,7],[15,8],[16,12]
            ];
            var data2 = [
                [0,0],[1,2],[2,7],[3,4],[4,11],[5,4],[6,2],[7,5],[8,11],[9,5],[10,4],[11,1],[12,5],[13,2],[14,5],[15,2],[16,0]
            ];
            $("#flot-dashboard5-chart").length && $.plot($("#flot-dashboard5-chart"), [
                        data1,  data2
                    ],
                    {
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
                        xaxis:{
                        },
                        yaxis: {
                        },
                        tooltip: false
                    }
            );

        });
    </script>
@yield('script')

{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
</body>

</html>
