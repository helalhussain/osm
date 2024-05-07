

<x-admin.modal
    enctype="multipart/form-data"
    :title="isset($notice) ? 'Update Notice' : 'Add New Notice'"
    :action="isset($notice) ? route('teacher.notice.update', $notice->id) : route('teacher.notice.store')"
    :button="isset($notice) ? 'Update' : 'Submit'"
>
    @isset($notice)
        @method('PUT')
    @endisset

    <x-admin.form-group label="class" :required="false" isType="select" class="select2" column="">
        <option value="{{ $notice->classroom_id ?? '' }}">{{ $notice->classroom->title ?? 'Select Class' }}</option>
        @foreach ($classrooms as $classroom)
        <option value="{{ $classroom->id }}">{{ $classroom->title }}</option>
        @endforeach
    </x-admin.form-group>
    {{-- <x-admin.form-group  label="dateline" type="date" placeholder="Dateline" :value="$notice->dateline ?? ''"/> --}}
    <x-admin.form-group label="title" placeholder="Enter notice title" :value="$notice->title ?? ''" />
        <x-admin.form-group label="description" placeholder="Description" :required="false" isType="textarea">
            {{ $notice->description ?? ''}}
        </x-admin.form-group>
        <x-admin.form-group
        label="file"
        type="file"
        accept=""
        name="file"

    />
</x-admin.modal>
