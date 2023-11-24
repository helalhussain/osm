@extends('layouts.administator.app')

@section('administator_content')
<x-admin.page-title dashboard_title="Administator" title="Dashboard" page_name="">

</x-admin.page-title>
    <div class="container-fluid">

        <div class="page-content-wrapper">

            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title mb-4 float-sm-start">Quick Summary</h4>


                            <div class="clearfix"></div>


                            <div class="row align-items-center">
                                <div class="col-xl-9">

                                    <div>
                                        <div id="stacked-column-chart" class="apex-charts" dir="ltr"></div>
                                    </div>

                                </div>


                                <div class="col-xl-3">
                                    <div class="dash-info-widget mt-4 mt-lg-0 py-4 px-3 rounded">



                                        <div class="media dash-main-border pb-2 mt-2">
                                            <div class="avatar-sm mb-3 mt-2">
                                                <span class="avatar-title rounded-circle bg-white shadow">
                                                        <i class="mdi mdi-currency-inr text-primary font-size-18"></i>
                                                    </span>
                                            </div>
                                           <div class="media-body ps-3">

                                            <h4 class="font-size-20">$2354</h4>
                                            <p class="text-muted">Earning <a href="#" class="text-primary">Withdraw <i class="mdi mdi-arrow-right"></i></a>
                                            </p>

                                           </div>

                                        </div>





                                        <div class="media mt-4 dash-main-border pb-2">
                                            <div class="avatar-sm mb-3 mt-2">
                                                <span class="avatar-title rounded-circle bg-white shadow">
                                                        <i class="mdi mdi-credit-card-outline text-primary font-size-18"></i>
                                                    </span>
                                            </div>
                                            <div class="media-body ps-3">
                                                <h4 class="font-size-20">$1598</h4>
                                            <p class="text-muted">To Paid <a href="#" class="text-primary">Pay <i class="mdi mdi-arrow-right"></i></a></p>
                                            </div>
                                        </div>



                                        <div class="media mt-4">
                                            <div class="avatar-sm mb-2 mt-2">
                                                <span class="avatar-title rounded-circle bg-white shadow">
                                                        <i class="mdi mdi-eye-outline text-primary font-size-18"></i>
                                                    </span>
                                            </div>
                                           <div class="media-body ps-3">
                                            <h4 class="font-size-20">1230</h4>
                                            <p class="text-muted mb-0">To Online <a href="#" class="text-primary">View <i class="mdi mdi-arrow-right"></i></a></p>
                                           </div>
                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>
                    </div>
                </div>


                <div class="col-xl-4">
                    <div class="row">


                    </div>

                    <div class="card">

                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-xl-4">
                    <div class="card">

                    </div>
                </div>


                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-4">Earning Goal</h4>

                            <div class="mt-2 text-center">




                            </div>

                        </div>
                    </div>








                </div>


                <div class="col-xl-4">



                </div>





            </div>

            <div class="row">

                <div class="col-xl-4">
                    <div class="card">

                    </div>
                </div>

                <div class="col-xl-8">

                </div>


            </div>


        </div>


    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection
