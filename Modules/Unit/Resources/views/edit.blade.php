@extends('dashboard::layouts.master')
@section('title', 'ویرایش واحد')
@section('content')
    <div class="container-fluid">
        <section class="d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">ویرایش واحد</h1>
            <a href="{{ route('units.index') }}" class="btn btn-info" tooltip="انصراف" flow="up" title="انصراف">
                <i class="fa fa-arrow-left"></i></a>
        </section>
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> ویرایش واحد</h6>
            </div>
            <div class="card-body">
                <form class="form" action="{{ route('units.update', $unit->slug) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <label for="title">عنوان واحد</label>
                                <input type="text" class="form-control" name="title" id="title"
                                       placeholder="عنوان واحد را وارد کنید.."
                                       value="{{ old('title', optional($unit ?? null)->title) }}"
                                       aria-describedby="title">
                                @error('title')
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
