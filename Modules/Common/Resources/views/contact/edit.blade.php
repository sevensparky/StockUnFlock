@extends('dashboard::layouts.master')
@section('title', 'ویرایش آیتم های بخش تماس با ما')
@section('content')
    <div class="container-fluid">
        <section class="d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">ویرایش آیتم های بخش تماس با ما</h1>
            <a href="{{ route('contact.index') }}" class="btn btn-info" tooltip="انصراف" flow="up" title="انصراف">
                <i class="fa fa-arrow-left"></i></a>
        </section>
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">ویرایش آیتم ها</h6>
            </div>
            <div class="card-body">
                <form class="form" action="{{ route('contact.update') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="email">ایمیل</label>
                                <input type="email" class="form-control" name="email" id="email"
                                       placeholder="ایمیل را وارد کنید.."
                                       value="{{ old('email', optional($contact ?? null)->email) }}"
                                       aria-describedby="email">
                                @error('email')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="phone">شماره ثابت</label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                       placeholder="شماره ثابت را وارد کنید.."
                                       value="{{ old('phone', optional($contact ?? null)->phone) }}"
                                       aria-describedby="phone">
                                @error('phone')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="mobile">تلفن همراه</label>
                                <input type="text" class="form-control" name="mobile" id="mobile"
                                       placeholder="تلفن همراه را وارد کنید.."
                                       value="{{ old('mobile', optional($contact ?? null)->mobile) }}"
                                       aria-describedby="mobile">
                                @error('mobile')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="address">آدرس</label>
                                <textarea class="form-control" name="address" id="address" cols="5" rows="5"
                                          style="resize: none" placeholder="آدرس را وارد کنید..">{{ optional($contact ?? null)->address }}</textarea>
                                @error('address')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-10 m-auto">
                                <label for="info">درباره شرکت</label>
                                <textarea class="form-control" name="info" id="info" cols="5" rows="5"
                                          style="resize: none" placeholder="درباره شرکت را وارد کنید..">{{ optional($contact ?? null)->info }}</textarea>
                                @error('info')
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
