@extends('layouts.admin.app')

@section('admin_content')
    <x-admin.page-title dashboard_title="Admin" title="student" page_name="All student">
        {{-- <a href="{{ route('admin.user.create') }}" class="btn btn-success" id="addBtn">Add student</a> --}}
    </x-admin.page-title>

    <x-admin.table title="Student" :headers="['No', 'ID', 'Name', 'email', 'Active', 'Action']" />
@endsection

@push('js')
    <script>
        var table = $('#datatable').DataTable({
            ajax: '{!! route('admin.user.index') !!}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id',
                    searchable: false
                },
                {
                    data: 'student_id',
                    name: 'ID'
                },
                {
                    data: 'name',
                    name: 'name'
                },

                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'in_active',
                    name: 'in_active'
                },
                // {
                //     data: 'in_active',
                //     name: 'in_active',
                //     render: (data, type, row) => {
                //         return `<label class="switch switch-outline-success">
                //         ${row.in_active ? 'Able' : 'Disable'}
                //             </label>`
                //     }
                // },
                {
                    data: 'action',
                    name: 'action',
                    searchable: false,
                    render: function(data, type, row) {
                        return `
                    <a href="${route('admin.user.show',row.id) }" class="btn btn-outline-success btn-sm" id=""><i class="fas fa-eye"></i></a>
                    <a href="${route('admin.user.destroy',row.id) }" class="btn btn-outline-danger btn-sm" id="deleteBtn"><i class="fas fa-trash-alt"></i></a>

                    `;

                    }
                },
            ]
        });
    </script>
@endpush
{{-- <a href="${route('admin.user.destroy',row.id) }" class="btn btn-outline-danger btn-sm" id="deleteBtn"><i class="fas fa-trash-alt"></i></a> --}}
