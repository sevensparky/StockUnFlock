@extends('dashboard::layouts.master')
@section('title', 'افزودن مشتری')
@section('content')
    <div class="container-fluid">
        <section class="d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">افزودن مشتری</h1>
            <a href="{{ route('customers.index') }}" class="btn btn-info" tooltip="انصراف" flow="up" title="انصراف">
                <i class="fa fa-arrow-left"></i></a>
        </section>
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">ایجاد مشتری جدید</h6>
            </div>
            <div class="card-body">
                <form class="form" action="{{ route('customers.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4">
                                <label for="name">نام مشتری</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="نام مشتری را وارد کنید.."
                                    value="{{ old('name', optional($customer ?? null)->name) }}" aria-describedby="name">
                                @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-4">
                                <label for="mobile_no">شماره تلفن همراه مشتری</label>
                                <input type="text" class="form-control" name="mobile_no" id="mobile_no"
                                    placeholder="شماره تلفن همراه مشتری را وارد کنید.."
                                    value="{{ old('mobile_no', optional($customer ?? null)->mobile_no) }}"
                                    aria-describedby="mobile_no">
                                @error('mobile_no')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-4">
                                <label for="email">پست الکترونیکی مشتری</label>
                                <input type="text" class="form-control" name="email" id="email"
                                    placeholder="پست الکترونیکی مشتری را وارد کنید.."
                                    value="{{ old('email', optional($customer ?? null)->email) }}" aria-describedby="email">
                                @error('email')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="address">نشانی مشتری</label>
                            <input type="text" class="form-control" name="address" id="address"
                                placeholder="نشانی مشتری را وارد کنید.."
                                value="{{ old('address', optional($customer ?? null)->address) }}"
                                aria-describedby="address">
                            @error('address')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="file">تصویر مشتری</label>

                            <div class="contain animated bounce">
                                <section id="form1" runat="server">
                                    <div class="alert"></div>
                                    <div id='img_contain'>
                                        <img id="blah" align='middle' src="{{ asset('no-image.png') }}" alt="تصویر مشتری"/></div>
                                    <div class="input-group" id="input-group">
                                    <div class="custom-file">
                                    <div class='file file--upload'>
                                        <label for='inputGroupFile01'>
                                          <i class="fa fa-upload"></i>
                                          <span class="mr-2">آپلود تصویر مشتری</span>
                                        </label>
                                      <input name="image" id='inputGroupFile01' type='file' />
                                    </div>
                                  </div>
                                </div>
                                </section>
                            </div>

                            @error('image')
                                <small class="form-text text-danger mt-3">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group float-left">
                            <button class="btn btn-success">ثبت <i class="fa fa-save"></i></button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .contain {
            margin-left: auto;
            margin-right: auto;
            /* margin-top: calc(calc(100vh - 405px)/2); */
        }

        #form1 {
            width: auto;
        }

        .alert {
            text-align: center;
        }

        #blah {
            max-height: 256px;
            height: auto;
            width: auto;
            display: block;
            padding: 5px;
        }

        #img_contain {
            border-radius: 5px;
            margin-top: 20px;
            width: auto;
        }

        #input-group {
            margin-left: calc(calc(100vw - 320px)/2);
            margin-top: 40px;
            width: 320px;
        }

        .imgInp {
            width: 150px;
            margin-top: 10px;
            padding: 10px;
            background-color: #d3d3d3;
        }

        .loading {
            animation: blinkingText ease 2.5s infinite;
        }

        @keyframes blinkingText {
            0% {
                color: #000;
            }

            50% {
                color: #transparent;
            }

            99% {
                color: transparent;
            }

            100% {
                color: #000;
            }
        }

        .custom-file-label {
            cursor: pointer;
        }

        /************CREDITS**************/
        .credit {
            font-size: 12px;
            color: #3d3d3d;
            text-align: left;
            margin-top: 10px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        .credit a {
            color: gray;
        }

        .credit a:hover {
            color: black;
        }

        .credit a:visited {
            color: MediumPurple;
        }


.variants {
  display: flex;
  justify-content: center;
  align-items: center;
}

.variants > div {
  margin-right: 5px;
}

.variants > div:last-of-type {
  margin-right: 0;
}

.file {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
}

.file > input[type='file'] {
  display: none
}

.file > label {
  font-size: 1rem;
  font-weight: 300;
  cursor: pointer;
  outline: 0;
  user-select: none;
  border-color: rgb(216, 216, 216) rgb(209, 209, 209) rgb(186, 186, 186);
  border-style: solid;
  border-radius: 4px;
  border-width: 1px;
  background-color: hsl(0, 0%, 100%);
  color: hsl(0, 0%, 29%);
  padding-left: 16px;
  padding-right: 16px;
  padding-top: 16px;
  padding-bottom: 16px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.file > label:hover {
  border-color: hsl(0, 0%, 21%);
}

.file > label:active {
  background-color: hsl(0, 0%, 96%);
}

.file > label > i {
  padding-right: 5px;
}

.file--upload > label {
  color: hsl(204, 86%, 53%);
  border-color: hsl(204, 86%, 53%);
}

.file--upload > label:hover {
  border-color: hsl(204, 86%, 53%);
  background-color: hsl(204, 86%, 96%);
}

.file--upload > label:active {
  background-color: hsl(204, 86%, 91%);
}

.file--uploading > label {
  color: hsl(48, 100%, 67%);
  border-color: hsl(48, 100%, 67%);
}

.file--uploading > label > i {
  animation: pulse 5s infinite;
}

.file--uploading > label:hover {
  border-color: hsl(48, 100%, 67%);
  background-color: hsl(48, 100%, 96%);
}

.file--uploading > label:active {
  background-color: hsl(48, 100%, 91%);
}

.file--success > label {
  color: hsl(141, 71%, 48%);
  border-color: hsl(141, 71%, 48%);
}

.file--success > label:hover {
  border-color: hsl(141, 71%, 48%);
  background-color: hsl(141, 71%, 96%);
}

.file--success > label:active {
  background-color: hsl(141, 71%, 91%);
}

.file--danger > label {
  color: hsl(348, 100%, 61%);
  border-color: hsl(348, 100%, 61%);
}

.file--danger > label:hover {
  border-color: hsl(348, 100%, 61%);
  background-color: hsl(348, 100%, 96%);
}

.file--danger > label:active {
  background-color: hsl(348, 100%, 91%);
}

.file--disabled {
  cursor: not-allowed;
}

.file--disabled > label {
  border-color: #e6e7ef;
  color: #e6e7ef;
  pointer-events: none;
}

@keyframes pulse {
  0% {
    color: hsl(48, 100%, 67%);
  }
  50% {
    color: hsl(48, 100%, 38%);
  }
  100% {
    color: hsl(48, 100%, 67%);
  }
}


    </style>
@endpush

@push('scripts')
    <script>
        $("#inputGroupFile01").change(function(event) {
            RecurFadeIn();
            readURL(this);
        });
        $("#inputGroupFile01").on('click', function(event) {
            RecurFadeIn();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var filename = $("#inputGroupFile01").val();
                filename = filename.substring(filename.lastIndexOf('\\') + 1);
                reader.onload = function(e) {
                    debugger;
                    $('#blah').attr('src', e.target.result);
                    $('#blah').hide();
                    $('#blah').fadeIn(500);
                    $('.custom-file-label').text(filename);
                }
                reader.readAsDataURL(input.files[0]);
            }
            $(".alert").removeClass("loading").hide();
        }

        function RecurFadeIn() {
            console.log('ran');
            FadeInAlert("انتظار برای آپلود تصویر...");
        }

        function FadeInAlert(text) {
            $(".alert").show();
            $(".alert").text(text).addClass("loading");
        }
    </script>
@endpush
