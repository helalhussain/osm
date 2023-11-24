@extends('layouts.student.app')
@section('student_content')
            <!-- Content -->
            <div class="container flex-grow-1 container-p-y">
                <div class="row">
                    <!---Class---->
                    <h3 class="pb-1 mb-2">Live class list</h3>

                    @foreach ($courses as $course)
                    <div class="col-lg-3 col-sm-6 mb-4">
                        <div class="card">
                          <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="card-title mb-0">
                              <h5 class="mb-0 me-2">{{ $course->subject->name }}</h5>
                              <h6 class="mb-0 me-2">{{ $course->teacher->name }}</h6>
                              {{-- <small>Downtime Ratio</small> --}}
                            </div>
                            <div class="card-icon">
                              <span class="badge bg-label-danger rounded-pill p-2">
                                <i class="ti ti-chart-pie-2 ti-sm"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach



                    <!--/ Class -->
                    <!---Notification---->
                    <h3 class="pb-1 mb-2">Notice list</h3>

 @foreach ($notices as $notice)
 <div class="col-lg-3 col-sm-6 mb-4">
    <div class="card">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div class="card-title mb-0">
          <h6 class="mb-0 me-2">{{ $notice->title }}</h6>
          {{-- <small>Show</small> --}}
          {{-- <a  class="btn btn-success">View</a> --}}
        </div>
        <div class="card-icon">
          <a href="{{ route('notice.show',$notice->id) }}" class="badge bg-label-danger rounded-pill p-2">
            {{-- <i class="ti ti-chart-pie-2 ti-sm"></i> --}}View
          </a>
        </div>

      </div>

    </div>
  </div>
 @endforeach




                    <!--/ Notification -->
  <!---Subject---->
                    <h3 class="pb-1 mb-2">Live class list</h3>

                    <div class="col-lg-3 col-sm-6 mb-4">
                        <div class="card h-100">
                          <div class="card-header pb-0">
                            <h5 class="card-title mb-0">82.5k</h5>
                            <small class="text-muted">Expenses</small>
                          </div>
                          <div class="card-body">
                            <div id="expensesChart"></div>
                            <div class="mt-3 text-center">
                              <small class="text-muted mt-3">$21k Expenses more than last month</small>
                            </div>
                          </div>
                        </div>
                      </div>

                    <!--/End Subject -->

                </div>
              </div>
              <!--/ Content -->
@endsection

