@extends('dashboard::layouts.master')
@section('title', 'فروش محصول')
@include('common::layouts.alerts.alert')
@section('content')
    <div class="container-fluid">
        <section class="d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">فروش محصول</h1>
            <a href="{{ route('sell.index') }}" class="btn btn-info" tooltip="انصراف" flow="up" title="انصراف">
                <i class="fa fa-arrow-left"></i></a>
        </section>
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> فروش محصول</h6>
            </div>
            <div class="card-body">
                <form class="form" action="{{ route('sell.store') }}" method="post">
                    @csrf

                    <div class="col-md-6 col-sm-12 m-auto">
                        <div class="form-group">
                            <label for="product_id">انتخاب محصول</label>
                            <select class="form-control" name="product_id" id="product_id">
                                <option value="">محصول را انتخاب کنید...</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->title }}</option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label for="quantity">تعداد</label>
                                <input type="text" name="quantity" id="quantity" class="form-control" placeholder="تعداد فروش محصول انتخابی را وارد کنید">
                                <small class="text text-primary"><i class="fa fa-exclamation-circle ml-1"></i>برای وارد کردن
                                    این آیتم کیبورد شما باید انگلیسی باشد</small>
                            </div>
                            @error('product_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group float-left mt-3">
                        <button class="btn btn-success">ثبت <i class="fa fa-save"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
