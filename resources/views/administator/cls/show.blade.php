
@extends('layouts.administator.app')

@section('administator_content')

<x-admin.page-title  dashboard_title="Administator" title="Section" page_name="Class">
    <a href="{{ route('administator.section.create') }}" class="btn btn-success" id="addBtn">Add section</a>
</x-admin.page-title>

{{-- <x-admin.table title="Section" :headers="['No','Section','Class','Action']" /> --}}

{{-- @foreach ($sections as $section)
<h1>{{ $section->group_id }}</h1>
@endforeach --}}

<div class="container-fluid">
    <div class="page-content-wrapper">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title">Section</h4>
                        <p class="card-title-desc">
                        </p>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                        <th style="">No</th>
                                        <th style="">Title</th>
                                        <th style="">Action</th>

                                </tr>
                            </thead>


                            <tbody>
                               @foreach ($sections as $section)
                               <thead>
                                    <td>{{ $section->id }}</td>
                                    <td>{{ $section->group->title }}</td>
                                    <td>
                                         <a href="{{ route('administator.section.show',$section->id)  }}" class="btn btn-outline-success btn-sm" id=""><i class="fas fa-eye"></i></a>

                    <a href="${route('administator.section.destroy',row.id) }" class="btn btn-outline-danger btn-sm" id="deleteBtn"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                               </thead>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
</div> <!-- container-fluid -->

@endsection

{{--
@push('js')
    <script>
        var table = $('#datatable').DataTable({
            ajax: '{!! route('administator.section.index') !!}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id',
                    searchable: false
                },
                {
                    data: 'cls_id',
                    name: 'cls_id'
                },
                {
                    data: 'group_id',
                    name: 'group_id'
                },

                {
                    data: 'action',
                    name: 'action',
                    searchable: false,
                    render: function(data, type, row) {
                        return `
                        <a href="${route('administator.section.show',row.id) }" class="btn btn-outline-success btn-sm" id=""><i class="fas fa-eye"></i></a>
                     <a href="${route('administator.section.edit',row.id) }" class="btn btn-outline-secondary btn-sm" id="editBtn"><i class="fas fa-pencil-alt"></i></a>
                    <a href="${route('administator.section.destroy',row.id) }" class="btn btn-outline-danger btn-sm" id="deleteBtn"><i class="fas fa-trash-alt"></i></a>
                    `;

                    }
                },
            ]
        });
    </script>
@endpush
--}}
