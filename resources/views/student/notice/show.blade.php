@extends('layouts.student.app')
@section('student_content')
<div class="container"><br>
    <div class="col-xl-12 col-12 pt-5">
        <div class="card mb-4" id="card-block">
          <h4 class="card-header">Administator</h4>
          <h6 class="card-header">{{ $notice->title }}</h6>
          <div class="card-body">
            <p class="card-text">
              {{ $notice->description }}
            </p>
            <p class="card-text">
              Lorem ipsum dolor sit amet, an vel affert soleat possim. Usu meis neglegentur ut, oporteat
              salutandi dignissim
            </p>
            <div class="block-ui-btn demo-inline-spacing">
              <a href="#" class="btn btn-danger btn-card-block">Delete</a>

              <a href="{{ route('dashboard') }}" class="btn btn-primary btn-card-block-multiple">Back</a>
            </div>
          </div>
        </div>
      </div>
</div>


@endsection
