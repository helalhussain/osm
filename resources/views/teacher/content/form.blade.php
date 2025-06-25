{{--
<x-admin.modal
    enctype="multipart/form-data"
    :title="isset($content) ? 'Update Content' : 'Add New Content'"
    :action="isset($content) ? route('teacher.content.update', $content->id) : route('teacher.content.store')"
    :button="isset($content) ? 'Update' : 'Submit'"
>
    @isset($content)
        @method('PUT')
    @endisset
    <x-admin.form-group label="class" :required="false" isType="select" class="select2" column="">
        <option value="{{ $content->classroom_id ?? '' }}">{{ $content->classroom->title ?? 'Select Class' }}</option>
        @foreach ($classrooms as $classroom)
        <option value="{{ $classroom->id }}">{{ $classroom->title }}</option>
        @endforeach
    </x-admin.form-group>
<x-admin.form-group label="title" placeholder="Enter content title" :value="$content->title ?? ''" />
    <x-admin.form-group label="description" id="elm1" placeholder="Description" :required="false" isType="textarea">
        {{ $content->description ?? ''}}
    </x-admin.form-group>
    <x-admin.form-group
    label="file"
    type="file"
    accept=""
/>
</x-admin.modal> --}}


@extends('layouts.teacher.app')

@section('teacher_content')
    <x-admin.page-title dashboard_title="Teacher" title="Teacher" page_name="Create">
        <a href="{{ route('teacher.content.index') }}" class="btn btn-success">Content</a>
    </x-admin.page-title>
    <div class="container-fluid">

        <div class="page-content-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title">Add Content</h4>
                            <p class="card-title-desc"></p>

                            <form id="" action="{{ route('teacher.content.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">


                                    {{-- <x-admin.form-group label="class" :required="false" isType="select"  class="classroom"  column="col-lg-6" required>

                                        <option value="">Select Class</option>
                                        @foreach ($classrooms as $classroom)
                                       <option value="{{ $classroom->id }}">{{ $classroom->title }}</option>
                                       @endforeach
                                    </x-admin.form-group><br> --}}
                                    {{-- <x-admin.form-group label="subject" :required="false" isType="select"  class=""  column="col-lg-6" required>

                                        <option value="">Select Subject</option>
                                        @foreach ($subjects as $subject)
                                       <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                       @endforeach
                                    </x-admin.form-group><br> --}}
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="">Subject <span class="text-danger">*</span></label>
                                            {{-- <input type="email" class="form-control" placeholder="To"> --}}
                                            <select name="subject" id="subject" class="form-control select2" required>
                                                <option value="">Select Subject</option>
                                                @foreach ($subjects as $subject)
                                               <option value="{{ $subject->name }}">{{ $subject->name }}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                    </div>
                                 {{-- <div class="col-lg-6">
                                    <label for="">Subject</label>
                                    <select name="subject" class="form-control" id="subject" column="col-lg-6" required>

                                    </select>
                                 </div> --}}

                                    <x-admin.form-group label="title" class="mb-3" placeholder="Enter title"
                                        column="col-lg-12" required/><br/>

                                    </div>
                                    <label for="">Description</label>
                                    <div>
                                        <textarea  class="form-control your_summernote" name="description" rows="5" placeholder="Type here">
                                            {{-- {!!  $notice->description !!} --}}
                                        </textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>

                                      <x-admin.submit-button :text="isset($quiz) ? 'Update':'Submit'" />

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>
    </div> <!-- container-fluid -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
    <script>
        $(document).ready(function() {

            $('.classroom').on('change',function (e) {
                // e.preventDefault();
                var title = $(this).val();
                // alert(title);

                $.ajax({
                    url:"{{ route('teacher.content.create') }}",
                    type:'GET',
                    data:{'title':title},
                    success:function(data){

                       var subjects = data.subjects;
// console.log(subjects);
                       var html = '';
                       if(subjects.length >0){
                            for(let i =0; i<subjects.length;i++){
                             html +='<option value='+subjects[i]['name']+'> \
                                    '+subjects[i]['name']+'\
                                    </option>';
                            }
                       }else{
                        html +='<td>Not Class</td>';
                       }

                       $("#subject").html(html);
                    }
                });

            });
///

        });
    </script>


@endsection
