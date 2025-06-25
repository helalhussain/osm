

@extends('layouts.admin.app')

@section('admin_content')
    <x-admin.page-title dashboard_title="Admin" title="notice" page_name="Edit notice">
        <a href="{{ route('admin.notice.index') }}" class="btn btn-success">notices</a>
    </x-admin.page-title>
    <div class="container-fluid">

        <div class="page-content-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title">Edit notice</h4>
                            <p class="card-title-desc"></p>

                            <form id="" action="{{ route('admin.notice.update',$notice->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <x-admin.form-group label="class" :required="false" isType="select" class="select2" column="col-lg-6">
                                        <option value="{{ $notice->classroom_id ?? '' }}">{{ $notice->classroom->title ?? 'Select Class' }}</option>
                                        @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->title }}</option>
                                        @endforeach
                                    </x-admin.form-group>
                                    <x-admin.form-group label="title" placeholder="Enter notice title" :value="$notice->title ?? ''" column="col-lg-6"/>


                                {{-- <x-admin.form-group label="description" isType="textarea" id="elm1">
                                    {!!  $notice->description !!}
                                </x-admin.form-group> --}}
                                <div><br/>
                                    <textarea  class="form-control your_summernote" name="description" rows="5" placeholder="Type here">
                                        {!!  $notice->description !!}
                                    </textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <x-admin.form-group
                                label="file"
                                type="file"
                                accept="" column="col-lg-6"

                            />
                                        {{-- <x-admin.form-group label="image" for="image" class="mb-3" :required="false" type="file"
                                        data-show-image="show_notice_image" column="col-lg-6" /><br> --}}

                                </div><br>
                                        <x-admin.submit-button :text="isset($notice) ? 'Update':'Submit'" />
                                        <a href="{{ route('admin.notice.index') }}" class="btn btn-secondary waves-effect">
                                            Cancel
                                        </a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>
    </div> <!-- container-fluid -->
@endsection
