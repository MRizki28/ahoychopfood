<form id="formCategory">
    @csrf
    <div class="row" id="categoryInputs">
        @for ($i = 1; $i <= 4; $i++)
            <div class="col-md-6">
                <input type="hidden" name="id[]" id="id_{{ $i }}">
                <div class="form-group">
                    <label for="category_{{ $i }}">Kategori
                        {{ $i }}</label>
                    <input type="text" name="category[]" id="category_{{ $i }}" class="form-control">
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" name="img_category[]" id="img_category_{{ $i }}"
                            class="custom-file-input">
                        <label class="custom-file-label" for="img_category_{{ $i }}"
                            id="efile_surat-label_{{ $i }}">File</label>
                    </div>
                </div>
            </div>
        @endfor
    </div>
    <div class="d-flex justify-content-end mt-3">
        <button class="btn btn-primary" type="submit">Submit</button>
    </div>
</form>