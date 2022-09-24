@extends('dashboard::layouts.master')
@section('title', 'افزودن فروشنده')
@section('content')
    <div class="container-fluid">
        <section class="d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">افزودن فروشنده</h1>
            <a href="{{ route('suppliers.index') }}" class="btn btn-info" tooltip="انصراف" flow="up" title="انصراف">
                <i class="fa fa-arrow-left"></i></a>
        </section>
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">ایجاد فروشنده جدید</h6>
            </div>
            <div class="card-body">
                <form class="form" action="{{ route('suppliers.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4">
                                <label for="name">نام فروشنده</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="نام فروشنده را وارد کنید.."
                                    value="{{ old('name', optional($supplier ?? null)->name) }}" aria-describedby="name">
                                @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-4">
                                <label for="mobile_no">شماره تلفن همراه فروشنده</label>
                                <input type="text" class="form-control" name="mobile_no" id="mobile_no"
                                    placeholder="شماره تلفن همراه فروشنده را وارد کنید.."
                                    value="{{ old('mobile_no', optional($supplier ?? null)->mobile_no) }}" aria-describedby="mobile_no">
                                    <small class="text text-primary"><i class="fa fa-exclamation-circle ml-1"></i>برای وارد کردن این آیتم کیبورد شما باید انگلیسی باشد</small>
                                @error('mobile_no')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-4">
                                <label for="email">پست الکترونیکی فروشنده</label>
                                <input type="text" class="form-control" name="email" id="email"
                                    placeholder="پست الکترونیکی فروشنده را وارد کنید.."
                                    value="{{ old('email', optional($supplier ?? null)->email) }}" aria-describedby="email">
                                @error('email')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="address">نشانی فروشنده</label>
                            <input type="text" class="form-control" name="address" id="address"
                                placeholder="نشانی فروشنده را وارد کنید.."
                                value="{{ old('address', optional($supplier ?? null)->address) }}" aria-describedby="address">
                            @error('address')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group float-left">
                            <button class="btn btn-success">ثبت <i class="fa fa-save"></i></button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
