<div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    @if ($useHeaderAddButton == 'true')
                    <div class=" d-flex justify-content-end">
                        <button class="btn btn-primary" data-toggle="modal"
                            data-target="{{ $modalId }}">
                            <i class="fas fa fa-plus"></i> {{ $headerAddButton }}
                        </button>
                    </div>
                    @endif
                </div>

                <div class="m-0 p-0">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
