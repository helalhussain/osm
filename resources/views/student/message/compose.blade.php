
@extends('layouts.student.app')

@section('student_content')

<x-admin.page-title dashboard_title="Student" title="Student Message" page_name="Compose message">
    <a href="{{ route('message.index') }}" class="btn btn-success" id="">All message</a>
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
                        <a href="{{ route('message.index') }}" class="{{ Request::is('message.index') ? '':'active'; }}"><i class="mdi mdi-email-outline me-2"></i> Inbox <span class="ms-1 float-end">({{ $m_count->count() }})</span></a>
                        <a href="{{ route('send.index') }}" class="{{ Request::is('send.index') ? 'active':'' }}" ><i class="mdi mdi-email-check-outline me-2 "></i>Sent <span class="ms-1 float-end">({{ $m_student_count->count() }})</span></a>
                    </div>
                </div>
                <!-- End Left sidebar -->

                <!-- Right Sidebar -->
                <div class="email-rightbar mb-3">

                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('message.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">

                                    {{-- <input type="email" class="form-control" placeholder="To"> --}}
                                    <select name="email" id="email" class="form-control select2" required>
                                        <option value="">Select Administator</option>
                                        @foreach ($administators as $administator)
                                        <option value="{{ $administator->id }}">{{ $administator->email }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <input type="text" id="subject" name="subject" class="form-control" class="form-control" placeholder="Subject">
                                </div>
                                <div class="mb-3">

                                        {{-- <textarea id="elm1" name="elm1"></textarea> --}}
                                        <textarea id="message" name="message" class="form-control" required></textarea>

                                </div>

<button type="submit" class="btn btn-success">Submit</button>
<input type="file" id="file" name="file">

                            </form>

                        </div>

                    </div>

                </div> <!-- end Col-9 -->

            </div>

        </div><!-- End row -->

    </div>


</div> <!-- container-fluid -->

@endsection
