@extends('dashboard::layouts.master')
@section('title', 'ویرایش سوالات متداول')
@section('content')
    <div class="container-fluid">
        <section class="d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">ویرایش سوالات متداول</h1>
            <a href="{{ route('faq.index') }}" class="btn btn-info" tooltip="انصراف" flow="up" title="انصراف">
                <i class="fa fa-arrow-left"></i></a>
        </section>
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> ویرایش سوالات متداول {{ $faq->title }}</h6>
            </div>
            <div class="card-body">
                <form class="form" action="{{ route('faq.update', $faq->slug) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="row">
                            <div class="col-8 m-auto">
                                <label for="question">سوال</label>
                                <input type="text" class="form-control" name="question" id="question"
                                       placeholder="عنوان سوال را وارد کنید.."
                                       value="{{ old('question', optional($faq ?? null)->question) }}"
                                       aria-describedby="question">
                                @error('question')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-8 m-auto">
                                <label for="answer">پاسخ</label>
                                <input type="text" class="form-control" name="answer" id="answer"
                                       placeholder="پاسخ را وارد کنید.."
                                       value="{{ old('answer', optional($faq ?? null)->answer) }}"
                                       aria-describedby="answer">
                                @error('answer')
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
