@extends('layouts.student.app')
@section('student_content')
    <!-- end page title -->
    <x-admin.page-title dashboard_title="Student" title="Student" page_name="Notice">
        {{-- <a href="#" class="btn btn-success" >Add message</a> --}}
    </x-admin.page-title>

    <div class="container-fluid">

        <div class="page-content-wrapper">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- <h4 class="header-title pb-2">{{ $course->subject->name }}</h4> --}}

                            <!------------>
                            @foreach ($notices as $notice)
                            <div class="timeline-box border p-4 my-2 rounded bg-light p-4 my-3">

                                <div class="media">

                                    <div class="timeline-icon">
                                        {{-- <i class="ti-home h4 text-primary"></i> --}}
                                        {{-- <img src="" class="rounded-circle ti-home h4" style="width:45px;height:45px; border:1px solid rgb(121, 120, 120)"
                                        style="width:40px" alt=""> --}}
                                    </div>
                                    <div class="media-body ps-3">

                                        <div class="timeline-text">
                                            {{-- <h3 class="font-size-18 ">{{ $notice->title }}</h3> --}}
                                            <h4 class="font-size-16 mb-0">{{ $notice->title }}</h4>
                                            <p class="mb-0 mt-0 text-muted">{{ $notice->description }}</p>
                                        </div>

                                        @if($notice->file!="")
                                        <div class="row pt-2">
                                            <div class="col-xl-6 col-6">
                                                <div class="cards">document
                                                    {{-- <img class="card-img-top img-fluid" src="{{ uploaded_file($notice->image) }}" alt="Card image cap"> --}}
                                                    <span class="text-dark">{{ $notice->file }} <a href="{{ route('file.download',$notice->file) }}" class="font-weight-medium">Download</a>
                                                    </span>
                                                    <div class="py-2 text-center">
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>




                            </div>
                            @endforeach
                            <!--------->
                        </div>
                    </div>
                </div>


            </div>

        </div>


    </div> <!-- container-fluid -->

    </div>
    <!-- End Page-content -->
@endsection
