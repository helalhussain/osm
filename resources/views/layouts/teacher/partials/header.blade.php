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
                            <a href="{{ route('teacher.chat.index') }}" data-bs-toggle="tooltip" data-placement="top" title="Chat">
                             <i class="mdi mdi-tooltip-outline"></i>
                            </a>
                        </li> --}}


                    </ul>
                </div>

            </div>

             <!-- Search input -->

            <div class="d-flex">


                {{-- <div class="dropdown d-none d-md-block ms-2">
                    <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="me-2" src="{{ asset('admin') }}/assets/images/flags/us.jpg" alt="Header Language" height="16"> English <span class="mdi mdi-chevron-down"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="{{ asset('admin') }}/assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> German </span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="{{ asset('admin') }}/assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Italian </span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="{{ asset('admin') }}/assets/images/flags/french.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> French </span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="{{ asset('admin') }}/assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Spanish </span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="{{ asset('admin') }}/assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Russian </span>
                        </a>
                    </div>
                </div>
 --}}







                <div class="dropdown d-inline-block">

                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0"> Notifications </h6>
                                </div>
                                <div class="col-auto">
                                    <a href="#!" class="small"> View All</a>
                                </div>
                            </div>
                        </div>
                        <div data-simplebar style="max-height: 230px;">
                            <a href="" class="text-reset notification-item">
                                <div class="media">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title bg-primary rounded-circle font-size-16">
                                            <i class="mdi mdi-cart text-white"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-1">Your order is placed</h6>
                                        <div class="font-size-13 text-muted">
                                            <p class="mb-1">If several languages coalesce the grammar</p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="" class="text-reset notification-item">
                                <div class="media">
                                    <img src="{{ asset('admin') }}/assets/images/users/avatar-3.jpg"
                                        class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-1">{{ auth()->user()->name }}</h6>
                                        <div class="font-size-13 text-muted">
                                            <p class="mb-1">It will seem like simplified English.</p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="" class="text-reset notification-item">
                                <div class="media">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title bg-success rounded-circle font-size-16">
                                            <i class="mdi mdi-check text-white"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-1">Your item is shipped</h6>
                                        <div class="font-size-13 text-muted">
                                            <p class="mb-1">If several languages coalesce the grammar</p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="" class="text-reset notification-item">
                                <div class="media">
                                    <img src="{{ asset('admin') }}/assets/images/users/avatar-4.jpg"
                                        class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-1">Salena Layfield</h6>
                                        <div class="font-size-13 text-muted">
                                            <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="p-2 border-top">
                            <a class="btn btn-sm btn-link font-size-14 w-100 text-center" href="javascript:void(0)">
                                <i class="mdi mdi-arrow-right-circle me-1"></i> View More..
                            </a>
                        </div>
                    </div>
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
                        <a class="dropdown-item" href="{{ route('teacher.profile.show') }}"><i class="mdi mdi-account-circle-outline font-size-16 align-middle me-1"></i> Profile</a>
                        {{-- <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-end">11</span><i class="mdi mdi-cog-outline font-size-16 align-middle me-1"></i> Settings</a> --}}

                        {{-- <div class="dropdown-divider"></div> --}}
                        <form method="POST" action="{{ route('teacher.logout') }}">
                            @csrf
                        <button type="submit" class="dropdown-item text-danger" href="#"><i class="mdi mdi-power font-size-16 align-middle me-1 text-danger"></i> Logout</button>
                        </form>
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
