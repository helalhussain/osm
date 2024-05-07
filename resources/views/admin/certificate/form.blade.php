<x-admin.modal
    enctype="multipart/form-data"
    :title="isset($certificate) ? 'Update certificate' : 'Add New Certificate'"
    :action="isset($certificate) ? route('admin.certificate.update', $certificate->id) : route('admin.certificate.store')"
    :button="isset($certificate) ? 'Update' : 'Submit'"
>
    @isset($certificate)
        @method('PUT')
    @endisset
    <select name="email" id="email" class="form-control select2" required>
        <option value="{{ $certificate->user_id }}">{{ $certificate->user->email }}</option>
        {{-- @foreach ($students as $student)
        <option value="{{ $student->id }}">{{ $student->email }}</option>
        @endforeach --}}
    </select>
    <select name="requested" id="requested" class="form-control select2" required>
        <option value="{{$certificate->request }}">{{ $certificate->request }}</option>

        <option value="requested">Requested</option>
        <option value="accepted">Accepted</option>

    </select>
    <x-admin.form-group label="title" placeholder="Enter Title" :value="$certificate->title ?? ''" />
        <x-admin.form-group label="description" placeholder="Description" :required="false" isType="textarea">
            {{ $certificate->description ?? ''}}
        </x-admin.form-group>
        <x-admin.form-group label="file" for="file" :required="false" type="file"
        data-show-image="show_category_image" />


</x-admin.modal>
