@extends('layouts.administator.app')

@section('administator_content')
    <x-admin.page-title dashboard_title="Administator" title="Student" page_name="Show student">
        <a href="{{ route('administator.user.index') }}" class="btn btn-success">Students</a>
    </x-admin.page-title>
    <div class="container-fluid">

        <div class="page-content-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <!--Cardstart-->
                    <div class="card mb-4">
                        <div class="container">
                            <div class="main-body">

                                <div class="row gutters-sm mt-4">
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex flex-column align-items-center text-center">
                                                    <img src="{{ uploaded_file($user->image) }}" alt=""
                                                        class="rounded-circle img-thumbnail" width="150"
                                                        style="height:150px">
                                                    <div class="mt-3">
                                                        <h4> {{ $user->name }}</h4>
                                                        <p class="text-secondary mb-1"> {{ $user->email }}</p>
                                                        <p class="text-muted font-size-sm">
                                                            <div class="d-print-none mo-mt-2">
                                                                <div class="float-end">
                                                                    <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light">
                                                                        {{-- <i class="fa fa-print"></i> --}}
                                                                        Save or Print
                                                                    </a>
                                                                    {{-- <a href="#" class="btn btn-primary waves-effect waves-light ms-1">Send</a> --}}
                                                                </div>
                                                            </div>
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-8">

                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title">Student info</h4>

                                                <form id="submit" action="{{ route('administator.user.update', $user->id) }}"
                                                    method="POST" class="custom-validation" enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="row">
                                                        <x-admin.form-group label="name" class="mb-3"
                                                            placeholder="Enter user name" :value="$user->name ?? ''"
                                                            column="col-lg-6" /><br />
                                                        <x-admin.form-group label="student_id" class="mb-3" readonly
                                                            placeholder="Enter Student ID" :value="$user->student_id ?? ''"
                                                            column="col-lg-6" /><br />
                                                        <x-admin.form-group label="gender" class="mb-3" :required="false"
                                                            isType="select" class="select2" column="col-lg-6">
                                                            <option value="{{ $user->gender ? $user->gender : '' }}">
                                                                {{ $user->gender ? $user->gender : 'Select gender' }}</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                            <option value="Other">Other</option>
                                                        </x-admin.form-group><br />
                                                        {{-- <x-admin.form-group label="dob" placeholder="Enter user Date of birth" :value="$user->dob ?? ''"
                                                        column="col-lg-6" /><br/> --}}

                                                        <x-admin.form-group label="date" type="date" class="mb-3"
                                                            placeholder="Enter user Date of birth" :value="$user->dob ?? ''"
                                                            column="col-lg-6" /><br />
                                                        <x-admin.form-group label="phone" placeholder="Enter user phone"
                                                            :value="$user->phone ?? ''" column="col-lg-6" /><br />

                                                        <x-admin.form-group label="address" placeholder="Enter user address"
                                                            :value="$user->address ?? ''" column="col-lg-6" /><br />

                                                    </div><br />
                                                    <x-admin.form-group label="class" class="mb-3" :required="false"
                                                        isType="select" class="select2" column="col-lg-6">

                                                        @foreach ($classes as $class)
                                                            <option
                                                                value="{{ $user->classroom_id ? $user->classroom_id : '' }}">
                                                                {{ $user->classroom_id ? $user->classroom->title : 'Select Class' }}
                                                            </option>
                                                            <option value="{{ $class->id }}">{{ $class->title }}</option>
                                                        @endforeach
                                                    </x-admin.form-group><br />
                                                    <x-admin.form-group label="section" class="mb-3" :required="false"
                                                        isType="select" class="select2" column="col-lg-6">

                                                        @foreach ($sections as $section)
                                                            <option value="{{ $user->section_id ? $user->section_id : '' }}">
                                                                {{ $user->section_id ? $user->section->title : 'Select Section' }}
                                                            </option>
                                                            <option value="{{ $section->id }}">{{ $section->title }}</option>
                                                        @endforeach
                                                    </x-admin.form-group><br />
                                                    <x-admin.form-group label="active" class="mb-3" :required="false"
                                                        isType="select" class="select2" column="col-lg-6">
                                                        <option value="{{ $user->in_active ? $user->in_active : '' }}">
                                                            {{ $user->in_active ? $user->in_active : 'Select gender' }}
                                                        </option>

                                                        <option value="active">Active</option>
                                                        <option value="deactive">Deactive</option>

                                                    </x-admin.form-group><br />
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
                                <!-- end card -->
                            </div>
                        </div>
                        <!-- end row -->


                    </div>

                </div> <!-- container-fluid -->

                          <!---------Start Invoce------------->
                          <div class="container-fluid">
