
@extends('layouts.administator.app')

@section('administator_content')

<x-admin.page-title  dashboard_title="Administator" title="Course" page_name="All Course">
    <a href="{{ route('administator.course.create') }}" class="btn btn-success" id="addBtn">Add course</a>

</x-admin.page-title>

<div class="container-fluid">
    <div class="page-content-wrapper">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title">Course</h4>
                        <p class="card-title-desc">
                        </p>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                        <th style="">No</th>
                                        <th style="">Subject</th>
                                        <th style="">Teacher</th>
                                        <th style="">Action</th>

                                </tr>
                            </thead>


                            <tbody>
                               @foreach ($courses as $course)
                               <thead>
                                    <td>{{ $course->id }}</td>
                                    <td>{{ $course->subject->name }}</td>
                                    <td>{{ $course->teacher->name }}</td>
                                    <td>
                    <a href="#" class="btn btn-outline-danger btn-sm" id="deleteBtn"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                               </thead>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
</div> <!-- container-fluid -->



@endsection

