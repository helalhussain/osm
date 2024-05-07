
@extends('layouts.admin.app')

@section('admin_content')

<x-admin.page-title dashboard_title="Admin" title="Certificate" page_name="All certificate">
    <a href="{{ route('admin.certificate.create') }}" class="btn btn-success" id="addBtn">Add result</a>
</x-admin.page-title>


<x-admin.table title="Certificate" :headers="['No', 'Title','Request', 'Action']" />

@endsection

@push('js')
    <script>
        var table = $('#datatable').DataTable({
            ajax: '{!! route('admin.certificate.index') !!}',
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
                    data: 'request',
                    name: 'request'
                },

                {
                    data: 'action',
                    name: 'action',
                    searchable: false,
                    render: function(data, type, row) {
                        return `
                        <a href="${route('admin.certificate.show',row.id) }" class="btn btn-outline-success btn-sm" id="editBtn"><i class="fas fa-eye"></i></a>
                    <a href="${route('admin.certificate.edit',row.id) }" class="btn btn-outline-secondary btn-sm" id="editBtn"><i class="fas fa-pencil-alt"></i></a>
                    <a href="${route('admin.certificate.destroy',row.id) }" class="btn btn-outline-danger btn-sm" id="deleteBtn"><i class="fas fa-trash-alt"></i></a>
                    `;

                    }
                },
            ]
        });
    </script>
@endpush
