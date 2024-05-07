
@extends('layouts.administator.app')

@section('administator_content')

<x-admin.page-title  dashboard_title="Administator" title="Class" page_name="All Class">
    <a href="{{ route('administator.course.create') }}" class="btn btn-success" >Add course</a>
</x-admin.page-title>


<x-admin.table title="Class" :headers="['No','title', 'Action']" />


{{-- @foreach ($courses as $course)
    <p>{{ $course->section->title }}</p>
@endforeach --}}
@endsection

@push('js')
    <script>
        var table = $('#datatable').DataTable({
            ajax: '{!! route('administator.course.index') !!}',
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
                        <a href="${route('administator.course.show',row.id) }" class="btn btn-outline-success btn-sm" id="editBtn"><i class="fas fa-eye"></i></a>

                    <a href="${route('administator.course.destroy',row.id) }" class="btn btn-outline-danger btn-sm" id="deleteBtn"><i class="fas fa-trash-alt"></i></a>
                    `;

                    }
                },
            ]
        });
    </script>
@endpush
