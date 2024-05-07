
@extends('layouts.teacher.app')

@section('teacher_content')

<x-admin.page-title dashboard_title="Teacher" title="Result" page_name="All result">
    <a href="{{ route('teacher.result.create') }}" class="btn btn-success" id="addBtn">Add result</a>
</x-admin.page-title>


<x-admin.table title="Result" :headers="['No', 'Title', 'Action']" />



@endsection

@push('js')
    <script>
        var table = $('#datatable').DataTable({
            ajax: '{!! route('teacher.result.index') !!}',
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
                        <a href="${route('teacher.result.show',row.id) }" class="btn btn-outline-success btn-sm" id="editBtn"><i class="fas fa-eye"></i></a>
                    <a href="${route('teacher.result.edit',row.id) }" class="btn btn-outline-secondary btn-sm" id="editBtn"><i class="fas fa-pencil-alt"></i></a>
                    <a href="${route('teacher.result.destroy',row.id) }" class="btn btn-outline-danger btn-sm" id="deleteBtn"><i class="fas fa-trash-alt"></i></a>
                    `;

                    }
                },
            ]
        });
    </script>
@endpush
