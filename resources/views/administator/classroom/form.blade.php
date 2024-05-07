<x-admin.modal
    enctype="multipart/form-data"
    :title="isset($classroom) ? 'Update class' : 'Add New class'"
    :action="isset($classroom) ? route('administator.classroom.update', $classroom->id) : route('administator.classroom.store')"
    :button="isset($classroom) ? 'Update' : 'Submit'"
>
    @isset($classroom)
        @method('PUT')
    @endisset

    <x-admin.form-group label="title" placeholder="Enter class title" :value="$classroom->title ?? ''" />

</x-admin.modal>
