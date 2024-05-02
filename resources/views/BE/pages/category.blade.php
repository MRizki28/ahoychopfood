@extends('BE.Layouts.Base')
@section('content')
    <div class="page-inner">
        <div class="page-header ">
            <h4 class="page-title">Kategori</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <div>
                            <div class="row ">
                                @for ($i = 1; $i <= 4; $i++)
                                    <div class="col-6 col-sm-3 col-md-2 text-center">
                                        <div class="text-center">
                                            <span class="font-weight-bold" id="label_category_{{ $i }}"></span>
                                        </div>
                                        <img src="" alt="category"
                                            id="preview_{{ $i }}" class="mx-2 pb-2 "
                                            style="max-width: 150px; padding-top: 23px" />
                                    </div>
                                @endfor
                            </div>
                            <form id="formCategory">
                                @csrf
                                <div class="row" id="categoryInputs">
                                    @for ($i = 1; $i <= 4; $i++)
                                        <div class="col-md-6">
                                            <input type="hidden" name="id[]" id="id_{{ $i }}">
                                            <div class="form-group">
                                                <label for="category_{{ $i }}">Kategori
                                                    {{ $i }}</label>
                                                <input type="text" name="category[]" id="category_{{ $i }}"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <input type="file" name="img_category[]"
                                                        id="img_category_{{ $i }}" class="custom-file-input">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            getAllData();

            function getAllData() {
                $.ajax({
                    url: '{{ url('v1/category') }}',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        response.data.forEach(function(category, index) {
                            $('#id_' + (index + 1)).val(category.id);
                            $('#category_' + (index + 1)).val(category.category);
                            let fileName = category.img_category.split('/').pop();
                            $('#efile_surat-label_' + (index + 1)).text(fileName);
                            $('#label_category_' + (index + 1)).text(category.category)
                            $('#preview_' + (index + 1)).attr('src' , "{{ asset('img_category/') }}/" + category.img_category)

                            $(document).on('change', '#img_category_' + (index + 1),
                                function() {
                                    let fileName = $(this).val().split('\\').pop();
                                    $('#efile_surat-label_' + (index + 1)).text(fileName);
                                });
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            }

            $("#formCategory").submit(function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                let submitButton = $(this).find(':submit');

                submitButton.attr('disabled', true);
                $.ajax({
                    type: "POST",
                    url: "{{ url('v1/category/create') }}",
                    data: formData,
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response)
                        submitButton.attr('disabled', false);
                        if (response.message == 'Check your validation') {
                            alert('Check validasi')
                        } else {
                            alert('Sukses')
                            getAllData();
                        }
                    },
                    error: function(xhr, status, error) {
                        submitButton.attr('disabled', false);
                    }
                });
            });

        });
    </script>
@endsection
