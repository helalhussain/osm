
@extends('layouts.administator.app')

@section('administator_content')

<x-admin.page-title dashboard_title="Administator" title="Message" page_name="Message">
    <a href="{{ route('administator.student-message.index') }}" class="btn btn-success" >Back</a>
</x-admin.page-title>


<div class="container-fluid">

    <div class="page-content-wrapper">




        <div class="row">
            <div class="col-12">
     <!-- Left sidebar -->
     <div class="email-leftbar card">
        <a href="{{ route('administator.student-message.create') }}" class="btn btn-danger btn-block waves-effect waves-light">
            Compose
        </a>
        <div class="mail-list mt-4">
            <a href="{{ route('administator.student-message.index') }}" class="{{ Request::is('administator.student-message.index*') ? '':'active'; }}"><i class="mdi mdi-email-outline me-2"></i> Inbox <span class="ms-1 float-end">(10)</span></a>
            <a href="{{ route('administator.student-message.send') }}" class="{{ Request::is('administator.student-message.send') ? 'active':'' }}" ><i class="mdi mdi-email-check-outline me-2 "></i>Sent <span class="ms-1 float-end">(10)</span></a>
        </div>
    </div>
    <!-- End Left sidebar -->

                <!-- Right Sidebar -->
                <div class="email-rightbar mb-3">

                    <div class="card">
                        <div class="btn-toolbar p-3" role="toolbar">
                            <div class="btn-group me-2 mb-2 mb-sm-0">
                                <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    More <i class="mdi mdi-dots-vertical ms-2"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Mark as Unread</a>
                                    <a class="dropdown-item" href="#">Mark as Important</a>

                                </div>
                            </div>

                        </div>

                        <div class="card-body">
                            <div class="media mb-4">
                                <img class="d-flex me-3 rounded-circle avatar-sm" src="{{ asset('images/defult/user.png') }}" alt="Generic placeholder image">
                                <div class="media-body">
                                    {{-- <h5 class="font-size-14 mt-1">{{ $message->user->name }}</h5> --}}
                                    {{-- <small class="text-muted">{{ $message->user->email }}</small> --}}
                                </div>
                            </div>

                            <h4 class="mt-0 font-size-16"><strong>Subject:</strong> {{ $message->subject }}</h4>

                            {{-- <p>Dear Lorem Ipsum,</p> --}}
                            <p>{{ $message->message }} </p>

                            {{-- <p>Sincerly,</p> --}}
                            <img src="{{ uploaded_file($message->image) }}" alt="">
                            <hr/>

                            {{-- <div class="row">
                                <div class="col-xl-2 col-6">
                                    <div class="card">
                                        <img class="card-img-top img-fluid" src="assets/images/small/img-3.jpg" alt="Card image cap">
                                        <div class="py-2 text-center">
                                            <a href="" class="font-weight-medium">Download</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-6">
                                    <div class="card">
                                        <img class="card-img-top img-fluid" src="assets/images/small/img-4.jpg" alt="Card image cap">
                                        <div class="py-2 text-center">
                                            <a href="" class="font-weight-medium">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <a href="{{ route('administator.student-message.create') }}" class="btn btn-secondary waves-effect mt-4"><i class="mdi mdi-reply"></i> Reply</a>
                        </div>

                    </div>
                </div>
                <!-- card -->

            </div>
            <!-- end Col-9 -->

        </div>
         <!-- End row -->

    </div>


</div> <!-- container-fluid -->
@endsection
