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
                     <div class="box bg-cyan text-center" style="width: 240px;">
                         <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                         <h6 class="text-white">Dashboard</h6>
                     </div>
                 </div>
             </div>
             <!-- Column -->
             <div class="col-md-6 col-lg-4 col-xlg-3">
                 <div class="card card-hover">
                     <div class="box bg-success text-center" style="width: 501px;">
                         <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                         <h6 class="text-white">Charts</h6>
                     </div>
                 </div>
             </div>
             <!-- Column -->
             <div class="col-md-6 col-lg-2 col-xlg-3">
                 <div class="card card-hover">
                     <div class="box bg-warning text-center" style="width: 240px;">
                         <h1 class="font-light text-white"><i class="mdi mdi-account"></i></h1>
                         <h6 class="text-white">Active User <i class="text-white"><?php echo  '('. DB::table('users')->where('is_active','1')->count() .')'?></i></h6>

                     </div>
                 </div>
             </div>
             <!-- Column -->
             <div class="col-md-6 col-lg-2 col-xlg-3">
                 <div class="card card-hover">
                     <div class="box bg-danger text-center" style="width: 242px;">
                         <h1 class="font-light text-white"><i class="mdi mdi-account"></i></h1>
                         <h6 class="text-white">Inactive user<i class="text-white"><?php echo  '(' .DB::table('users')->where('is_active','0')->count() .')'?></i></h6>

                     </div>
                 </div>
             </div>
             <!-- Column -->
             <div class="col-md-6 col-lg-2 col-xlg-3">
                 <div class="card card-hover">
                     <div class="box bg-info text-center" style="width: 241px;">
                         <h1 class="font-light text-white"><i class="mdi mdi-account"></i></h1>
                         <h6 class="text-white">Registered user <i class="text-white"><?php echo '('. \App\admin\User::all()->count() .')'?></i></h6>

                     </div>
                 </div>
             </div>
             <!-- Column -->

         </div>
         <div class="row">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-body">
                           <div class="panel panel-default">
                               <div class="panel-heading">
                                   <h3 class="panel-title">Percentage of Active and Inactive users</h3>
                               </div>
                               <div class="panel-body" align="center">
                                   <div id="pie_chart" style="width:750px; height:450px;">
                                   </div>
                               </div>
                           </div>
                     </div>
                 </div>
             </div>

         </div>

     </div>
{{--</div>--}}
@endsection

