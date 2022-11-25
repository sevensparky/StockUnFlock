@extends('dashboard::layouts.master')
@section('title', 'افزودن محصول')
@include('common::layouts.alerts.alert')
@section('content')
    <div class="container-fluid">
        <section class="d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">افزودن محصول</h1>
            <a href="{{ route('products.index') }}" class="btn btn-info" tooltip="انصراف" flow="up" title="انصراف">
                <i class="fa fa-arrow-left"></i></a>
        </section>
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">ایجاد محصول جدید</h6>
            </div>
            <div class="card-body">
                <form class="form" action="{{ route('products.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <label >کد کالا</label>

                                <section class="d-inline-block mr-3">
                                    <label for="product_code_manual">
                                        <input type="radio" name="product_code" class="inline checkbox" id="product_code_manual"
                                            value="false">
                                        دستی
                                    </label>

                                    <label for="product_code_automatic">
                                        <input type="radio" name="product_code" class="inline checkbox" id="product_code_automatic"
                                            value="true" checked>
                                        اتوماتیک
                                    </label>
                                </section>


                                <section>
                                    <input type="text" class="form-control" name="product_code" id="product_code"
                                    style="display: none" placeholder="کد کالا را وارد کنید..." value="false">
                                    <small id="notice_product_code" class="text text-primary" style="display: none">
                                        <i class="fa fa-exclamation-circle ml-1"></i>برای وارد کردن
                                        این آیتم کیبورد شما باید انگلیسی باشد</small>
                                </section>

                                @error('product_code')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <label >شماره فاکتور</label>

                                <section class="d-inline-block mr-3">
                                    <label for="invoice_code_manual">
                                        <input type="radio" name="invoice_code" class="inline checkbox" id="invoice_code_manual"
                                            value="false">
                                        دستی
                                    </label>

                                    <label for="invoice_code_automatic">
                                        <input type="radio" name="invoice_code" class="inline checkbox" id="invoice_code_automatic"
                                            value="true" checked>
                                        اتوماتیک
                                    </label>
                                </section>

                                <section>
                                    <input type="text" class="form-control" name="invoice_code"
                                    id="invoice_code" style="display: none" placeholder="شماره فاکتور را وارد کنید..." value="false">
                                    <small id="notice_invoice_code" class="text text-primary" style="display: none">
                                        <i class="fa fa-exclamation-circle ml-1"></i>برای وارد کردن
                                        این آیتم کیبورد شما باید انگلیسی باشد</small>
                                </section>

                                @error('invoice_code')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12">
                                <label for="title">عنوان محصول</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    value="{{ old('title', optional($product ?? null)->title) }}"
                                    placeholder="عنوان محصول را وارد کنید...">
                                @error('title')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <label for="quantity">تعداد محصول</label>
                                <input type="text" class="form-control" name="quantity" id="quantity"
                                    value="{{ old('quantity', optional($product ?? null)->quantity) }}"
                                    placeholder="تعداد محصول را وارد کنید...">
                                <small class="text text-primary"><i class="fa fa-exclamation-circle ml-1"></i>برای وارد کردن
                                    این آیتم کیبورد شما باید انگلیسی باشد</small>
                                @error('quantity')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <label for="category_id">دسته بندی</label>
                                <select class="form-control" name="category_id" id="category_id">
                                    <option value="">دسته بندی مورد نظر را انتخاب کنید...</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <label for="unit_id">واحد</label>
                                <select class="form-control" name="unit_id" id="unit_id">
                                    <option value="">واحد مورد نظر را انتخاب کنید...</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->title }}</option>
                                    @endforeach
                                </select>
                                @error('unit_id')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <label for="supplier_id">فروشنده</label>
                                <select class="form-control" name="supplier_id" id="supplier_id">
                                    <option value="">فروشنده مورد نظر را انتخاب کنید...</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                                @error('supplier_id')
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

@push('scripts')
    <script>
        $("#product_code_manual").on('change', function() {
            if ($(this).is(':checked')) {
                $(this).attr('value', 'true');
                $("#product_code_automatic").attr('value', 'false');
            } else {
                $(this).attr('value', 'false');
                $("#product_code_automatic").attr('value', 'true');
            }
        });

        $("#product_code_automatic").on('change', function() {
            if ($(this).is(':checked')) {
                $(this).attr('value', 'true');
                $("#product_code_manual").attr('value', 'false');
            } else {
                $(this).attr('value', 'false');
                $("#product_code_manual").attr('value', 'true');
            }
        });

        $("#invoice_code_manual").on('change', function() {
            if ($(this).is(':checked')) {
                $(this).attr('value', 'true');
                $("#invoice_code_automatic").attr('value', 'false');
            } else {
                $(this).attr('value', 'false');
                $("#invoice_code_automatic").attr('value', 'true');
            }
        });

        $("#invoice_code_automatic").on('change', function() {
            if ($(this).is(':checked')) {
                $(this).attr('value', 'true');
                $("#invoice_code_manual").attr('value', 'false');
            } else {
                $(this).attr('value', 'false');
                $("#invoice_code_manual").attr('value', 'true');
            }
        });

        $(document).on('change', '#product_code_manual', function() {
            let manual = $(this).val();
            if (manual == 'true') {
                $('#product_code').attr('value', '');
                $('#product_code').show();
                $('#notice_product_code').show();
            }
        });

        $(document).on('change', '#product_code_automatic', function() {
            let automatic = $(this).val();
            if (automatic == 'true') {
                $('#product_code').hide();
                $('#product_code').attr('value', 'false');
                $('#notice_product_code').hide();
            }
        });

        $(document).on('change', '#invoice_code_manual', function() {
            let manual = $(this).val();
            if (manual == 'true') {
                $('#invoice_code').show();
                $('#invoice_code').attr('value', '');
                $('#noitce_invoice_code').show();
            }
        });

        $(document).on('change', '#invoice_code_automatic', function() {
            let automatic = $(this).val();
            if (automatic == 'true') {
                $('#noitce_invoice_code').hide();
                $('#invoice_code').hide();
                $('#invoice_code').attr('value', 'false');
            }
        });
    </script>
@endpush
