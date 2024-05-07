
@extends('layouts.student.app')

@section('student_content')

<x-admin.page-title dashboard_title="Student" title="Message" page_name="Message">
    <a href="{{ route('message.index') }}" class="btn btn-success" >Back</a>
</x-admin.page-title>


<div class="container-fluid">

    <div class="page-content-wrapper">


        <div class="row">
            <div class="col-12">
     <!-- Left sidebar -->
     <div class="email-leftbar card">
        <a href="{{ route('message.create') }}" class="btn btn-danger btn-block waves-effect waves-light">
            Compose
        </a>
        <div class="mail-list mt-4">
            <a href="{{ route('message.index') }}" class="{{ Request::is('message.index*') ? '':'active'; }}"><i class="mdi mdi-email-outline me-2"></i> Inbox <span class="ms-1 float-end">({{ $m_count->count() }})</span></a>
            <a href="{{ route('send.index') }}" class="{{ Request::is('send.index') ? 'active':'' }}" ><i class="mdi mdi-email-check-outline me-2 "></i>Sent <span class="ms-1 float-end">({{ $m_student_count->count() }})</span></a>
        </div>
    </div>
    <!-- End Left sidebar -->

                <!-- Right Sidebar -->
                <div class="email-rightbar mb-3">

                    <div class="card">
                        <div class="btn-toolbar p-3" role="toolbar">


                        </div>

                        <div class="card-body">
                            <div class="media mb-4">
                                <img class="d-flex me-3 rounded-circle avatar-sm" src="{{ asset('images/defult/user.png') }}" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h5 class="font-size-14">Administator</h5>
                                    <span class="text-muted">{{ $message->created_at->format("M-h-D") }}</span>
                                </div>
                            </div>

                            <h4 class="mt-0 font-size-16"><strong>Subject:</strong> {{ $message->subject }}</h4>

                            {{-- <p>Dear Lorem Ipsum,</p> --}}
                            <p>{{ $message->message }} </p>

                            {{-- <p>Sincerly,</p> --}}
                            @if($message->file != "")
                            <div class="row pt-2">
                                <div class="col-xl-6 col-6">
                                    <div class="cards"><hr />
                                        <p class="email-attachment-title mb-2">Attachments</p>
                                        <div class="cursor-pointer">
                                            <i class="ti ti-file"></i>
                                            <a
                                                href="{{ uploaded_file($message->file) }}"
                                                download
                                                class="align-middle ms-1"
                                            >
                                                {{ $message->file }}
                                            </a>
                                        </div>
                                        {{-- <img class="card-img-top img-fluid" src="{{ uploaded_file($notice->image) }}" alt="Card image cap"> --}}
                                        </span>
                                        <div class="py-2 text-center"></div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        @endif

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

                            {{-- <a href="{{ route('message.create') }}" class="btn btn-secondary waves-effect mt-4"><i class="mdi mdi-reply"></i> Reply</a> --}}
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
