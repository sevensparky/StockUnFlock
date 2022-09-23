@extends('dashboard::layouts.master')
@section('title', 'افزودن شبکه های اجتماعی')
@section('content')
    <div class="container-fluid">
        <section class="d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">افزودن شبکه های اجتماعی</h1>
            <a href="{{ route('social.index') }}" class="btn btn-info" tooltip="انصراف" flow="up" title="انصراف">
                <i class="fa fa-arrow-left"></i></a>
        </section>
        <div class="card shadow mb-4 mt-3">
            <div class="card-body">
                <div class="alert alert-warning">
                    <p><i class="fas fa-exclamation-triangle"></i>
                       در صورت عدم وجود شماره همراه، صفحه (پیج)، و آیدی (ID) از هر شبکه اجتماعی که در پایین ذکر شده نیاز به پرکردن آن نمی باشد.
                        <br>فقط مواردی را پر کنید که شماره، صفحه (پیج)، و آیدی (ID) آن موجود می باشد.
                    </p>
                </div>

                <form class="form" action="{{ route('social.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="telegram">تلگرام</span>
                                    </div>
                                    <input type="text" class="form-control" name="telegram" id="telegram"
                                           placeholder="شماره تلفن همراه خود را وارد کنید.." aria-describedby="telegram"
                                           value="{{ old('telegram', optional($social ?? null)->telegram) }}">
                                </div>
                                @error('telegram')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="whatsapp">واتس اپ</span>
                                    </div>
                                    <input type="text" class="form-control" name="whatsapp" id="whatsapp"
                                           placeholder="شماره تلفن همراه خود را وارد کنید.." aria-describedby="whatsapp"
                                           value="{{ old('whatsapp', optional($social ?? null)->whatsapp) }}">
                                </div>
                                @error('whatsapp')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="youtube">یوتیوب</span>
                                    </div>
                                    <input type="text" class="form-control" name="youtube" id="youtube"
                                           placeholder="آدرس صفحه خود را وارد کنید.." aria-describedby="youtube"
                                           value="{{ old('youtube', optional($social ?? null)->youtube) }}">
                                </div>
                                @error('youtube')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="twitter">توییتر</span>
                                    </div>
                                    <input type="text" class="form-control" name="twitter" id="twitter"
                                           placeholder="آدرس صفحه یا آیدی خود را وارد کنید.." aria-describedby="twitter"
                                           value="{{ old('twitter', optional($social ?? null)->twitter) }}">
                                </div>
                                @error('twitter')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="facebook">فیسبوک</span>
                                    </div>
                                    <input type="text" class="form-control" name="facebook" id="facebook"
                                           placeholder="آدرس صفحه یا آیدی خود را وارد کنید.." aria-describedby="facebook"
                                           value="{{ old('facebook', optional($social ?? null)->facebook) }}">
                                </div>
                                @error('facebook')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="instagram">اینستاگرام</span>
                                    </div>
                                    <input type="text" class="form-control" name="instagram" id="instagram"
                                           placeholder="آدرس صفحه یا آیدی خود را وارد کنید.." aria-describedby="instagram"
                                           value="{{ old('instagram', optional($social ?? null)->instagram) }}">
                                </div>
                                @error('instagram')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="skype">اسکایپ</span>
                                    </div>
                                    <input type="text" class="form-control" name="skype" id="skype"
                                           placeholder="آدرس صفحه یا آیدی خود را وارد کنید.." aria-describedby="skype"
                                           value="{{ old('skype', optional($social ?? null)->skype) }}">
                                </div>
                                @error('skype')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="aparat">آپارات</span>
                                    </div>
                                    <input type="text" class="form-control" name="aparat" id="aparat"
                                           placeholder="آدرس صفحه یا آیدی خود را وارد کنید.." aria-describedby="aparat"
                                           value="{{ old('aparat', optional($social ?? null)->aparat) }}">
                                </div>
                                @error('aparat')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">

                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="soroush">سروش</span>
                                    </div>
                                    <input type="text" class="form-control" name="soroush" id="soroush"
                                           placeholder="شماره تلفن همراه خود را وارد کنید.." aria-describedby="soroush"
                                           value="{{ old('soroush', optional($social ?? null)->soroush) }}">
                                </div>
                                @error('soroush')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="igap">آی گپ</span>
                                    </div>
                                    <input type="text" class="form-control" name="igap" id="igap"
                                           placeholder="شماره تلفن همراه خود را وارد کنید.." aria-describedby="igap"
                                           value="{{ old('igap', optional($social ?? null)->igap) }}">
                                </div>
                                @error('igap')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="eta">ایتا</span>
                                    </div>
                                    <input type="text" class="form-control" name="eta" id="eta"
                                           placeholder="شماره تلفن همراه خود را وارد کنید.." aria-describedby="eta"
                                           value="{{ old('eta', optional($social ?? null)->eta) }}">
                                </div>
                                @error('eta')
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
