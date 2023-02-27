@if(session()->has('alert-section-error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>خطا!</strong>

        <hr>
        <p class="mb-0">{{ session('alert-section-error') }}</p>
    </div>
@endif
