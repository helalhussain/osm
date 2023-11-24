

<x-admin.modal
    enctype="multipart/form-data"
    :title="isset($notice) ? 'Update Notice' : 'Add New Notice'"
    :action="isset($notice) ? route('teacher.notice.update', $notice->id) : route('teacher.notice.store')"
    :button="isset($notice) ? 'Update' : 'Submit'"
>
    @isset($notice)
        @method('PUT')
    @endisset

<x-admin.form-group label="title" placeholder="Enter notice title" :value="$notice->title ?? ''" />
    <x-admin.form-group label="description" id="elm1" placeholder="Description" :required="false" isType="textarea">
        {{ $notice->description ?? ''}}
    </x-admin.form-group>
</x-admin.modal>
