<div class="card-body">
    <div>
        <div class="row">
            @for ($i = 1; $i <= 4; $i++)
                <div class="col-6 col-sm-3 col-md-2 text-center">
                    <div class="text-center">
                        <span class="font-weight-bold" id="label_category_{{ $i }}"></span>
                    </div>
                    <img src="" alt="category" id="preview_{{ $i }}" class="mx-2 pb-2 "
                        style="max-width: 150px; padding-top: 23px" />
                </div>
            @endfor
        </div>
        <div>
            {{ $slot }}
        </div>
    </div>
</div>
