
@extends('layouts.administator.app')

@section('administator_content')
    <x-admin.page-title title="Student" page_name="Create student">
        <a href="{{ route('administator.student.index') }}" class="btn btn-success">students</a>
    </x-admin.page-title>

    <div class="container-fluid">

        <div class="page-content-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title">Add student</h4>
                            <p class="card-title-desc"></p>

                            <form id="submit" action="{{ route('administator.student.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <x-admin.form-group label="name" class="mb-3" placeholder="Enter student name" :value="$student->name ?? ''"
                                        column="col-lg-6" /><br/>
                                    <x-admin.form-group label="email" class="mb-3" placeholder="Enter student email" :value="$student->email ?? ''"
                                        column="col-lg-6" /><br/>


                                        <x-admin.form-group label="id" class="mb-3" placeholder="Enter student ID"
                                            column="col-lg-6" /><br/>
                                            <x-admin.form-group label="class" class="mb-3" :required="false" isType="select" class="select2"
                                            column="col-lg-6">
                                            <option value="">Select Class</option>
                                            {{-- @foreach ($subjects as $subject)

                                            @endforeach --}}
                                        </x-admin.form-group>

                                    <x-admin.form-group label="gender" class="mb-3" :required="false" isType="select" class="select2"
                                    column="col-lg-6">
                                    <option value="">Select gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </x-admin.form-group>
                                    <x-admin.form-group  label="date" type="date" class="mb-3" placeholder="Enter student Date of birth" :value="$student->dob ?? ''"
                                        column="col-lg-6" /><br/>
                                    <x-admin.form-group label="phone" class="mb-3" placeholder="Enter student phone" :value="$student->phone ?? ''"
                                        column="col-lg-6" /><br/>
                                        <x-admin.form-group label="address" class="mb-3" placeholder="Enter student address" :value="$student->address ?? ''"
                                            column="col-lg-6" /><br/>
                                    <x-admin.form-group label="password" class="mb-3" placeholder="Enter password" :value="$student->password ?? ''"
                                        column="col-lg-6" /><br/>

                                    <x-admin.form-group label="password_confirmation" class="mb-3" placeholder="Enter confirm password"
                                        column="col-lg-6" /><br/>
                                        <x-admin.form-group label="image" for="image" class="mb-3" :required="false" type="file"
                                        data-show-image="show_student_image" column="col-lg-6" /><br>
                                </div><br>
                                        <x-admin.submit-button :text="isset($student) ? 'Update':'Submit'" />
                                        <a href="{{ route('administator.student.index') }}" class="btn btn-secondary waves-effect">
                                            Cancel
                                        </a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>
    </div> <!-- container-fluid -->
@endsection
