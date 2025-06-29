
@extends('layouts.teacher.app')

@section('teacher_content')

<x-admin.page-title dashboard_title="Teacher" title="Content" page_name="All content">
    <a href="{{ route('teacher.content.create') }}" class="btn btn-success" id="">Add content</a>
</x-admin.page-title>

<x-admin.table title="content" :headers="['No','subject', 'Action']" />

@endsection

@push('js')
    <script>
        var table = $('#datatable').DataTable({
            ajax: '{!! route('teacher.content.index') !!}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id',
                    searchable: false
                },
                // {
                //     data: 'title',
                //     name: 'title'
                // },
                {
                    data: 'subject',
                    name: 'subject'
                },
                {
                    data: 'action',
                    name: 'action',
                    searchable: false,
                    render: function(data, type, row) {
                        return `
                        <a href="${route('teacher.content.show',row.id) }" class="btn btn-outline-success btn-sm" id="editBtn"><i class="fas fa-eye"></i></a>
                    <a href="${route('teacher.content.edit',row.id) }" class="btn btn-outline-secondary btn-sm" id=""><i class="fas fa-pencil-alt"></i></a>
                    <a href="${route('teacher.content.destroy',row.id) }" class="btn btn-outline-danger btn-sm" id="deleteBtn"><i class="fas fa-trash-alt"></i></a>
                    `;

                    }
                },
            ]
        });
    </script>
@endpush
