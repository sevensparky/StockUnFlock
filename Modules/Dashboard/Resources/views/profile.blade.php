@extends('dashboard::layouts.master')
@section('title', 'پروفایل')
@include('common::layouts.alerts.alert')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">مدیریت حساب کاربری</h1>
            <a href="{{ route('profile.edit', $user->id) }}" tooltip="ویرایش اطلاعات" flow="right"
                class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                <i class="fa fa-pen fa-sm text-white"></i> </a>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mt-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col ml-2">
                                <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                                    نام</div>
                                <h5 class="h5 mb-0 mt-4 font-weight-bold text-gray-800">{{ $user->name }}</h5>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-circle fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mt-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col ml-2">
                                <div class="text-sm font-weight-bold text-success text-uppercase mb-1">
                                    نام کاربری</div>
                                <h5 class="h5 mb-0 mt-4 font-weight-bold text-gray-800">{{ $user->username }}</h5>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-tag fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mt-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col ml-2">
                                <div class="text-sm font-weight-bold text-info text-uppercase mb-1">شماره تلفن
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <h5 class="h5 mt-4 mb-0 ml-3 font-weight-bold text-gray-800">{{ $user->phone }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-phone-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-md-6 mt-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col ml-2">
                                <div class="text-sm font-weight-bold text-warning text-uppercase mb-1">ایمیل
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <h6 class="h6 mt-4 mb-0 font-weight-bold text-gray-800" style="font-size: 0.9em">{{ $user->email }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-at fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
