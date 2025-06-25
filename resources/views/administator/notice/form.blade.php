{{-- <x-admin.modal
    enctype="multipart/form-data"
    :title="isset($notice) ? 'Update Notice' : 'Add New Notice'"
    :action="isset($notice) ? route('admin.notice.update', $notice->id) : route('admin.notice.store')"
    :button="isset($notice) ? 'Update' : 'Submit'"
>
    @isset($notice)
        @method('PUT')
    @endisset
    <x-admin.form-group label="class" :required="false" isType="select" class="select2" column="">
        <option value="{{ $notice->classroom_id ?? '' }}">{{ $notice->classroom->title ?? 'Select Class' }}</option>
        @foreach ($classes as $class)
        <option value="{{ $class->id }}">{{ $class->title }}</option>
        @endforeach
    </x-admin.form-group>
    <x-admin.form-group label="title" placeholder="Enter notice title" :value="$notice->title ?? ''" />

        <x-admin.form-group label="description" placeholder="Enter notice description" :value="$notice->description ?? ''" />
        <x-admin.form-group label="description" placeholder="Description" :required="false" isType="textarea">
            {{ $notice->description ?? ''}}
        </x-admin.form-group>
        <x-admin.form-group
        label="file"
        type="file"
        accept=""

    />

</x-admin.modal> --}}



@extends('layouts.administator.app')

@section('administator_content')
    <x-admin.page-title dashboard_title="Administator" title="notice" page_name="Create notice">
        <a href="{{ route('administator.notice.index') }}" class="btn btn-success">notices</a>
    </x-admin.page-title>
    <div class="container-fluid">

        <div class="page-content-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title">Add notice</h4>
                            <p class="card-title-desc"></p>

                            <form id="submi" action="{{ route('administator.notice.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <x-admin.form-group label="class" :required="false" isType="select" class="select2" column="col-lg-6" required>
                                        <option value="{{ $notice->classroom_id ?? '' }}">{{ $notice->classroom->title ?? 'Select Class' }}</option>
                                        @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->title }}</option>
                                        @endforeach
                                    </x-admin.form-group>
                                    <x-admin.form-group label="title" placeholder="Enter notice title" :value="$notice->title ?? ''" column="col-lg-6"  required/>


                                {{-- <x-admin.form-group label="description" :required="false" isType="textarea" class="form-control" id="elm1"></x-admin.form-group> --}}
                                <div><br/>
                                    <textarea  class="form-control your_summernote" name="description" rows="5" placeholder="Type here">
                                        {{-- {!!  $notice->description !!} --}}
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


                                </div><br>
                                        <x-admin.submit-button :text="isset($notice) ? 'Update':'Submit'" />
                                        <a href="{{ route('administator.notice.index') }}" class="btn btn-secondary waves-effect">
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
