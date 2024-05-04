<div>
    <div class="page-header d-flex justify-content-between align-items-center">
        <h1 class="page-title"><i class="{{ $headerIcon }}"></i>{{ $headerName }}</h1>

        @if ($useHeaderAddButton == 'true')
            <button class="btn btn-info font-weight-bold" data-toggle="modal" data-target="{{ $headerAddButton }}">
                <i class="fas fa fa-plus"></i> {{ $headerAddButton }}
            </button>
        @endif
    </div>
</div>
