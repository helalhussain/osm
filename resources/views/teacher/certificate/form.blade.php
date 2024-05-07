<x-admin.modal
    enctype="multipart/form-data"
    :title="isset($certificate) ? 'Update certificate' : 'Add New Certificate'"
    :action="isset($certificate) ? route('teacher.certificate.update', $certificate->id) : route('teacher.certificate.store')"
    :button="isset($certificate) ? 'Update' : 'Submit'"
>
    @isset($certificate)
        @method('PUT')
    @endisset
    <x-admin.form-group label="email" :required="false" isType="select" class="select2">
        <option value="{{ $certificate->user_id ?? '' }}">{{ $certificate->user->email ?? 'Select Email' }}</option>
        {{-- <option value="">Select Student</option> --}}
        @foreach ($students as $student)
        <option value="{{ $student->id }}">{{ $student->email }}</option>
        @endforeach
    </x-admin.form-group>
    <x-admin.form-group label="title" placeholder="Enter Title" :value="$certificate->title ?? ''" />
        <x-admin.form-group label="description" placeholder="Description" :required="false" isType="textarea">
            {{ $certificate->description ?? ''}}
        </x-admin.form-group>
        <x-admin.form-group label="file" for="file" :required="false" type="file"
        data-show-image="show_category_image" />

</x-admin.modal>




{{--

<x-admin.modal
    enctype="multipart/form-data"
    :title="isset($certificate) ? 'Update certificate' : 'Add New Certificate'"
    :action="isset($certificate) ? route('teacher.certificate.update', $certificate->id) : route('teacher.certificate.store')"
    :button="isset($certificate) ? 'Update' : 'Submit'"
>
    @isset($certificate)
        @method('PUT')
    @endisset
    <x-admin.form-group label="email" :required="false" isType="select"
    class="select2 form-control select2-multiple"
    data-placeholder="Select student ...">
        <option value="">Select Student</option>
        @foreach ($students as $student)
        <option value="{{ $student->id }}">{{ $student->email }}</option>
        @endforeach
    </x-admin.form-group>

    <x-admin.form-group label="title" placeholder="Enter Title" :value="$certificate->title ?? ''" />
        <x-admin.form-group label="description" placeholder="Description" :required="false" isType="textarea">
            {{ $certificate->description ?? ''}}
        </x-admin.form-group>
        <x-admin.form-group label="file" for="file" :required="false" type="file"
        data-show-image="show_category_image" />

</x-admin.modal>

 --}}

