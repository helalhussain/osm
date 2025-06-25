
@extends('layouts.teacher.app')

@section('teacher_content')
    <x-admin.page-title dashboard_title="Teacher" title="Teacher" page_name="Create">
        <a href="{{ route('teacher.quiz.index') }}" class="btn btn-success">Question</a>
    </x-admin.page-title>
    <div class="container-fluid">

        <div class="page-content-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title">Add Quiz</h4>
                            <p class="card-title-desc"></p>

                            <form id="submit" action="{{ route('teacher.question.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <x-admin.form-group label="class" :required="false" isType="select"  class="select2"  column="col-lg-6" required>
                                        {{-- <option value="{{ $classes->classroom_id ?? '' }}">{{ $course->classroom->title ?? 'Select Class' }}</option> --}}
                                        <option value="">Select Class</option>
                                        @foreach ($classes as $class)
                                       <option value="{{ $class->id }}">{{ $class->title }}</option>
                                       @endforeach
                                    </x-admin.form-group><br>
                                    <x-admin.form-group label="quiz" :required="false" isType="select"  class="select2"  column="col-lg-6" required>
                                        {{-- <option value="{{ $classes->classroom_id ?? '' }}">{{ $course->classroom->title ?? 'Select Class' }}</option> --}}
                                        <option value="">Select Quiz</option>
                                        @foreach ($quizzes as $quiz)
                                       <option value="{{ $quiz->id }}">{{ $quiz->title }}</option>
                                       @endforeach
                                    </x-admin.form-group><br>

                                    <x-admin.form-group label="question" class="mb-3" placeholder="Enter question"
                                        column="col-lg-12" required/><br/>


                                        <x-admin.form-group label="a" class="mb-3" placeholder="Enter teacher address"
                                            column="col-lg-6" required/><br/>
                                        <x-admin.form-group label="b" class="mb-3" placeholder="Enter teacher address"
                                            column="col-lg-6" required/><br/>
                                        <x-admin.form-group label="c" class="mb-3" placeholder="Enter teacher address"
                                            column="col-lg-6" required/><br/>

                                            <x-admin.form-group label="d" class="mb-3" placeholder="Enter teacher address"
                                                column="col-lg-6" required/><br/>

                                                <x-admin.form-group label="ans" class="mb-3" :required="false" isType="select" class="select2"
                                                column="col-lg-6" required>
                                                <option value="">Select Answer</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                            </x-admin.form-group>


                                    </div><br>

                                        <x-admin.submit-button :text="isset($teacher) ? 'Update':'Submit'" />
                                        {{-- <a href="{{ route('admin.teacher.index') }}" class="btn btn-secondary waves-effect">
                                            Cancel
                                        </a> --}}
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>
    </div> <!-- container-fluid -->
@endsection
