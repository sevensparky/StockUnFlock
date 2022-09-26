@extends('dashboard::layouts.master')
@section('title', 'افزودن خرید')
@include('common::layouts.alerts.alert')
@section('content')
    <div class="container-fluid">
        <section class="d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">افزودن خرید</h1>
            <a href="{{ route('customers.index') }}" class="btn btn-info" tooltip="انصراف" flow="up" title="انصراف">
                <i class="fa fa-arrow-left"></i></a>
        </section>
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">ایجاد خرید جدید</h6>
            </div>
            <div class="card-body">
                <section class="form">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="date">تاریخ</label>
                                <input type="date" class="form-control" name="date" id="date"
                                    placeholder="تاریخ را وارد کنید.."
                                    value="{{ old('date', optional($customer ?? null)->date) }}"
                                    aria-describedby="date">
                                @error('date')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="purchase_no">شناسه خرید</label>
                                <input type="text" class="form-control" name="purchase_no" id="purchase_no"
                                    placeholder="شناسه خرید را وارد کنید.."
                                    value="{{ old('purchase_no', optional($customer ?? null)->purchase_no) }}"
                                    aria-describedby="purchase_no">
                                @error('purchase_no')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                       <div class="form-group my-3">
                        <div class="row">
                            <div class="col-4">
                                <label for="supplier_id">انتخاب فروشنده</label>
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

                            <div class="col-4">
                                <label for="category_id">انتخاب دسته</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                    </select>
                                @error('category_id')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-4">
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
                <form action="{{ route('purchases.store') }}" method="post">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>نام دسته بندی</th>
                                    <th>نام محصول</th>
                                    <th>واحد</th>
                                    <th>قیمت واحد</th>
                                    <th>توضیحات</th>
                                    <th>قیمت نهایی</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>

                            <tbody id="addRow">
                            </tbody>

                            <tbody>
                                <tr>
                                    <td colspan="5"></td>
                                    <td>
                                        <input type="number" class="form-control amount" name="amount" id="amount" value="0" readonly>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

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
            <input type="hidden" name="purchase_no[]" value="@{{ purchase_no }}">
            <input type="hidden" name="supplier_id[]" value="@{{ supplier_id }}">

            <td>
                <input type="hidden" name="category_id[]" value="@{{ category_id }}">
                @{{ category_name }}
            </td>

            <td>
                <input type="hidden" name="product_id[]" value="@{{ product_id }}">
                @{{ product_name }}
            </td>

            <td>
                <input type="number" min="1" class="form-control buying_quantity" name="buying_quantity[]" value="">
            </td>

            <td>
                <input type="number" class="form-control unit_price" name="unit_price[]" value="">
            </td>

            <td>
                <input type="text" class="form-control" name="description[]" >
            </td>

            <td>
                <input type="number" class="form-control buying_price" name="buying_price[]" value="0" readonly>
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
        $(function(){
            $(document).on('change', '#supplier_id', function(){
                let supplier_id = $(this).val();
                $.ajax({
                    url: "{{ route('get.category') }}",
                    type: 'GET',
                    data: { supplier_id: supplier_id },
                    success: function(data) {
                        let html = "<option value=''>دسته بندی مورد نظر را انتخاب کنید</option>"
                        $.each(data, function(key, value){
                            html += '<option value=" '+ value.category_id +' "> '+ value.category.title +' </option>'
                        });
                        $('#category_id').html(html);
                    }
                })
            })
        });

        $(function(){
            $(document).on('change', '#category_id', function(){
                let category_id = $(this).val();
                $.ajax({
                    url: "{{ route('get.product') }}",
                    type: 'GET',
                    data: { category_id: category_id },
                    success: function(data) {
                        let html = "<option value=''>محصول مورد نظر را انتخاب کنید</option>"
                        $.each(data, function(key, value){
                            html += '<option value=" '+ value.id +' "> '+ value.title +' </option>'
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

        $(document).ready(function(){
            $(document).on('click', '.addMoreEvent', function () {
                let date = $('#date').val();
                let purchase_no = $('#purchase_no').val();
                let supplier_id = $('#supplier_id').val();
                let category_id= $('#category_id').val();
                let category_name = $('#category_id').find('option:selected').text();
                let product_id = $('#product_id').val();
                let product_name = $('#product_id').find('option:selected').text();


                if (category_id == '') {
                    swalToast('یک دسته بندی انتخاب کنید', 'info', 'top-right', 3500);
                    return false;
                }

                if (supplier_id == '') {
                    swalToast('یک فروشنده انتخاب کنید', 'info', 'top-right', 3500);
                    return false;
                }

                if (purchase_no == '') {
                    swalToast('فیلد شناسه خرید الزامی ست', 'error', 'top-right', 3500);
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
                // checkValidationFieldName(purchase_no, 'فیلد شناسه خرید الزامی ست');
                // checkValidationFieldName(supplier_id, 'یک فروشنده انتخاب کنید');
                // checkValidationFieldName(category_id, 'یک دسته بندی انتخاب کنید');
                // checkValidationFieldName(product_id, 'یک محصول انتخاب کنید');

                let src = $('#document-template').html();
                let template = Handlebars.compile(src);
                let data = {
                    date: date,
                    purchase_no: purchase_no,
                    supplier_id: supplier_id,
                    category_id: category_id,
                    category_name: category_name,
                    product_id: product_id,
                    product_name: product_name
                };

                let html = template(data);
                $('#addRow').append(html);
            });

            $(document).on('click', '#removeRow', function(e){
                $(this).closest('#row_item').remove();
                totalAmountPrice();
            });

            $(document).on('keyup click', '.unit_price, .buying_quantity', function () {
                let unit_price = $(this).closest('tr').find('input.unit_price').val();
                let quantity = $(this).closest('tr').find('input.buying_quantity').val();
                let total = unit_price * quantity;
                $(this).closest('tr').find('input.buying_price').val(total);
                totalAmountPrice();
            });

            function totalAmountPrice() {
                let sum = 0;
                $('.buying_price').each(function () {
                    let value = $(this).val();
                    if (!isNaN(value) && value.length != 0) {
                        sum += parseFloat(value);
                    }
                });
                $('#amount').val(sum);
            }
        });


    // function swalToast(title, icon, position, time = 1500) {
    // const Toast = Swal.mixin({
    //     toast: true,
    //     position: position,
    //     iconColor: 'white',
    //     customClass: {
    //         popup: 'colored-toast'
    //     },
    //     showConfirmButton: false,
    //     timer: time,
    //     timerProgressBar: true
    // })

    // $(document).ready(function () {
    //     Toast.fire({
    //         title: title,
    //         icon: icon,
    //     });
    // });
// }
    </script>
@endpush
