@extends('layouts.student.app')
@section('student_content')
    <!-- end page title -->
    <x-admin.page-title dashboard_title="Student" title="Student" page_name="Quiz">
        {{-- <a href="#" class="btn btn-success" >Add message</a> --}}
    </x-admin.page-title>
    <div class="container-fluid">

        <div class="page-content-wrapper">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title">Quiz</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>

                            <th>Time(minute)</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                @foreach ($quizzes as $key=>$quiz)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $quiz->title }}</td>
                    <td>{{ $quiz->minute }} Minutes</td>
                    <td>
                        <a href="{{ route('quiz.show',$quiz->id) }}" class="btn btn-outline-success btn-sm" >
                            {{-- <i class="fas fa-eye"></i> --}}
                            Open quiz
                        </a>
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
@endsection

