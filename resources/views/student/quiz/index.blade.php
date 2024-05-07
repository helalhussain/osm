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
                            <th>Class</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                @foreach ($quizzes as $key=>$quiz)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $quiz->title }}</td>
                    <td>{{ $quiz->classroom->title }}</td>


                    <td>{{ $quiz->created_at->format("M-h-D") }}</td>
                    <td>
                        <a href="{{ $quiz->quiz }}" class="btn btn-outline-success btn-sm" ><i class="fas fa-eye"></i></a>
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

