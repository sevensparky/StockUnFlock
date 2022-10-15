@extends('dashboard::layouts.master')
@section('title', 'فروش ها')
@include('common::layouts.alerts.alert')
@section('content')
    <div class="container-fluid">
        <section class="d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">فروش ها</h1>

            <div class="btn-group" role="group" aria-label="">
                <a href="{{ route('sell.create') }}" class="btn btn-success" tooltip="افزودن فروش" flow="right">
                    <i class="fa fa-plus"></i></a>
            </div>
        </section>
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">مدیریت فروش ها</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>شناسه</th>
                                <th>عنوان محصول</th>
                                <th>تعداد</th>
                                <th>تاریخ ایجاد</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($sells as $item => $sell)

                                <tr>
                                    <td>{{ $item + 1 }}</td>
                                    <td>{{ $sell->title }}</td>
                                    <td>{{ $sell->quantity }}</td>
                                    <td>{{ setDateToJalali($sell->created_at, '%B %d، %Y') }}</td>
                                    <td style="display: block ruby" class="text-center">

                                        <form action="{{ route('sell.destroy', $sell->id) }}" method="post" id="deleteForm">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" tooltip="حذف" flow="up"
                                                class="btn btn-sm btn-danger forceDelete">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="5">
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
    <link href="/panel/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
@push('scripts')
    <script src="/panel/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/panel/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="/panel/js/demo/datatables-demo.js"></script>

    <script>
        swalConfirm('forceDelete', 'deleteForm')
    </script>

@endpush
