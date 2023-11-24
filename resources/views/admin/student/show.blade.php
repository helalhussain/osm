@extends('layouts.admin.app')

@section('admin_content')
    <x-admin.page-title dashboard_title="Admin" title="Student" page_name="Show student">
        <a href="{{ route('admin.student.index') }}" class="btn btn-success">Students</a>
    </x-admin.page-title>
    <div class="container-fluid">

        <div class="page-content-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-5">
                                    <!---Card Student-profile-image---->
                                    <div class="card">
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="mb-2">
                                                        <img class="img-thumbnail" alt="200x200"
                                                            src="{{ asset('admin') }}/assets/images/users/avatar-4.jpg"
                                                            data-holder-rendered="true">
                                                    </div>

                                            <h4 class="header-title">{{ $student->name }}</h4>
                                            <p class="card-title-desc">{{ $student->email }}</p>

                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <!--End Card student-profile-image-->
                                </div>
                                <div class="col-xl-7">
                                    <div class="mt-4 mt-xl-3">
                                        <h5 class="mt-1 mb-3">{{ $student->name }}</h5>
                                        <h6 class="text-primary"><strong>ID : </strong>{{ $student->student_id }}</h6>
                                        <div class="d-inline-flex">
                                            <div class="text-muted me-3">

                                            </div>
                                        </div>

                                        <h5 class="mt-2">0 <span
                                                class="text-danger font-size-12 ms-2"></span></h5>

                                        <hr class="my-4">

                                        <div class="mt-4">
                                            <h6>Features :</h6>

                                            <div class="mt-4">
                                                <p class="text-muted mb-2"><i
                                                        class="mdi mdi-check-bold text-success me-2"></i>Various have
                                                    evolved over years sometimes on purpose.</p>
                                                <p class="text-muted mb-2"><i
                                                        class="mdi mdi-check-bold text-success me-2"></i>Always free from
                                                    repetition injected humour or words etc.</p>

                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <form action="#" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="in_active_value" value="{{ $student->in_active }}" />
                                                <button type="submit" class="btn {{ $student->in_active ? 'btn-warning' : 'btn-success' }} waves-effect waves-light mt-2">
                                                    {{-- <i class="mdi mdi-cart me-2"></i> --}}
                                                     {{ $student->in_active ? 'Disable' : 'Able' }}
                                                </button>
                                            </form>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>



                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
    <!-- end row -->



    </div>


    </div> <!-- container-fluid -->
@endsection
