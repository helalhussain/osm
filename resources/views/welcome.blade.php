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
                     @if (auth()->user()==null)

                     @else
                     <li class="list-inline-item">
                        <a href="{{ route('dashboard') }}" data-toggle="tooltip" data-placement="top" title="Email">
                        <strong> Dashboard</strong>
                        </a>
                    </li>
                     @endif


                    </ul>
                </div>




            </div>



            <div class="d-flex">





@if (auth()->user()==null)
<div class="dropdown d-inline-block">
    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{-- <img class="rounded-circle header-profile-user" src="{{ asset('/admin') }}/assets/images/users/avatar-7.jpg"
            alt="Header Avatar"> --}}
            {{-- <i class="mdi-account-circle"></i> --}}
        <span class="d-none d-xl-inline-block ms-1">Auth</span>
        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-end">
        <!-- item-->
        <a class="dropdown-item" href="{{ route('login') }}"> Login</a>

        <a class="dropdown-item text-danger" href="{{ route('register') }}">Register</a>
    </div>
</div>
@else
<div class="dropdown d-inline-block">

    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    @if(auth()->user()->image !="")
    <img class="rounded-circle header-profile-user" src="{{ uploaded_file(auth()->user()->image) }}"
    alt="Header Avatar">
    @else
    <img class="rounded-circle header-profile-user" src="{{ asset('images/defult/user.png') }}"
    alt="Header Avatar">
    @endif
    <span class="d-none d-xl-inline-block ms-1">{{ auth()->user()->name }}</span>
    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
</button>
    <div class="dropdown-menu dropdown-menu-end">
        <!-- item-->
        <a class="dropdown-item" href="{{ route('profile.show') }}"><i class="mdi mdi-account-circle-outline font-size-16 align-middle me-1"></i> Profile</a>
        {{-- <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-end">11</span><i class="mdi mdi-cog-outline font-size-16 align-middle me-1"></i> Settings</a> --}}

        <div class="dropdown-divider"></div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
        <button type="submit" class="dropdown-item text-danger" href="#"><i class="mdi mdi-power font-size-16 align-middle me-1 text-danger"></i> Logout</button>
        </form>
    </div>
</div>

@endif



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
        <!---Row star--->
        <div class="row">



             <div class="col-lg-12">
                         <div class="row">

          @foreach ($courses as $course)
         <!-----Col Start----------->

                         <div class="col-xl-4 col-sm-6">
                             <form action="#" >
                                 @csrf
                             <div class="card">
                                <div class="card-body">
                                 {{-- <input type="hidden" value="{{ $course->subjects->sum('fee') }}" name="fee"> --}}
                                 <input type="hidden" value="{{ $course->fee }}" name="fee">
                                 <input type="hidden" value="{{ $course->id }}" name="course_id">
                                 <input type="hidden" value="{{ $course->title }}" name="course">
                                 <input type="hidden" value="{{ $course->section->id }}" name="section_id">
                                 <input type="hidden" value="{{ $course->classroom->id }}" name="classroom_id">
                                 <input type="hidden" value="{{ $course->classroom->title }}" name="classroom">
                                 <div class="product-img">
                                     {{-- <div class="product-ribbon  bg-primary">
                                         25% Off
                                     </div> --}}

                                     {{-- <img src="assets/images/product/img-7.png" alt="" class="img-fluid mx-auto d-block"> --}}
                                 </div>

                                 <div class="text-cente">

                                     <a href="" class="text-dark">
                                         <h5 class="font-size-18">{{ $course->title }}</h5>
                                     </a>
                                     <div class="mt-2">
                                         <strong>Class :</strong>   {{ $course->classroom->title }}</p>
                                     </div>
                                     <div class="mt-2">
                                         <strong>Section :</strong>   {{ $course->section->title }}</p>
                                     </div>
                                     <div class="mt-2">
                                      <strong>Subject :</strong>   {{ $course->subjects->pluck('name')->implode(', ') }}</p>
                                     </div>

                                     <h4 class="mt-2">${{ $course->fee }}<span class="font-size-14 text-muted me-2">
                                         {{-- <del>$240</del> --}}
                                     </span></h4>

                                     <div class="mt-2">
                                         <a href="{{ route('course_details',$course->id) }}" class="btn btn-success">Purches now</a>
                                     </div>

                                 </div>
                                </div>
                             </div>
                         </form>
                         </div>

                      <!-------Col ENd-------->
          @endforeach

             </div>

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
