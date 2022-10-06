@extends('dashboard::layouts.master')
@section('title', 'صورتحساب ها')
@include('common::layouts.alerts.alert')
@section('content')
<div class="container-fluid">
        <section class="d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">فاکتور ها</h1>

            <div class="btn-group" role="group" aria-label="">
                <a href="{{ route('invoices.create') }}" class="btn btn-success" tooltip="ایجاد فاکتور" flow="up"
                    title="ایجاد فاکتور">
                    <i class="fa fa-plus"></i></a>
                <a href="{{ route('invoices.trash') }}" class="btn btn-danger" tooltip="سطل زباله" flow="up"
                    title="سطل زباله"><i class="fa fa-trash"></i></a>
            </div>
        </section>
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">مدیریت صورتحساب ها</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>شناسه</th>
                                {{-- <th>شناسه فاکتور</th> --}}
                                <th>نام مشتری</th>
                                <th>شماره فاکتور</th>
                                <th>توضیحات</th>
                                {{-- <th>وضعیت</th> --}}
                                <th>تاریخ</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($invoices as $item => $invoice)
                                <tr>
                                    <td>{{ $item + 1 }}</td>
                                    {{-- <td>{{ $invoice->customer_id }}</td> --}}
                                    {{-- <td>{{  }}</td> --}}
                                    @dd($invoice->customer)
                                    <td>{{ $invoice->invoice_no }}</td>
                                    <td>{{ $invoice->description }}</td>
                                    {{-- <td class="text-center">
                                        @if ($invoice->status == 'approved')
                                            <span class="badge badge-success">{{ $invoice->statusToPersian }}</span>
                                        @else
                                            <span class="badge badge-warning">{{ $invoice->statusToPersian }}</span>
                                        @endif
                                    </td> --}}
                                    <td>{{ $invoice->date }}</td>

                                    {{-- <td>{{ setDateToJalali($invoice->created_at, '%B %d، %Y') }}</td> --}}
                                    <td style="display: block ruby" class="text-center">

                                       @if ($invoice->status == 'pandding')
                                       <form action="{{ route('invoices.change.status', $invoice->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" tooltip="تغییر وضعیت" flow="up" title=""
                                                    class="btn btn-sm btn-primary">
                                                <i class="fa fa-cog"></i>
                                            </button>
                                        </form>
                                       @endif

                                        <form action="{{ route('invoices.destroy', $invoice->id) }}" method="post">
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
