<!doctype html>
<html lang="en">

<head>


    <meta charset="utf-8" />
    <title>OSMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/admin') }}/assets/images/favicon.ico">

    <!-- plugin css -->
    <link href="{{ asset('/admin') }}/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('/admin') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('/admin') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('/admin') }}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />



</head>

<body data-topbar="light" data-layout="horizontal">

     <!-- Begin page -->
     <div id="layout-wrapper">


    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="{{ route('dashboard') }}" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ uploaded_file($logoIcon->dark_logo) }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ uploaded_file($logoIcon->logo) }}" alt="" height="20">
                        </span>
                    </a>

                    <a href="{{ route('dashboard') }}" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ uploaded_file($logoIcon->dark_logo) }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ uploaded_file($logoIcon->logo) }}" alt="" height="20">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-24 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <i class="mdi mdi-menu"></i>
                </button>

                <div class="topbar-social-icon me-3 d-none d-md-block">
                    <ul class="list-inline title-tooltip m-0">
                        {{-- <li class="list-inline-item">
                            <a href="email-inbox.html" data-toggle="tooltip" data-placement="top" title="Email">
                             <i class="mdi mdi-email-outline"></i>
                            </a>
                        </li> --}}


                    </ul>
                </div>




            </div>



            <div class="d-flex">




                {{-- <div class="dropdown d-none d-md-block ms-2">
                    <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="me-2" src="{{ asset('/admin') }}/assets/images/flags/us.jpg" alt="Header Language" height="16"> English <span class="mdi mdi-chevron-down"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="{{ asset('/admin') }}/assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> German </span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="{{ asset('/admin') }}/assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Italian </span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="{{ asset('/admin') }}/assets/images/flags/french.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> French </span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="{{ asset('/admin') }}/assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Spanish </span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="{{ asset('/admin') }}/assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Russian </span>
                        </a>
                    </div>
                </div>
 --}}



                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{-- <img class="rounded-circle header-profile-user" src="{{ asset('/admin') }}/assets/images/users/avatar-7.jpg"
                            alt="Header Avatar"> --}}
                            <i class="mdi-account-circle"></i>
                        <span class="d-none d-xl-inline-block ms-1">Auth</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a class="dropdown-item" href="{{ route('login') }}"> Login</a>

                        <a class="dropdown-item text-danger" href="{{ route('register') }}">Register</a>
                    </div>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                        <i class="mdi mdi-cog-outline font-size-20"></i>
                    </button>
                </div>

            </div>
        </div>
    </header>

<div class="container"><br>
    <br>
    <br>
    <br>
    <br>


</div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->



    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title d-flex align-items-center px-3 py-4">

                <h5 class="m-0 me-2">Settings</h5>

                <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
            </div>

            <!-- Settings -->
            <hr class="mt-0" />
            <h6 class="text-center mb-0">Choose Layouts</h6>

            <div class="p-4">
                <div class="mb-2">
                    <img src="{{ asset('/admin') }}/assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="layout-1">
                </div>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                    <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('/admin') }}/assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="layout-2">
                </div>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" data-bsStyle="{{ asset('/admin') }}/assets/css/bootstrap-dark.min.css" data-appStyle="{{ asset('/admin') }}/assets/css/app-dark.min.css">
                    <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('/admin') }}/assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="layout-3">
                </div>
                <div class="form-check form-switch mb-5">
                    <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch" data-appStyle="{{ asset('/admin') }}/assets/css/app-rtl.min.css">
                    <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                </div>


            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('/admin') }}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('/admin') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/admin') }}/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ asset('/admin') }}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('/admin') }}/assets/libs/node-waves/waves.min.js"></script>

    <!-- apexcharts -->
    <script src="{{ asset('/admin') }}/assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Plugins js-->
    <script src="{{ asset('/admin') }}/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{ asset('/admin') }}/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>

    <script src="{{ asset('/admin') }}/assets/js/pages/dashboard.init.js"></script>


    <script src="{{ asset('/admin') }}/assets/js/app.js"></script>

</body>

</html>
