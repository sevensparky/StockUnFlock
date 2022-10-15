@extends('dashboard::layouts.master')
@section('title', 'افزودن دسته بندی')
@section('content')
    <div class="container-fluid">
        <section class="d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">افزودن دسته بندی</h1>
            <a href="{{ route('categories.index') }}" class="btn btn-info" tooltip="انصراف" flow="up" title="انصراف">
                <i class="fa fa-arrow-left"></i></a>
        </section>
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">ایجاد دسته بندی جدید</h6>
            </div>
            <div class="card-body">
                <form class="form" action="{{ route('categories.store') }}" method="post">
                    @csrf

                    <div class="col-12">
                        <div class="form-group">
                            <label for="title">عنوان دسته بندی</label>

                            <input type="text" class="form-control" name="title" id="title"
                                placeholder="عنوان دسته بندی را وارد کنید.."
                                value="{{ old('title', optional($category ?? null)->title) }}" aria-describedby="title">
                            @error('title')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
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
