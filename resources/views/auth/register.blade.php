{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<!doctype html>
<html lang="en">

<head>


    <meta charset="utf-8" />
    <title>Login page | Morvin - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{ asset('admin') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('admin') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('admin') }}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


</head>

<style>
    .bs-stepper .bs-stepper-content {
        padding: 1.5rem 1.5rem;
    }

    .mx-auto {
        margin-right: auto !important;
        margin-left: auto !important;
    }

    .w-px-700 {
        width: 700px !important;
    }

    .light-style .bs-stepper:not(.wizard-modern) {
        box-shadow: 0 0.25rem 1.125rem rgba(75, 70, 92, 0.1);
    }

    .light-style .bs-stepper {
        background-color: #fff;
    }

    .shadow-none {
        box-shadow: none !important;
    }

    .light-style .bs-stepper .bs-stepper-header {
        border-bottom: 1px solid #dbdade;
    }

    /* @media (max-width: 991.98px)
.bs-stepper .bs-stepper-header {
    flex-direction: column;
    align-items: flex-start;
} */
    .bs-stepper .bs-stepper-header {
        padding: 1.5rem 1.5rem;
    }

    .border-bottom-0 {
        border-bottom: 0 !important;
    }

    /* @media (max-width: 520px)
.bs-stepper-header {
    margin: 0;
}
@media (max-width: 520px)
.bs-stepper-header {
    margin: 0 -10px;
    text-align: center;
} */
    form {
        display: block;
        margin-top: 0em;
    }

    .bs-stepper-header {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
    }

    .bs-stepper {
        border-radius: 0.375rem;
    }

    .custom-option {
        padding-left: 0;
        border: 1px solid #dbdade;
        border-radius: 0.375rem;
    }



    .form-check {
        display: block;
        min-height: 1.378125rem;
        padding-left: 1.7em;
        margin-bottom: 0.125rem;
    }

    .custom-option-icon .custom-option-content {
        text-align: center;
        padding: 1.07em;
    }

    .custom-option .custom-option-content {
        cursor: pointer;
        width: 100%;
    }

    label {
        display: inline-block;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    .custom-option-icon .custom-option-body {
        display: block;
        margin-bottom: 0.5rem;
    }

    .justify-content-center {
        justify-content: center !important;
    }

    .d-flex {
        display: flex !important;
    }
</style>

<body class="authentication-bg bg-dark">
    <div class="home-center">
        <div class="home-desc-center">

            <div class="container mt-5">

                <div class="home-btn">
                    {{-- <a href="/" class="text-white router-link-active"><i
                            class="fas fa-home h2"></i></a> --}}
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-8 col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="px-2 py-3">


                                    <div class="text-center">
                                        <a href="index.html">
                                            <img src="{{ uploaded_file($logoIcon->logo) }}" height="45"
                                                alt="logo">
                                        </a>

                                        <h3 class="text-primary mb-2 mt-4 fw-bold">Student Register</h3>
                                        <p class="text-muted"></p>
                                    </div>

                                    <form class="form-horizontal mt-4 pt-2" action="{{ route('register') }}"
                                        method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="username">Name</label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid

                @enderror"
                                                        name="name" value="{{ old('name') }}" id="username"
                                                        placeholder="Enter name" required>
                                                    @error('name')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="username">Email</label>
                                                    <input type="text"
                                                        class="form-control @error('email') is-invalid

                @enderror"
                                                        name="email" value="{{ old('email') }}" id="username"
                                                        placeholder="Enter email" required>
                                                    @error('email')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="studentId">Student ID</label>
                                                    <input type="text" name="studentId" id="studentId"
                                                        class="form-control @error('studentId')
                    is-invalid
                @enderror"
                                                        placeholder="Student ID" required>
                                                    @error('studentId')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="class">Select class</label>
                                                    <select name="class" id="class"
                                                        class="form-control @error('class')
    is-invalid
@enderror"
                                                        type="select" required>
                                                        {{-- <option value="{{ $classes->classroom_id ?? '' }}">{{ $course->classroom->title ?? 'Select Class' }}</option> --}}
                                                        <option value="">Select Class</option>
                                                        @foreach ($classes as $class)
                                                            <option value="{{ $class->id }}">{{ $class->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('class')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="userpassword">Password</label>
                                                    <input type="password"
                                                        class="form-control @error('password')
                    is-invalid
                @enderror"
                                                        name="password" id="userpassword" placeholder="Enter password" required>
                                                    @error('password')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="password_confirmation">Confirm Password</label>
                                                    <input type="password"
                                                        class="form-control @error('password_confirmation')
                    is-invalid
                @enderror"
                                                        name="password_confirmation" id="password_confirmation"
                                                        placeholder="Enter confirm password" required>
                                                    @error('cpassword_confirmation')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!-----Payment------>
                                        {{-- <div class="row">
        <div id="billingLinksValidation" class="content">
            <div class="content-header">
              <h3 class="mb-1">Select Plan</h3>
              <p>Select plan as per your requirement</p>
            </div>

            <div class="row gap-md-0 gap-3 my-4">
                <div class="col-md">
                    <div class="form-check custom-option custom-option-icon">
                      <label class="form-check-label custom-option-content" for="enterpriseOption">
                        <span class="custom-option-body">
                          <span class="custom-option-title fs-4 mb-1">Enterprise</span><br>
                          <small class="fs-6">Solution for enterprise & organizations</small>
                          <span class="d-flex justify-content-center">
                            <sup class="text-primary fs-6 lh-1 mt-3">{{ $logoIcon->currency_symbol }}</sup>
                            <span class="fw-semibold fs-2 text-primary">{{ $logoIcon->tution_fee }}</span>
                            <sub class="lh-1 fs-6 mt-auto mb-2 text-muted">/year</sub>
                          </span>
                        </span>
                        <input
                          name="customRadioIcon"
                          class="form-check-input"
                          type="radio"
                          value="prem" checked
                          id="enterpriseOption" name="option"
                        />
                      </label>
                    </div>
                  </div>
              <div class="col-md">
                <div class="form-check custom-option custom-option-icon">
                  <label class="form-check-label custom-option-content" for="basicOption">
                    <span class="custom-option-body">
                      <span class="custom-option-title fs-4 mb-1">Basic</span><br>
                      <small class="fs-6">A simple start for start ups & Students</small>
                      <span class="d-flex justify-content-center">
                        <sup class="text-primary fs-6 lh-1 mt-3">$</sup>
                        <span class="fw-semibold fs-2 text-primary">0</span>
                        <sub class="lh-1 fs-6 mt-auto mb-2 text-muted">/month</sub>
                      </span>
                    </span>
                    <input
                      name="customRadioIcon"
                      class="form-check-input"
                      type="radio"
                      value="free"
                      id="basicOption" name="option"
                    />
                  </label>

                </div>

              </div>


            </div>



          </div>
       </div> --}}
                                        <!---end payment--->





                                        <div>
                                            <button class="btn btn-primary waves-effect waves-light"
                                                type="submit">Register</button>
                                                {{-- <a href="{{ route('stripe.checkout') }}" lass="btn btn-success">Checkout</a> --}}
                                        </div>




                                    </form>

                                </div>
                            </div>
                        </div>

                        {{-- <div class="mt-5 text-center text-white">
                             <p>Don't have an account ?<a href="auth-register.html" class="fw-bold text-white">
                                    Register</a> </p>
                            <p>©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Morvin. Crafted with <i class="mdi mdi-heart text-danger"></i>
                                by Themesdesign
                            </p>
                        </div> --}}
                    </div>
                </div>

            </div>


        </div>
        <!-- End Log In page -->
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('admin') }}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('admin') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin') }}/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ asset('admin') }}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('admin') }}/assets/libs/node-waves/waves.min.js"></script>

    <script src="{{ asset('admin') }}/assets/js/app.js"></script>

</body>

</html>
