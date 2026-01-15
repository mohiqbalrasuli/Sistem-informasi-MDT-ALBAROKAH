<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=>
    <meta name="author" content=>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href={{ asset('assets/images/logo.jpg') }}>
    <title>@yield('title') - MDT Ula Al-Barokah</title>
    <!-- Custom CSS -->
    <link href={{ asset('assets/extra-libs/c3/c3.min.css') }} rel="stylesheet">
    <link href={{ asset('assets/libs/chartist/dist/chartist.min.css') }} rel="stylesheet">
    <link href={{ asset('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.cs') }} rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Tambahkan di <head> layout/app.blade.php -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Custom CSS -->
    <link href={{ asset('assets/dist/css/style.min.css') }} rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="/dashboard">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src={{ asset('assets/images/logo.jpg') }} width="50px" alt="homepage"
                                    class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src={{ asset('assets/images/logo.jpg') }} width="50px" alt="homepage"
                                    class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src={{ asset('assets/images/logo_text.png') }} width="100px" alt="homepage"
                                    class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src={{ asset('assets/images/logo_light.png') }} width="100px" class="light-logo"
                                    alt="homepage" />
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        <h1 class="text-truncate text-dark font-weight-medium mb-1">@yield('header')</h1>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link" href="javascript:void(0)">
                                <form>
                                    <div class="customize-input">
                                        <input class="form-control custom-shadow custom-radius border-0 bg-white"
                                            type="search" placeholder="Search" aria-label="Search">
                                        <i class="form-control-icon" data-feather="search"></i>
                                    </div>
                                </form>
                            </a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src={{ asset('assets/images/users/profile-pic.jpg') }} alt="user"
                                    class="rounded-circle" width="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                        class="text-dark">{{Auth::user()->name}}</span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="user"
                                        class="svg-icon mr-2 ml-1"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="credit-card"
                                        class="svg-icon mr-2 ml-1"></i>
                                    My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="mail"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="settings"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout"><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                                <div class="dropdown-divider"></div>
                                <div class="pl-4 p-3"><a href="javascript:void(0)" class="btn btn-sm btn-info">View
                                        Profile</a></div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/dashboard"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/profile"
                                aria-expanded="false"><i data-feather="briefcase" class="feather-icon"></i><span
                                    class="hide-menu">Profile Madrasah</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/data-admin"
                                aria-expanded="false"><i data-feather="user" class="feather-icon"></i><span
                                    class="hide-menu">Data Admin</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/data-murid-baru"
                                aria-expanded="false"><i data-feather="user-plus" class="feather-icon"></i><span
                                    class="hide-menu">Murid Baru</span></a></li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Murid</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                    class="hide-menu">Data Murid </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="{{url('/data-murid')}}" class="sidebar-link"><span
                                            class="hide-menu"> Semua
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{url('/data-murid?kelas=shifir_a')}}" class="sidebar-link"><span
                                            class="hide-menu"> Kelas Shifir A
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{url('/data-murid?kelas=shifir_b')}}"
                                        class="sidebar-link"><span class="hide-menu"> Kelas Shifir B
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{url('/data-murid?kelas=kelas_1')}}"
                                        class="sidebar-link"><span class="hide-menu"> Kelas 1
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{url('/data-murid?kelas=kelas_2')}}"
                                        class="sidebar-link"><span class="hide-menu"> Kelas 2
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{url('/data-murid?kelas=kelas_3')}}"
                                        class="sidebar-link"><span class="hide-menu"> Kelas 3
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{url('/data-murid?kelas=kelas_4')}}"
                                        class="sidebar-link"><span class="hide-menu"> Kelas 4
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Pelajaran</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                    class="hide-menu">Data Fan </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="{{url('/data-fan')}}" class="sidebar-link"><span
                                            class="hide-menu"> Semua
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{url('/data-fan?kelas=shifir_a')}}" class="sidebar-link"><span
                                            class="hide-menu"> Kelas Shifir A
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{url('/data-fan?kelas=shifir_b')}}"
                                        class="sidebar-link"><span class="hide-menu"> Kelas Shifir B
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{url('/data-fan?kelas=kelas_1')}}"
                                        class="sidebar-link"><span class="hide-menu"> Kelas 1
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{url('/data-fan?kelas=kelas_2')}}"
                                        class="sidebar-link"><span class="hide-menu"> Kelas 2
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{url('/data-fan?kelas=kelas_3')}}"
                                        class="sidebar-link"><span class="hide-menu"> Kelas 3
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{url('/data-fan?kelas=kelas_4')}}"
                                        class="sidebar-link"><span class="hide-menu"> Kelas 4
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Tenaga Pengajar</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                    class="hide-menu">Data Pengajar </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="/data-pengajar"
                                        class="sidebar-link"><span class="hide-menu"> Semua
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="/data-struktural" class="sidebar-link"><span
                                            class="hide-menu"> Struktur Kepengurusan
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="list-divider"></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/blog"
                                aria-expanded="false"><i data-feather="book-open" class="feather-icon"></i><span
                                    class="hide-menu">Blog</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="index.html"
                                aria-expanded="false"><i data-feather="settings" class="feather-icon"></i><span
                                    class="hide-menu">Pengaturan</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        @yield('content')
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src={{ asset('assets/libs/jquery/dist/jquery.min.js') }}></script>
    <script src={{ asset('assets/libs/popper.js/dist/umd/popper.min.js') }}></script>
    <script src={{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}></script>
    <!-- apps -->
    <!-- apps -->
    <script src={{ asset('assets/dist/js/app-style-switcher.js') }}></script>
    <script src={{ asset('assets/dist/js/feather.min.js') }}></script>
    <script src={{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}></script>
    <script src={{ asset('assets/dist/js/sidebarmenu.js') }}></script>
    <!--Custom JavaScript -->
    <script src={{ asset('assets/dist/js/custom.min.js') }}></script>
    <!--This page JavaScript -->
    <script src={{ asset('assets/extra-libs/c3/d3.min.js') }}></script>
    <script src={{ asset('assets/extra-libs/c3/c3.min.js') }}></script>
    <script src={{ asset('assets/libs/chartist/dist/chartist.min.js') }}></script>
    <script src={{ asset('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}></script>
    <script src={{ asset('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') }}></script>
    <script src={{ asset('assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') }}></script>
    <script src={{ asset('assets/dist/js/pages/dashboards/dashboard1.min.js') }}></script>
</body>

</html>
