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
                            <form id="formCategory">
                                @csrf
                                <div class="row" id="categoryInputs">
                                    @for ($i = 1; $i <= 4; $i++)
                                        <div class="col-md-5">
                                            <input type="hidden" name="id[]" id="id_{{ $i }}">
                                            <div class="form-group">
                                                <label for="category_{{ $i }}">Kategori {{ $i }}</label>
                                                <input type="text" name="category[]" id="category_{{ $i }}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="img_category_{{ $i }}">Gambar</label>
                                                <input type="file" name="img_category[]" id="img_category_{{ $i }}" class="form-control">
                                            </div>
                                        </div>
                                    @endfor
                                    <div>
                                        <button type="submit">Submit</button>
                                    </div>
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
                        }else{
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
