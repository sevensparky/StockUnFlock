@extends('dashboard::layouts.master')
@section('title', 'ایجاد صورتحساب')
@include('common::layouts.alerts.alert')
@section('content')
    <div class="container-fluid">
        <section class="d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">ایجاد فاکتور</h1>
            <a href="{{ route('customers.index') }}" class="btn btn-info" tooltip="انصراف" flow="up" title="انصراف">
                <i class="fa fa-arrow-left"></i></a>
        </section>
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">ایجاد صورتحساب جدید</h6>
            </div>
            <div class="card-body">
                <section class="form">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="date">تاریخ</label>
                                <input type="date" class="form-control" name="date" id="date"
                                    placeholder="تاریخ را وارد کنید.."
                                    value="{{ old('date', optional($customer ?? null)->date) }}" aria-describedby="date">
                                @error('date')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-3">
                                <label for="invoice_no">شناسه فاکتور</label>
                                <input type="text" class="form-control" name="invoice_no" id="invoice_no"
                                    placeholder="شناسه فاکتور را وارد کنید.."
                                    value="{{ old('invoice_no', optional($customer ?? null)->invoice_no) }}"
                                    aria-describedby="invoice_no">
                                @error('invoice_no')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-3">
                                <label for="product_quantity">تعداد موجودی از این محصول</label>
                                <input type="text" class="form-control" name="product_quantity" id="product_quantity"
                                    readonly>
                            </div>

                        </div>

                        <div class="form-group my-3">
                            <div class="row">
                                <div class="col-3">
                                    <label for="category_id">انتخاب دسته</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option value="">دسته مورد نظر را انتخاب کنید...</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <label for="product_id">انتخاب محصول</label>
                                    <select class="form-control" name="product_id" id="product_id">
                                    </select>
                                    @error('product_id')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group float-left">
                            <button class="btn btn-info addMoreEvent">ادامه <i class="fa fa-arrow-left"></i></button>
                        </div>
                </section>
            </div>

            <div class="card-body">
                <form action="{{ route('invoices.store') }}" method="post">
                    @csrf
                    <div class="">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>نام دسته بندی</th>
                                    <th>نام محصول</th>
                                    <th>واحد</th>
                                    <th>قیمت واحد</th>
                                    <th>قیمت نهایی</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>

                            <tbody id="addRow">
                            </tbody>

                            <tbody>

                                <tr>
                                    <td colspan="4"></td>
                                    <td>
                                        <label for="discount_amount">مقدار تخفیف</label>
                                        <input type="number" class="form-control discount_amount" name="discount_amount"
                                            id="discount_amount" value="0" placeholder="مقدار تخفیف">
                                    </td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td colspan="4"></td>
                                    <td>
                                        <input type="number" class="form-control total_amount" name="total_amount" id="total_amount"
                                            value="0" readonly>
                                    </td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td class="form-group" colspan="7">
                                        <label for="description">توضیحات کوتاه صورتحساب (اختیاری)</label>
                                        <textarea class="form-control description" name="description" id="description" placeholder="توضیحات کوتاهی وارد کنید"
                                            cols="3" rows="3" style="resize: none;"></textarea>
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="paid_status">وضعیت پرداخت</label>
                                    <select name="paid_status" id="paid_status" class="form-control">
                                        <option value="">وضعیت پرداخت را مشخص کنید</option>
                                        <option value="full_paid">full paid</option>
                                        <option value="full_due">full due</option>
                                        <option value="partial_paid">partial paid</option>
                                    </select>

                                    <input type="text" class="form-control paid_amount mt-2" name="paid_amount"
                                        id="paid_amount" placeholder="مقدار بدهی را وارد کنید" style="display: none;">
                                </div>

                                <div class="col-6">
                                    <label for="customer_id">مشتری</label>
                                    <select name="customer_id" id="customer_id" class="form-control">
                                        <option value="">انتخاب مشتری</option>
                                        <option value="0">مشتری جدید</option>
                                        @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mt-4" id="newCustomer" style="display: none;">
                                <div class="row">
                                    <div class="col-4">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="نام مشتری">
                                    </div>

                                    <div class="col-4">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="ایمیل مشتری">
                                    </div>

                                    <div class="col-4">
                                        <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="کلمه عبور">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group float-left">
                                <button class="btn btn-success">ثبت <i class="fa fa-save"></i></button>
                            </div>
                        </div>

                </form>

            </div>

        </div>
    </div>

    <script id="document-template" type="text/x-handlebars-template">

        <tr class="row_item" id="row_item">

            <input type="hidden" name="date[]" value="@{{ date }}">
            <input type="hidden" name="invoice_no[]" value="@{{ invoice_no }}">
            <input type="hidden" name="category_id[]" value="@{{ category_id }}">

            <td>
                <input type="hidden" name="category_id[]" value="@{{ category_id }}">
                @{{ category_name }}
            </td>

            <td>
                <input type="hidden" name="product_id[]" value="@{{ product_id }}">
                @{{ product_name }}
            </td>

            <td>
                <input type="number" min="1" class="form-control selling_quantity" name="selling_quantity[]" value="">
            </td>

            <td>
                <input type="number" class="form-control unit_price" name="unit_price[]" value="">
            </td>

            <td>
                <input type="number" class="form-control selling_price" name="selling_price[]" value="0" readonly>
            </td>

            <td>
                <button class="btn btn-danger btn-sm" id="removeRow"><i class="fa fa-trash"></i></button>
            </td>
        </tr>

    </script>


