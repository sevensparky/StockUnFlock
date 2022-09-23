@if(session()->has('alert-section-info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>اخطار!</strong>

        <hr>
        <p class="mb-0">{{ session('alert-section-info') }}</p>
    </div>
@endif
