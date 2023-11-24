        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">


                <div class="user-sidebar text-center">
                    <div class="dropdown">
                        <div class="user-img">
                            @if(auth()->user()->image !="")
                            <img src="{{ uploaded_file(auth()->user()->image) }}" alt="" class="rounded-circle">
                           @else
                           <img src="{{ asset('images/defult/user.png') }}" alt="" class="rounded-circle">
                           @endif
                            <span class="avatar-online bg-success"></span>
                        </div>
                        <div class="user-info">
                            <h5 class="mt-3 font-size-16 text-white">{{ auth()->user()->name }}</h5>
                            <span class="font-size-13 text-white-50">{{ auth()->user()->email }}</span>
                        </div>
                    </div>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>

                        <li>
                            <a href="{{ route('teacher.dashboard') }}" class="waves-effect">
                                <i class="dripicons-home"></i><span class="badge rounded-pill bg-info float-end">3</span>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="dripicons-user"></i>
                                <span>Users</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('teacher.student.index') }}">Student</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="dripicons-user"></i>
                                <span>School</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="#">Live class</a></li>
                                <li><a href="#">Quiz</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="dripicons-mail"></i>
                                <span>Message</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('teacher.message.index') }}">Admininistator</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('teacher.content.index') }}" class="waves-effect">
                                <i class="dripicons-user"></i>
                                <span>Content</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('teacher.notice.index') }}" class="waves-effect">
                                <i class="dripicons-to-do"></i>
                                <span>Notice</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->
