@extends('layouts.admin.app')
@section('admin_content')
<x-admin.page-title dashboard_title="Admin" title="Setting" page_name="Setting">

</x-admin.page-title>

    <div class="row mb-4">
        <div class="col-md-12 mb-30">
            <div class="card bl--5-primary">
                <div class="card-body">
                    <p class="fw-bold text-primary mb-0">@lang('If the logo and favicon are not changed after you update from this page, please clear the cache from your browser. As we keep the filename the same after the update, it may show the old image for the cache. usually, it works after clear the cache but if you still see the old logo or favicon, it may be caused by server level or network level caching. Please clear them too.')</p>
                </div>
            </div>
        </div>
    </div>

    <x-admin.page title="Logo-icon Setting">
        <form id="submit" action="{{ route('admin.setting.logo.icon') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row gy-3">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ uploaded_file($logoIcon->logo) }}" class="card-img-top  img-thumbnail" alt="...">
                            <div class="card-title">
                                Logo For White Background
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <img src="{{ uploaded_file($logoIcon->favicon) }}" class="card-img-top" alt="..." height="150">
                        <div class="card-title">
                            Favicon
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <img src="{{ uploaded_file($logoIcon->default_image) }}" class="card-img-top" alt="...">
                        <div class="card-title">
                            Default image
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                      {{--  <img src="{{ uploaded_file($logoIcon->dark_logo) }}" class="card-img-top img-fluid img-thumbnail" alt="..." width="100">
                        <div class="card-title">
                            Logo For Dark Background
                        </div>--}}
                    </div>
                </div>

                        <div class="col-lg-3 mt-5">
                            <input type="file" name="logo" id="logo" data-show-image="logo" accept="image/*" class="form-control" />
                            <div class="invalid-feedback" id="logo"></div>
                        </div>

                        <div class="col-lg-3 mt-5">
                            <input type="file" name="favicon" id="favicon" data-show-image="favicon" accept="image/*" class="form-control" />
                            <div class="invalid-feedback" id="favicon"></div>
                        </div>
                        <div class="col-lg-3 mt-5">
                            <input type="file" name="default_image" id="default_image" data-show-image="default_image" accept="image/*" class="form-control" />
                            <div class="invalid-feedback" id="default_image"></div>
                        </div>
                        <div class="col-lg-3 mt-5">
                            {{-- <input type="file" name="dark_logo" id="dark_logo" data-show-image="dark_logo" accept="image/*" class="form-control" /> --}}
                            {{-- <div class="invalid-feedback" id="dark_logo"></div> --}}
                        </div>
                    </div>
                {{-- @endforeach --}}

                <div class="col-12 mt-4">
                    <x-admin.submit-button text="Update" class="w-10" />
                </div>
            </div>
        </form>
    </x-admin.page>
@endsection

