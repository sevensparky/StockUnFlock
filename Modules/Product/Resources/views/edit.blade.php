@extends('dashboard::layouts.master')
@section('title', 'ویرایش محصول')
@include('common::layouts.alerts.alert')
@section('content')
    <div class="container-fluid">
        <section class="d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">ویرایش محصول</h1>
            <a href="{{ route('products.index') }}" class="btn btn-info" tooltip="انصراف" flow="up" title="انصراف">
                <i class="fa fa-arrow-left"></i></a>
        </section>
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">ویرایش محصول</h6>
            </div>
            <div class="card-body">
                <form class="form" action="{{ route('products.update', $product->slug) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4">
                                <label for="category_id">دسته بندی</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option value="">دسته بندی مورد نظر را انتخاب کنید...</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                @error('category_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-4">
                                <label for="unit_id">واحد</label>
                                    <select class="form-control" name="unit_id" id="unit_id">
                                        <option value="">واحد مورد نظر را انتخاب کنید...</option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}" {{ $unit->id == $product->unit_id ? 'selected' : '' }}>{{ $unit->title }}</option>
                                        @endforeach
                                    </select>
                                @error('unit_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-4">
                                <label for="supplier_id">فروشنده</label>
                                    <select class="form-control" name="supplier_id" id="supplier_id">
                                        <option value="">فروشنده مورد نظر را انتخاب کنید...</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}" {{ $supplier->id == $product->supplier_id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                                        @endforeach
                                    </select>
                                @error('supplier_id')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-8">
                                <label for="title">عنوان محصول</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                                value="{{ old('title', optional($product ?? null)->title) }}" placeholder="عنوان محصول را وارد کنید...">
                                @error('title')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-4">
                                <label for="quantity">تعداد محصول</label>
                                    <input type="text" class="form-control" name="quantity" id="quantity"
                                            value="{{ old('quantity', optional($product ?? null)->quantity) }}" placeholder="تعداد محصول را وارد کنید...">
                                        <small class="text text-primary"><i class="fa fa-exclamation-circle ml-1"></i>برای وارد کردن این آیتم کیبورد شما باید انگلیسی باشد</small>
                                @error('quantity')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group float-left">
                        <button class="btn btn-success">ثبت <i class="fa fa-save"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
