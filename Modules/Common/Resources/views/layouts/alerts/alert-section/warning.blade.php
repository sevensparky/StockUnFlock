@if(session()->has('alert-section-warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>هشدار!</strong>

        <hr>
        <p class="mb-0">{{ session('alert-section-warning') }}</p>
    </div>
@endif
