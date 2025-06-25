
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
                        <a href="{{ route('message.index') }}" class="{{ Request::is('message.index') ? '':'active'; }}"><i class="mdi mdi-email-outline me-2"></i> Inbox <span class="ms-1 float-end">({{ $student_recieve->count() }})</span></a>
                        <a href="{{ route('message.send') }}" class="{{ Request::is('message.send') ? 'active':'' }}" ><i class="mdi mdi-email-check-outline me-2 "></i>Sent <span class="ms-1 float-end">({{ $student_send->count() }})</span></a>
                    </div>
                </div>
                <!-- End Left sidebar -->

                <!-- Right Sidebar -->
                <div class="email-rightbar mb-3">

                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('message.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">

                                            {{-- <input type="email" class="form-control" placeholder="To"> --}}
                                            <select name="teacher_email" id="teacher_email" class="form-control select2">
                                                <option value="">Select Teacher</option>
                                                @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}">{{ $teacher->email }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">

                                            {{-- <input type="email" class="form-control" placeholder="To"> --}}
                                            <select name="administrator_email" id="administrator_email" class="form-control select2" >
                                                <option value="">Select Administator</option>
                                                @foreach ($administators as $administator)
                                                <option value="{{ $administator->id }}">{{ $administator->email }}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                    </div>
                                </div>

                                <div class="mb-3">
                                    <input type="text" id="subject" name="subject" class="form-control" class="form-control" placeholder="Subject">
                                </div>
                                <div class="mb-3">

                                        {{-- <textarea id="elm1" name="elm1"></textarea> --}}
                                        {{-- <textarea id="message" name="message" class="form-control" required></textarea> --}}
                                        <div><br/>
                                            <textarea  class="form-control your_summernote" name="description" rows="5" placeholder="Type here">
                                                {{-- {!!  $notice->message !!} --}}
                                            </textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
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
