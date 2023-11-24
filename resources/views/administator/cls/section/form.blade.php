<x-admin.modal
    enctype="multipart/form-data"
    :title="isset($section) ? 'Update section' : 'Add New section'"
    :action="isset($section) ? route('administator.section.update', $section->id) : route('administator.section.store')"
    :button="isset($section) ? 'Update' : 'Submit'"
>
    @isset($section)
        @method('PUT')
    @endisset
    <x-admin.form-group label="class" :required="false" isType="select" class="select2" column="">
        <option value="">Select Class</option>
        @foreach ($clses as $clse)
        <option value="{{ $clse->id }}">{{ $clse->title }}</option>
        @endforeach
    </x-admin.form-group>
    <x-admin.form-group label="group" :required="false" isType="select" class="select2" column="">
        <option value="">Select Group</option>
        @foreach ($groups as $group)
        <option value="{{ $group->id }}">{{ $group->title }}</option>
        @endforeach
    </x-admin.form-group>



     {{-- <x-admin.form-group label="title" placeholder="Enter section title" :value="$section->title ?? ''" /> --}}

</x-admin.modal>

