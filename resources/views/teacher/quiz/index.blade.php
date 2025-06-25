
@extends('layouts.teacher.app')

@section('teacher_content')

<x-admin.page-title dashboard_title="Teacher" title="Quiz" page_name="All quiz">
    <a href="{{ route('teacher.quiz.create') }}" class="btn btn-success" id="addBtn">Add quiz</a>
</x-admin.page-title>

<x-admin.table title="Quiz" :headers="['No', 'title', 'Action']" />

@endsection

@push('js')
    <script>
        var table = $('#datatable').DataTable({
            ajax: '{!! route('teacher.quiz.index') !!}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id',
                    searchable: false
                },
                {
                    data: 'title',
                    name: 'title'
                },

                {
                    data: 'action',
                    name: 'action',
                    searchable: false,
                    render: function(data, type, row) {
                        return `
                        <a href="${route('teacher.quiz.show',row.id) }" class="btn btn-outline-success btn-sm" id="">

                            Question
                            </a>
<a href="${route('teacher.quiz.edit',row.id) }" class="btn btn-outline-secondary btn-sm" id="editBtn"><i class="fas fa-pencil-alt"></i></a>
                    <a href="${route('teacher.quiz.destroy',row.id) }" class="btn btn-outline-danger btn-sm" id="deleteBtn"><i class="fas fa-trash-alt"></i></a>
                    `;

                    }
                },
            ]
        });
    </script>
@endpush
