<x-admin.modal
    enctype="multipart/form-data"
    :title="isset($subject) ? 'Update Subject' : 'Add New Subject'"
    :action="isset($subject) ? route('administator.subject.update', $subject->id) : route('administator.subject.store')"
    :button="isset($subject) ? 'Update' : 'Submit'"
>
    @isset($subject)
        @method('PUT')
    @endisset

    <x-admin.form-group label="name" placeholder="Enter subject name" :value="$subject->name ?? ''" />
    <x-admin.form-group label="code" placeholder="Enter subject code" :value="$subject->code ?? ''" />
        

</x-admin.modal>
