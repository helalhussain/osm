
@extends('layouts.teacher.app')

@section('teacher_content')

<x-admin.page-title dashboard_title="Teacher" title="Answer" page_name="All Quiz">
    {{-- <a href="{{ route('teacher.answer.create') }}" class="btn btn-success" id="">Add answer</a> --}}
</x-admin.page-title>

{{-- <x-admin.table title="Quiz" :headers="['No','Quiz title', 'Action']" /> --}}

<div class="container-fluid">

    <div class="page-content-wrapper">
<!----Quiz--------->


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Quiz</h4>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        {{-- <th>Type</th> --}}

                        <th>Action</th>
                    </tr>
                    </thead>


                    <tbody>
            @foreach ($quizzes as $key=>$quiz)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $quiz->title }}</td>
                {{-- <td>{{ $question->type }}</td> --}}


                {{-- posts.edit', $post->i --}}
                {{-- <td>{{ $question->created_at->format("M-h-D") }}</td> --}}
                <td>
                    <a href="{{ route('teacher.show_quiz',$quiz->id) }}" class="btn btn-outline-success btn-sm" >
                       Show answer
                    </a>
                </td>
            </tr>
            @endforeach


                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


</div>
</div>

@endsection

{{-- @push('js')
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
                        <a href="${route('teacher.quiz.show',row.id) }" class="btn btn-outline-success btn-sm" id=""><i class="fas fa-eye"></i></a>
                    `;

                    }
                },
            ]
        });
    </script>
@endpush --}}
