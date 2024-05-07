@extends('layouts.student.app')
@section('student_content')
    <!-- end page title -->
    <x-admin.page-title dashboard_title="Student" title="Student" page_name="certificate">
        {{-- <a href="#" class="btn btn-success" >Add message</a> --}}
    </x-admin.page-title>
    <div class="container-fluid">

        <div class="page-content-wrapper">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title">certificate</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Class</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                @foreach ($certificates as $key=>$certificate)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $certificate->title }}</td>
                    <td>{{ $certificate->user->email }}</td>


                    <td>{{ $certificate->created_at->format("M-h-D") }}</td>
                    <td>
                        <a href="{{ route('certificate.show',$certificate->id)  }}" class="btn btn-outline-success btn-sm" ><i class="fas fa-eye"></i></a>
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

