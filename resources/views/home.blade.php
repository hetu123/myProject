@extends('layouts.app')

@section('content')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Dashboard</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Library</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

{{--<div class="container">--}}
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
     <div class="container-fluid">
         <!-- ============================================================== -->
         <!-- Sales Cards  -->
         <!-- ============================================================== -->
         <div class="row">
             <!-- Column -->
             <div class="col-md-6 col-lg-2 col-xlg-3">
                 <div class="card card-hover">
                     <div class="box bg-cyan text-center">
                         <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                         <h6 class="text-white">Dashboard</h6>
                     </div>
                 </div>
             </div>
             <!-- Column -->
             <div class="col-md-6 col-lg-4 col-xlg-3">
                 <div class="card card-hover">
                     <div class="box bg-success text-center">
                         <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                         <h6 class="text-white">Charts</h6>
                     </div>
                 </div>
             </div>
             <!-- Column -->
             <div class="col-md-6 col-lg-2 col-xlg-3">
                 <div class="card card-hover">
                     <div class="box bg-warning text-center">
                         <h1 class="font-light text-white"><i class="mdi mdi-account"></i></h1>
                         <h6 class="text-white">Active User</h6>
                     </div>
                 </div>
             </div>
             <!-- Column -->
             <div class="col-md-6 col-lg-2 col-xlg-3">
                 <div class="card card-hover">
                     <div class="box bg-danger text-center">
                         <h1 class="font-light text-white"><i class="mdi mdi-account"></i></h1>
                         <h6 class="text-white">Inactive user</h6>
                     </div>
                 </div>
             </div>
             <!-- Column -->
             <div class="col-md-6 col-lg-2 col-xlg-3">
                 <div class="card card-hover">
                     <div class="box bg-info text-center">
                         <h1 class="font-light text-white"><i class="mdi mdi-account"></i></h1>
                         <h6 class="text-white">Registered user</h6>
                     </div>
                 </div>
             </div>
             <!-- Column -->

         </div>
         <div class="row">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-body">
                         <h5 class="card-title">Pie Chart</h5>
                         <div class="pie" style="height: 400px;"></div>
                     </div>
                 </div>
             </div>

         </div>
     </div>
{{--</div>--}}
@endsection
