<div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    @if ($useHeaderAddButton == 'true')
                        <button class="btn btn-info font-weight-bold" data-toggle="modal"
                            data-target="{{ $headerAddButton }}">
                            <i class="fas fa fa-plus"></i> {{ $headerAddButton }}
                        </button>
                    @endif
                </div>

                <div class="m-0 p-0">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
