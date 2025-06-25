@extends('layouts.student.app')
@section('student_content')
    <!-- end page title -->
    <x-admin.page-title dashboard_title="Student" title="Student" page_name="quiz">
        {{-- <a href="#" class="btn btn-success" >Add message</a> --}}
    </x-admin.page-title>

    <div class="container-fluid">

        <div class="page-content-wrapper">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="col-lg-9 mx-auto">
                            <div class="card-body">
                                <!--------->
                                <div class="timeline-box border my-2 rounded bg-light  my-3">

                                    <div class="media ">
                                        <div class="media-body">
                                            <h3 class="font-size-18 ">
                                                {{-- @if ($notice->user_type == 'teacher')
                                                Teacher <span class="float-sm-right font-size-12">{{ $notice->created_at->format("M-d") }}</span>
                                            @else
                                                Administator <span class="float-sm-right font-size-12">{{ $notice->created_at->format("M-d") }}</span>
                                            @endif --}}
                                            </h3>
                                            <h4 class="font-size-17 mb-0">

                                            </h4>
                                            {{-- <p class="text-muted mb-2"> </p> --}}

                                            <!----question---------------->
                                            @foreach ($questions as $key=>$question)
                                                @if ($question->type == 'mcq')
                                                    <form action="{{ route('answer.store') }}" method="post">
                                                        @csrf
                                                        <div class="border p-3 rounded mt-4">
                                                            <h4 class="font-size-16 bg-white fw-bold p-3 mb-0 custom-accordion">{{ $question->id }}
                                                                <span>. </span> {{ $question->question }}
                                                            </h4>
                                                            @if ($question->file == null)
                                                            @else
                                                            <img class="img-fluid" alt="" src="{{ uploaded_file($question->file) }}" style="height:200px">
                                                            @endif


                                                            <input type="hidden" name="question_name"
                                                                value="{{ $question->id }}">
                                                            <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                                                            <input type="hidden" name="type" value="{{ $question->type }}">

                                                            <div class="collapse show" id="collapseExample3">
                                                                <div class="mt-4">
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            @if ($question->a ==null)

                                                                            @else

                                                                            <div class="form-check mt-2">

                                                                                <input type="radio" id="productratingRadio3"
                                                                                    name="ans" value="{{ $question->a }}"
                                                                                    class="fw-bold form-check-input">
                                                                                <label class="fw-bold custom-control-label"
                                                                                    for="productratingRadio3">{{ $question->a }}</label>
                                                                            </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            @if ($question->b ==null)

                                                                            @else
                                                                            <div class="form-check mt-2">
                                                                                <input type="radio" id="productratingRadio3"
                                                                                    name="ans" value="{{ $question->b }}"
                                                                                    class="fw-bold form-check-input">
                                                                                <label class="fw-bold custom-control-label"
                                                                                    for="productratingRadio3">{{ $question->b }}</label>
                                                                            </div>
                                                                            @endif

                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            @if ($question->c ==null)

                                                                            @else
                                                                            <div class="form-check mt-2">
                                                                                <input type="radio" id="productratingRadio3"
                                                                                    name="ans" value="{{ $question->c }}"
                                                                                    class="fw-bold form-check-input">
                                                                                <label class="fw-bold custom-control-label"
                                                                                    for="productratingRadio3">{{ $question->c }}</label>
                                                                            </div>
                                                                            @endif

                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                        @if ($question->d ==null)

                                                                        @else
                                                                        <div class="form-check mt-2">
                                                                            <input type="radio" id="productratingRadio3"
                                                                                name="ans" value="{{ $question->d }}"
                                                                                class="fw-bold form-check-input">
                                                                            <label class="fw-bold custom-control-label"
                                                                                for="productratingRadio3">{{ $question->d }}</label>
                                                                        </div>
                                                                        @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group pt-2">
                                                                        <button type="submit"
                                                                            class="btn btn-dark btn-sm">Submit</button>
                                                                    </div>


                                                                </div>

                                                            </div>
                                                        </div>
                                                    </form>
                                                    @elseif ($question->type == 'mcq_image')
                                                    <form action="{{ route('answer.store') }}" method="post">
                                                        @csrf
                                                        <div class="border p-3 rounded mt-4">
                                                            <h4 class="font-size-16 bg-white fw-bold p-3 mb-0 custom-accordion">{{ $question->id }}
                                                                <span>. </span> {{ $question->question }}
                                                            </h4>
                                                            @if ($question->file == null)
                                                            @else
                                                            <img class="img-fluid" alt="" src="{{ uploaded_file($question->file) }}" style="height:200px">
                                                            @endif

                                                            <input type="hidden" name="question_name"
                                                                value="{{ $question->id }}">
                                                            <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                                                            <input type="hidden" name="type" value="{{ $question->type }}">

                                                            <div class="collapse show" id="collapseExample3">

                                                                <div class="mt-4">
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            @if ($question->a == null)

                                                                            @else
                                                                            <div class="form-check mt-2">
                                                                                <p>A .{{ $question->image_title_a }}</p>
                                                                                <input type="radio" id="productratingRadio2"
                                                                                    name="ans" value="{{ $question->a }}"
                                                                                    class="form-check-input">
                                                                                <label class="custom-control-label"
                                                                                    for="productratingRadio2">

                                                                                    <img class="img-fluid" alt="" src="{{ uploaded_file($question->a) }}" style="height:100px"></label>
                                                                            </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            @if ($question->b == null)

                                                                            @else
                                                                            <div class="form-check mt-2">
                                                                                <p>B .{{ $question->image_title_b }}</p>
                                                                                <input type="radio" id="productratingRadio2"
                                                                                    name="ans" value="{{ $question->b }}"
                                                                                    class="form-check-input">
                                                                                <label class="custom-control-label"
                                                                                    for="productratingRadio2">

                                                                                    <img class="img-fluid" alt="" src="{{ uploaded_file($question->b) }}" style="height:100px"></label>
                                                                            </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            @if ($question->c == null)

                                                                            @else
                                                                            <div class="form-check mt-2">
                                                                                <p>C .{{ $question->image_title_c }}</p>
                                                                                <input type="radio" id="productratingRadio2"
                                                                                    name="ans" value="{{ $question->c }}"
                                                                                    class="form-check-input">
                                                                                <label class="custom-control-label"
                                                                                    for="productratingRadio2">

                                                                                    <img class="img-fluid" alt="" src="{{ uploaded_file($question->c) }}" style="height:100px"></label>
                                                                            </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            @if($question->d==null)

                                                                            @else
                                                                            <div class="form-check mt-2">
                                                                                <p>D .{{ $question->image_title_d }}</p>
                                                                                <input type="radio" id="productratingRadio3"
                                                                                    name="ans" value="{{ $question->d }}"
                                                                                    class="form-check-input">
                                                                                <label class="custom-control-label"
                                                                                    for="productratingRadio3">
                                                                                    <img class="img-fluid" alt="" src="{{ uploaded_file($question->d) }}" style="height:100px">
                                                                                </label>
                                                                            </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>




                                                                    <div class="form-group pt-2">
                                                                        <button type="submit"
                                                                            class="btn btn-dark btn-sm">Submit</button>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </form>


                                                @else
                                                    <form action="{{ route('answer.store') }}" method="post">
                                                        @csrf
                                                        <div class="border p-3 rounded mt-4">
                                                            <h4 class="font-size-16 bg-white fw-bold p-3 mb-0 custom-accordion">{{ $question->id }}
                                                                <span>. </span> {{ $question->question }}
                                                            </h4>
                                                            @if ($question->file == null)
                                                            @else
                                                            <img class="img-fluid" alt="" src="{{ uploaded_file($question->file) }}" style="height:200px">
                                                            @endif

                                                            <input type="hidden" name="question_name"
                                                                value="{{ $question->id }}">
                                                            <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                                                            <input type="hidden" name="type"
                                                                value="{{ $question->type }}">

                                                            <div class="collapse show" id="collapseExample3">

                                                                <div class="mt-4">
                                                                    <div class="form-group">
                                                                        {{-- <textarea name="ans" class="form-control" id="" cols="40" rows="4"></textarea> --}}
                                                                        {{-- <x-admin.form-group label="ans" :required="false" isType="textarea" class="form-control" id="elm1"></x-admin.form-group> --}}
                                                                        <div><br/>
                                                                            <textarea  class="form-control your_summernote" name="ans" rows="5" placeholder="Type here">

                                                                            </textarea>

                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group pt-2">
                                                                        <button type="submit"
                                                                            class="btn btn-dark btn-sm">Submit</button>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </form>
                                                @endif
                                                {!! $questions->links() !!}
                                            @endforeach
                                            <!---End question---------------->

                                            <ul class="list-inline product-review-link mb-0">
                                                <li class="list-inline-item">
                                                    <a href="{{ route('quiz.index') }}" class="btn btn-dark btn-sm">Back</a>
                                                </li>

                                            </ul>
                                        </div>

                                    </div>
                                </div>

                                <!----->
                            </div>
                        </div>
                    </div>
                    <!--EndCard-->
                </div>


            </div>

        </div>


    </div> <!-- container-fluid -->

    </div>
    <!-- End Page-content -->
@endsection
