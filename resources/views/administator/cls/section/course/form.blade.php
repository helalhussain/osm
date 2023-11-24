<x-admin.modal
    enctype="multipart/form-data"
    :title="isset($section) ? 'Update section' : 'Add New section'"
    :action="isset($section) ? route('administator.course.update', $section->id) : route('administator.course.store')"
    :button="isset($section) ? 'Update' : 'Submit'"
>
    @isset($section)
        @method('PUT')
    @endisset
    {{-- <x-admin.form-group label="title" placeholder="Enter group title" :value="$group->title ?? ''" /> --}}
    <x-admin.form-group label="group" :required="false" isType="select" class="select2" column="">
        <option value="">Select Group</option>
        @foreach ($groups as $group)
        <option value="{{ $group->id }}">{{ $group->title }}</option>
        @endforeach
    </x-admin.form-group>
 
    <x-admin.form-group label="subject" :required="false" isType="select" class="select2" column="">
        <option value="">Select subject</option>
        @foreach ($subjects as $subject)
        <option value="{{ $subject->id }}">{{ $subject->title }}</option>
        @endforeach
    </x-admin.form-group>
    <x-admin.form-group label="teacher" :required="false" isType="select" class="select2" column="">
        <option value="">Select Teacher</option>
        @foreach ($teachers as $teacher)
        <option value="{{ $teacher->id }}">{{ $teacher->title }}</option>
        @endforeach
    </x-admin.form-group>



     {{-- <x-admin.form-group label="title" placeholder="Enter section title" :value="$section->title ?? ''" /> --}}

</x-admin.modal>

