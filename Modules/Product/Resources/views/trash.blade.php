@extends('dashboard::layouts.master')
@section('title', 'محصولات')
@include('common::layouts.alerts.alert')
@section('content')
    <div class="container-fluid">
        <section class="d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">سطل زباله</h1>

            <div class="btn-group" role="group">
                <a href="{{ route('products.restore.all') }}" class="btn btn-warning"
                   tooltip="بازیابی همه" flow="up" title="بازیابی همه"><i
                        class="fa fa-reply-all"></i></a>

                <a href="{{ route('products.index') }}" class="btn btn-primary"
                   tooltip="بازگشت" flow="up" title="بازگشت"><i
                        class="fa fa-arrow-left"></i></a>
            </div>
        </section>
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">محصولات حذف شده</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>شناسه</th>
                            <th>عنوان</th>
                            <th>وضعیت</th>
                            <th>تاریخ ایجاد</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($products as $item => $unit)
                            <tr>
                                <td>{{ $item + 1 }}</td>
                                <td>{{ $unit->title }}</td>
                                <td>
                                    @if($unit->status == 'active')
                                        <span class="badge badge-success">{{ $unit->statusToPersian }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ $unit->statusToPersian }}</span>
                                    @endif
                                </td>
                                <td>{{ setDateToJalali($unit->created_at, '%B %d، %Y') }}</td>
                                <td style="display: block ruby" class="text-center">

                                    <form action="{{ route('products.force.delete', $unit->id) }}" method="post" id="forceDeleteForm">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="حذف" tooltip="حذف" flow="right"
                                                class="btn btn-sm btn-danger forceDelete">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
                                    </form>

                                    <form action="{{ route('products.restore', $unit->id) }}" method="get">
                                        @csrf
                                        <button type="submit" title="بازیابی" tooltip="بازیابی" flow="right"
                                                class="btn btn-sm btn-info">
                                            <i class="fa fa-history"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <td colspan="5"><h6 class="text-center">موردی یافت نشد</h6></td>
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
        swalConfirm('forceDelete', 'forceDeleteForm')
    </script>
@endpush
