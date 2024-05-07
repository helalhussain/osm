<x-admin.modal
    enctype="multipart/form-data"
    :title="isset($class) ? 'Update class' : 'Add New class'"
    :action="isset($class) ? route('administator.class.update', $class->id) : route('administator.class.store')"
    :button="isset($class) ? 'Update' : 'Submit'"
>
    @isset($class)
        @method('PUT')
    @endisset

    <x-admin.form-group label="title" placeholder="Enter class title" :value="$class->title ?? ''" />
 
</x-admin.modal>
