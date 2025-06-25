

<x-admin.modal
    enctype="multipart/form-data"
    :title="isset($certificate) ? 'Update certificate' : 'Add New Certificate'"
    :action="isset($certificate) ? route('administator.certificate.update', $certificate->id) : route('administator.certificate.store')"
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
    :action="isset($certificate) ? route('administator.certificate.update', $certificate->id) : route('administator.certificate.store')"
    :button="isset($certificate) ? 'Update' : 'Submit'"
>
    @isset($certificate)
        @method('PUT')
    @endisset
    <select name="email" id="email" class="form-control select2" >
        <option value="">Select Student</option>
        @isset($certificate)
        <option value="{{ $certificate->user_id }}">{{ $certificate->user->email ?? 'Select Student' }}</option>
       @endisset
        @foreach ($students as $student)
        <option value="{{ $student->id }}">{{ $student->email }}</option>
        @endforeach
    </select>
    @isset($certificate)
    <x-admin.form-group label="requested" :required="false" isType="select">
        <option value="{{$certificate->request }}">{{ $certificate->request ?? 'Select request' }}</option>
        <option value="requested">Requested</option>
        <option value="accepted">Accepted</option>
    </x-admin.form-group>
    @endisset
    <x-admin.form-group label="title" placeholder="Enter Title" :value="$certificate->title ?? ''" />
        <x-admin.form-group label="description" placeholder="Description" :required="false" isType="textarea">
            {{ $certificate->description ?? ''}}
        </x-admin.form-group>
        <x-admin.form-group label="file" for="file" :required="false" type="file"
        data-show-image="show_category_image" />

</x-admin.modal> --}}
