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
                         Customer List
                     </div>

                     <div class="card-body">
                       {{-- @if (auth()->user()->role == 2) --}}
                       <table class="table table-bordered table-sm">
                           <tr>
                               <th>Checkbox</th>
                               <th>SL. NO</th>
                               <th>Customer Name</th>
                               <th>Customer Email</th>
                               <th>Action</th>
                           </tr>
                           <form action="{{ route('checkemailoffer') }}" method="POST">
                               @foreach ($customers as $customer)
                                   @csrf
                                   <tr>
                                       <td>
                                           <input type="checkbox" name="check[]" class="form-control" value="{{ $customer->id }}">
                                       </td>
                                       <td>{{ $loop->index + 1 }}</td>
                                       <td>{{ $customer->name }}</td>
                                       <td>{{ $customer->email }}</td>
                                       <td>
                                           <a href="{{ route('singleemailoffer', $customer->id) }}"
                                               class="btn btn-sm btn-success"> Send </a>
                                       </td>
                                   </tr>
                               @endforeach
                               <tr>
                                   <td>
                                       <button class="btn btn-sm btn-success">All Check</button>
                                   </td>
                               </tr>
                           </form>
                       </table>
                       {{-- @else --}}
                          <div class="text-primary text-center">
                                <h4><strong>You are not allow view this page</strong></h4>
                          </div>
                       {{-- @endif --}}
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endsection
