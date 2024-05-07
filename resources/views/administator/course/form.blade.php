


@extends('layouts.administator.app')

@section('administator_content')
    <x-admin.page-title title="Course" page_name="Add Course">
        <a href="#" class="btn btn-success">Back</a>
    </x-admin.page-title>

    <div class="container-fluid">

        <div class="page-content-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title">Add Course</h4>
                            <p class="card-title-desc"></p>

                            <form id="submit" action="{{ route('administator.course.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">


                                    <x-admin.form-group label="class" :required="false" isType="select"  class="select2"  column="col-lg-6">
                                        {{-- <option value="{{ $classes->classroom_id ?? '' }}">{{ $course->classroom->title ?? 'Select Class' }}</option> --}}
                                        <option value="">Select Class</option>
                                        @foreach ($classes as $class)
                                       <option value="{{ $class->id }}">{{ $class->title }}</option>
                                       @endforeach
                                    </x-admin.form-group><br>

                                    <x-admin.form-group label="section" :required="false" isType="select" class="select2"  column="col-lg-6">
                                        {{-- <option value="{{ $classes->classroom_id ?? '' }}">{{ $course->classroom->title ?? 'Select Class' }}</option> --}}
                                         <option value="">Select Section</option>
                                         @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->title }}</option>
                                        @endforeach
                                    </x-admin.form-group>
                                    <br/>


                                         <x-admin.form-group label="subjects" for="subjects[]" class="mb-3" ::required="false" isType="select"
                                        class="select2 form-control select2-multiple" multiple="multiple"
                                        data-placeholder="Select subject ..." column="col-lg-12 col-sm-12">
                                        <option value="">Select Subject</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </x-admin.form-group><br/>
                                    <x-admin.form-group label="title" placeholder="Enter cource title" column="col-lg-6"/>
                                    {{-- <x-admin.form-group label="teacher" :required="false" isType="select" class="select2"  column="col-lg-6">
                                        <option value="">Select Teacher</option>
                                        @foreach ($teachers as $teacher)
                                       <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                       @endforeach
                                    </x-admin.form-group><br/><br/> --}}
                                </div>

                                <div><br>
                                    <x-admin.submit-button :text="isset($course) ? 'Update':'Submit'" />
                                    <a href="{{ route('administator.course.index') }}" class="btn btn-secondary waves-effect">
                                        Cancel
                                    </a>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>
    </div> <!-- container-fluid -->
@endsection
