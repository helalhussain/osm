@extends('layouts.admin.app')

@section('admin_content')
    <x-admin.page-title dashboard_title="Admin" title="Student" page_name="Show student">
        <a href="{{ route('admin.user.index') }}" class="btn btn-success">All Students</a>
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

                                    <div class="col-md-8">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Full Name</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{  $user->name }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Student ID</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{  $user->student_id }}
                                                    </div>
                                                </div>

                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Gender</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $user->gender }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Phone</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $user->phone }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Date of birth</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $user->dob }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Address</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $user->address }}
                                                    </div>
                                                </div>
                                                <br/>
                                                <br/>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        {{-- <a class="btn btn-info" href="{{ route('profile.password') }}">Edit password</a> --}}
                                                    </div>
                                                </div>
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
