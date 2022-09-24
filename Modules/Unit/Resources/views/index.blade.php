@extends('dashboard::layouts.master')
@section('title', 'واحد ها')
@include('common::layouts.alerts.alert')
@section('content')
    <div class="container-fluid">
        <section class="d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">واحد ها</h1>

            <div class="btn-group" role="group" aria-label="">
                <a href="{{ route('units.create') }}" class="btn btn-success" tooltip="ایجاد واحد" flow="up"
                   title="ایجاد واحد">
                    <i class="fa fa-plus"></i></a>
                <a href="{{ route('units.trash') }}" class="btn btn-danger" tooltip="سطل زباله" flow="up"
                   title="سطل زباله"><i
                        class="fa fa-trash"></i></a>
            </div>
        </section>
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">مدیریت واحد ها</h6>
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
                        @forelse($units as $item => $unit)
                            <tr>
                                <td>{{ $item + 1 }}</td>
                                <td>{{ $unit->title }}</td>
                                <td class="text-center">
                                    @if($unit->status == 'active')
                                        <span class="badge badge-success">{{ $unit->statusToPersian }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ $unit->statusToPersian }}</span>
                                    @endif
                                </td>
                                <td>{{ setDateToJalali($unit->created_at, '%B %d، %Y') }}</td>
                                <td style="display: block ruby" class="text-center">

                                    <a href="{{ route('units.edit', $unit->slug) }}"
                                       tooltip="ویرایش" flow="up"
                                       class="btn btn-sm btn-warning"><i
                                            class="fa fa-pen"></i></a>

                                    <form action="{{ route('units.change.status', $unit->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" tooltip="تغییر وضعیت" flow="up"
                                                class="btn btn-sm btn-primary">
                                            <i class="fa fa-cog"></i>
                                        </button>
                                    </form>

                                    <form action="{{ route('units.destroy', $unit->slug) }}" method="post">
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

@endpush
