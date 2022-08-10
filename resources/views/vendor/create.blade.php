 @extends('layouts.app')
 @section('breadcrumb')
     <div class="page-title-box">
         <h4 class="page-title">Main Home Page </h4>
         <ol class="breadcrumb">
             <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
         </ol>
     </div>
 @endsection
 @section('content')
     <div class="container">
         <div class="row justify-content-center">

             <div class="col-md-8">
                 <div class="card">
                     <div class="card-header bg-primary">
                         Add Vendor
                     </div>

                     <div class="card-body">
                         <form action="{{ route('vendor.store') }}" method="POST">
                            @csrf
                             <div class="mb-3">
                                 <label>Vendor Name </label>
                                 <input type="text" class="form-control" placeholder="Enter Your vendor Name"  name="vendor_name">
                             </div>
                             <div class="mb-3">
                                 <label>Vendor Email </label>
                                 <input type="email" class="form-control" placeholder="Enter Your vendor email" name="vendor_email">
                             </div>
                             <div class="mb-3">
                                 <label>Vendor Phone Number </label>
                                 <input type="text" class="form-control" placeholder="Enter Your vendor phone Number" name="vendor_phone">
                             </div>
                             <div class="mb-3">
                                 <label>Vendor Address </label>
                                 <input type="text" class="form-control" placeholder="Enter Your vendor address" name="vendor_address">
                             </div>
                             <button type="submit" class="btn btn-primary">Add New Vendor</button>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endsection
