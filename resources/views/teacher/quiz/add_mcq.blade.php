
@extends('layouts.teacher.app')

@section('teacher_content')
    <x-admin.page-title dashboard_title="Teacher" title="Teacher" page_name="MCQ">
        <a href="{{ route('teacher.question.index') }}" class="btn btn-success">Question</a>
    </x-admin.page-title>
    <div class="container-fluid">

        <div class="page-content-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title">Add MCQ</h4>
                            <p class="card-title-desc"></p>

                            <form id="submi" action="{{ route('teacher.question.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    {{-- <x-admin.form-group label="quiz" :required="false" isType="select" class="" column="col-lg-12" required>
                                        <option value="">Select Quiz</option>
                                        @foreach ($quizes as $quiz)
                                        <option value="{{ $quiz->id }}">{{ $quiz->title }}</option>
                                        @endforeach
                                    </x-admin.form-group> --}}
                                    <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                                    {{-- <x-admin.form-group label="question" class="mb-3" placeholder="Enter question"
                                        column="col-lg-10" required/><br/> --}}

                                        <div><br/>
                                            <label for="">Question <span style="color:red">*</span></label>
                                            <textarea  class="form-control your_summernote" name="question" rows="5" placeholder="Type here">

                                            </textarea>
                                        @error('question')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <br/>
                                        </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        {{-- <x-admin.form-group label="image" :required="false" type="file"
                                        data-show-image="show_image"  column=""/> --}}
                                    </div>
                                </div>

                                         <!-- Nav tabs -->
                                         <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                           <br/>
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class="d-none d-sm-block">MCQ Image</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
                                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                    <span class="d-none d-sm-block">MCQ</span>
                                                </a>
                                            </li>
                                            {{-- <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#messages1" role="tab">
                                                    <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                    <span class="d-none d-sm-block">Question</span>
                                                </a>
                                            </li> --}}

                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content p-3 text-muted">
                                            <div class="tab-pane active" id="home1" role="tabpanel">


                                                <div class="row">
                                                    <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <x-admin.form-group label="title_A" class="" placeholder="Enter image title"
                                                        column="col-lg-10" />
                                                        <x-admin.form-group label="image_A" :required="false" type="file"
                                                        data-show-image="show_image"  column=""/>
                                                    </div>
                                                    </div>


                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <x-admin.form-group label="title_B" class="" placeholder="Enter image title"
                                                            column="col-lg-10" />
                                                            <x-admin.form-group label="image_B" :required="false" type="file"
                                                            data-show-image="show_image"  column=""/>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-6">
                                                       <div class="mb-3">
                                                        <x-admin.form-group label="title_C" class="" placeholder="Enter image title"
                                                        column="col-lg-10" />
                                                        <x-admin.form-group label="image_C" :required="false" type="file"
                                                        data-show-image="show_image"  column=""/>
                                                       </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <x-admin.form-group label="title_D" class="" placeholder="Enter image title"
                                                            column="col-lg-10" />
                                                            <x-admin.form-group label="image_D" :required="false" type="file"
                                                            data-show-image="show_image"  column=""/>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="tab-pane" id="profile1" role="tabpanel">
                                                <div class="row">
                                                    <x-admin.form-group label="a" class="mb-3" placeholder="Enter the option"
                                                    column="col-lg-6" /><br/>
                                                <x-admin.form-group label="b" class="mb-3" placeholder="Enter the option"
                                                    column="col-lg-6" /><br/>
                                                <x-admin.form-group label="c" class="mb-3" placeholder="Enter the option"
                                                    column="col-lg-6" /><br/>
                                                <x-admin.form-group label="d" class="mb-3" placeholder="Enter the option"
                                                    column="col-lg-6" /><br/>

                                                </div>
                                            </div>
                                            {{-- <div class="tab-pane" id="messages1" role="tabpanel">
                                                <input name="short_question" class="form-check-input" type="checkbox" id="formCheck1">
                                            </div> --}}
                                        </div>
                                                <!---End Tab--------->



            {{-- <input type="hidden" name="course" value="{{ $quiz->course_id }}">
            <input type="hidden" name="quiz" value="{{ $quiz->id }}"> --}}

<br/>
                                                <x-admin.form-group label="answer" class="mb-3" placeholder="Enter the answer"
                                                column="col-lg-6"/><br/>
                                                <x-admin.form-group label="mark" class="mb-3" placeholder="Enter the mark"
                                                column="col-lg-4" required/><br/>
                                        <x-admin.form-group label="type" class="mb-3" :required="false" isType="select" class="select"
                                        column="col-lg-2" required>
                                        <option value="mcq">MCQ</option>
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
