@extends('layouts.administator.app')

@section('administator_content')
    <x-admin.page-title dashboard_title="Administator" title="Student" page_name="Show student">
        <a href="{{ route('administator.student.index') }}" class="btn btn-success">Students</a>
    </x-admin.page-title>
    <div class="container-fluid">

        <div class="page-content-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-4">
                                    <!---Card profile-image---->
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

                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <!--End Card profile-image-->
                                </div>
                                <div class="col-xl-8">

                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="header-title">student info</h4>

                                            <form id="submit" action="{{ route('administator.student.update',$student->id) }}" method="POST" class="custom-validation" enctype="multipart/form-data">
                                                @method('PUT')
                                                @csrf
                                               <div class="row">
                                                <x-admin.form-group label="name" class="mb-3" placeholder="Enter student name" :value="$student->name ?? ''"
                                                    column="col-lg-6" /><br/>
                                                <x-admin.form-group label="email" class="mb-3" readonly placeholder="Enter student email" :value="$student->email ?? ''"
                                                    column="col-lg-6" /><br/>
                                                    <x-admin.form-group label="gender" class="mb-3" :required="false" isType="select" class="select2"
                                                    column="col-lg-6">
                                                    <option value="{{ $student->gender ? $student->gender : '' }}">{{ $student->gender ? $student->gender : 'Select gender' }}</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </x-admin.form-group><br/>
                                                {{-- <x-admin.form-group label="dob" placeholder="Enter student Date of birth" :value="$student->dob ?? ''"
                                                    column="col-lg-6" /><br/> --}}
                                                    <x-admin.form-group  label="date" type="date" class="mb-3" placeholder="Enter student Date of birth" :value="$student->dob ?? ''"
                                                        column="col-lg-6" /><br/>
                                                    <x-admin.form-group label="phone" placeholder="Enter student phone" :value="$student->phone ?? ''"
                                                        column="col-lg-6" /><br/>

                                             <x-admin.form-group label="address" placeholder="Enter student address" :value="$student->address ?? ''"
                                            column="col-lg-6" /><br/>

                                               </div><br/>


                                                        <button type="submit"
                                                            class="btn btn-primary waves-effect waves-light me-1">
                                                            Edit
                                                        </button>


                                            </form>
                                            <!-- end form -->
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
