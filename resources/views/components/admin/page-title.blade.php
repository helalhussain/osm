   @props([
    'dashboard_title'=>null,
    'title' =>null,
        'page_name'=>null,
   ])

<div class="page-content">
   <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
         <div class="row align-items-center">
             <div class="col-sm-6">
                 <div class="page-title">
                     <h4>{{ $dashboard_title }}</h4>
                         <ol class="breadcrumb m-0">
                             <li class="breadcrumb-item"><a href="javascript: void(0);">OSMS</a></li>
                             <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $title }}</a></li>
                             <li class="breadcrumb-item active">{{ $page_name }}</li>
                         </ol>
                 </div>
             </div>
             <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                   {{ $slot }}
                </div>
             </div>
         </div>
        </div>
     </div>
     <!-- end page title -->