@endsection

@push('scripts')
    <script src="{{ asset('panel/js/handlebars.js') }}"></script>

    <script>
        $(function() {
            $(document).on('change', '#product_id', function() {
                let product_id = $(this).val();
                $.ajax({
                    url: "{{ route('get.product.stock') }}",
                    type: 'GET',
                    data: {
                        product_id: product_id
                    },
                    success: function(data) {
                        $('#product_quantity').val(data);
                    }
                })
            })
        });

        $(function() {
            $(document).on('change', '#category_id', function() {
                let category_id = $(this).val();
                $.ajax({
                    url: "{{ route('get.product') }}",
                    type: 'GET',
                    data: {
                        category_id: category_id
                    },
                    success: function(data) {
                        let html = "<option value=''>محصول مورد نظر را انتخاب کنید</option>"
                        $.each(data, function(key, value) {
                            html += '<option value=" ' + value.id + ' "> ' + value
                                .title + ' </option>'
                        });
                        $('#product_id').html(html);
                    }
                })
            })
        });

        function checkValidationFieldName(fieldName, message) {
            if (fieldName == '') {
                swalToast(message, 'danger', 'top-right', 3500);
                return false;
            }
        }

        $(document).ready(function() {
            $(document).on('click', '.addMoreEvent', function() {
                let date = $('#date').val();
                let invoice_no = $('#invoice_no').val();
                // let category_id = $('#category_id').val();
                let category_id = $('#category_id').val();
                let category_name = $('#category_id').find('option:selected').text();
                let product_id = $('#product_id').val();
                let product_name = $('#product_id').find('option:selected').text();


                if (category_id == '') {
                    swalToast('یک دسته بندی انتخاب کنید', 'info', 'top-right', 3500);
                    return false;
                }

                if (invoice_no == '') {
                    swalToast('فیلد شناسه فاکتور الزامی ست', 'error', 'top-right', 3500);
                    return false;
                }

                if (date == '') {
                    swalToast('فیلد تاریخ الزامی است', 'error', 'top-right', 3500);
                    return false;
                }

                if (product_id == '') {
                    swalToast('یک محصول انتخاب کنید', 'info', 'top-right', 3500);
                    return false;
                }

                // checkValidationFieldName(date, 'فیلد تاریخ الزامی است');
                // checkValidationFieldName(invoice_no, 'فیلد شناسه فاکتور الزامی ست');
                // checkValidationFieldName(category_id, 'یک فروشنده انتخاب کنید');
                // checkValidationFieldName(category_id, 'یک دسته بندی انتخاب کنید');
                // checkValidationFieldName(product_id, 'یک محصول انتخاب کنید');

                let src = $('#document-template').html();
                let template = Handlebars.compile(src);
                let data = {
                    date: date,
                    invoice_no: invoice_no,
                    category_id: category_id,
                    category_name: category_name,
                    product_id: product_id,
                    product_name: product_name
                };

                let html = template(data);
                $('#addRow').append(html);
            });

            $(document).on('click', '#removeRow', function(e) {
                $(this).closest('#row_item').remove();
                totalAmountPrice();
            });

            $(document).on('keyup click', '.unit_price, .selling_quantity', function() {
                let unit_price = $(this).closest('tr').find('input.unit_price').val();
                let quantity = $(this).closest('tr').find('input.selling_quantity').val();
                let total = unit_price * quantity;
                $(this).closest('tr').find('input.selling_price').val(total);
                // totalAmountPrice();

                $('#discount_amount').trigger('keyup');

            });

            $(document).on('keyup', '#discount_amount', function() {
                totalAmountPrice();
            })

            function totalAmountPrice() {
                let sum = 0;
                $('.selling_price').each(function() {
                    let value = $(this).val();
                    if (!isNaN(value) && value.length != 0) {
                        sum += parseFloat(value);
                    }
                });

                let discount_amount = parseFloat($('#discount_amount').val());
                if (!isNaN(discount_amount) && discount_amount.length != 0) {
                    sum -= parseFloat(discount_amount);
                }
                $('#total_amount').val(sum);
            }
        });

        $(document).on('change', '#paid_status', function() {
            let paid_status = $(this).val();
            if (paid_status == 'partial_paid') {
                $('.paid_amount').show();
            } else {
                $('.paid_amount').hide();
            }
        });

        $(document).on('change', '#customer_id', function() {
            let customerId = $(this).val();
            if (customerId == '0') {
                $('#newCustomer').show();
            }else{
                $('#newCustomer').hide();
            }
        });

    </script>
@endpush