<br/>
                            <div class="page-content-wrapper">

                            @foreach ($payments as $key=>$payment)
                                @if($payment->user_id == $user->id)
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="invoice-title">
                                                        <h4 class="float-end font-size-16"><strong></strong></h4>
                                                        <h3 class=" p-3 text-white bg-success w-100">
                                                            Invoice {{ $key+1 }}
                                                            {{-- <img src="assets/images/logo-dark.png" alt="logo" height="18"/> --}}
                                                        </h3>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <address>
                                                                <strong>Billed To:</strong>
                                                                {{ $payment->user->name }}<br><br>
                                                                <strong>Email:</strong>
                                                                {{ $payment->user->email }}<br><br>
                                                                <strong>Class:</strong>
                                                                {{ $payment->classroom->title }}<br><br>
                                                                <strong>Course:</strong>
                                                                {{ $payment->course->title }}<br>

                                                                {{-- <strong>Subject:</strong>
                                                                {{ $payment->course->title }}<br><br> --}}
                                                                {{-- 1234 Main<br>
                                                                Apt. 4B<br>
                                                                Springfield, ST 54321 --}}
                                                            </address>
                                                        </div><!-- end col -->
                                                        <div class="col-6 text-end">
                                                            <address>
                                                                <strong>Shipped To:</strong><br>
                                                             {{ $setting->site_name }}<br><br>
                                                             <strong>Address:</strong><br>
                                                                1234 Main Apt. 4B<br>
                                                                Springfield, ST 54321<br><br>
                                                                <strong>Date:</strong><br>
                                                                {{ $payment->created_at->format('d M Y') }}<br>

                                                            </address>
                                                        </div><!-- end col -->
                                                    </div><!-- end row -->
                                                    <div class="row">
                                                        <div class="col-6 m-t-30">
                                                            {{-- <address>
                                                                <strong>Payment Method:</strong><br>
                                                                Visa ending **** 4242<br>
                                                                RClemons@email.com
                                                            </address> --}}
                                                        </div><!-- end col -->
                                                        <div class="col-6 m-t-30 text-end">
                                                            <address>

                                                            </address>
                                                        </div><!-- end col -->
                                                    </div><!-- end row -->


                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="panel panel-default bg-light">
                                                        <div class="p-2">
                                                            <h3 class="panel-title font-size-20"><strong>Summary</strong></h3>
                                                        </div>
                                                        <div>
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <td><strong>Class Name</strong></td>
                                                                            <td><strong>Course Name</strong></td>
                                                                            <td class="text-center"><strong>Price</strong></td>
                                                                            {{-- <td class="text-center"><strong>Quantity</strong> --}}
                                                                            </td>
                                                                            <td class="text-end"><strong>Total</strong></td>
                                                                        </tr>
                                                                    </thead>
                                                                    <!-- end thead -->
                                                                    <tbody>
                                                                    <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                                    <tr>
                                                                        <td>{{ $payment->classroom->title }}</td>
                                                                        <td>{{ $payment->course->title }}</td>
                                                                        <td class="text-center">${{ $payment->amount }}</td>
                                                                        {{-- <td class="text-center">1</td> --}}
                                                                        <td class="text-end">${{ $payment->amount }}</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td class="thick-line"></td>
                                                                        <td class="thick-line"></td>
                                                                        {{-- <td class="thick-line text-center">
                                                                            <strong>Subtotal</strong></td>
                                                                        <td class="thick-line text-end">${{ $payment->amount }}</td>
                                                                    </tr> --}}
                                                                    <tr>
                                                                        <td class="no-line"></td>
                                                                        <td class="no-line"></td>
                                                                        {{-- <td class="no-line text-center">
                                                                            <strong>Shipping</strong></td>
                                                                        <td class="no-line text-end">$15</td>
                                                                    </tr> --}}
                                                                    <tr>
                                                                        <td class="no-line"></td>
                                                                        <td class="no-line"></td>
                                                                        <td class="no-line text-center">
                                                                            <strong>Total</strong></td>
                                                                        <td class="no-line text-end"><h4 class="m-0">${{ $payment->amount }}</h4></td>
                                                                    </tr>
                                                                    </tbody><!-- end tbody -->
                                                                </table><!-- end table -->
                                                            </div>

                                                       <!---Save Option-------->
                                                        </div>
                                                    </div>

                                                </div>
                                            </div> <!-- end row -->

                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                            @endif
                            @endforeach
                        </div>
                    </div>

                        <!--------End Invoice------------>
            @endsection
