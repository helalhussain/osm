
@extends('layouts.administator.app')

@section('administator_content')

<x-admin.page-title  dashboard_title="Administator" title="Class" page_name="All Class">
    <a href="{{ route('administator.classroom.create') }}" class="btn btn-success" id="addBtn">Add class</a>
</x-admin.page-title>


<x-admin.table title="Class" :headers="['No','title', 'Action']" />



@endsection

@push('js')
    <script>
        var table = $('#datatable').DataTable({
            ajax: '{!! route('administator.classroom.index') !!}',
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
                       
                     <a href="${route('administator.classroom.edit',row.id) }" class="btn btn-outline-secondary btn-sm" id="editBtn"><i class="fas fa-pencil-alt"></i></a>
                    <a href="${route('administator.classroom.destroy',row.id) }" class="btn btn-outline-danger btn-sm" id="deleteBtn"><i class="fas fa-trash-alt"></i></a>
                    `;

                    }
                },
            ]
        });
    </script>
@endpush
