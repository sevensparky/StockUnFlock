@extends('dashboard::layouts.master')
@section('title', 'داشبورد')
@include('common::layouts.alerts.alert')
@section('content')
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-10 m-auto">
                <section class="d-flex justify-content-between">
                    <h1 class="h3 mb-4 text-gray-800">تقویم سال</h1>
                </section>

                <div class="calendar"></div>

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
