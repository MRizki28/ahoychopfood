@extends('BE.Layouts.Base')
@section('content')
    <div class="page-inner">
        <x-BE.base-header headerName="Category" headerIcon="fas fa-box" headerAddButton="Category"
            useHeaderAddButton="false"></x-BE.base-header>
        <x-BE.base-body useHeaderAddButton="false">
            <x-slot name="slot">
                <x-BE.category.category-render>
                    <x-BE.category.form-category></x-BE.category.form-category>
                </x-BE.category.category-render>
            </x-slot>
        </x-BE.base-body>
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
                            $('#preview_' + (index + 1)).attr('src',
                                "{{ asset('img_category/') }}/" + category.img_category)

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
