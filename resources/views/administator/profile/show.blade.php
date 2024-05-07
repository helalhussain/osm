
@extends('layouts.administator.app')

@section('administator_content')
<x-admin.page-title dashboard_title="Administator" title="Profile" page_name="My profile">

</x-admin.page-title>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            {{-- <div class="user-profile-header-banner">
                <img src="{{ asset('admin') }}/assets/images/pages/profile-banner.png"
                alt="Banner image" class="rounded-top" style="width:100%;height:250px!important" />
            </div> --}}

            <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto" style="padding-top:40px">
                    @if(auth()->user()->image !="")
                    <img src="{{ uploaded_file(auth()->user()->image) }}" alt="user image"
                     style="height:80px!important;width:80px;border-radius:50%!important;" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" id="show_profile_image" />
                 @else
                 <img src="{{ asset('images/defult/user.png') }}" alt="user image"
                 style="height:80px!important;width:80px;border-radius:50%!important;" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" id="show_profile_image" />

                @endif
                    </div>
                <div class="flex-grow-1 mt-3 mt-sm-5">
                    <div
                        class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                        <div class="user-profile-info">
                            <h4></h4>
                            <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                <li class="list-inline-item"><i class="ti ti-user-plus"></i> {{ auth()->user()->name }}</li>
                                <li class="list-inline-item"><i class="ti ti-mail"></i> {{ auth()->user()->email }}</li>
                                <li class="list-inline-item"><i class="ti ti-calendar"></i> Joined June 2023</li>
                            </ul>
                        </div>
                        <a href="{{route('administator.password.show')}}" class="btn btn-primary" >
                            <i class="ti ti-edit me-1"></i>
                            Change password
                        </a>
                        <a href="{{route('administator.profile.edit')}}" class="btn btn-primary" id="editBtn">
                            <i class="ti ti-edit me-1"></i>
                            Edit Your Account
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
