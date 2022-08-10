 @extends('layouts.app_auth')
 @section('auth_form')
     <div class="row mt-5">
         <div class="col-lg-10 m-auto">
             <div class="card">
                 <div class="card-header">
                     <h3>Password Reset  Form</h3>
                 </div>
                 <div class="card-body">
                     <form action="{{ route('pass.reset.update') }}" method="POST">
                         @csrf
                         <div class="mb-3">
                             <label for="" class="form-label"> New Password </label>
                             <input type="password" name="password" class="form-control">
                         </div>
                         <input type="hidden" name="token" value="{{ $token }}">
                         <div class="mb-3">
                            <button class="btn btn-success">Reset Password</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 @endsection
