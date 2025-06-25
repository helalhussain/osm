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
    <title>Login page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ uploaded_file($logoIcon->favicon) }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('admin') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('admin') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('admin') }}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


</head>



<body class="authentication-bg bg-dark">
    <div class="home-center">
        <div class="home-desc-center">

            <div class="container mt">

                <div class="home-btn">
                    <a href="/" class="text-white router-link-active"><i
                            class="fas fa-home h2 text-white"></i></a>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-8 col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="px py-3">


                                    <div class="text-center">
                                        <a href="index.html">
                                            <img src="{{ uploaded_file($logoIcon->logo) }}" height="45"
                                                alt="logo">
                                        </a>

                                        <h3 class="text-primary  fw-bold">Student Register</h3>
                                        <p class="text-muted"></p>
<br/>
                                        @if(Session::has('success'))
<div class="alert alert-danger" role="alert">{{ Session::get('success') }}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger" role="alert">{{ Session::get('fail') }}</div>
@endif
                                    </div>

                                    <form class="form-horizontal" action="{{ route('register') }}" method="POST">
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
                                                    <label for="userpassword">Password</label>
                                                    <div class="input-group">
                                                        <input type="password"
                                                            class="form-control login_password @error('password') is-invalid @enderror"
                                                            name="password" id="userpassword"
                                                            placeholder="Enter password" required>
                                                        <a class="input-group-text logineye"
                                                            id="validationTooltipUsernamePrepend"><i
                                                                class="fas fa-eye fa-eye-slash  eyesee"></i></a>
                                                    </div>
                                                    @error('password')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="password_confirmation">Confirm Password</label>
                                                    <div class="input-group">
                                                        <input type="password"
                                                            class="form-control login_password @error('password_confirmation') is-invalid @enderror"
                                                            name="password_confirmation" id="password_confirmation"
                                                            placeholder="Enter confirm password" required>
                                                        <a class="input-group-text logineye"
                                                            id="validationTooltipUsernamePrepend"><i
                                                                class="fas fa-eye fa-eye-slash  eyesee"></i></a>
                                                    </div>

                                                    @error('cpassword_confirmation')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                        <div>


                                        </div>
                                            <button class="btn btn-primary waves-effect waves-light"
                                                type="submit">Register</button>

                                    </form>

                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-center text-white">
                          <p>  Already have an account ? <a href="{{ route('login') }}" class="fw-bold text-white"> Login </a></p>
                           {{-- <p>©
                               <script>
                                   document.write(new Date().getFullYear())
                               </script> Morvin. Crafted with <i class="mdi mdi-heart text-danger"></i>
                               by Themesdesign
                           </p> --}}
                       </div>
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
                url: "{{ route('register') }}",
                type: 'GET',
                data: {
                    'title': title
                },
                success: function(data) {

                    var courses = data.courses;
                    var html = '';
                    if (courses.length > 0) {
                        for (let i = 0; i < courses.length; i++) {
                            html += '<option > \
                                ' + courses[i]['title'] + '\
                                </option>';
                        }
                    } else {
                        html += '<td>Not Course</td>';
                    }
                    $("#course").html(html);
                }
            });

        });




        $('#course').on('change', function(e) {
            // e.preventDefault();
            var title = $(this).val();

            $.ajax({
                url: "{{ route('register') }}",
                type: 'GET',
                data: {
                    'title': title
                },
                success: function(data) {

                    var courses = data.courses;
                    var html = courses.title;
                    alert(html);
                    //    if(courses.length >0){

                    //    }else{
                    //     html +='<td>Not Course</td>';
                    //    }
                    $("#cost").html(html);
                }
            });

        });

    });
</script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.logineye').click(function() {
            $('.eyesee').toggleClass('fa-eye-slash');
            var input = $('.login_password');
            if (input.attr('type') == 'password') {
                input.attr('type', 'text');
            } else {
                input.attr('type', 'password');
            }

        });

    });
</script>
