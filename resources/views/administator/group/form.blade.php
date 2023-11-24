<x-admin.modal
    enctype="multipart/form-data"
    :title="isset($group) ? 'Update Group' : 'Add New Class Group'"
    :action="isset($group) ? route('administator.group.update', $group->id) : route('administator.group.store')"
    :button="isset($group) ? 'Update' : 'Submit'"
>
    @isset($group)
        @method('PUT')
    @endisset

    <x-admin.form-group label="title" placeholder="Enter group title" :value="$group->title ?? ''" />
    <x-admin.form-group label="description" placeholder="Enter group description" :value="$group->description ?? ''" />



</x-admin.modal>
