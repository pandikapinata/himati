<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Admin HMTI</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    <!--alerts CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/sweetalert.css')}}"  type="text/css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/styleadmin.css')}}">
    <!-- You can change the theme colors from here -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/colors/default-dark.css')}}">

    <script src="https://cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script>
</head>

<body class="fix-header card-no-border fix-sidebar">

    <div id="main-wrapper">

        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{asset('assets/images/logo_icon.png')}}" alt="hmti" class="dark-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="{{asset('assets/images/hmti2.png')}}" alt="hmti" class="dark-logo" />
                         <!-- Light Logo text -->
                         </span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->

                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item hidden-sm-down"></li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{asset('assets/images/profile.png')}}" alt="user" class="profile-pic" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <span><i class="ti-user"></i> {{ Auth::guard('admin')->user()->name }}</span>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        <i class="fa fa-power-off"></i> Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">MENU</li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ route('verif.index') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i>
                                <span class="hide-menu">Verifikasi</span>
                            </a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ route('guests.index') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i>
                                <span class="hide-menu">Guest</span>
                            </a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ route('barang.index') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i>
                                <span class="hide-menu">Barang</span>
                            </a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ route('kegiatan.index') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i>
                                <span class="hide-menu">Kegiatan</span>
                            </a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ route('master-sie.index') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i>
                                <span class="hide-menu">Master Sie</span>
                            </a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ route('oprec.index') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i>
                                <span class="hide-menu">Open Requirement</span>
                            </a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ route('pendaftar.index') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i>
                                <span class="hide-menu">Pendaftar Oprec</span>
                            </a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ route('fungsionaris.index') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i>
                                <span class="hide-menu">Fungsionaris</span>
                            </a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ route('newsfeed.index') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i>
                                <span class="hide-menu">NewsFeeds</span>
                            </a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ route('period.edit') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i>
                                <span class="hide-menu">Setup Periode</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <div class="page-wrapper">
            <div class="container-fluid">
                    @yield('content')
            </div>

            <footer class="footer">
                © 2018 HMTI
            </footer>
        </div>

    </div>

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    @section('script')
    <script src="{{asset('assets/node_modules/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('assets/node_modules/popper/dist/popper.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('assets/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('assets/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('assets/js/customadmin.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/js/jasny-bootstrap.js')}}"></script>
    <!-- This is data table -->
    <script src="{{asset('assets/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <!-- Sweet-Alert  -->
    <script src="{{asset('assets/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.sweet-alert.custom.js')}}"></script>

    <script src="{{asset('assets/js/jquery.bootstrap-touchspin.js')}}"></script>
    @show
</body>

</html>