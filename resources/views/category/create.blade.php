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
                     <div class="card-header">
                         Add Category List
                     </div>

                     <div class="card-body">
                         <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                             <div class="mb-3">
                                 <label>Category Name </label>
                                 <input type="text" class="form-control" placeholder="Enter Your Category Name" name="category_name">
                             </div>
                             <div class="mb-3">
                                 <label>Category Tagline </label>
                                 <input type="text" class="form-control" placeholder="Enter Your Category tagline" name="category_tagline">
                             </div>
                             <div class="mb-3">
                                 <label>Category Photo</label>
                                 <input type="file" class="form-control" name="category_photo">
                             </div>
                             <button type="submit" class="btn btn-primary">Add New Category</button>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endsection
