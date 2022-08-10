 @extends('layouts.app_auth')
 @section('auth_form')
     <div class="card-box p-5">
         <h2 class="text-uppercase text-center pb-4">
             <a href="" class="text-success">
                 <span><img src="{{ asset('dashboard/assets/images/logo.png') }}" alt="" height="26"></span>
             </a>
         </h2>

         <form class="" action="{{ route('login') }}" method="POST">
            @csrf
             <div class="form-group m-b-20 row">
                 <div class="col-12">
                     <label for="emailaddress">Email address</label>
                     <input class="form-control" type="email" id="emailaddress" required=""
                         placeholder="Enter your email" name="email" >
                         @error('email')
                            <span class="text-danger">{{ $message }}</span>
                         @enderror
                 </div>
             </div>

             <div class="form-group row m-b-20">
                 <div class="col-12">
                     <a href="page-recoverpw.html" class="text-muted pull-right"><small>Forgot your password?</small></a>
                     <label for="password">Password</label>
                     <input class="form-control" type="password" required="" id="password"
                         placeholder="Enter your password" name="password" >
                 </div>
             </div>

             <div class="form-group row m-b-20">
                 <div class="col-12">

                     <div class="checkbox checkbox-custom">
                         <input id="remember" type="checkbox" name="remember">
                         <label for="remember">
                             Remember me
                         </label>
                     </div>

                 </div>
             </div>

             <a href="{{ route('pass_reset_req') }}">Forgot Your Password ?</a>

             <div class="form-group row text-center m-t-10 mt-5">
                 <div class="col-12">
                     <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Sign In</button>
                 </div>
             </div>

         </form>

         <div class="row m-t-50">
             <div class="col-sm-12 text-center">
                 <p class="text-muted">Don't have an account? <a href="{{ route('register') }}" class="text-dark m-l-5"><b>Register</b></a></p>
             </div>
         </div>

     </div>
 @endsection
