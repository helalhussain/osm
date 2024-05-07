
@extends('layouts.admin.app')
@section('admin_content')
    <x-admin.page-title dashboard_title="Admin" title="Setting" page_name="General setting">

    </x-admin.page-title>




    <x-admin.page title="General Setting">
        <form id="submit" action="{{ route('admin.setting.setting') }}">
            @csrf
            @method('PUT')
            <div class="row gy-3">
                <x-admin.form-group label="site_name" value="{{ $setting->site_name }}" column="col-lg-6" />
                <x-admin.form-group label="timezone" isType="select" class="select2" column="col-lg-6">
                    @foreach ($timezones as $timezone)
                        <option value="{{ @$timezone }}" @selected($timezone)>{{ __($timezone) }}</option>
                    @endforeach
                </x-admin.form-group>
                <x-admin.form-group label="currency_text" value="{{ $setting->currency_text }}" column="col-lg-6" />
                <x-admin.form-group label="curreny_symbol" value="{{ $setting->currency_symbol }}" column="col-lg-6" />
                    <x-admin.form-group label="tution_fee" value="{{ $setting->tution_fee }}" column="col-lg-6" />

                <div class="col-12 mt-4">
                    <x-admin.submit-button text="Update" class="w-10" />
                </div>
            </div>
        </form>
    </x-admin.page>
@endsection
