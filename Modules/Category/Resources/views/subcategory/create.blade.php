@extends('dashboard::layouts.master')
@section('title', 'افزودن زیر دسته')
@section('content')
    <div class="container-fluid">
        <section class="d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">افزودن زیر دسته</h1>
            <a href="{{ route('subcategories.index') }}" class="btn btn-info" tooltip="انصراف" flow="up" title="انصراف"><i
                    class="fa fa-arrow-left"></i></a>
        </section>
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">ایجاد زیر دسته جدید</h6>
            </div>
            <div class="card-body">
                <form class="form" action="{{ route('subcategories.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="title">عنوان زیر دسته</label>
                                <input type="text" class="form-control" name="title" id="title"
                                       placeholder="عنوان زیر دسته را وارد کنید.."
                                       value="{{ old('title', optional($subcategory ?? null)->title) }}"
                                       aria-describedby="title">
                                @error('title')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="link">لینک زیر دسته</label>
                                <input type="text" class="form-control" name="link" id="link"
                                       placeholder="لینک زیر دسته را وارد کنید.."
                                       value="{{ old('link', optional($subcategory ?? null)->link) }}"
                                       aria-describedby="link">
                                <small id="link" class="form-text text-muted">وارد کردن این امر اختیاری ست.</small>

                                @error('link')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="category_id">دسته اصلی</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">زیر دسته اصلی را وارد کنید</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>

                                @error('category_id')
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
