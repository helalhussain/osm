
@extends('layouts.student.app')

@section('student_content')

<x-admin.page-title dashboard_title="Student" title="Chat" page_name="chat">
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

                            </div>
                        </div>


                        <div class="tab-content pb-">

                            <div class="tab-pane show active" id="group">
                               <div>
                                    {{-- <h5 class="font-size-16 mb-3">Chats</h5> --}}
                                    <ul class="list-unstyled chat-list">
                                        @foreach ($chat_list as $list)
                                        <li class="active">
                                            <a href="{{ route('chat.show',$list->teacher_id) }}"
                                                 class="{{ Request::is('teacher/chat*') ? '':'' }}">
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
                                                        <p class="text-truncate mb-0"> {{ $list->teacher->email }}</p>
                                                    </div>
                                                    {{-- <div class="font-size-11">05 min</div> --}}
                                                </div>
                                            </a>
                                        </li>

                                        @endforeach



                                    </ul>
                                </div>
                            </div>

                            <div class="tab-pane" id="contact">


                          <div>
                                    <h5 class="font-size-16 mb-3">All students</h5>
                                    <ul class="list-unstyled chat-list">
                                    {{-- @foreach ($students as $student)
                                    <li class="active">
                                        <a href="{{ route('teacher.chat.show',$student->id) }}" class="{{  }}">
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
                                                <div class="font-size-11"></div>
                                            </div>
                                        </a>
                                    </li>

                                    @endforeach --}}


                                    </ul>
                                </div>

                            </div>
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
                                <h5 class="font-size-15 mb-1 text-truncate">{{ $chat->name }}</h5>
                                <p class="text-muted mb-0 text-truncate">{{ $chat->email }}</p>
                            </div>
                            <div class="col-md-8 col-3">
                                <ul class="list-inline user-chat-nav text-end mb-0">
                                    {{-- <li class="list-inline-item d-none d-sm-inline-block">
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
                                    </li> --}}
                                    {{-- <li class="list-inline-item  d-none d-sm-inline-block">
                                        <div class="dropdown">
                                            <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-cog-outline font-size-18"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">View Profile</a>
                                                <a class="dropdown-item" href="#">Clear chat</a>
                                                <a class="dropdown-item" href="#">Muted</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </li> --}}

                                    {{-- <li class="list-inline-item">
                                        <div class="dropdown">
                                            <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else</a>
                                            </div>
                                        </div>
                                    </li> --}}

                                </ul>
                            </div>
                        </div>
                    </div>


                    <div>
                        <div class="chat-conversation p-3">
                            <ul class="list-unstyled" data-simplebar style="max-height: 600px;">
                                <li>
                                    <div class="chat-day-title">
                                        <span class="title">chat</span>
                                    </div>
                                </li>


                                {{-- <li>
                                    <div class="conversation-list">

                                        <div class="media">

                                            <img src="{{ asset('admin') }}/assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs" alt="">
                                            <div class="media-body arrow-left ms-3">

                                                <div class="dropdown">

                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                      </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Copy</a>
                                                        <a class="dropdown-item" href="#">Save</a>
                                                        <a class="dropdown-item" href="#">Forward</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>

                                                <div class="ctext-wrap">
                                                    <div class="conversation-name">Steven Franklin</div>
                                                    <p>
                                                        Hello!
                                                    </p>
                                                    <p class="chat-time mb-0"><i class="bx bx-time-five align-middle me-1"></i> 10:00</p>
                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                </li>

                                <li class="right">
                                    <div class="conversation-list">

                                        <div class="media">


                                            <div class="media-body arrow-right me-3">

                                                <div class="dropdown">

                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                      </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Copy</a>
                                                        <a class="dropdown-item" href="#">Save</a>
                                                        <a class="dropdown-item" href="#">Forward</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                                <div class="ctext-wrap">
                                                    <div class="conversation-name">Henry Wells</div>
                                                    <p>
                                                        Hi, How are you? What about our next meeting?
                                                    </p>

                                                    <p class="chat-time mb-0"><i class="bx bx-time-five align-middle me-1"></i> 10:02</p>
                                                </div>


                                            </div>

                                            <img src="{{ asset('admin') }}/assets/images/users/avatar-3.jpg" class="rounded-circle avatar-xs" alt="">





                                    </div>
                                    </div>
                                </li>



                                <li>
                                    <div class="conversation-list">

                                        <div class="media">

                                            <img src="{{ asset('admin') }}/assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs" alt="">
                                            <div class="media-body arrow-left ms-3">

                                                <div class="dropdown">

                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                      </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Copy</a>
                                                        <a class="dropdown-item" href="#">Save</a>
                                                        <a class="dropdown-item" href="#">Forward</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                                <div class="ctext-wrap">
                                                    <div class="conversation-name">Steven Franklin</div>
                                                    <p>
                                                        Yeah everything is fine
                                                    </p>

                                                    <p class="chat-time mb-0"><i class="bx bx-time-five align-middle me-1"></i> 10:06</p>
                                                </div>


                                                </div>





                                    </div>
                                    </div>
                                </li> --}}

                                @foreach ($messages as $message)
                                {{-- <li class="last-chat" id="user-table">
                                    <div class="conversation-list">


                                        <div class="media">

                                            <img src="{{ asset('admin') }}/assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs" alt="">
                                            <div class="media-body arrow-left ms-3">

                                                <div class="dropdown">

                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                      </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Copy</a>
                                                        <a class="dropdown-item" href="#">Save</a>
                                                        <a class="dropdown-item" href="#">Forward</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                                <div class="ctext-wrap">
                                                    <div class="conversation-name">Steven Franklin</div>
                                                    <p>& Next meeting tomorrow 10.00AM</p>
                                                    <p class="chat-time mb-0"><i class="bx bx-time-five align-middle me-1"></i> 10:06</p>
                                                </div>

                                                </div>


                                    </div>
                                    </div>
                                </li> --}}


                            <li class="right">
                                <div class="conversation-list">

                                    <div class="media">


                                        <div class="media-body arrow-right me-3">

                                            <div class="dropdown">

                                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                  </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Copy</a>
                                                    <a class="dropdown-item" href="#">Save</a>
                                                    <a class="dropdown-item" href="#">Forward</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                            <div class="ctext-wrap">
                                                <div class="row">
                                                    <div class="col-lg-10">
                                                        @if ($message->chat_type=='student')
                                                        <div class="conversation-name">{{ auth()->user()->name  }}</div>
                                                        @else
                                                        <div class="conversation-name">{{ $message->teacher->name  }}</div>
                                                        @endif

                                                    </div>
                                                    <div class="col-lg-2">
                                                        @if ($message->chat_type=='student')
                                                        <form action="{{ route('chat.destroy',$message->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" style="border:none;"> <i class="fa fa-trash"></i></button>
                                                        </form>
                                                        @else

                                                        @endif
                                                    </div>
                                                </div>
                                                <p>
                                                    {{ $message->message }}
                                                </p>

                                                <p class="chat-time mb-0"><i class="bx bx-time-five align-middle me-1"></i>
                                                     {{-- {{ $message->created_at->format("M-d") }} --}}
                                                    </p>
                                            </div>

                                            </div>


                                            @if ($message->chat_type=='teacher')
                                           <img src="{{ uploaded_file($message->teacher->image) }}" class="rounded-circle avatar-xs" alt="">
                                           @else
                                           <img src="{{ uploaded_file(auth()->user()->image) }}" class="rounded-circle avatar-xs" alt="">
                                           @endif


                                </div>
                                </div>
                            </li>

                            @endforeach


                            </ul>

                        </div>
                        <div class="p-3 chat-input-section">
                            <form id="stor" action="{{ route('chat.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="position-relative">
                                            <input type="hidden" name="teacher_id" id="teacher_id" value="{{ $chat->id }}" class="form-control chat-input" placeholder="Enter Message...">
                                            <input type="text" name="message" id="message" class="form-control chat-input" placeholder="Enter Message..." required>
                                            {{-- <div class="chat-input-links">
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item"><a href="#" data-bs-toggle="tooltip" data-placement="top" title="Emoji"><i class="mdi mdi-emoticon-happy-outline"></i></a></li>
                                                    <li class="list-inline-item"><a href="#" data-bs-toggle="tooltip" data-placement="top" title="Images"><i class="mdi mdi-file-image-outline"></i></a></li>
                                                    <li class="list-inline-item"><a href="#" data-bs-toggle="tooltip" data-placement="top" title="Add Files"><i class="mdi mdi-file-document-outline"></i></a></li>
                                                </ul>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary btn-rounded chat-send w-md waves-effect waves-light"><span class="d-none d-sm-inline-block me-2">Send</span> <i class="mdi mdi-send"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end row -->


    </div>


</div> <!-- container-fluid -->

@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script>
    $(document).ready(function() {
        $('#store').click(function (e) {
            e.preventDefault();
            const url = $('#store').attr('action');
            var data = jQuery('#store').serialize();

            $.ajax({
                url:url,
                data:jQuery('#store').serialize(),
                type:'post',
                success:function(result){
                    // alert('Student inserted');
                }
            });


        });

    });
</script>

{{-- <script>
$(document).ready(function(){
    $.ajax({
        type:"GET",

        url:"{{ route('teacher.chat.show',$chat->id) }}",
        success:function(data){
            console.log(data);
            if(data.users.length >0){
                for(let i=0;i<data.users.length;i++){
                    $("#user-table").append(`
                    <tr>
                    <th>`+ (i+1) +`</th>
                    <th>`+(data.users[i]['name'])+`</th>
                    <th>`+(data.users[i]['email'])+`</th>
                    </tr>
                    `);
                }
            }else{
                $("#userTable").append("<span>Data not Found </span>");
            }

        }.error:function(err){
            console.log(err.responseText);
        }
    });
})
</script> --}}
