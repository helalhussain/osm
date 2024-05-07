<x-admin.modal
    enctype="multipart/form-data"
    :title="isset($result) ? 'Update result' : 'Add New Result'"
    :action="isset($result) ? route('administator.result.update', $result->id) : route('administator.result.store')"
    :button="isset($result) ? 'Update' : 'Submit'"
>
    @isset($result)
        @method('PUT')
    @endisset
    <x-admin.form-group label="class" :required="false" isType="select" class="select2" column="">
        {{-- <option value="{{ $result->classroom_id ?? '' }}">{{ $result->classroom->title ?? 'Select Class' }}</option> --}}
        @foreach ($classes as $class)
        <option value="{{ $class->id }}">{{ $class->title }}</option>
        @endforeach
    </x-admin.form-group>
    @isset($result)
    <x-admin.form-group label="requested" :required="false" isType="select">
        <option value="{{$result->request }}">{{ $result->request ?? 'Select request' }}</option>
        <option value="requested">Requested</option>
        <option value="accepted">Accepted</option>
    </x-admin.form-group>
    @endisset
    <x-admin.form-group label="title" placeholder="Enter Title" :value="$result->title ?? ''" />
        <x-admin.form-group label="description" placeholder="Description" :required="false" isType="textarea">
            {{ $result->description ?? ''}}
        </x-admin.form-group>
        <x-admin.form-group label="file" for="file" :required="false" type="file"
        data-show-image="show_category_image" />

</x-admin.modal>
