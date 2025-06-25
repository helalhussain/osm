@extends('layouts.administator.app')

@section('administator_content')
    <x-admin.page-title dashboard_title="Administrator" title="Teacher" page_name="Show teacher">
        <a href="{{ route('administator.teacher.index') }}" class="btn btn-success">Teachers</a>
    </x-admin.page-title>
    <div class="container-fluid">

        <div class="page-content-wrapper">
            <div class="row">

                    <div class="card mb-4">
                        <div class="container">
                            <div class="main-body">

                                <div class="row gutters-sm mt-4">
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex flex-column align-items-center text-center">
                                                    <img src="{{ uploaded_file($teacher->image) }}" alt=""
                                                        class="rounded-circle img-thumbnail" width="150"
                                                        style="height:150px">
                                                    <div class="mt-3">
                                                        <h4> {{ $teacher->name }}</h4>
                                                        <p class="card-title-desc"><strong>Subjects: </strong>
                                                            {{ $teacher->subjects->pluck('name')->implode(', ') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-8">



                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="header-title">Teacher info</h4>

                                                        <form id="submi"
                                                            action="{{ route('administator.teacher.update', $teacher->id) }}"
                                                            method="POST" class="custom-validation"
                                                            enctype="multipart/form-data">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="row">
                                                                <x-admin.form-group label="name" class="mb-3"
                                                                    placeholder="Enter teacher name" :value="$teacher->name ?? ''"
                                                                    column="col-lg-6" required/><br required/>
                                                                <x-admin.form-group label="email" class="mb-3" readonly
                                                                    placeholder="Enter teacher email" :value="$teacher->email ?? ''"
                                                                    column="col-lg-6" required/><br />

                                                                    <x-admin.form-group label="subjects"  for="subjects[]" class="mb-3" ::required="false" isType="select"
                                                                    class="select2 form-control select2-multiple" multiple="multiple"
                                                                    data-placeholder="Select subject ..." column="col-lg-12 col-sm-12" required>

                                                                    @foreach ($teacher->subjects as $subject)
                                                                    <option value="{{ $subject->id }}" @isset($teacher) @foreach ($teacher->subjects as $teacherSub) @selected($teacherSub->id === $subject->id) @endforeach @endisset>{{ $subject->name }}</option>

                                                                    @endforeach
                                                                    @foreach ($subjects as $subject)
                                                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                                    @endforeach
                                                                </x-admin.form-group><br/>


                                                                <x-admin.form-group label="gender" class="mb-3"
                                                                    :required="false" isType="select" class="select2"
                                                                    column="col-lg-6" required>
                                                                    <option
                                                                        value="{{ $teacher->gender ? $teacher->gender : '' }}">
                                                                        {{ $teacher->gender ? $teacher->gender : 'Select gender' }}
                                                                    </option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                    <option value="Other">Other</option>
                                                                </x-admin.form-group><br />


                                                                <x-admin.form-group label="date" type="date"
                                                                    class="mb-3" placeholder="Enter teacher Date of birth"
                                                                    :value="$teacher->dob ?? ''" column="col-lg-6" required/><br />
                                                                <x-admin.form-group label="phone"
                                                                    placeholder="Enter teacher phone" :value="$teacher->phone ?? ''"
                                                                    column="col-lg-6" required/><br />

                                                                <x-admin.form-group label="address"
                                                                    placeholder="Enter teacher address" :value="$teacher->address ?? ''"
                                                                    column="col-lg-6" required/><br/>

                                                            </div><br />
                                                            <x-admin.form-group label="image" for="image" class="mb-3"
                                                                :required="false" type="file"
                                                                data-show-image="show_teacher_image" accept="image/*"
                                                                column="col-lg-6" /><br>


                                                            <button type="submit"
                                                                class="btn btn-primary waves-effect waves-light me-1">
                                                                Update
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
