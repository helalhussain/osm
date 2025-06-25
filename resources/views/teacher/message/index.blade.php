
@extends('layouts.teacher.app')

@section('teacher_content')

<x-admin.page-title dashboard_title="Teacher" title="Message" page_name="All message">
    <a href="{{ route('teacher.message.create') }}" class="btn btn-success" >Add message</a>
</x-admin.page-title>


<div class="container-fluid">

    <div class="page-content-wrapper">

        <div class="row">
            <div class="col-12">
                <!-- Left sidebar -->
                <div class="email-leftbar card">
                    <a href="{{ route('teacher.message.create') }}" class="btn btn-danger btn-block waves-effect waves-light">
                        Compose
                    </a>
                    <div class="mail-list mt-4">
                        <a href="{{ route('teacher.message.index') }}" class="{{ Request::is('teacher.message.index') ? '':'active'; }}"><i class="mdi mdi-email-outline me-2"></i> Inbox <span class="ms-1 float-end">({{ $recieve_message->count() }})</span></a>
                        <a href="{{ route('teacher.message.send') }}" class="{{ Request::is('teacher.message.send') ? 'active':'' }}" ><i class="mdi mdi-email-check-outline me-2 "></i>Sent <span class="ms-1 float-end">({{ $m_t_teacher->count() }})</span></a>
                    </div>
                </div>
                <!-- End Left sidebar -->


                <!-- Right Sidebar -->
                <div class="email-rightbar mb-3">

                    <div class="card">
                        <div class="btn-toolbar p-3" role="toolbar">

                            <div class="btn-group me-2 mb-2 mb-sm-0">

                            </div>
                        </div>


                        <ul class="message-list">
@foreach ($messages as $message)
<li>
    <div class="col-mail col-mail-1">
        {{-- <div class="checkbox-wrapper-mail">

            <label for="chk19" class="toggle"></label>
        </div> --}}

        <a href="{{ route('teacher.message.show',$message->id) }}" class="title">
            {{-- @if($message->teach=='recieve' and $message->student=='recieve')
            {{ $message->administator->name }}
            @elseif ($message->student=='recieve' and $message->teach=='0')
            {{ $message->user->name }}
            @elseif ($message->teach=='recieve' and $message->student=='0')
            {{ $message->administator->name }}
            @endif --}}

            @if ($message->administrator=='send')
            {{ $message->administator->name }}
            @elseif ($message->student=='send')
            {{ $message->user->name }}
            @endif
        </a>
     <h6 class="" style="font-size:12px">
         <p style="margin-left:10px;" class="mt-3">{{ $message->created_at->format("M-d") }}</p>
        </h6>

    </div>
    <div class="col-mail col-mail-2">
        <a href="{{ route('teacher.message.show',$message->id) }}" class="subject"> <span class="teaser">{{ $message->message }}</span>
        </a>

        {{-- <div class="date">

            <form action="{{ route('teacher.message.destroy',$message->id) }}" method="POST">
                @csrf
            @method('DELETE')
                <button type="submit" style="border:none;background:none
                ">
                    <i class="fas fa-trash-alt"></i>
                </button>
              </form>

        </div> --}}
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
