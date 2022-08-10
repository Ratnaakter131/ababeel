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
                         Add Location
                     </div>

                     <div class="card-body">
                         <form action="{{ route('location.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                             <div class="form-group">
                                 <label>Location Name </label>
                                 <select id="country_dropdown" name="countries[]" multiple="multiple" class="form-control">

                                    @foreach ($countries as $country)
                                    <option {{ ($country->status == 'active') ? 'selected':'' }} value="{{ $country->id }}">{{ $country->name }} </option>
                                    @endforeach
                                 </select>
                             </div>
                             <button type="submit" class="btn btn-primary">Update Location</button>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endsection
 @section('footer_scripts')
   <script>
    $(document).ready(function() {
    $('#country_dropdown').select2();
});
   </script>
 @endsection

