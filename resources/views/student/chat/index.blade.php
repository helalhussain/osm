
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
                    {{-- <div class="search-box chat-search-box pb-2">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <i class="mdi mdi-magnify search-icon"></i>
                        </div>
                    </div> --}}

                    <div class="chat-leftsidebar-nav">
                        <ul class="nav nav-pills nav-justified">
                            {{-- <li class="nav-item">
                                <a href="#chat" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                                    <span>Chat</span>
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="#group" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                    <span>Chats</span>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="#contact" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <span>Students</span>
                                </a>
                            </li> --}}
                        </ul>


                        <div class="tab-content py-">
                            <div class="tab-pane show active" id="chat">
                                {{-- <div>
                                    <h5 class="font-size-16 mb-3">Online</h5>
                                    <ul class="list-unstyled chat-list">
                                        <li class="active">
                                            <a href="#">
                                                <div class="media">
                                                    <div class="align-self-center me-3">
                                                        <i class="mdi mdi-circle text-success font-size-10"></i>
                                                    </div>
                                                    <div class="align-self-center me-3">
                                                        <img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs" alt="">
                                                    </div>

                                                    <div class="media-body overflow-hidden">
                                                        <h5 class="text-truncate font-size-14 mb-1">Steven Franklin</h5>
                                                        <p class="text-truncate mb-0">Hey! there I'm available</p>
                                                    </div>
                                                    <div class="font-size-11">05 min</div>
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
                                </div> --}}
                            </div>
                        </div>


                        <div class="tab-content pb-">

                            <div class="tab-pane show active" id="group">
                               <div>
                                    {{-- <h5 class="font-size-16 mb-3">Chats</h5> --}}
                                    <ul class="list-unstyled chat-list">
                                        @foreach ($chat_list as $list)
                                        <li class="active">
                                            <a href="{{ route('chat.show',$list->teacher_id) }}">
                                                <div class="media">
                                                    <div class="align-self-center me-3">
                                                        {{-- <i class="mdi mdi-circle text-success font-size-10"></i> --}}
                                                    </div>
                                                    <div class="align-self-center me-3">
                                                        {{-- @if ($list->user->image==null)
                                                        <img src="{{ asset('images/defult/user.png') }}" class="rounded-circle avatar-xs" alt="">

                                                        @else --}}
                                                        <img src="{{ uploaded_file($list->teacher->image) }}" class="rounded-circle avatar-xs" alt="">
                                                        {{-- @endif --}}

                                                    </div>

                                                    <div class="media-body overflow-hidden">
                                                        <h5 class="text-truncate font-size-14 mb-1">{{ $list->teacher->name }}</h5>
                                                        {{-- <p class="text-truncate mb-0">ID: {{ $list->teacher->student_id }}</p> --}}
                                                    </div>
                                                    {{-- <div class="font-size-11">05 min</div> --}}
                                                </div>
                                            </a>
                                        </li>

                                        @endforeach



                                    </ul>
                                </div>
                            </div>

                         {{-- <div class="tab-pane" id="contact">

                           <div>
                                    <h5 class="font-size-16 mb-3">All students</h5>
                                    <ul class="list-unstyled chat-list">
                                    @foreach ($students as $student)
                                    <li class="active">
                                        <a href="{{ route('teacher.chat.show',$student->id) }}">
                                            <div class="media">
                                                <div class="align-self-center me-3">

                                                </div>
                                                <div class="align-self-center me-3">
                                                    @if ($student->image==null)
                                                    <img src="{{ asset('images/defult/user.png') }}" class="rounded-circle avatar-xs" alt="">

                                                    @else
                                                    <img src="{{ uploaded_file($student->image) }}" class="rounded-circle avatar-xs" alt="">
                                                    @endif

                                                </div>

                                                <div class="media-body overflow-hidden">
                                                    <h5 class="text-truncate font-size-14 mb-1">{{ $student->name }}</h5>
                                                    <p class="text-truncate mb-0">ID: {{ $student->student_id }}</p>
                                                </div>

                                            </div>
                                        </a>
                                    </li>

                                    @endforeach
                                    </ul>
                                </div>

                            </div> --}}

                        </div>
                    </div>

                  </div>

                </div>
            </div>

            <div class="w-100 user-chat">
                <div class="card">
                    <div class="p-4 border-bottom ">
                        <div class="row">
                            <div class="col-md-4 col-9">
                                {{-- <h5 class="font-size-15 mb-1 text-truncate">Steven Franklin</h5> --}}
                                {{-- <p class="text-muted mb-0 text-truncate"><i class="mdi mdi-circle text-success align-middle me-1"></i> Active now</p> --}}
                            </div>
                            <div class="col-md-8 col-3">

                            </div>
                        </div>
                    </div>


                    <div>
                        <div class="chat-conversation p-3">
                            <ul class="list-unstyled" data-simplebar style="max-height: 600px;">

                            <!------------------>
                            </ul>
                        </div>
                        <div class="p-3 chat-input-section">
                       <!---->
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end row -->


    </div>


</div> <!-- container-fluid -->

@endsection
