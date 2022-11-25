@extends('dashboard::layouts.master')
@section('title', 'داشبورد')
@include('common::layouts.alerts.alert')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">داشبورد</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col ml-2">
                                <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                    فروش (امروز)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">۴۰۰,۰۰۰ هزار تومان</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col ml-2">
                                <div class="text-md font-weight-bold text-success text-uppercase mb-1">
                                    فروش (این ماه)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">۴۰۰,۰۰۰ هزار تومان</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-money-bill-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col ml-2">
                                <div class="text-md font-weight-bold text-info text-uppercase mb-1">
                                    تعداد کل محصولات
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 ml-3 font-weight-bold text-gray-800">{{ $products }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-cube fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col ml-2">
                                <div class="text-md font-weight-bold text-warning text-uppercase mb-1">
                                    سود فروش (امروز)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">۱۸</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-adjust fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                 aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">تقویم</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="calendar"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


@push('styles')
    <link rel="stylesheet" href="{{ asset('panel/plugins/datepicker/persian-datepicker.css') }}">

    <style>
        #plotId{
                position: relative !important;
            }
            .calendar, .datepicker-plot-area, .header-row-cell{
                font-family: "Vazirmatn" !important;
            }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('panel/plugins/datepicker/persian-date.js') }}"></script>
    <script src="{{ asset('panel/plugins/datepicker/persian-datepicker.js') }}"></script>

    <script>
        $('.calendar').persianDatepicker({
            inline: true,
            altField: '#inlineExampleAlt',
            altFormat: 'LLLL',
            maxDate: new persianDate().add('month', 3).valueOf(),
            minDate: new persianDate().subtract('month', 3).valueOf(),
            timePicker: {
                enabled: true,
                meridiem: {
                    enabled: true
                }
            }
        });
    </script>
@endpush
