<x-admin.modal
    enctype="multipart/form-data"
    :title="isset($notice) ? 'Update Notice' : 'Add New Notice'"
    :action="isset($notice) ? route('administator.notice.update', $notice->id) : route('administator.notice.store')"
    :button="isset($notice) ? 'Update' : 'Submit'"
>
    @isset($notice)
        @method('PUT')
    @endisset
    <x-admin.form-group label="class" :required="false" isType="select" class="select2" column="">
        <option value="">Select Class</option>
        @foreach ($clses as $clse)
        <option value="{{ $clse->id }}">{{ $clse->title }}</option>
        @endforeach
    </x-admin.form-group>
    <x-admin.form-group label="title" placeholder="Enter notice title" :value="$notice->title ?? ''" />
    <x-admin.form-group label="description" placeholder="Enter notice description" :value="$notice->description ?? ''" />
        <x-admin.form-group
        label="image"
        type="file"
        accept="image/*"
       
    />



</x-admin.modal>