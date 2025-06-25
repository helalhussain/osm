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
           <!---Row star--->
           <div class="row">
            <div class="col-xl-3 col-lg-4">



                   <div class="card">

                    <div class="card-body">

                        {{-- <h4 class="header-title">My Course</h4> --}}

                        <div class=" p-3 rounded mt-4">

                            {{-- <h5 class="font-size-16">Search</h5> --}}



                        </div>


                                {{-- <div class="border p-3 rounded mt-4">
                                    <h5 class="font-size-16 mb-0 custom-accordion"><a href="#collapseExample3" class="text-dark d-block" data-bs-toggle="collapse">Customer Rating <i class="mdi mdi-minus float-end accor-plus-icon"></i></a></h5>

                                    <div class="collapse show" id="collapseExample3">

                                        <div class="mt-4">
                                            <div class="form-check mt-2">
                                                <input type="radio" id="productratingRadio5" name="productratingRadio1" class="form-check-input">
                                                <label class="custom-control-label" for="productratingRadio5">5 <i class="mdi mdi-star text-warning"></i>  & Above</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input type="radio" id="productratingRadio1" name="productratingRadio1" class="form-check-input">
                                                <label class="custom-control-label" for="productratingRadio1">4 <i class="mdi mdi-star text-warning"></i>  & Above</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input type="radio" id="productratingRadio2" name="productratingRadio1" class="form-check-input">
                                                <label class="custom-control-label" for="productratingRadio2">3 <i class="mdi mdi-star text-warning"></i>  & Above</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input type="radio" id="productratingRadio3" name="productratingRadio1" class="form-check-input">
                                                <label class="custom-control-label" for="productratingRadio3">2 <i class="mdi mdi-star text-warning"></i>  & Above</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input type="radio" id="productratingRadio4" name="productratingRadio1" class="form-check-input">
                                                <label class="custom-control-label" for="productratingRadio4">1 <i class="mdi mdi-star text-warning"></i></label>
                                            </div>
                                        </div>

                                    </div>
                                </div> --}}
                            </div>
                    </div>
                </div>


                <div class="col-lg-9">
                            <div class="row">

             @foreach ($courses as $course)
            <!-----Col Start----------->

                            <div class="col-xl-4 col-sm-6">
                                <form action="" method="post">
                                    @csrf
                                <div class="card">
                                   <div class="card-body">
                                    <input type="hidden" value="{{ $course->fee }}" name="fee">
                                    <input type="hidden" value="{{ $course->id }}" name="course_id">
                                    <input type="hidden" value="{{ $course->title }}" name="course">
                                    <input type="hidden" value="{{ $course->section->id }}" name="section_id">
                                    <input type="hidden" value="{{ $course->classroom->id }}" name="classroom_id">
                                    <input type="hidden" value="{{ $course->classroom->title }}" name="classroom">
                                    <div class="product-img">
                                        {{-- <div class="product-ribbon  bg-primary">
                                            25% Off
                                        </div> --}}

                                        {{-- <img src="assets/images/product/img-7.png" alt="" class="img-fluid mx-auto d-block"> --}}
                                    </div>

                                    <div class="text-cente">

                                        <a href="" class="text-dark">
                                            <h5 class="font-size-18">{{ $course->title }}</h5>
                                        </a>
                                        <div class="mt-2">
                                            <strong>Class :</strong>   {{ $course->classroom->title }}</p>
                                        </div>
                                        <div class="mt-2">
                                            <strong>Section :</strong>   {{ $course->section->title }}</p>
                                        </div>
                                        <div class="mt-2">
                                         <strong>Subject :</strong>   {{ $course->subjects->pluck('name')->implode(', ') }}</p>
                                        </div>

                                        <h4 class="mt-2">${{ $course->fee }}<span class="font-size-14 text-muted me-2">
                                            {{-- <del>$240</del> --}}
                                        </span></h4>

                                        <div class="mt-2">
                                            {{-- <button type="submit" class="btn btn-success">Purches now</button> --}}
                                        </div>

                                    </div>
                                   </div>
                                </div>
                            </form>
                            </div>

                         <!-------Col ENd-------->
             @endforeach

                </div>

             </div>

        </div>
        <!-- end row -->
                <!---Continer-fluied---->

            @endsection
