@extends('layouts.administator.app')

@section('administator_content')
    <x-admin.page-title dashboard_title="Administator" title="Student" page_name="Show student">
        <a href="{{ route('admin.user.index') }}" class="btn btn-success">Students</a>
    </x-admin.page-title>
    <div class="container-fluid">

        <div class="page-content-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-4">
                                    <!---Card profile-image---->
                                    <div class="card">
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="mb-2">
                                                        <img class="img-thumbnail" alt="200x200"
                                                            src="{{ uploaded_file($user->image) }}"
                                                            data-holder-rendered="true">
                                                    </div>

                                                    <h4 class="header-title">Name : {{ $user->name }}</h4>
                                                    <p class="card-title-desc"><strong>Email : {{ $user->email }} </strong>

                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <!--End Card profile-image-->
                                </div>
                                <div class="col-xl-8">

                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="header-title">Student info</h4>

                                            <form id="submit" action="{{ route('administator.user.update',$user->id) }}" method="POST" class="custom-validation" enctype="multipart/form-data">
                                                @method('PUT')
                                                @csrf
                                               <div class="row">
                                                <x-admin.form-group label="name" class="mb-3" placeholder="Enter user name" :value="$user->name ?? ''"
                                                    column="col-lg-6" /><br/>
                                                <x-admin.form-group label="student_id" class="mb-3" readonly placeholder="Enter Student ID" :value="$user->student_id ?? ''"
                                                    column="col-lg-6" /><br/>
                                                    <x-admin.form-group label="gender" class="mb-3" :required="false" isType="select" class="select2"
                                                    column="col-lg-6">
                                                    <option value="{{ $user->gender ? $user->gender : '' }}">{{ $user->gender ? $user->gender : 'Select gender' }}</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </x-admin.form-group><br/>
                                                {{-- <x-admin.form-group label="dob" placeholder="Enter user Date of birth" :value="$user->dob ?? ''"
                                                    column="col-lg-6" /><br/> --}}

                                                        <x-admin.form-group  label="date" type="date" class="mb-3" placeholder="Enter user Date of birth" :value="$user->dob ?? ''"
                                                            column="col-lg-6" /><br/>
                                                    <x-admin.form-group label="phone" placeholder="Enter user phone" :value="$user->phone ?? ''"
                                                        column="col-lg-6" /><br/>

                                             <x-admin.form-group label="address" placeholder="Enter user address" :value="$user->address ?? ''"
                                            column="col-lg-6" /><br/>

                                               </div><br/>
                                               <x-admin.form-group label="class" class="mb-3" :required="false" isType="select" class="select2"
                                               column="col-lg-6">

                                              @foreach ($classes as $class)
                                              <option value="{{ $user->classroom_id ? $user->classroom_id : '' }}">{{ $user->classroom_id ? $user->classroom->title : 'Select gender' }}</option>
                                              <option value="{{ $class->id }}">{{ $class->title }}</option>
                                              @endforeach
                                           </x-admin.form-group><br/>
                                           <x-admin.form-group label="section" class="mb-3" :required="false" isType="select" class="select2"
                                           column="col-lg-6">

                                          @foreach ($sections as $section)
                                          <option value="{{ $user->section_id ? $user->section_id : '' }}">{{ $user->section_id ? $user->section->title : 'Select Section' }}</option>
                                          <option value="{{ $section->id }}">{{ $section->title }}</option>
                                          @endforeach
                                       </x-admin.form-group><br/>
                                           <x-admin.form-group label="active" class="mb-3" :required="false" isType="select" class="select2"
                                           column="col-lg-6">
                                           <option value="{{ $user->in_active ? $user->in_active : '' }}">{{ $user->in_active ? $user->in_active : 'Select gender' }}</option>

                                           <option value="active">Active</option>
                                           <option value="deactive">Inactive</option>

                                       </x-admin.form-group><br/>
                                               {{-- <x-admin.form-group label="image" for="image" class="mb-3" :required="false" type="file"
                                               data-show-image="show_user_image" accept="image/*" column="col-lg-6" /><br> --}}

                                                        <button type="submit"
                                                        class="btn btn-primary waves-effect waves-light me-1">
                                                        Update
                                                    </button>


                                            </form>
                                            <!-- end form -->
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>



                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
    <!-- end row -->
    </div>

    </div> <!-- container-fluid -->
@endsection
