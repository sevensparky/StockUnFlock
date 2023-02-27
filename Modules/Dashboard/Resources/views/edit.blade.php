@extends('dashboard::layouts.master')
@section('title', 'ویرایش اطلاعات')
@section('content')
    <div class="container-fluid">
        <section class="d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">ویرایش اطلاعات</h1>
            <a href="{{ route('profile.index') }}" class="btn btn-info" tooltip="انصراف" flow="up" title="انصراف">
                <i class="fa fa-arrow-left"></i></a>
        </section>
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> ویرایش اطلاعات</h6>
            </div>
            <div class="card-body">
                <form class="form" action="{{ route('profile.update', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="name">نام و نام خانوادگی</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="نام خود را وارد کنید..."
                                    value="{{ old('name', optional($user ?? null)->name) }}" aria-describedby="name">
                                @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="username">نام کاربری</label>
                                <input type="text" class="form-control" name="username" id="username"
                                    placeholder="نام کاربری خود را وارد کنید.."
                                    value="{{ old('username', optional($user ?? null)->username) }}" aria-describedby="username">
                                @error('username')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="phone">شماره تلفن</label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                    placeholder="شماره تلفن خود را وارد کنید.."
                                    value="{{ old('phone', optional($user ?? null)->phone) }}" aria-describedby="phone">
                                @error('phone')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="email">ایمیل (اختیاری)</label>
                                <input type="text" class="form-control" name="email" id="email"
                                    placeholder="ایمیل خود را وارد کنید.."
                                    value="{{ old('email', optional($user ?? null)->email) }}" aria-describedby="email">
                                @error('email')
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
