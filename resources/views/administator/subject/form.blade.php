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
    {{-- <x-admin.form-group label="code" placeholder="Enter subject code" :value="$subject->code ?? ''" /> --}}

        {{-- <x-admin.form-group label="fee" placeholder="Enter subject fee" :value="$subject->fee ?? ''" />
        <x-admin.form-group label="discount" placeholder="Enter subject discount" :value="$subject->discount ?? ''" /> --}}
        {{-- <div class="mb-3">
            <label for="discount" class="form-label">Discount (%)</label>
            <input type="text" name="discount" id="discount"
                class="form-control"placeholder="Discount (%)" :value="$subject->discount ?? ''" />

        </div> --}}


</x-admin.modal>
