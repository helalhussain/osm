

<x-admin.modal
    enctype="multipart/form-data"
    :title="isset($content) ? 'Update Content' : 'Add New Content'"
    :action="isset($content) ? route('teacher.content.update', $content->id) : route('teacher.content.store')"
    :button="isset($content) ? 'Update' : 'Submit'"
>
    @isset($content)
        @method('PUT')
    @endisset
    <x-admin.form-group label="class" :required="false" isType="select" class="select2" column="">
        <option value="{{ $content->classroom_id ?? '' }}">{{ $content->classroom->title ?? 'Select Class' }}</option>
        @foreach ($classrooms as $classroom)
        <option value="{{ $classroom->id }}">{{ $classroom->title }}</option>
        @endforeach
    </x-admin.form-group>
<x-admin.form-group label="title" placeholder="Enter content title" :value="$content->title ?? ''" />
    <x-admin.form-group label="description" id="elm1" placeholder="Description" :required="false" isType="textarea">
        {{ $content->description ?? ''}}
    </x-admin.form-group>
    <x-admin.form-group
    label="file"
    type="file"
    accept=""
/>
</x-admin.modal>
