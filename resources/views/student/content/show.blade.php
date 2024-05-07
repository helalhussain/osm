@extends('layouts.student.app')
@section('student_content')
    <!-- end page title -->
    <x-admin.page-title dashboard_title="Student" title="Student" page_name="Conetet">
        {{-- <a href="#" class="btn btn-success" >Add message</a> --}}
    </x-admin.page-title>

    <div class="container-fluid">

        <div class="page-content-wrapper">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                            <!--------->
                            <div class="timeline-box border p-4 my-2 rounded bg-light p-4 my-3">

                            <div class="media ">
                                <div class="media-body">
                                    <h3 class="font-size-18 ">
                                        {{-- @if($notice->user_type =='teacher')
                                            Teacher <span class="float-sm-right font-size-12">{{ $notice->created_at->format("M-d") }}</span>
                                        @else
                                            Administator <span class="float-sm-right font-size-12">{{ $notice->created_at->format("M-d") }}</span>
                                        @endif --}}
                                    </h3>
                                    <h4 class="font-size-17 mb-0">
                                        {{ $content->title }}
                                    </h4>
                                    <p class="text-muted mb-2">
                                        {{ $content->description }}
                                    </p>
                                    @if($content->file != "")
                                        <div class="row pt-1">
                                            <div class="col-xl-6 col-6">
                                                <div class="cards"><hr />
                                                    <p class="email-attachment-title mb-2">File</p>
                                                    <div class="cursor-pointer">
                                                        <i class="ti ti-file"></i>
                                                        <a
                                                            href="{{ uploaded_file($content->file) }}"
                                                            download
                                                            class="align-middle ms-1"
                                                        >
                                                            {{ $content->file }}
                                                        </a>
                                                    </div>
                                                    {{-- <img class="card-img-top img-fluid" src="{{ uploaded_file($content->image) }}" alt="Card image cap"> --}}
                                                    </span>
                                                    <div class="py-2 text-center"></div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <ul class="list-inline product-review-link mb-0">
                                        <li class="list-inline-item">
                                            <a href="{{ route('dashboard') }}" class="btn btn-dark btn-sm">Back</a>
                                        </li>

                                    </ul>
                                </div>

                            </div>
                        </div>

                            <!----->
                        </div>
                    </div>
                </div>


            </div>

        </div>


    </div> <!-- container-fluid -->

    </div>
    <!-- End Page-content -->
@endsection
