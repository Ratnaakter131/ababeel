 @extends('layouts.app_auth')
 @section('auth_form')
     <div class="row mt-5">
         <div class="col-lg-10 m-auto">
             <div class="card">
                 <div class="card-header">
                     <h3>Password Reset Request Form</h3>
                 </div>
                 <div class="card-body">
                     <form action="{{ route('pass.reset.store') }}" method="POST">
                         @csrf
                         <div class="mb-3">
                             <label for="" class="form-label">Email Address</label>
                             <input type="email" name="email" class="form-control">
                         </div>

                         <div class="mb-3">
                            <button class="btn btn-success">Send Reset Link</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 @endsection
