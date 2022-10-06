@extends('user::layouts.master')
@section('title', 'ورود')
@section('content')
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">خوش آمدید!</h1>
                                </div>

                                <form method="POST" action="{{ route('login') }}" class="user">
                                    @csrf
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

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        ورود
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('password.request') }}">فراموشی رمز عبور</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route('register') }}">ایجاد حساب کاربری</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image: url({{ asset('login.webp') }}) !important;"></div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection
