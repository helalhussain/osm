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
                </div> --}}




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

                {{-- <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                        <i class="mdi mdi-cog-outline font-size-20"></i>
                    </button>
                </div> --}}

            </div>
        </div>
    </header>

<div class="container"><br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="page-content-wrapper">

        <div class="row">
            <div class="col-xl-7 mx-auto">
                <div class="card">
                    <div class="card-body">



                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-justified" role="tablist">
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Premium</span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="tab" href="#profile-1" role="tab">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Stipen</span>
                                </a>
                            </li>

                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="home-1" role="tabpanel">
<!--Start -course--details---------->
                                <div class="col-xl-7">
                                <div class="mt-4 mt-xl-3">
                                    <h4 class="mt-1 mb-3">{{ $course_detail->title }}</h4>
                                    <h4 class="mt-2">
                                       Price: ${{ $course_detail->fee }}
                                        <span class="text-danger font-size-12 ms-2"></span></h4>
                                    <hr class="my-">
                                    <div class="mt">
                                        <div class="mt-2">
                                            <strong>Class :</strong>   {{ $course_detail->classroom->title }}</p>
                                        </div>
                                        <div class="mt-2">
                                            <strong>Section :</strong>   {{ $course_detail->section->title }}</p>
                                        </div>
                                        <div class="mt-2">
                                         <strong>Subject :</strong>   {{ $course_detail->subjects->pluck('name')->implode(', ') }}</p>
                                        </div><br/>

                                    </div>

                                    <div class="mt-">
                                        <a href="#" class="btn btn-primary waves-effect waves-light mt-2">
                                            <i class="mdi mdi-cart me-2"></i> Purchase now
                                        </a>

                                    </div>
                                </div>
                            </div>
<!--------End course-details------------->


                            </div>
                            <div class="tab-pane" id="profile-1" role="tabpanel">
                    <!--Start -course--details---------->
                                <form action="{{ route('home.update',$course_detail->id) }}" method="post">
                                @csrf

                                @method('patch')
                                    <input type="hidden" name="course_id" value="{{ $course_detail->id }}">
                                    <div class="col-xl-7">
                                        <div class="mt-4 mt-xl-3">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Resource</label>
                                                <input type="text"
                                                    class="form-control" name="resource_no" id=""
                                                    placeholder="Resource" required/>
                                                <small id="helpId" class="form-text text-muted"></small>
                                            </div>

                                            <h4 class="mt-1 mb-3">{{ $course_detail->title }}</h4>
                                            <h4 class="mt-2">
                                               Price: $ 0
                                                <span class="text-danger font-size-12 ms-2"></span></h4>
                                            <hr class="my-">
                                            <div class="mt">
                                                <div class="mt-2">
                                                    <strong>Class :</strong>   {{ $course_detail->classroom->title }}</p>
                                                </div>
                                                <div class="mt-2">
                                                    <strong>Section :</strong>   {{ $course_detail->section->title }}</p>
                                                </div>
                                                <div class="mt-2">
                                                 <strong>Subject :</strong>   {{ $course_detail->subjects->pluck('name')->implode(', ') }}</p>
                                                </div><br/>

                                            </div>

                                            <div class="mt-">

                                               @if (auth()->user() == true)
                                               <button type="submit" class="btn btn-primary waves-effect waves-light mt-2">
                                                <i class="mdi mdi-cart me-2"></i> Purchase now
                                            </button>
                                               @else
                                               <a href="{{ route('login') }}" class="btn btn-primary waves-effect waves-light mt-2">
                                                <i class="mdi mdi-cart me-2"></i> Purchase now
                                            </a>
                                               @endif

                                            </div>
                                        </div>
                                    </div>
                                </form>
<!--------End course-details------------->
                            </div>


                        </div>

                    </div>
                </div>
            </div>

        </div>






                <!-- end card -->
            </div>
        </div>
        <!-- end row -->



    </div>


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->



    </div>
    <!-- END layout-wrapper -->


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
