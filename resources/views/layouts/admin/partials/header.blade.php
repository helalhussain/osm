<div id="layout-wrapper">

    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">

                   <!-- LOGO -->
             <div class="navbar-brand-box">
                <a href="#" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ uploaded_file($logoIcon->dark_logo) }}" alt="" style="height: 20px; width:auto">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ uploaded_file($logoIcon->logo) }}" alt="" style="height: 45px; width:auto">
                    </span>
                </a>

                <a href="#" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ uploaded_file($logoIcon->dark_logo) }}" alt="" style="height: 20px; width:auto">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ uploaded_file($logoIcon->logo) }}" alt="" style="height: 45px; width:auto">
                    </span>
                </a>
            </div>

                <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                    <i class="mdi mdi-menu"></i>
                </button>


                <div class="topbar-social-icon me-3 d-none d-md-block">
                    <ul class="list-inline title-tooltip m-0">
                        {{-- <li class="list-inline-item">
                            <a href="email-inbox.html" data-bs-toggle="tooltip" data-placement="top" title="Email">
                             <i class="mdi mdi-email-outline"></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="chat.html" data-bs-toggle="tooltip" data-placement="top" title="Chat">
                             <i class="mdi mdi-tooltip-outline"></i>
                            </a>
                        </li> --}}

                    </ul>
                </div>

            </div>



            <div class="d-flex">

                {{-- <div class="dropdown d-none d-md-block ms-2">
                    <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="me-2" src="assets/images/flags/us.jpg" alt="Header Language" height="16"> English <span class="mdi mdi-chevron-down"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> German </span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Italian </span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="assets/images/flags/french.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> French </span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Spanish </span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Russian </span>
                        </a>
                    </div>
                </div>
 --}}





                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <i class="mdi mdi-fullscreen"></i>
                    </button>
                </div>


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
                        <a class="dropdown-item" href="{{ route('admin.profile.show') }}"><i class="mdi mdi-account-circle-outline font-size-16 align-middle me-1"></i> Profile</a>
                        <a class="dropdown-item d-block" href="{{ route('admin.setting.setting') }}"><i class="mdi mdi-cog-outline font-size-16 align-middle me-1"></i> Settings</a>

                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                        <button type="submit" class="dropdown-item text-danger" href="#"><i class="mdi mdi-power font-size-16 align-middle me-1 text-danger"></i> Logout</button>
                        </form>
                    </div>
                </div>

                <div class="dropdown d-inline-block">

                    {{-- <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                        <i class="mdi mdi-cog-outline font-size-20"></i>
                    </button> --}}
                </div>

            </div>
        </div>
    </header>
