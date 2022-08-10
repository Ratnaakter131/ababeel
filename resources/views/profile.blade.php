@extends('layouts.app')
@section('breadcrumb')
    <div class="page-title-box">
        <h4 class="page-title">Profile Page</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Change Your Name
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-primary">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('profile.namechange') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control"  value="{{ Auth::user()->name }}"
                                 name="name">

                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-success btn-sm">Add info</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-header">
                        Change Your Photo
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-primary">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-12 text-center">
                                <img src="100" src="{{ asset('uploads/profile_photos').'/'.Auth::user()->profile_photo }}" alt="">
                            </div>
                        </div>
                        <form action="{{ route('profile.photochange') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Your Photo</label>
                                <input type="file" class="form-control"
                                 name="new_profile_photo" accept=".jpg,.png">

                                @error('new_profile_photo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-success btn-sm">Change Photo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Change Your Password
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-primary">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('success_p'))
                            <div class="alert alert-primary">
                                {{ session('success_p') }}
                            </div>
                        @endif
                        {{-- @if ($errors->any())
                            <div class="alert alert-primary">
                               @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                               @endforeach
                            </div>
                        @endif --}}
                        <form action="{{ route('profile.changepassword') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Old Password</label>
                                <input class="form-control" type="password"
                                   name="old_password">
                            </div>
                            <div class="form-group">
                                <label for="">New Password</label>
                                <input class="form-control" type="password"
                                    name="password">
                            </div>
                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input class="form-control" type="password"
                                      name="con_password">
                            </div>


                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-success btn-sm">Change password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
