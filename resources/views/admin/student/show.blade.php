@extends('layouts.admin.app')

@section('admin_content')
    <x-admin.page-title dashboard_title="Admin" title="Student" page_name="Show student">
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



                                            <form id="submit" action="{{ route('admin.user.update',$user->id) }}" method="POST" class="custom-validation" enctype="multipart/form-data">
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
                                               <x-admin.form-group label="image" for="image" class="mb-3" :required="false" type="file"
                                               data-show-image="show_user_image" accept="image/*" column="col-lg-6" /><br>

                                               <x-admin.form-group label="in_active" class="mb-3" :required="false" isType="select" class="select2"
                                               column="col-lg-6">
                                               <option value="{{ $user->in_active ? $user->in_active : '' }}">{{ $user->in_active ? $user->in_active : 'Select' }}</option>
                                               <option value="active">Active</option>
                                               <option value="deactive">Deactive</option>
                                           </x-admin.form-group><br/>
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
