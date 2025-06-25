<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

@extends('layouts.student.app')
@section('student_content')
    <!-- end page title -->
    <x-admin.page-title dashboard_title="Student" title="Dashboard" page_name="Course">
        {{-- <a href="{{route('profile.edit')}}" class="btn btn-success"  id="editBtn">Edit profile</a> --}}
    </x-admin.page-title>
    <div class="container-fluid">

        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="container">
                            <div class="main-body">



                                <div class="row gutters-sm mt-4">
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <br>

                                                <div class="d-flex flex-column align-items-center text-center">
                                                    <img src="{{ uploaded_file(auth()->user()->image) }}" alt=""
                                                        class="rounded-circle img-thumbnail" width="150"
                                                        style="height:150px">
                                                    <div class="mt-3">
                                                        <h4> {{ auth()->user()->name }}</h4>
                                                        <p class="text-secondary mb-1"> {{ auth()->user()->email }}</p>
                                                        <p class="text-muted font-size-sm">

                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-8">
                                    <!---start card------->

                                    <form action="{{ route('payment') }}" method="post">
                                        @csrf

                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Classroom</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">

zz
                                                        <!-----StartClssroom field---------->
                                                        <div class="mb-3">
                                                            <label for="classroom">Select class</label>
                                                            <select name="classroom" id="classroom"
                                                                class="form-control @error('classroom') is-invalid @enderror"
                                                                type="select" required>
                                                                <option value="">Select Class</option>
                                                                @foreach ($classrooms as $classroom)
                                                                    <option value="{{ $classroom->id }}">
                                                                        {{ $classroom->title }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('classroom')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <!-----End Clssroom field---------->

                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Course</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <!-----StartClssroom field---------->
                                                        <div class="mb-3">
                                                            <label for="course">Select Course</label>
                                                            <select name="course" id="course"
                                                                class="form-control @error('course') is-invalid @enderror"
                                                                type="select" required>
                                                                <option value="">Select Course</option>

                                                            </select>
                                                            @error('course')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>


                                                        {{-- <div class="mb-3">
                                                            <label for="subject">Select Subject</label>
                                                            <select name="subject" id="subject"
                                                                class="form-control @error('subject') is-invalid @enderror"
                                                                type="select" required>
                                                                <option value="">Select subject</option>

                                                            </select>
                                                            @error('subject')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div> --}}


                                        <!---Tab----->

                                        <div id="total_fee" class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> --}}

                                            {{-- </button> --}}
                                            <strong>Total Fee $ 220 </strong> <input type="hidden" value="100" name="fee">
                                        </div>
                                        <!------End tab------->
                                                        <!-----End Clssroom field---------->
                                                        <button type="submit" class="btn btn-primary">BUY COURSE</button>
                                                    </div>
                                                </div>




                                            </div>
                                        </div>

                                    </form>
                                    <!------End card---------->


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---Continer-fluied---->

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
                <script src="https://code.jquery.com/jquery-3.7.0.min.js"
                    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
                <script>
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                </script>
                <script>
                    $(document).ready(function() {

                        $('#classroom').on('change', function(e) {
                            // e.preventDefault();
                            var title = $(this).val();

                            $.ajax({
                                url: "{{ route('course.index') }}",
                                type: 'GET',
                                data: {
                                    'title': title
                                },
                                success: function(data) {
                                    // console.log(students);
                                    var courses = data.courses;
                                    var html = '';
                                    if (courses.length > 0) {
                                        for (let i = 0; i < courses.length; i++) {
                                            html += '<option value='+ courses[i]['id']+'> \
                                                ' + courses[i]['title'] + '\
                                                </option>';
                                            // $("#course").append('<option value="' + value[
                                            //             "branchname"] + '">' + value["branchname "] +
                                            //         '</option>');
                                            // html +='<tr> \
                                            //     <td>'+courses[i]['id']+'</td>\
                                            //     <td>'+courses[i]['title']+'</td>\
                                            //     </tr>';
                                        }
                                    } else {
                                        html += '<td>Not Course</td>';
                                    }
                                    $("#course").html(html);
                                }
                            });

                        });

     ////////////////////////////////////////////////////////

     $('#course').on('change', function(e) {
                            // e.preventDefault();
                            var course_title = $(this).val();

                            // $.ajax({
                            //     url: "{{ route('course.index') }}",
                            //     type: 'GET',
                            //     data: {
                            //         'title': title
                            //     },
                            //     success: function(data) {
                            //         // console.log(students);
                            //         var subjects = data.subjects;
                            //         var html = '';
                            //         if (subjects.length > 0) {
                            //             for (let i = 0; i < subjects.length; i++) {
                            //                 html += '<option value='+ subjects[i]['id']+'> \
                            //                     ' + subjects[i]['title'] + '\
                            //                     </option>';

                            //             }
                            //         } else {
                            //             subj += '<td>Not Subject</td>';
                            //         }
                            //         $("#subject").html(subj);
                            //     }
                            // });

                        });

                    });
                </script>
            @endsection
