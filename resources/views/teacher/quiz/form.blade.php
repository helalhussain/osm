<x-admin.modal
    enctype="multipart/form-data"
    :title="isset($quiz) ? 'Update Quiz' : 'Add New Quiz'"
    :action="isset($quiz) ? route('teacher.quiz.update', $quiz->id) : route('teacher.quiz.store')"
    :button="isset($quiz) ? 'Update' : 'Submit'"
>
    @isset($quiz)
        @method('PUT')
    @endisset

    <x-admin.form-group label="course" :required="false" isType="select"  class=""  column="col-lg-8" required>
        {{-- <option value="{{ $classes->classroom_id ?? '' }}">{{ $course->classroom->title ?? 'Select Class' }}</option> --}}
        <option value="{{ $quiz->course_id ?? '' }}">{{ $quiz->course->title ?? 'Select class' }}</option>
        {{-- <option value="">Select Course</option> --}}
        @foreach ($courses as $course)
       <option value="{{ $course->id }}">{{ $course->title }}</option>
       @endforeach
    </x-admin.form-group>
    <x-admin.form-group label="time" class="mb-3" :value="$quiz->minute ?? ''" placeholder="Enter time (minute)"
        column="col-lg-4" required/><br/>

    <x-admin.form-group label="title" :value="$quiz->title ?? ''" class="mb-3" placeholder="Enter title"
        column="col-lg-12" required/><br/>



</x-admin.modal>




















{{--
@extends('layouts.teacher.app')

@section('teacher_content')
    <x-admin.page-title dashboard_title="Teacher" title="Teacher" page_name="Create">
        <a href="{{ route('teacher.quiz.index') }}" class="btn btn-success">Quiz</a>
    </x-admin.page-title>
    <div class="container-fluid">

        <div class="page-content-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title">Add Quiz</h4>
                            <p class="card-title-desc"></p>

                            <form id="submit" action="{{ route('teacher.quiz.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">


                                    <x-admin.form-group label="course" :required="false" isType="select"  class=""  column="col-lg-6" required>

                                        <option value="">Select Course</option>
                                        @foreach ($courses as $course)
                                       <option value="{{ $course->id }}">{{ $course->title }}</option>
                                       @endforeach
                                    </x-admin.form-group><br>
                                    <x-admin.form-group label="time" class="mb-3" placeholder="Enter time (minute)"
                                        column="col-lg-6" required/><br/>

                                    <x-admin.form-group label="title" class="mb-3" placeholder="Enter title"
                                        column="col-lg-12" required/><br/>

                                    </div><br>

                                      <x-admin.submit-button :text="isset($quiz) ? 'Update':'Submit'" />

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>
    </div> <!-- container-fluid -->



@endsection --}}
