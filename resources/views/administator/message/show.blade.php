
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
                        <a href="{{ route('administator.student-message.index') }}" class=""><i class="mdi mdi-email-outline me-2"></i> Inbox <span class="ms-1 float-end"></span></a>
                        <a href="{{ route('administator.student-message.send') }}"><i class="mdi mdi-email-check-outline me-2"></i>Sent <span class="ms-1 float-end"></span></a>

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
                                    <h5 class="font-size-14 mt-1">{{  $student_message->user->name }}</h5>
                                    <small class="text-muted">{{ $student_message->user->email }}</small>
                                </div>
                            </div>

                            <h4 class="mt-0 font-size-16"><strong>Subject:</strong> {{ $student_message->subject }}</h4>

                            {{-- <p>Dear Lorem Ipsum,</p> --}}
                            <p>{{ $student_message->message }} </p>

                            {{-- <p>Sincerly,</p> --}}
                       
                            @if($student_message->file != "")
                            <div class="row pt-2">
                                <div class="col-xl-6 col-6">
                                    <div class="cards"><hr />
                                        <p class="email-attachment-title mb-2">Attachments</p>
                                        <div class="cursor-pointer">
                                            <i class="ti ti-file"></i>
                                            <a
                                                href="{{ uploaded_file($student_message->file) }}"
                                                download
                                                class="align-middle ms-1"
                                            >
                                                {{ $student_message->file }}
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
