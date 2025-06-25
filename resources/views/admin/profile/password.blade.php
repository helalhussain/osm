
@extends('layouts.admin.app')
@section('admin_content')

     <!-- end page title -->
     <x-admin.page-title dashboard_title="Admin" title="Dashboard" page_name="Profile">
        {{-- <a href="{{route('admin.profile.edit')}}" class="btn btn-success"  id="editBtn">Edit profile</a> --}}
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

                        @if(Session::has('success'))
                        <span class="text-danger"> {{Session::get('success')}} dfds </span>
                    @endif
                    @if(Session::has('fail'))
                        <span class="text-danger"> {{Session::get('fail')}} </span>
                    @endif

                    </p>
                </header>

                <form  method="post" action="{{ route('admin.password.update') }}" class="mt-6 space-y-6">

                    @csrf
                    @method('put')

                    <div>
                        <x-input-label for="update_password_current_password" :value="__('Current Password')" />
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
{{--
                        @if (session('status') === 'password-updated')
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

        </div>
        </div>
    </div>
    </div>
</div>
<!---Continer-fluied---->

@endsection
{{-- 123456789 --}}

