 <div class="topnav">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}">
                                    <i class="dripicons-home me-2"></i> Dashboard
                                </a>
                            </li>


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button"
                                >
                                    <i class="dripicons-archive me-2"></i> Apps <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-apps">

                                    <a href="#" class="dropdown-item">Chat</a>
                                    <a href="{{ route('message.index') }}" class="dropdown-item">Message</a>


                                    <div class="dropdown">

                                        <div class="dropdown-menu" aria-labelledby="topnav-email">
                                            <a href="#" class="dropdown-item">Inbox</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('notice.index') }}">

                                    <i class="dripicons-bell me-2"></i> Notice
                                </a>
                            </li> --}}




                        </ul>
                    </div>
                </nav>
            </div>
        </div>
