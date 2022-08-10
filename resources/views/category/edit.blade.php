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
                         Edit Category {{ $category->category_name }}
                     </div>

                     <div class="card-body">
                         <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            @method('PATCH')
                             <div class="mb-3">
                                 <label>Status </label>
                                 <select name="status" class="form-control">
                                    <option value="show" {{ ($category->status == 'show')?'selected':'' }}>Show</option>
                                    <option value="hide" {{ ($category->status == 'hide')?'selected':'' }}>Hide</option>
                                 </select>
                             </div>
                             <div class="mb-3">
                                 <label>Category Name </label>
                                 <input type="text" class="form-control" placeholder="Enter Your Category Name" name="category_name" value="{{ $category->category_name }}">
                             </div>
                             <div class="mb-3">
                                 <label>Category Tagline </label>
                                 <input type="text" class="form-control" placeholder="Enter Your Category tagline" name="category_tagline" value="{{ $category->category_tagline }}">
                             </div>
                             <div class="mb-3">
                                 <label>Old Category Photo</label><br>
                                  <img width="100" src="{{ asset('uploads/category_photos') }}/{{ $category->category_photo }}" alt="">
                             </div>
                             <div class="mb-3">
                                 <label>New Category Photo</label>
                                 <input type="file" class="form-control" name="new_category_photo">
                             </div>
                             <button type="submit" class="btn btn-primary">Add {{ $category->category_name }} Category</button>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endsection
