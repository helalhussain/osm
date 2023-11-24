

<x-admin.modal
    enctype="multipart/form-data"
    :title="isset($content) ? 'Update Content' : 'Add New Content'"
    :action="isset($content) ? route('teacher.content.update', $content->id) : route('teacher.content.store')"
    :button="isset($content) ? 'Update' : 'Submit'"
>
    @isset($content)
        @method('PUT')
    @endisset

<x-admin.form-group label="title" placeholder="Enter content title" :value="$content->title ?? ''" />
    <x-admin.form-group label="description" id="elm1" placeholder="Description" :required="false" isType="textarea">
        {{ $content->description ?? ''}}
    </x-admin.form-group>
</x-admin.modal>
