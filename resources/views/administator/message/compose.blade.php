
@extends('layouts.administator.app')

@section('administator_content')

<x-admin.page-title dashboard_title="Administator" title="Student Message" page_name="Compose message">
    <a href="{{ route('administator.message.index') }}" class="btn btn-success" id="">All message</a>
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
                        <a href="{{ route('administator.message.index') }}" class=""><i class="mdi mdi-email-outline me-2" class=""></i> Inbox <span class="ms-1 float-end">({{ $recieve_message->count() }})</span></a>
                        <a href="{{ route('administator.message.send') }}"><i class="mdi mdi-email-check-outline me-2"></i>Sent <span class="ms-1 float-end">({{ $t_m_administrator->count() }})</span></a>

                    </div>
                </div>
                <!-- End Left sidebar -->

                <!-- Right Sidebar -->
                <div class="email-rightbar mb-3">

                    <div class="card">
                        <div class="card-body">

                            <form id="submi" action="{{ route('administator.message.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
<div class="row">
    <div class="col-lg-6">
        <div class="form-group mb-3">
            <label for="">Student Email</label>
            {{-- <input type="email" class="form-control" placeholder="To"> --}}
            <select name="student_email" id="student_email" class="form-control select2">
                <option value="">Select Student</option>
                @foreach ($students as $student)
                <option value="{{ $student->id }}">{{ $student->email }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group mb-3">
            <label for="">Teacher Email</label>
            {{-- <input type="email" class="form-control" placeholder="To"> --}}
            <select name="teacher_email" id="teacher_email" class="form-control select2">
                <option value="">Select Teacher</option>
                @foreach ($teachers as $teacher)
                <option value="{{ $teacher->id }}">{{ $teacher->email }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>


                                <div class="form-group mb-3">
                                    <label for="">Message subject</label>
                                    <input type="text" id="subject" name="subject" class="form-control" class="form-control" placeholder="Message subject...">
                                </div>
                                <div class="form-group mb-3">
<label for="">Message</label>
                                        {{-- <textarea id="elm1" name="elm1"></textarea> --}}
                    {{-- <textarea id="description" placeholder="Message" name="description" class="form-control" required></textarea> --}}
                    <div>
                        <textarea  class="form-control your_summernote" name="description" rows="5" placeholder="Type here">
                        </textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                                </div>

<button type="submit" class="btn btn-success">Submit</button>
<input type="file" id="file" name="file" class="" placeholder="" >

                            </form>

                        </div>

                    </div>

                </div> <!-- end Col-9 -->

            </div>

        </div><!-- End row -->

    </div>


</div> <!-- container-fluid -->

@endsection
