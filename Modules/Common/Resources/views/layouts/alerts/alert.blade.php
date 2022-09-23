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
@endpush
