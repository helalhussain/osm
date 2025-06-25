

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

                <h4 class="header-title">Add Quiz</h4>
                <p class="card-title-desc"></p>

                <form id="submit" action="{{ route('teacher.quiz.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <x-admin.form-group label="class" :required="false" isType="select"  class="select2"  column="col-lg-6" required>
                            <option value="{{ $quiz->classroom_id ?? '' }}">{{ $quiz->classroom->title ?? 'Select Class' }}</option>
                                        @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->title }}</option>
                                        @endforeach
                        </x-admin.form-group><br>
                        <x-admin.form-group label="course" :required="false" isType="select"  class="select2"  column="col-lg-6" required>
                            <option value="">Select Course</option>
                                        @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                                        @endforeach
                        </x-admin.form-group><br>
                        {{-- <x-admin.form-group label="subject" :required="false" isType="select"  class="select2"  column="col-lg-3" required>
                            <option value="">Select Subect</option>
                                        @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                        </x-admin.form-group><br> --}}
<br>
                        <x-admin.form-group label="title" class="mb-3" placeholder="Enter title"
                            column="col-lg-12" required/><br/>

                        </div><br>

                            <x-admin.submit-button :text="isset($quiz) ? 'Update':'Submit'" />

                </form>

                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-8">
                        <button type="button" class="btn btn-success btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Add MCQ</button>
                        <button class="btn btn-success">Add MCQ</button>
                        <button class="btn btn-success">Add MCQ</button>
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
                    <a href="" class="btn btn-outline-success btn-sm" ><i class="fas fa-eye"></i></a>
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
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Large modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="header-title">Add Quiz</h4>
                                    <p class="card-title-desc"></p>

                                    <form id="submit" action="{{ route('teacher.question.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">


                                            <x-admin.form-group label="question" class="mb-3" placeholder="Enter question"
                                                column="col-lg-10" required/><br/>
                                                <x-admin.form-group label="type" class="mb-3" :required="false" isType="select" class="select"
                                                column="col-lg-2" required>
                                                <option value="">Select type</option>
                                                <option value="mcq">MCQ</option>
                                                {{-- <option value="question">Question</option> --}}
                                            </x-admin.form-group>
                    <input type="text" name="classroom" value="{{ $quiz->classroom_id }}">
                    <input type="text" name="quiz" value="{{ $quiz->id }}">

                                                <x-admin.form-group label="a" class="mb-3" placeholder="Enter teacher address"
                                                    column="col-lg-6"/><br/>
                                                <x-admin.form-group label="b" class="mb-3" placeholder="Enter teacher address"
                                                    column="col-lg-6" /><br/>
                                                <x-admin.form-group label="c" class="mb-3" placeholder="Enter teacher address"
                                                    column="col-lg-6" /><br/>

                                                    <x-admin.form-group label="d" class="mb-3" placeholder="Enter teacher address"
                                                        column="col-lg-6"/><br/>

                                                        {{-- <x-admin.form-group label="ans" class="mb-3" :required="false" isType="select" class="select2"
                                                        column="col-lg-6" required>
                                                        <option value="">Select Answer</option>
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="D">D</option>
                                                    </x-admin.form-group> --}}


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
@endsection


