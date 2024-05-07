

<x-admin.modal
    enctype="multipart/form-data"
    :title="isset($quiz) ? 'Update Quiz' : 'Add New Quiz'"
    :action="isset($quiz) ? route('teacher.quiz.update', $quiz->id) : route('teacher.quiz.store')"
    :button="isset($quiz) ? 'Update' : 'Submit'"
>
    @isset($quiz)
        @method('PUT')
    @endisset

    <x-admin.form-group label="class" :required="false" isType="select" class="select2" column="">
        <option value="{{ $quiz->classroom_id ?? '' }}">{{ $quiz->classroom->title ?? 'Select Class' }}</option>
        @foreach ($classrooms as $classroom)
        <option value="{{ $classroom->id }}">{{ $classroom->title }}</option>
        @endforeach
    </x-admin.form-group>
        <x-admin.form-group label="title" placeholder="Enter quiz title" :value="$quiz->title ?? ''" />
            <x-admin.form-group label="quiz" placeholder="Enter quiz" :value="$quiz->quiz ?? ''" />
            <x-admin.form-group label="description" placeholder="Description" :required="false" isType="textarea">
            {{ $quiz->description ?? ''}}
        </x-admin.form-group>
        {{-- <x-admin.form-group label="file" type="file" accept="" name="file"/> --}}
</x-admin.modal>
