
@extends('layouts.administator.app')

@section('administator_content')

<x-admin.page-title dashboard_title="Administator" title="Student Message" page_name="Compose message">
    <a href="{{ route('administator.student-message.index') }}" class="btn btn-success" id="">All message</a>
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
                        <a href="{{ route('administator.student-message.index') }}" class="active"><i class="mdi mdi-email-outline me-2"></i> Inbox <span class="ms-1 float-end">(18)</span></a>
                        <a href="{{ route('administator.student-message.index') }}"><i class="mdi mdi-email-check-outline me-2"></i>Sent</a>

                    </div>
                </div>
                <!-- End Left sidebar -->

                <!-- Right Sidebar -->
                <div class="email-rightbar mb-3">

                    <div class="card">
                        <div class="card-body">

                            <form id="submit" action="{{ route('administator.student-message.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">

                                    {{-- <input type="email" class="form-control" placeholder="To"> --}}
                                    <select name="email" id="email" class="form-control select2">
                                        <option value="">Select Student</option>
                                        @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->email }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <input type="text" id="subject" name="subject" class="form-control" class="form-control" placeholder="Subject">
                                </div>
                                <div class="mb-3">

                                        <textarea id="elm1" name="elm1"></textarea>

                                </div>

<button type="submit" class="btn btn-success">Submit</button>
<input type="file" id="image" name="image" class="" placeholder="">

                            </form>

                        </div>

                    </div>

                </div> <!-- end Col-9 -->

            </div>

        </div><!-- End row -->

    </div>


</div> <!-- container-fluid -->

@endsection
