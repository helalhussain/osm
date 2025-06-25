

@extends('layouts.teacher.app')

@section('teacher_content')

<x-admin.page-title dashboard_title="Teacher" title="Quesiton" page_name="All quesiton">
    <a href="{{ route('teacher.quiz.index') }}" class="btn btn-success" id="">All question</a>
</x-admin.page-title>

{{-- <x-admin.table title="Question" :headers="['No','question', 'Action']" /> --}}

<div class="container-fluid">

    <div class="page-content-wrapper">
<!----Add Question--------->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Question</h4>
                <p class="card-title-desc"></p>

                <form id="submit" action="{{ route('teacher.quiz.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">


                        <x-admin.form-group label="course" value="{{ $quiz->course->title }}" class="mb-3" placeholder="Enter title"
                            column="col-lg-5" required/><br/>

<br>
<x-admin.form-group label="time" value="{{ $quiz->minute }}" class="mb-3" placeholder="Enter time"
    column="col-lg-1" required/><br/>
                        <x-admin.form-group label="title" value="{{ $quiz->title }}" class="mb-3" placeholder="Enter title"
                            column="col-lg-6" required/><br/>

                        </div><br>

                            {{-- <x-admin.submit-button :text="isset($quiz) ? 'Update':'Submit'" /> --}}

                </form>

                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-8">
                        <a href="{{ route('teacher.create_question',$quiz->id) }}" class="btn btn-success" id="">Add question</a>
                        <a href="{{ route('teacher.create_mcq',$quiz->id) }}" class="btn btn-success" id="">Add MCQ</a>

                        {{-- <button type="button" class="btn btn-success btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">MCQ</button>
                        <a href="{{ route('teacher.add_questions',$quiz->id) }}" class="btn btn-success btn-sm waves-effect waves-light" >Question {{ $quiz->id }}</a> --}}
                        {{-- {{ URL('/teacher/quiz/' . $quiz->id . '/create-question') }} --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end row -->
<!----End question---------->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Quesiton</h4>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                    </thead>


                    <tbody>
            @foreach ($questions as $key=>$question)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $question->question }}</td>
                <td>{{ $question->type }}</td>
                {{-- <td>{{ $question->user->email }}</td> --}}


                {{-- <td>{{ $question->created_at->format("M-h-D") }}</td> --}}
                <td>
                    <a href="#" class="btn btn-outline-success btn-sm" ><i class="fas fa-eye"></i></a>
                    <a href={{ route('teacher.question.destroy',$question->id)  }}" class="btn btn-outline-danger btn-sm" id="deleteBtn"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            @endforeach


                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


</div>
</div>


   <!----------Model MCQ-------->
   <td>
    <!-- Large modal -->
    <!--  Modal content for the above example -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Add Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">

                                    {{-- <h4 class="header-title">Add Quiz</h4> --}}
                                    {{-- <p class="card-title-desc"></p> --}}

                                    <form id="submit" action="{{ route('teacher.question.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">


                                            <x-admin.form-group label="question" class="mb-3" placeholder="Enter question"
                                                column="col-lg-10" required/><br/>
                                                <x-admin.form-group label="type" class="mb-3" :required="false" isType="select" class="select"
                                                column="col-lg-2" required>
                                                <option value="mcq">MCQ</option>
                                            </x-admin.form-group>
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
                                                                <x-admin.form-group label="title_a" class="" placeholder="Enter image title"
                                                                column="col-lg-10" />
                                                                <x-admin.form-group label="imageA" :required="false" type="file"
                                                                data-show-image="show_image"  column=""/>
                                                            </div>
                                                            </div>


                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <x-admin.form-group label="title_b" class="" placeholder="Enter image title"
                                                                    column="col-lg-10" />
                                                                    <x-admin.form-group label="imageB" :required="false" type="file"
                                                                    data-show-image="show_image"  column=""/>
                                                                </div>

                                                            </div>
                                                            <div class="col-lg-6">
                                                               <div class="mb-3">
                                                                <x-admin.form-group label="title_c" class="" placeholder="Enter image title"
                                                                column="col-lg-10" />
                                                                <x-admin.form-group label="imageC" :required="false" type="file"
                                                                data-show-image="show_image"  column=""/>
                                                               </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <x-admin.form-group label="title_d" class="" placeholder="Enter image title"
                                                                    column="col-lg-10" />
                                                                    <x-admin.form-group label="imageD" :required="false" type="file"
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



                    <input type="hidden" name="course" value="{{ $quiz->course_id }}">
                    <input type="hidden" name="quiz" value="{{ $quiz->id }}">

<br/>
                                                        <x-admin.form-group label="answer" class="mb-3" placeholder="Enter the answer"
                                                        column="col-lg-6"/><br/>
                                                        <x-admin.form-group label="mark" class="mb-3" placeholder="Enter the mark"
                                                        column="col-lg-6" required/><br/>





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
                    <!----End question---------->
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</td>
<!-------End Model---------->

   <!----------Model Short-Question-------->
   <td>
    <!-- Large modal -->
    <!--  Modal content for the above example -->
    <div class="modal fade bs-example-modal-sq" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Add Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">

                                    {{-- <h4 class="header-title">Add Quiz</h4> --}}
                                    {{-- <p class="card-title-desc"></p> --}}

                                    <form id="submit" action="{{ route('teacher.question.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">


                                            <x-admin.form-group label="question" class="mb-3" placeholder="Enter question"
                                                column="col-lg-10" required/><br/>
                                                <x-admin.form-group label="type" class="mb-3" :required="false" isType="select" class="select"
                                                column="col-lg-2" required>
                                                <option value="question">Question</option>
                                            </x-admin.form-group>

                                                    <x-admin.form-group label="image" :required="false" type="file"
                                                    data-show-image="show_image"    column="col-lg-6"/>


                    <input type="hidden" name="course" value="{{ $quiz->course_id }}">
                    {{-- <input type="text" name="classroom" value="{{ $quiz->classrooms }}"> --}}
                    <input type="hidden" name="quiz" value="{{ $quiz->id }}">


                                                        {{-- <x-admin.form-group label="answer" class="mb-3" placeholder="Enter the answer"
                                                        column="col-lg-6"/><br/> --}}
                                                        <x-admin.form-group label="mark" class="mb-3" placeholder="Enter the mark"
                                                        column="col-lg-6" required/><br/>

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
                    <!----End question---------->
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</td>
<!-------End Model Short-Question---------->


   <!----------Model graph-------->

<!-------End Model graph---------->
@endsection


