@extends('dashboard::layouts.master')
@section('title', 'ویرایش رمز عبور')
@include('common::layouts.alerts.alert')
@section('content')
    <div class="container-fluid">
        <section class="d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">ویرایش رمز عبور</h1>
            <a href="{{ route('profile.index') }}" class="btn btn-info" tooltip="انصراف" flow="up" title="انصراف">
                <i class="fa fa-arrow-left"></i></a>
        </section>
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> ویرایش رمز عبور</h6>
            </div>
            <div class="card-body">
                <form class="form" action="{{ route('password.change') }}" method="post">
                    @csrf

                    <div class="col-md-6 col-sm-12 m-auto">
                        <div class="form-group">
                            <label for="old_password">رمز عبور فعلی</label>
                            <input type="password" class="form-control" name="old_password" id="old_password"
                                placeholder="رمز عبور فعلی را وارد کنید..."
                                value="{{ old('old_password', optional($user ?? null)->old_password) }}" aria-describedby="old_password">
                            @error('old_password')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="new_password">رمز عبور جدید</label>
                            <input type="password" class="form-control" name="new_password" id="new_password"
                                placeholder="رمز عبور جدید را وارد کنید..."
                                value="{{ old('new_password', optional($user ?? null)->new_password) }}" aria-describedby="new_password">
                            @error('new_password')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="confirm_password">تکرار رمز عبور جدید</label>
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password"
                                placeholder="تکرار رمز عبور جدید خود را وارد کنید..."
                                value="{{ old('confirm_password', optional($user ?? null)->confirm_password) }}" aria-describedby="confirm_password">
                            @error('confirm_password')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group float-left mt-3">
                        <button class="btn btn-success">ثبت <i class="fa fa-save"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
