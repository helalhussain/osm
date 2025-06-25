
@extends('layouts.administator.app')

@section('administator_content')

<x-admin.page-title dashboard_title="Administator" title="Message" page_name="Message">
    <a href="{{ route('administator.message.index') }}" class="btn btn-success" >Back</a>
</x-admin.page-title>


<div class="container-fluid">

    <div class="page-content-wrapper">


        <div class="row">
            <div class="col-12">
                <!-- Left sidebar -->
                <div class="email-leftbar card">
                    <a href="{{ route('administator.message.create') }}" class="btn btn-danger btn-block waves-effect waves-light">
                        Compose
                    </a>
                    <div class="mail-list mt-4">
                        <a href="{{ route('administator.message.index') }}" class=""><i class="mdi mdi-email-outline me-2"></i> Inbox <span class="ms-1 float-end">({{ $recieve_message->count() }})</span></a>
                        <a href="{{ route('administator.message.send') }}" class="text-danger"><i class="mdi mdi-email-check-outline me-2"></i>Sent <span class="ms-1 float-end">({{ $t_m_administrator->count() }})</span></a>

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
                                {{-- <img class="d-flex me-3 rounded-circle avatar-sm" src="{{ asset('images/defult/user.png') }}" alt="Generic placeholder image"> --}}
                                <div class="media-body">
                                    @if ($message->administrator=='send')
                                    @if($message->teach=='recieve' and $message->student=='recieve')
                                    <h5 class="font-size-14 mt-1">{{  $message->user->name }}, {{  $message->teacher->name }}</h5>
                                    <small class="text-muted">{{ $message->user->email }}, {{ $message->teacher->email }}</small>
                                    @elseif ($message->student=='recieve' and $message->teach=='0')
                                    <h5 class="font-size-14 mt-1">{{  $message->user->name }}</h5>
                                    <small class="text-muted">{{ $message->user->email }}</small>
                                    @elseif ($message->teach=='recieve' and $message->student=='0')
                                    <h5 class="font-size-14 mt-1">{{  $message->teacher->name }}</h5>
                                    <small class="text-muted">{{ $message->teacher->email }}</small>
                                    @endif

                                    @endif

                                </div>
                            </div>

                            <h4 class="mt-0 font-size-16"><strong>Subject:</strong> {{ $message->subject }}</h4>

                            {{-- <p>Dear Lorem Ipsum,</p> --}}
                            <p>{!! $message->message !!} </p>

                            {{-- <p>Sincerly,</p> --}}

                            @if($message->file != "")
                            <div class="row ">
                                <div class="col-xl-6 col-6">
                                    <div class="cards">
                                        <p class="email-attachment-title mb-2">File</p>
                                        <div class="cursor-pointer">
                                            {{-- <i class="ti ti-file"></i> --}}
                                            <a
                                                href="{{ uploaded_file($message->file) }}"
                                                download
                                                class="align-middle ms-1">
                                                {{-- {{ $notice->file }} --}}
                                                <p class="btn btn-light border border-secondary border-1 rounded-pill" >Download <i class="mdi mdi-download ms-2"></i></p>
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
