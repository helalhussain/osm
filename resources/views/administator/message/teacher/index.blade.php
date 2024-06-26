
@extends('layouts.administator.app')

@section('administator_content')

<x-admin.page-title dashboard_title="Administator" title="Teacher Message" page_name="All message">
    <a href="{{ route('administator.teacher-message.create') }}" class="btn btn-success" >Add message</a>
</x-admin.page-title>


<div class="container-fluid">

    <div class="page-content-wrapper">

        <div class="row">
            <div class="col-12">
                <!-- Left sidebar -->
                <div class="email-leftbar card">
                    <a href="{{ route('administator.teacher-message.create') }}" class="btn btn-danger btn-block waves-effect waves-light">
                        Compose
                    </a>
                    <div class="mail-list mt-4">
                        <a href="{{ route('administator.teacher-message.index') }}" class="{{ Request::is('administator.teacher-message.index') ? '':'active'; }}"><i class="mdi mdi-email-outline me-2"></i> Inbox <span class="ms-1 float-end"></span></a>
                        <a href="{{ route('administator.teacher-message.send') }}" class="{{ Request::is('administator.teacher-message.send') ? 'active':'' }}" ><i class="mdi mdi-email-check-outline me-2 "></i>Sent <span class="ms-1 float-end"></span></a>
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


                        <ul class="message-list">
@foreach ($messages as $message)
<li>
    <div class="col-mail col-mail-1">
        {{-- <div class="checkbox-wrapper-mail">

            <label for="chk19" class="toggle"></label>
        </div> --}}

        <a href="{{ route('administator.teacher-message.show',$message->id) }}" class="title">{{ $message->user->name }}</a>
     <h6 class="" style="font-size:12px">
         <p style="margin-left:10px;" class="mt-3">{{ $message->created_at->format("M-d") }}</p>
        </h6>

    </div>
    <div class="col-mail col-mail-2">
        <a href="#" class="subject"> <span class="teaser">{{ $message->message }}</span>
        </a>

        <div class="date">

            <a href="{{ route('administator.teacher-message.destroy',$message->id) }}" id="deleteBtn">
                <i class="fas fa-trash-alt"></i>
            </a>

        </div>
    </div>

</li>

@endforeach



                        </ul>

                    </div> <!-- card -->

                    <div class="row">
                        <div class="col-7">
                            {{-- Showing 1 - 20 of 1,524 --}}
                            {!! $messages->links() !!}
                        </div>
                        <div class="col-5">
                            <div class="btn-group float-end">

                                {{-- <button type="button" class="btn btn-sm btn-success waves-effect"><i class="fa fa-chevron-left"></i></button>
                                <button type="button" class="btn btn-sm btn-success waves-effect"><i class="fa fa-chevron-right"></i></button> --}}
                            </div>
                        </div>
                    </div>

                </div> <!-- end Col-9 -->

            </div>

        </div><!-- End row -->

    </div>


</div> <!-- container-fluid -->
@endsection
