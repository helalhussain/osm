
@extends('layouts.administator.app')

@section('administator_content')

<x-admin.page-title dashboard_title="Administator" title="Teacher" page_name="All teacher">
    <a href="{{ route('administator.teacher.create') }}" class="btn btn-success">Add teacher</a>
</x-admin.page-title>

<x-admin.table title="Teacher" :headers="['No','Image', 'Name', 'email', 'Action']" />

{{-- @foreach ($teachers as $teacher)
<h5>{{ $teacher->name }}</h5>
<h5>{{ $teacher->subject->name }}</h5>
@endforeach --}}

@endsection

@push('js')
    <script>

        var table = $('#datatable').DataTable({
            ajax: '{!! route('administator.teacher.index') !!}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id',
                    searchable: false
                },
                {
                    data: 'image',
                    name: 'image',
                    render: function(data) {
                        return `<img src="${ data != null ? "/storage/"+data : null }" class="rounded-circle" style="width:60px"/>`
                    }
                },
                {
                    data: 'name',
                    name: 'name'
                },

                // {
                //     data: 'subject_id',
                //     name: 'subject_id',
                //     render: (data, type, row) => {
                //         return `<label class="switch switch-outline-success">
                //          ${row.subject_id}

                //             </label>`
                //     }
                // },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'action',
                    name: 'action',
                    searchable: false,
                    render: function(data, type, row) {
                        return `
                        <a href="${route('administator.teacher.show',row.id) }" class="btn btn-outline-success btn-sm" id=""><i class="fas fa-eye"></i></a>
                    <a href="${route('administator.teacher.destroy',row.id) }" class="btn btn-outline-danger btn-sm" id="deleteBtn"><i class="fas fa-trash-alt"></i></a>

                    `;

                    }
                },
            ]
        });
    </script>
@endpush
