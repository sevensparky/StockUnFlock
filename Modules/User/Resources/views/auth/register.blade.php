@extends('user::layouts.master')
@section('title', 'ایجاد حساب کاربری')
@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">ایجاد حساب کاربری</h1>
                                </div>

                                <form method="POST" action="{{ route('register') }}" class="user">
                                    @csrf
                                    <div class="form-group">
                                        <input type="name" class="form-control form-control-user"
                                            id="name" name="name" aria-describedby="nameHelp"
                                            placeholder="نام خود را وارد کنید..." required autofocus>
                                    </div>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user"
                                            id="email" name="email" aria-describedby="emailHelp"
                                            placeholder="آدرس ایمیل خود را وارد کنید..." required autofocus>
                                    </div>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            id="passsword" name="password" placeholder="رمز عبور خود را وارد کنید..." required autocomplete="current-password">
                                    </div>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            id="password_confirmation" name="password_confirmation" placeholder="تکرار رمز عبور خود را وارد کنید..." required autocomplete="current-password">
                                    </div>
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <label class="custom-control-label" for="remember">مرا به خاطر
                                                بسپار</label>
                                            <input type="checkbox" name="remember" class="custom-control-input" id="remember">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        ثبت نام
                                    </button>
                                    <hr>
                                    <a href="index.html" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i>  ثبت نام به حساب گوگل
                                    </a>
                                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i>  ثبت نام با حساب فیسبوک
                                    </a>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('login') }}">حساب کاربری دارید؟ وارد شوید.</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection
