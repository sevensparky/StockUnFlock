@extends('dashboard::layouts.master')
@section('title', 'افزودن انبار')
@section('content')
    <div class="container-fluid">
        <section class="d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">افزودن انبار</h1>
            <a href="{{ route('warehouses.index') }}" class="btn btn-info" tooltip="انصراف" flow="up" title="انصراف">
                <i class="fa fa-arrow-left"></i></a>
        </section>
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">ایجاد انبار جدید</h6>
            </div>
            <div class="card-body">
                <form class="form" action="{{ route('warehouses.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="title">نام انبار</label>
                                <input type="text" class="form-control" name="title" id="title"
                                       placeholder="نام انبار را وارد کنید.."
                                       value="{{ old('title', optional($warehouse ?? null)->title) }}"
                                       aria-describedby="title">
                                @error('title')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="tel">تلفن انبار</label>
                                <input type="text" class="form-control" name="tel" id="tel"
                                       placeholder="تلفن انبار را وارد کنید.."
                                       value="{{ old('tel', optional($warehouse ?? null)->tel) }}"
                                       aria-describedby="tel">
                                @error('tel')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">آدرس انبار</label>
                        <textarea class="form-control" name="address" id="address" cols="3" rows="3" placeholder="آدرس انبار را وارد کنید.." style="resize: none"></textarea>
                    </div>

                    <div class="form-group float-left">
                        <button class="btn btn-success">ثبت <i class="fa fa-save"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
