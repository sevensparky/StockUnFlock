@extends('dashboard::layouts.master')
@section('title', 'ویرایش دسته بندی')
@section('content')
    <div class="container-fluid">
        <section class="d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">ویرایش دسته بندی</h1>
            <a href="{{ route('categories.index') }}" class="btn btn-info" tooltip="انصراف" flow="up" title="انصراف">
                <i class="fa fa-arrow-left"></i></a>
        </section>
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> ویرایش دسته بندی {{ $category->title }}</h6>
            </div>
            <div class="card-body">
                <form class="form" action="{{ route('categories.update', $category->slug) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="title">عنوان دسته بندی</label>
                                <input type="text" class="form-control" name="title" id="title"
                                       placeholder="عنوان دسته بندی را وارد کنید.."
                                       value="{{ old('title', optional($category ?? null)->title) }}"
                                       aria-describedby="title">
                                @error('title')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="link">لینک دسته بندی</label>
                                <input type="text" class="form-control" name="link" id="link"
                                       placeholder="لینک دسته بندی را وارد کنید.."
                                       value="{{ old('link', optional($category ?? null)->link) }}"
                                       aria-describedby="link">
                                <small id="link" class="form-text text-muted">وارد کردن این امر اختیاری ست.</small>

                                @error('link')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
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
