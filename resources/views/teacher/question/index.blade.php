
@extends('layouts.teacher.app')

@section('teacher_content')

<x-admin.page-title dashboard_title="Teacher" title="Quesiton" page_name="All quesiton">
    {{-- <a href="{{ route('teacher.question.create') }}" class="btn btn-success" id="">Add question</a>
    <a href="{{ route('teacher.add_mcq') }}" class="btn btn-success" id="">Add MCQ</a> --}}
</x-admin.page-title>

<x-admin.table title="Question" :headers="['No','type', 'Action']" />

@endsection

@push('js')
    <script>
        var table = $('#datatable').DataTable({
            ajax: '{!! route('teacher.question.index') !!}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id',
                    searchable: false
                },
                {
                    data: 'type',
                    name: 'type'
                },

                {
                    data: 'action',
                    name: 'action',
                    searchable: false,
                    render: function(data, type, row) {
                        return `
                        <a href="${route('teacher.question.show',row.id) }" class="btn btn-outline-success btn-sm" id="editBtn"><i class="fas fa-eye"></i></a>

                    <a href="${route('teacher.question.destroy',row.id) }" class="btn btn-outline-danger btn-sm" id="deleteBtn"><i class="fas fa-trash-alt"></i></a>
                    `;

                    }
                },
            ]
        });
    </script>
@endpush
