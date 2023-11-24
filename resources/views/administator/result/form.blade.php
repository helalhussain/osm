<x-admin.modal
    enctype="multipart/form-data"
    :title="isset($result) ? 'Update result' : 'Add New Result'"
    :action="isset($result) ? route('administator.result.update', $result->id) : route('administator.result.store')"
    :button="isset($result) ? 'Update' : 'Submit'"
>
    @isset($result)
        @method('PUT')
    @endisset

    <x-admin.form-group label="title" placeholder="Enter Title" :value="$result->title ?? ''" />
        <x-admin.form-group label="file" for="file" :required="false" type="file"
        data-show-image="show_category_image" />

</x-admin.modal>
