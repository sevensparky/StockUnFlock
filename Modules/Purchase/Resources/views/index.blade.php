@extends('dashboard::layouts.master')
@section('title', 'خرید ها')
@include('common::layouts.alerts.alert')
@section('content')
<div class="container-fluid">
        <section class="d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">خرید ها</h1>

            <div class="btn-group" role="group" aria-label="">
                <a href="{{ route('purchases.create') }}" class="btn btn-success" tooltip="ایجاد خرید" flow="up"
                    title="ایجاد خرید">
                    <i class="fa fa-plus"></i></a>
                <a href="{{ route('purchases.trash') }}" class="btn btn-danger" tooltip="سطل زباله" flow="up"
                    title="سطل زباله"><i class="fa fa-trash"></i></a>
            </div>
        </section>
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">مدیریت خرید ها</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>شناسه</th>
                                <th>شناسه خرید</th>
                                <th>نام مشتری</th>
                                <th>نام محصول</th>
                                <th>عنوان دسته</th>
                                <th>تعداد</th>
                                <th>وضعیت</th>
                                <th>تاریخ</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($purchases as $item => $purchase)
                                <tr>
                                    <td>{{ $item + 1 }}</td>
                                    <td>{{ $purchase->purchase_no }}</td>
                                    <td>{{ $purchase->supplier->name }}</td>
                                    <td>{{ $purchase->product->title }}</td>
                                    <td>{{ $purchase->category->title }}</td>
                                    <td>{{ $purchase->buying_quantity }}</td>
                                    <td class="text-center">
                                        @if ($purchase->status == 'approved')
                                            <span class="badge badge-success">{{ $purchase->statusToPersian }}</span>
                                        @else
                                            <span class="badge badge-warning">{{ $purchase->statusToPersian }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $purchase->date }}</td>

                                    {{-- <td>{{ setDateToJalali($purchase->created_at, '%B %d، %Y') }}</td> --}}
                                    <td style="display: block ruby" class="text-center">

                                       @if ($purchase->status == 'pandding')
                                       <form action="{{ route('purchases.change.status', $purchase->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" tooltip="تغییر وضعیت" flow="up" title=""
                                                    class="btn btn-sm btn-primary">
                                                <i class="fa fa-cog"></i>
                                            </button>
                                        </form>
                                       @endif

                                        <form action="{{ route('purchases.destroy', $purchase->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" tooltip="انتقال به سطل زباله" flow="right"
                                                class="btn btn-sm btn-danger"> <i class="fa fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="8">
                                    <h6 class="text-center">موردی یافت نشد</h6>
                                </td>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link href="{{ asset('panel/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    <script src="{{ asset('panel/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('panel/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('panel/js/demo/datatables-demo.js') }}"></script>

    @if(session()->has('notFoundItem'))
    <script>
        swalToast("{{ session('notFoundItem') }}", 'warning', 'top-right', 5000)
    </script>
    @endif
@endpush
