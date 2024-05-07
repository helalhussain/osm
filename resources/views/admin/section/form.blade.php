
<x-admin.modal
    enctype="multipart/form-data"
    :title="isset($section) ? 'Update Section' : 'Add New Section'"
    :action="isset($section) ? route('admin.section.update', $section->id) : route('admin.section.store')"
    :button="isset($section) ? 'Update' : 'Submit'"
>
    @isset($section)
        @method('PUT')
    @endisset

    <x-admin.form-group label="title" placeholder="Enter section title" :value="$section->title ?? ''" />


</x-admin.modal>
