@extends('dashboard::layouts.master')
@section('title', 'انبار ها')
@include('common::layouts.alerts.alert')
@section('content')
    <div class="container-fluid">
        <section class="d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">انبار ها</h1>

            <div class="btn-group" role="group" aria-label="">
                <a href="{{ route('warehouses.create') }}" class="btn btn-success" tooltip="ایجاد انبار" flow="up"
                   title="ایجاد انبار">
                    <i class="fa fa-plus"></i></a>
                <a href="{{ route('warehouses.trash') }}" class="btn btn-danger" tooltip="سطل زباله" flow="up"
                   title="سطل زباله"><i
                        class="fa fa-trash"></i></a>
            </div>
        </section>
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">مدیریت انبار ها</h6>
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
                        @forelse($warehouses as $item => $warehouse)
                            <tr>
                                <td>{{ $item + 1 }}</td>
                                <td>{{ $warehouse->title }}</td>
                                <td class="text-center">
                                    @if($warehouse->status == 'active')
                                        <span class="badge badge-success">{{ $warehouse->statusToPersian }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ $warehouse->statusToPersian }}</span>
                                    @endif
                                </td>
                                <td>{{ setDateToJalali($warehouse->created_at, '%B %d، %Y') }}</td>
                                <td style="display: block ruby" class="text-center">

                                    <a href="{{ route('warehouses.edit', $warehouse->slug) }}"
                                       tooltip="ویرایش" flow="up"
                                       class="btn btn-sm btn-warning"><i
                                            class="fa fa-pen"></i></a>

                                    <form action="{{ route('warehouses.change.status', $warehouse->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" tooltip="تغییر وضعیت" flow="up"
                                                class="btn btn-sm btn-primary">
                                            <i class="fa fa-cog"></i>
                                        </button>
                                    </form>

                                    <form action="{{ route('warehouses.destroy', $warehouse->slug) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" tooltip="انتقال به سطل زباله" flow="up"
                                                class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash-alt"></i>
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

    @if(session()->has('notFoundItem'))
    <script>
        swalToast("{{ session('notFoundItem') }}", 'warning', 'top-right', 5000)
    </script>
    @endif
@endpush
