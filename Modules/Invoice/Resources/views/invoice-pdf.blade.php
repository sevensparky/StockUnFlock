@extends('dashboard::layouts.master')
@section('title', 'صورتحساب ها')
@include('common::layouts.alerts.alert')
@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <h5 class="text-center font-size-16" style="opacity: 0"></h5>
                                <h5 class="text-center font-size-16 text-dark">صورتحساب فروش کالا و خدمات
                                </h5>

                                <section>
                                    <h6 class="text-dark">شماره سریال: {{ $invoice->invoice_no }}</h6>
                                    <h6 class="text-dark calendar">تاریخ: <input type="text" class="calendar" style="width: 7rem; border: none"></h6>

                                </section>
                            </div>
                            <hr>

                            <section>
                                <h6 class="text-center p-2 text-light" style="background-color: #868181">مشخصات فروشنده</h6> <hr class="text-dark">
                                <div class="row mt-3">
                                    <div class="col-4">
                                        <section>
                                            <h6 class="text-dark">نام فروشنده: فروشنده</h6>
                                        </section>
                                    </div>

                                    <div class="col-4">
                                        <section>
                                            <h6 class="text-dark">کد ملی/ شناسه: فروشنده</h6>
                                        </section>
                                    </div>

                                    <div class="col-4">
                                        <section>
                                            <h6 class="text-dark">کد پستی: فروشنده</h6>
                                        </section>
                                    </div>
                                </div>

                                <div class="row mt-3">

                                    <div class="col-8">
                                        <section>
                                            <h6 class="text-dark">نشانی: ادرس</h6>
                                        </section>
                                    </div>

                                    <div class="col-4">
                                        <section>
                                            <h6 class="text-dark">تلفن: فروشنده</h6>
                                        </section>
                                    </div>
                                </div>
                            </section>

                            <hr>

                            <section>
                                <h6 class="text-center p-2 text-light" style="background-color: #868181">مشخصات مشتری</h6> <hr class="text-dark">
                                <div class="row mt-3">
                                    <div class="col-4">
                                        <section>
                                            <h6 class="text-dark">نام مشتری: فروشنده</h6>
                                        </section>
                                    </div>

                                    <div class="col-4">
                                        <section>
                                            <h6 class="text-dark">کد ملی/ شناسه: فروشنده</h6>
                                        </section>
                                    </div>

                                    <div class="col-4">
                                        <section>
                                            <h6 class="text-dark">کد پستی: فروشنده</h6>
                                        </section>
                                    </div>
                                </div>

                                <div class="row mt-3">

                                    <div class="col-8">
                                        <section>
                                            <h6 class="text-dark">نشانی: ادرس</h6>
                                        </section>
                                    </div>

                                    <div class="col-4">
                                        <section>
                                            <h6 class="text-dark">تلفن: فروشنده</h6>
                                        </section>
                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>

                    <section>
                        <h6 class="text-center p-2 text-light" style="background-color: #868181">مشخصات کالا</h6>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td>عنوان کالا</td>
                                                <td class="text-center">قیمت</td>
                                                <td class="text-center">تعداد
                                                </td>
                                                <td class="text-end">جمع کل</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                            <tr>
                                                <td>BS-200</td>
                                                <td class="text-center">$10.99</td>
                                                <td class="text-center">1</td>
                                                <td class="text-end">$10.99</td>
                                            </tr>
                                            <tr>
                                                <td>BS-400</td>
                                                <td class="text-center">$20.00</td>
                                                <td class="text-center">3</td>
                                                <td class="text-end">$60.00</td>
                                            </tr>
                                            <tr>
                                                <td>BS-1000</td>
                                                <td class="text-center">$600.00</td>
                                                <td class="text-center">1</td>
                                                <td class="text-end">$600.00</td>
                                            </tr>
                                            <tr>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td class="thick-line text-center">
                                                    <strong>جمع نهایی</strong>
                                                </td>
                                                <td class="thick-line text-end">$670.99</td>
                                            </tr>
                                            <tr>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line text-center">
                                                    <strong>قیمت نهایی قابل پرداخت</strong>
                                                </td>
                                                <td class="no-line text-end">
                                                    <h4 class="m-0">$685.99</h4>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="javascript:window.print()"
                                        class="btn btn-success waves-effect waves-light"><i
                                            class="fa fa-print"></i></a>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script src="{{ asset('panel/plugins/datepicker/persian-date.js') }}"></script>
<script src="{{ asset('panel/plugins/datepicker/persian-datepicker.js') }}"></script>

<script>
     $('.calendar').persianDatepicker({
        observer: true,
        format: 'YYYY/MM/DD',
        altField: '.observer-example-alt'
    });
</script>
@endpush

@push('styles')
<link rel="stylesheet" href="{{ asset('panel/plugins/datepicker/persian-datepicker.css') }}">

<style>
    #plotId {
        position: relative !important;
    }

    .calendar,
    .datepicker-plot-area,
    .header-row-cell {
        font-family: "Vazirmatn" !important;
    }
</style>
@endpush


