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

             <div class="col-md-12">
                 <div class="card">
                     <div class="card-header">
                         Add Category List
                     </div>

                     <div class="card-body">
                          <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($products as $product)
                                  <tr class="text-center">
                                    <td>{{ $product->product_name }}</td>
                                     <td>BD: {{ $product->product_price }}</td>
                                   {{-- <td>{{ $category->category_tagline }}</td>
                                    <td>
                                        <img width="100" height="50" src="{{ asset('uploads/category_photos') }}/{{ $category->category_photo }}" alt="">
                                    </td> --}}
                                    {{-- <td>
                                        <a href="{{ route('category.edit', $category->id) }}" class="btn-sm btn-warning">Edit</a>
                                         <form class="mt-3" action="{{ route('category.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button  type="submit" class="btn-sm btn-dark">Trashed</button>
                                          </form>
                                    </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                          </table>

                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endsection
