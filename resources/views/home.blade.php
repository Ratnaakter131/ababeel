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
            <div class="col-lg-12">
                {{-- <div class="alert alert-success">
                    hi,
                    @if (Auth::user()->role == 1)
                      Customer
                    @else
                     Admin
                    @endif
                </div> --}}
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Dashboard here
                    </div>

                    <div class="card-body">
                        {{-- <table class="table table-bordered table-sm">
                            <tr>
                                <td>Login Id:</td>
                                <td>{{ Auth::id() }}</td>
                            </tr>
                            <tr>
                                <td>Login Name:</td>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <td>Login Email:</td>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                        </table> --}}
                          <div class="row">
                            <div class="col-12">
                                @if (session('final_success'))
                                  <div class="alert alert-success">
                                    {{ session('final_success') }}
                                  </div>
                                @endif
                                <div class="card-box">
                                    <h4 class="header-title mb-4">System  Overview</h4>

                                    <div class="row">
                                        <div class="col-sm-6 col-lg-6 col-xl-3">
                                            <div class="card-box mb-0 widget-chart-two">
                                                <div class="float-right">
                                                    <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                                           data-fgColor="#0acf97" value="{{ $total_users }}" data-skin="tron" data-angleOffset="180"
                                                           data-readOnly=true data-thickness=".1"/>
                                                </div>
                                                <div class="widget-chart-two-content">
                                                    <p class="text-muted mb-0 mt-2">Total Users</p>
                                                    <h4 class="">
                                                        <i class="fa fa-users"></i>{{ $total_users }}
                                                    </h4>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-lg-6 col-xl-3">
                                            <div class="card-box mb-0 widget-chart-two">
                                                <div class="float-right">
                                                    <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                                           data-fgColor="#f9bc0b" value="92" data-skin="tron" data-angleOffset="180"
                                                           data-readOnly=true data-thickness=".1"/>
                                                </div>
                                                <div class="widget-chart-two-content">
                                                    <p class="text-muted mb-0 mt-2">Total Admin </p>
                                                   <h4 class="">

                                                        <i class="fa fa-user-secret"></i>  {{ $total_admin }}
                                                    </h4>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-lg-6 col-xl-3">
                                            <div class="card-box mb-0 widget-chart-two">
                                                <div class="float-right">
                                                    <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                                           data-fgColor="#f1556c" value="14" data-skin="tron" data-angleOffset="180"
                                                           data-readOnly=true data-thickness=".1"/>
                                                </div>
                                                <div class="widget-chart-two-content">
                                                    <p class="text-muted mb-0 mt-2">Total Customer</p>
                                                    <h4 class="">
                                                         <i class="fa fa-users"></i> {{ $total_customer }}
                                                    </h4>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-lg-6 col-xl-3">
                                            <div class="card-box mb-0 widget-chart-two">
                                                <div class="float-right">
                                                    <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                                           data-fgColor="#2d7bf4" value="60" data-skin="tron" data-angleOffset="180"
                                                           data-readOnly=true data-thickness=".1"/>
                                                </div>
                                                <div class="widget-chart-two-content">
                                                    <p class="text-muted mb-0 mt-2">Total Revenue</p>
                                                    <h3 class="">$32,540</h3>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>
                        </div>
                        <!-- end row -->



                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h4 class="header-title">Order Overview</h4>

                                    <div id="website-stats" style="height: 350px;" class="flot-chart mt-5"></div>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h4 class="header-title">Sales Overview</h4>

                                    <div id="combine-chart">
                                        <div id="combine-chart-container" class="flot-chart mt-5" style="height: 350px;">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">

                            <div class="col-lg-4">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Admin Vs Customer </h4>


                                    <div id="donut-chart">
                                        <div id="donut-chart-container" class="flot-chart mt-5" style="height: 340px;">
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- end row -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
