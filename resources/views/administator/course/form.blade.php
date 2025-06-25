


@extends('layouts.administator.app')

@section('administator_content')
    <x-admin.page-title title="Course" page_name="Add Course">
        <a href="{{ route('administator.course.index') }}" class="btn btn-success">All course</a>
    </x-admin.page-title>

    <div class="container-fluid">

        <div class="page-content-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title">Add Course</h4>
                            <p class="card-title-desc"></p>

                            <form id="submi" action="{{ route('administator.course.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">


                                    <x-admin.form-group label="class" :required="false" isType="select"  class="select2"  column="col-lg-6" required>
                                        {{-- <option value="{{ $classes->classroom_id ?? '' }}">{{ $course->classroom->title ?? 'Select Class' }}</option> --}}
                                        <option value="">Select Class</option>
                                        @foreach ($classes as $class)
                                       <option value="{{ $class->id }}">{{ $class->title }}</option>
                                       @endforeach
                                    </x-admin.form-group><br>
                                    <x-admin.form-group label="title" placeholder="Enter cource title" column="col-lg-6" required/>

                                    <x-admin.form-group label="section" :required="false" isType="select" class="select2"  column="col-lg-6" required>
                                        {{-- <option value="{{ $classes->classroom_id ?? '' }}">{{ $course->classroom->title ?? 'Select Class' }}</option> --}}
                                         <option value="">Select Section</option>
                                         @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->title }}</option>
                                        @endforeach
                                        <br/>
                                    </x-admin.form-group>
                                     <x-admin.form-group label="fee" placeholder="Enter course fee"  column="col-lg-3" required/>
                                     <x-admin.form-group label="discount" placeholder="Enter course discount"  column="col-lg-3" />
                                    <br/>


                                         <x-admin.form-group label="subjects" for="subjects[]" class="mb-3" ::required="false" isType="select"
                                        class="select2 form-control select2-multiple" multiple="multiple"
                                        data-placeholder="Select subject ..." column="col-lg-12 col-sm-12" required>
                                        <option value="">Select Subject</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </x-admin.form-group><br/><br/>

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
