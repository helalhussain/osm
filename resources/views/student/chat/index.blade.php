
@extends('layouts.student.app')

@section('student_content')

<x-admin.page-title dashboard_title="Student" title="Chat" page_name="All chat">
    {{-- <a href="{{ route('chat.create') }}" class="btn btn-success" id="addBtn">Add chat</a> --}}
</x-admin.page-title>
<div class="container-fluid">

    <div class="page-content-wrapper">

        <div class="d-lg-flex">
            <div class="chat-leftsidebar me-lg-4">
                <div class="card">


                  <div class="p-4">
                    <div class="search-box chat-search-box pb-4">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <i class="mdi mdi-magnify search-icon"></i>
                        </div>
                    </div>

                    <div class="chat-leftsidebar-nav">
                        {{-- <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <a href="#chat" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                                    <span>Chat</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#group" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <span>Group</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#contact" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <span>Contacts</span>
                                </a>
                            </li>
                        </ul> --}}


                        <div class="tab-content py-4">
                            <div class="tab-pane show active" id="chat">
                                <div>
                                    {{-- <h5 class="font-size-16 mb-3">Online</h5> --}}
                                    <ul class="list-unstyled chat-list">
                                        @foreach ($chats as $chat)
                                        <li class="active">
                                            <a href="{{ route('chat.show',$chat->id) }}">
                                                <div class="media">
                                                    <div class="align-self-center me-3">
                                                        <i class="mdi mdi-circle text-success font-size-10"></i>
                                                    </div>
                                                    <div class="align-self-center me-3">
                                                        {{-- <img src="{{ asset('admin') }}/assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs" alt=""> --}}
                                                        <img src="{{ uploaded_file($chat->image) }}" class="rounded-circle avatar-xs" alt="">
                                                    </div>

                                                    <div class="media-body overflow-hidden">
                                                        <h5 class="text-truncate font-size-14 mb-1">{{ $chat->name }}</h5>
                                                        <p class="text-truncate mb-0">{{ $chat->email }}</p>
                                                    </div>
                                                    {{-- <div class="font-size-11">05 min</div> --}}
                                                </div>
                                            </a>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="tab-content pb-4">
                            {{-- <div class="tab-pane show active">
                                <div>
                                    <h5 class="font-size-16 mb-3">Contact</h5>
                                    <ul class="list-unstyled chat-list">


                                        <li>
                                            <a href="#">
                                                <div class="media">
                                                    <div class="align-self-center me-3">
                                                        <i class="mdi mdi-circle text-success font-size-10"></i>
                                                    </div>
                                                    <div class="align-self-center me-3">
                                                        <img src="{{ asset('admin') }}/assets/images/users/avatar-3.jpg" class="rounded-circle avatar-xs" alt="">
                                                    </div>
                                                    <div class="media-body overflow-hidden">
                                                        <h5 class="text-truncate font-size-14 mb-1">Adam Miller</h5>
                                                        <p class="text-truncate mb-0">I've finished it! See you so</p>
                                                    </div>
                                                    <div class="font-size-11">12 min</div>
                                                </div>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <div class="media">
                                                    <div class="align-self-center me-3">
                                                        <i class="mdi mdi-circle text-warning font-size-10"></i>
                                                    </div>
                                                    <div class="align-self-center me-3">
                                                        <img src="{{ asset('admin') }}/assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs" alt="">
                                                    </div>
                                                    <div class="media-body overflow-hidden">
                                                        <h5 class="text-truncate font-size-14 mb-1">Jose Vickery</h5>
                                                        <p class="text-truncate mb-0">Nice to meet you</p>
                                                    </div>
                                                    <div class="font-size-11">1 hr</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="media">
                                                    <div class="align-self-center me-3">
                                                        <i class="mdi mdi-circle font-size-10"></i>
                                                    </div>

                                                    <div class="avatar-xs align-self-center me-3">
                                                        <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                            M
                                                        </span>
                                                    </div>
                                                    <div class="media-body overflow-hidden">
                                                        <h5 class="text-truncate font-size-14 mb-1">Mitchel Givens</h5>
                                                        <p class="text-truncate mb-0">Hey! there I'm available</p>
                                                    </div>
                                                    <div class="font-size-11">3 hrs</div>
                                                </div>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <div class="media">
                                                    <div class="align-self-center me-3">
                                                        <i class="mdi mdi-circle text-success font-size-10"></i>
                                                    </div>
                                                    <div class="align-self-center me-3">
                                                        <img src="{{ asset('admin') }}/assets/images/users/avatar-6.jpg" class="rounded-circle avatar-xs" alt="">
                                                    </div>
                                                    <div class="media-body overflow-hidden">
                                                        <h5 class="text-truncate font-size-14 mb-1">Stephen Hadley</h5>
                                                        <p class="text-truncate mb-0">I've finished it! See you so</p>
                                                    </div>
                                                    <div class="font-size-11">5hrs</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="media">
                                                    <div class="align-self-center me-3">
                                                        <i class="mdi mdi-circle text-success font-size-10"></i>
                                                    </div>
                                                    <div class="avatar-xs align-self-center me-3">
                                                        <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                            K
                                                        </span>
                                                    </div>
                                                    <div class="media-body overflow-hidden">
                                                        <h5 class="text-truncate font-size-14 mb-1">Keith Gonzales</h5>
                                                        <p class="text-truncate mb-0">This theme is awesome!</p>
                                                    </div>
                                                    <div class="font-size-11">24 min</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div> --}}

                            {{-- <div class="tab-pane" id="group">
                                <h5 class="font-size-14 mb-3">Group</h5>
                                <ul class="list-unstyled chat-list" >
                                    <li>
                                        <a href="#">
                                            <div class="media align-items-center">
                                                <div class="avatar-xs me-3">
                                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                        G
                                                    </span>
                                                </div>

                                                <div class="media-body">
                                                    <h5 class="font-size-14 mb-0">General</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <div class="media align-items-center">
                                                <div class="avatar-xs me-3">
                                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                        R
                                                    </span>
                                                </div>

                                                <div class="media-body">
                                                    <h5 class="font-size-14 mb-0">Reporting</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <div class="media align-items-center">
                                                <div class="avatar-xs me-3">
                                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                        M
                                                    </span>
                                                </div>

                                                <div class="media-body">
                                                    <h5 class="font-size-14 mb-0">Meeting</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <div class="media align-items-center">
                                                <div class="avatar-xs me-3">
                                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                        A
                                                    </span>
                                                </div>

                                                <div class="media-body">
                                                    <h5 class="font-size-14 mb-0">Project A</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <div class="media align-items-center">
                                                <div class="avatar-xs me-3">
                                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                        B
                                                    </span>
                                                </div>

                                                <div class="media-body">
                                                    <h5 class="font-size-14 mb-0">Project B</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div> --}}

                            {{-- <div class="tab-pane" id="contact">
                                <h5 class="font-size-14 mb-3">Contact</h5>

                                <div  data-simplebar style="max-height: 410px;">
                                    <div>
                                        <div class="avatar-xs mb-3">
                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                A
                                            </span>
                                        </div>

                                        <ul class="list-unstyled chat-list">
                                            <li>
                                                <a href="#">
                                                    <h5 class="font-size-14 mb-0">Adam Miller</h5>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <h5 class="font-size-14 mb-0">Alfonso Fisher</h5>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="mt-4">
                                        <div class="avatar-xs mb-3">
                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                B
                                            </span>
                                        </div>

                                        <ul class="list-unstyled chat-list">
                                            <li>
                                                <a href="#">
                                                    <h5 class="font-size-14 mb-0">Bonnie Harney</h5>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="mt-4">
                                        <div class="avatar-xs mb-3">
                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                C
                                            </span>
                                        </div>

                                        <ul class="list-unstyled chat-list">
                                            <li>
                                                <a href="#">
                                                    <h5 class="font-size-14 mb-0">Charles Brown</h5>
                                                </a>
                                                <a href="#">
                                                    <h5 class="font-size-14 mb-0">Carmella Jones</h5>
                                                </a>
                                                <a href="#">
                                                    <h5 class="font-size-14 mb-0">Carrie Williams</h5>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="mt-4">
                                        <div class="avatar-xs mb-3">
                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                D
                                            </span>
                                        </div>

                                        <ul class="list-unstyled chat-list">
                                            <li>
                                                <a href="#">
                                                    <h5 class="font-size-14 mb-0">Dolores Minter</h5>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div> --}}
                        </div>
                    </div>

                  </div>

                </div>
            </div>

            {{-- <div class="w-100 user-chat">
                <div class="card">
                    <div class="p-4 border-bottom ">
                        <div class="row">
                            <div class="col-md-4 col-9">
                                <h5 class="font-size-15 mb-1 text-truncate">Steven Franklin</h5>
                                <p class="text-muted mb-0 text-truncate"><i class="mdi mdi-circle text-success align-middle me-1"></i> Active now</p>
                            </div>
                            <div class="col-md-8 col-3">
                                <ul class="list-inline user-chat-nav text-end mb-0">
                                    <li class="list-inline-item d-none d-sm-inline-block">
                                        <div class="dropdown">
                                            <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-magnify font-size-18"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-md">
                                                <form class="p-3">
                                                    <div class="form-group m-0">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">

                                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </li>



                                </ul>
                            </div>
                        </div>
                    </div>



                </div>
            </div> --}}

        </div>
        <!-- end row -->


    </div>


</div> <!-- container-fluid -->

@endsection
