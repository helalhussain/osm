@extends('layouts.student.app')
@section('student_content')
    <!-- end page title -->
    <x-admin.page-title dashboard_title="Student" title="Student" page_name="Dashboard">
        {{-- <a href="#" class="btn btn-success" >Add message</a> --}}
    </x-admin.page-title>
    {{-- @foreach ($courses as $course)
    @if($course->classroom_id == auth()->user()->classroom_id && $course->section_id == auth()->user()->section_id)
    {{ $course->subjects->pluck('name')->implode(', ') }}
  @endif
    @endforeach --}}
    <div class="container-fluid">

        <div class="page-content-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <h3 class=" py-2">My class</h3>
                            <div class="row">

                                <div class="col-lg-4 col-lg-4 col-md-6 col-12">
                                    <div class="border p-4 my-2 rounded bg-light">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted mb-2">Digital signal</p>
                                                <h5 class="font-size-15 mb-3">James Alax</h5>

                                                <ul class="list-inline product-review-link mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="#" class="btn btn-primary btn-sm text-white">Join
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <p class="float-sm-right font-size-12">11:00 AM, 13 Feb</p>
                                        </div>


                                    </div>
                                </div>

                                <div class="col-lg-4 col-lg-4 col-md-6 col-12">
                                    <div class="border p-4 my-2 rounded bg-light">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted mb-2">Digital signal</p>
                                                <h5 class="font-size-15 mb-3">James Alax</h5>

                                                <ul class="list-inline product-review-link mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="#" class="btn btn-primary btn-sm text-white">Join
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <p class="float-sm-right font-size-12">02:30 AM, 21 Feb</p>
                                        </div>


                                    </div>
                                </div>

                                <div class="col-lg-4 col-lg-4 col-md-6 col-12">
                                    <div class="border p-4  rounded bg-light">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted mb-2">Netwarking</p>
                                                <h5 class="font-size-15 mb-3">Jeo max</h5>

                                                <ul class="list-inline product-review-link mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="#" class="btn btn-primary btn-sm text-white">Join
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <p class="float-sm-right font-size-12">10:00 AM, 11 Feb</p>
                                        </div>


                                    </div>
                                </div>

                            </div>
                            <h3 class="  pt-5">All Notices</h3>
                            <div class="row">
                                @foreach ($notices as $notice)
                                    <div class="col-lg-4 col-lg-4 col-md-6 col-12">
                                        <div class="border p-4 my-2 rounded bg-light">
                                            <div class="media">
                                                <div class="media-body">
                                                    <p class="text-muted mb-2">{{ $notice->title }}</p>
                                                    {{-- <h5 class="font-size-15 mb-3">Administator</h5> --}}
                                                    <a href="{{ route('notice.show', $notice->id) }}"
                                                        class="btn btn-dark btn-sm text-white">View </a>
                                                    {{-- <ul class="list-inline product-review-link mb-0">
                                            <li class="list-inline-item">
                                                <a href="#" class="fw-bold">View</a>
                                            </li>

                                        </ul> --}}
                                                </div>
                                                <p class="float-sm-right font-size-12">
                                                    {{ $notice->created_at->format('M-d') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{-- <h3 class="  pt-5">All Courses</h3>
                            <div class="row">
                                @foreach ($courses as $course)
                                    <div class="col-lg-4 col-lg-4 col-md-6 col-12">
                                        <div class="cards my-2 rounded bg-light border bg-light">
                                            <div class="card-body">
                                                <div class="p-1">
                                                    <div class="inbox-list-item">
                                                        <a href="#">
                                                            <div class="media">
                                                                <div class="me-3 align-self-center">
                                                                    <div class="avatar-sm rounded-circle align-self-center">

                                                                        <i class="ti-facebook text-white font-size-18"></i>
                                                                        <img src="{{ asset('images/defult/user.png') }}"  class="font-size-18 w-100" alt="">
                                                                        <img src="{{ uploaded_file($course->teacher->image) }}"
                                                                            class="rounded-circle"
                                                                            style="width:45px;height:45px; border:1px solid rgb(121, 120, 120)"
                                                                            alt="">

                                                                    </div>
                                                                </div>
                                                                <div class="media-body overflow-hidden mt-1">
                                                                    <h5 class="font-size-15 mb-1">
                                                                        {{ $course->teacher->name }}</h5>
                                                                        <p class="text-muted mb-0">{{ $course->subject->name }}
                                                                        </p>
                                                                </div>


                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                    <a> </a>
                                                                </div>
                                                                <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                                                                    <a href="#"
                                                                        class="btn btn-primary btn-sm waves-effect waves-light">
                                                                        View</a>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div> --}}

                            <br>

                            <h3 class="  pt-5">All </h3>
                            <!---Row-->
                            <div class="row">
                                 <div class="col-lg-4 col-lg-4 col-md-6 col-12">
                                        <div class="border p-4 my-2 rounded bg-light">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h4 class="text-muted mb-2">Result</h4>

                                                </div>
                                                <a href="{{ route('result.index') }}"
                                                class="btn btn-dark btn-sm text-white">View </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-lg-4 col-md-6 col-12">
                                        <div class="border p-4 my-2 rounded bg-light">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h4 class="text-muted mb-2">Content</h4>

                                                </div>
                                                <a href="{{ route('content.index') }}"
                                                class="btn btn-dark btn-sm text-white">View </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-lg-4 col-md-6 col-12">
                                        <div class="border p-4 my-2 rounded bg-light">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h4 class="text-muted mb-2">Quiz</h4>

                                                </div>
                                                <a href="{{ route('quiz.index') }}"
                                                class="btn btn-dark btn-sm text-white">View </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-lg-4 col-md-6 col-12">
                                        <div class="border p-4 my-2 rounded bg-light">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h4 class="text-muted mb-2">Sertificate</h4>

                                                </div>
                                                <a href="{{ route('certificate.index') }}"
                                                class="btn btn-dark btn-sm text-white">View </a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <!---End row--->

                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div> <!-- container-fluid -->

    </div>
    <!-- End Page-content -->
@endsection
