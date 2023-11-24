
@props([
    'title'=>null,
    'headers'=>[]
])




{{-- <div class="container-fluid">
    <div class="page-content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title">{{ $title }}</h4>
                        <p class="card-title-desc">
                       </p>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    @foreach ($headers as $header)
                                        <th style="">{{ ucwords($header) }}</th>
                                    @endforeach
                                </tr>
                            </thead>


                            <tbody>
                        {{ $slot }}
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>


</div> <!-- container-fluid -->
</div> --}}

<div class="container-fluid">
    <div class="page-content-wrapper">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title">{{ $title }}</h4>
                        <p class="card-title-desc">
                        </p>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    @foreach ($headers as $header)
                                        <th style="">{{ ucwords($header) }}</th>
                                    @endforeach
                                </tr>
                            </thead>


                            <tbody>
                                {{ $slot }}


                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
</div> <!-- container-fluid -->
