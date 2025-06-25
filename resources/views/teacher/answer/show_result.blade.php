
@extends('layouts.teacher.app')

@section('teacher_content')

<x-admin.page-title dashboard_title="Teacher" title="Answer" page_name="All answer">
    {{-- <a href="{{ route('teacher.answer.create') }}" class="btn btn-success" id="">Add answer</a> --}}
</x-admin.page-title>

{{-- <x-admin.table title="Quiz" :headers="['No','title', 'Action']" /> --}}
<div class="container-fluid">
    <div class="page-content-wrapper">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        {{-- <h4 class="header-title">Answer </h4> --}}
                        <p class="card-title-desc">
                           
                        </p>


<!--------Start answersheet----->
                        @foreach ($answers as $key=>$answer)
                        <div class="card maintenance-box bg-light" >
                            <div class="card-body p-4">
                                <div class="media">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title text-white rounded-circle bg-primary">
                                            {{ $key+1 }}
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="font-size-18 text-uppercase">{{ $answer->question->question }}</h5>
                                        <p class="text-muted mb-0">{{ $answer->ans }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
<!-- end card -->
<!---End answersheet----------->

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
</div> <!-- container-fluid -->

@endsection

