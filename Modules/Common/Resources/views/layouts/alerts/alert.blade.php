@push('scripts')
    <script src="{{ asset('panel/js/swal.js') }}"></script>

    @if(session()->has('success'))
        <script>
            swal()
        </script>
    @endif

    @if(session()->has('change-status'))
        <script>
            swalToast('وضعیت با موفقیت تغییر کرد', 'success', 'top-right', 3500)
        </script>
    @endif

    @if(session()->has('trash'))
        <script>
            swalToast('با موفقیت به سطل زباله انتقال یافت', 'success', 'top-right', 3500)
        </script>
    @endif

    @if(session()->has('restore'))
        <script>
            swalToast('با موفقیت بازیابی شد', 'success', 'top-right', 3500)
        </script>
    @endif

    @if(session()->has('restore-all'))
        <script>
            swalToast('آیتم ها با موفقیت بازیابی شدند', 'success', 'top-right', 3500)
        </script>
    @endif

    @if(session()->has('somethingWasWrong'))
        <script>
            swalToast('مشکلی رخ داده لطفا دوباره تلاش کنید', 'success', 'top-right', 3500)
        </script>
    @endif

    @if(session()->has('change-password'))
        <script>
            swalToast('رمز عبور با موفقیت تغییر کرد', 'success', 'top-right', 3500)
        </script>
    @endif

    @if(session()->has('outOfRange'))
        <script>
            swalToast('تعداد کالا برای فروش بیشتر از مقدار موجودی وارد شده است', 'error', 'top-right', 5000)
        </script>
    @endif

    @if(session()->has('emptyStock'))
        <script>
            swalToast('موجودی کافی نیست', 'error', 'top-right', 5000)
        </script>
    @endif

    @if(session()->has('passwordDoesNotMatched'))
        <script>
            swalToast('رمز عبور فعلی صحیح نمی باشد', 'error', 'top-right', 3500)
        </script>
    @endif
@endpush
