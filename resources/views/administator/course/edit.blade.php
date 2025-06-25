


@extends('layouts.administator.app')

@section('administator_content')
    <x-admin.page-title title="Course" page_name="Edit Course">
        <a href="{{ route('administator.course.index') }}" class="btn btn-success">All course</a>
    </x-admin.page-title>

    <div class="container-fluid">

        <div class="page-content-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title">Edit Course</h4>
                            <p class="card-title-desc"></p>

                            <form id="submi" action="{{ route('administator.course.update',$course->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                 @csrf
                                <div class="row">
                                    <x-admin.form-group label="class" :required="false" isType="select"  class="select2"  column="col-lg-6" required>

                                        <option value="">Select Class</option>

                                        @foreach ($classes as $class)
                                       <option value="{{ $class->id }}">{{ $class->title }}</option>
                                       @endforeach
                                    </x-admin.form-group><br>
                                    <x-admin.form-group label="title" value="{{ $course->title }}" placeholder="Enter cource title" column="col-lg-6" required/>

                                    <x-admin.form-group label="section" :required="false" isType="select" class="select2"  column="col-lg-6" required>
                                         @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->title }}</option>
                                        @endforeach
                                    </x-admin.form-group>
                                    <br/>
 <x-admin.form-group label="fee" placeholder="Enter course fee" :value="$course->fee ?? ''" column="col-lg-3"/>
        <x-admin.form-group label="discount" placeholder="Enter course discount" :value="$course->discount ?? ''" column="col-lg-3"/>

                                    <x-admin.form-group label="subjects"  for="subjects[]" class="mb-3" ::required="false" isType="select"
                                    class="select2 form-control select2-multiple" multiple="multiple"
                                    data-placeholder="Select subject ..." column="col-lg-12 col-sm-12" required>

                                    @foreach ($course->subjects as $subject)
                                    <option value="{{ $subject->id }}" @isset($course) @foreach ($course->subjects as $courseSub) @selected($courseSub->id === $subject->id) @endforeach @endisset>{{ $subject->name }}</option>

                                    @endforeach
                                    @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </x-admin.form-group><br/>

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
