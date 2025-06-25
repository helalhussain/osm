
@extends('layouts.teacher.app')

@section('teacher_content')
    <x-admin.page-title dashboard_title="Teacher" title="Quiz" page_name="Question">
        <a href="{{ route('teacher.question.index') }}" class="btn btn-success">Question</a>
    </x-admin.page-title>
    <div class="container-fluid">

        <div class="page-content-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title">Add Question</h4>
                            <p class="card-title-desc"></p>

                            <form id="submi" action="{{ route('teacher.question.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">


                                    {{-- <x-admin.form-group label="question" class="mb-3" placeholder="Enter question"
                                        column="col-lg-10" required/><br/> --}}
                                        {{-- <x-admin.form-group label="quiz" :required="false" isType="select" class="" column="col-lg-12" required>
                                            <option value="">Select Quiz</option>
                                            @foreach ($quizes as $quiz)
                                            <option value="{{ $quiz->id }}">{{ $quiz->title }}</option>
                                            @endforeach
                                        </x-admin.form-group> --}}
                                        <div><br/>
                                            <label for="">Question <span style="color:red">*</span></label>
                                            <textarea  class="form-control your_summernote" name="question" rows="5" placeholder="Type here">

                                            </textarea>
                                        @error('question')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <br/>

<input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                                        </div>
                                        <x-admin.form-group label="type" class="mb-3" :required="false" isType="select" class="select"
                                        column="col-lg-2" required>
                                        <option value="question">Question</option>
                                    </x-admin.form-group>

                                            {{-- <x-admin.form-group label="image" :required="false" type="file"
                                            data-show-image="show_image"    column="col-lg-6"/> --}}


            {{-- <input type="hidden" name="course" value="{{ $quiz->course_id }}"> --}}
            {{-- <input type="text" name="classroom" value="{{ $quiz->classrooms }}"> --}}
            {{-- <input type="hidden" name="quiz" value="{{ $quiz->id }}"> --}}


                                                {{-- <x-admin.form-group label="answer" class="mb-3" placeholder="Enter the answer"
                                                column="col-lg-6"/><br/> --}}
                                                <x-admin.form-group label="mark" class="mb-3" placeholder="Enter the mark"
                                                column="col-lg-4" required/><br/>

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
