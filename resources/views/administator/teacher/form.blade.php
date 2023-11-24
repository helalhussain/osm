{{-- <x-admin.modal
    enctype="multipart/form-data"
    :title="isset($teacher) ? 'Update Teacher' : 'Add New Teacher'"
    :action="isset($teacher) ? route('administator.teacher.update', $teacher->id) : route('administator.teacher.store')"
    :button="isset($teacher) ? 'Update' : 'Submit'"
>
    @isset($teacher)
        @method('PUT')
    @endisset
    <x-admin.form-group label="name" placeholder="Enter teacher name" :value="$teacher->name ?? ''" />
    <x-admin.form-group label="email" placeholder="Enter teacher email" :value="$teacher->email ?? ''" />
        <x-admin.form-group label="subject" :required="false" isType="select" class="select2" column="">
            <option value="">Select Subject</option>
            @foreach ($subjects as $subject)
            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
            @endforeach
        </x-admin.form-group>
        <x-admin.form-group label="password" placeholder="Enter password" :value="$teacher->password ?? ''" />
        <x-admin.form-group label="password_confirmation" placeholder="Enter confirm password" />

</x-admin.modal> --}}
@extends('layouts.administator.app')

@section('administator_content')
    <x-admin.page-title title="Teacher" page_name="Create teacher">
        <a href="{{ route('administator.teacher.index') }}" class="btn btn-success">Teachers</a>
    </x-admin.page-title>

    <div class="container-fluid">

        <div class="page-content-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title">Add Teacher</h4>
                            <p class="card-title-desc"></p>

                            <form id="submit" action="{{ route('administator.teacher.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <x-admin.form-group label="name" class="mb-3" placeholder="Enter teacher name" :value="$teacher->name ?? ''"
                                        column="col-lg-6" /><br/>
                                    <x-admin.form-group label="email" class="mb-3" placeholder="Enter teacher email" :value="$teacher->email ?? ''"
                                        column="col-lg-6" /><br/>

                                         <x-admin.form-group label="subjects" for="subjects[]" class="mb-3" ::required="false" isType="select"
                                        class="select2 form-control select2-multiple" multiple="multiple"
                                        data-placeholder="Select subject ..." column="col-lg-12 col-sm-12">
                                        <option value="">Select Subject</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </x-admin.form-group><br/>


                                    <x-admin.form-group label="gender" class="mb-3" :required="false" isType="select" class="select2"
                                    column="col-lg-6">
                                    <option value="">Select gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </x-admin.form-group>
                                    <x-admin.form-group  label="date" type="date" class="mb-3" placeholder="Enter teacher Date of birth" :value="$teacher->dob ?? ''"
                                        column="col-lg-6" /><br/>
                                    <x-admin.form-group label="phone" class="mb-3" placeholder="Enter teacher phone" :value="$teacher->phone ?? ''"
                                        column="col-lg-6" /><br/>
                                        <x-admin.form-group label="address" class="mb-3" placeholder="Enter teacher address" :value="$teacher->address ?? ''"
                                            column="col-lg-6" /><br/>
                                    <x-admin.form-group label="password" class="mb-3" placeholder="Enter password" :value="$teacher->password ?? ''"
                                        column="col-lg-6" /><br/>

                                    <x-admin.form-group label="password_confirmation" class="mb-3" placeholder="Enter confirm password"
                                        column="col-lg-6" /><br/>
                                        <x-admin.form-group label="image" for="image" class="mb-3" :required="false" type="file"
                                        data-show-image="show_teacher_image" column="col-lg-6" /><br>
                                </div><br>
                                        <x-admin.submit-button :text="isset($teacher) ? 'Update':'Submit'" />
                                        <a href="{{ route('administator.teacher.index') }}" class="btn btn-secondary waves-effect">
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
