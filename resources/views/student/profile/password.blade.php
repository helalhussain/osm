
@extends('layouts.student.app')
@section('student_content')

     <!-- end page title -->
     <x-admin.page-title dashboard_title="Student" title="Dashboard" page_name="Profile">
        <a href="{{route('profile.edit')}}" class="btn btn-success"  id="editBtn">Edit profile</a>
    </x-admin.page-title>
     <div class="container-fluid">

        <div class="page-content-wrapper">
    <div class="row">
        <div class="card p-5">

            <section>
                <header>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Update Password') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Ensure your account is using a long, random password to stay secure.') }}
                    </p>
                </header>

                <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('put')

                    @if(Session::has('success'))
                    <span class="text-danger"> {{Session::get('success')}} dfds </span>
                @endif
                @if(Session::has('fail'))
                    <span class="text-danger"> {{Session::get('fail')}} </span>
                @endif
                    <div>
                        <x-input-label for="update_password_current_password" :value="__('Current Password')"/>
                        <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full form-control" autocomplete="current-password" />
                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-danger" />
                    </div>
<br>
                    <div>
                        <x-input-label for="update_password_password" :value="__('New Password')" />
                        <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full form-control" autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-danger" />
                    </div>
<br>
                    <div>
                        <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full form-control" autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-danger" />
                    </div>
<br>
                    <div class="flex items-center gap-4">
                        <x-primary-button class="text-sm text-dark btn btn-info">{{ __('Save') }}</x-primary-button>

                        {{-- @if (session('status') === 'password-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-dark btn btn-info"
                            >{{ __('Saved.') }}</p>
                        @endif --}}
                    </div>
                </form>
            </section>

            {{-- <form method="POST" action="{{ route('profile.update') }}" >
                @csrf
                @method('PUT')

                <div class="row gy-3">
                    <x-admin.form-group
                        label="current_password"
                        type="password"
                        placeholder="Enter current password"
                    />
                    <x-admin.form-group
                        label="password"
                        type="password"
                        placeholder="Enter password"
                    />
                    <x-admin.form-group
                        label="confirm_password"
                        type="password"
                        for="password_confirmation"
                        placeholder="Enter confirm password"
                    />

                    <div class="col-12 text-end mt-4">
                        <x-admin.submit-button text="Update" />
                    </div>
                </div>
            </form> --}}


        </div>
        </div>
    </div>
    </div>
</div>
<!---Continer-fluied---->

@endsection


{{--

@extends('layouts.admin.app')

@section('title', 'Update Password')

@section('content')
<x-admin.top pageName="Update password">
</x-admin.top>
    <x-admin.page :title="'Update Password'" column="col-lg-6 mx-auto">
        <form id="submit" action="{{ route('admin.profile.update') }}">
            @csrf
            @method('PUT')

            <div class="row gy-3">
                <x-admin.form-group
                    label="current_password"
                    type="password"
                    placeholder="Enter current password"
                />
                <x-admin.form-group
                    label="password"
                    type="password"
                    placeholder="Enter password"
                />
                <x-admin.form-group
                    label="confirm_password"
                    type="password"
                    for="password_confirmation"
                    placeholder="Enter confirm password"
                />

                <div class="col-12 text-end mt-4">
                    <x-admin.submit-button text="Update" />
                </div>
            </div>
        </form>
    </x-admin.page>
@endsection --}}
