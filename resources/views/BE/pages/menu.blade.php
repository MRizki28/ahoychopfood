@extends('BE.Layouts.Base')
@section('content')
    <div class="page-inner">
        <div class="page-header ">
            <h4 class="page-title">Menu</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class=" d-flex justify-content-end">
                            <button class="btn btn-primary " data-toggle="modal" data-target="#menuModal">Tambah
                                Data
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table " id="dataTable">
                                <thead style="background-color: #f7f8fa;">
                                    <tr class="text-center" style="padding: 0 25px !important;">
                                        <th style="padding: 0 25px !important;" width="50">No</th>
                                        <th style="padding: 0 25px !important;">Nama Menu</th>
                                        <th style="padding: 0 25px !important;">Jenis Kategori</th>
                                        <th style="padding: 0 25px !important;">Gambar</th>
                                        <th style="padding: 0 25px !important;">Harga</th>
                                        <th style="padding: 0 25px !important;">Deskripsi</th>
                                        <th style="padding: 0 25px !important;" width="120">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="menuModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 1024px; ">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-body">
                        <div class="header">
                            <span style="font-size: 20px;" id="modal-title">Tambah Data</span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="form mt-4">
                            <form action="" id="formTambah">
                                @csrf
                                <input type="hidden" name="id" id="id">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-show-validation">
                                            <label for="title">Nama Menu</label>
                                            <input type="text" class="form-control" name="title"
                                                placeholder="Contoh: Nasi Ayam" id="title">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-show-validation">
                                            <label for="id_category">Kategori</label>
                                            <select name="id_category" class="form-control" id="id_category"
                                                style="width: 100%; height: 30px;">
                                                <option value="" selected disabled hidden>Choose here</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price">Gambar</label>
                                            <div class="custom-file">
                                                <input type="file" name="img_menu" id="img_menu"
                                                    class="custom-file-input">
                                                <label class="custom-file-label" for="img_menu"
                                                    id="efile_menu-label">File</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-show-validation">
                                            <label for="price">Harga</label>
                                            <input type="number" class="form-control" name="price" placeholder=""
                                                id="price">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-show-validation">
                                            <label for="desciption">Deskripsi</label>
                                            <textarea class="form-control" name="description" id="desciption" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="button-footer d-flex justify-content-between mt-4">
                                    <div class="d-flex justify-content-end align-items-end" style="width: 100%;">
                                        <button type="button" class="btn text-white mr-3"
                                            style="background-color:#495057; border-radius: 0px;" data-dismiss="modal"
                                            aria-label="Close">Batal</button>
                                        <button class="btn btn-primary" type="submit"
                                            style="border-radius: 0px;">Simpan</button>
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
                if ($.fn.DataTable.isDataTable("#dataTable")) {
                    $("#dataTable").DataTable().destroy();
                }
                let dataTable = $("#dataTable").DataTable();
                $.ajax({
                    type: "GET",
                    url: "{{ url('v1/menu/') }}",
                    dataType: "JSON",
                    success: function(response) {
                        console.log(response)
                        let tableBody = "";
                        $.each(response.data, function(index, item) {
                            tableBody += '<tr>';
                            tableBody +=
                                "<td style='padding: 0 25px !important;' class='text-center'>" +
                                (index + 1) + "</td>";
                            tableBody +=
                                '<td style="padding: 0 25px !important;"  class="text-center">' +
                                item.title +
                                '</td>';
                            tableBody +=
                                '<td style="padding: 0 25px !important;"  class="text-center">' +
                                item.get_category.category +
                                '</td>';
                            tableBody +=
                                "<td>" +
                                `<a href="/img_menu/${item.img_menu}" class="fa-xl" target="_blank"><i class="fa fa-eye"></i></a>` +
                                "</td>";
                            tableBody +=
                                '<td style="padding: 0 25px !important;"  class="text-center">' +
                                item.price +
                                '</td>';
                            tableBody +=
                                '<td style="padding: 0 25px !important;"  class="text-center">' +
                                item.description +
                                '</td>';
                            tableBody +=
                                "<td style='padding: 0 10px !important;'  class='text-left text-center '>" +
                                "<button class='btn btn-sm edit-modal mr-1' data-toggle='modal' data-target='#typeDocumentEditModal' data-id='" +
                                item.id + "'><i class='fas fa-edit'></i></button>" +
                                "<button type='submit' class='delete-confirm btn btn-sm' data-id='" +
                                item.id +
                                "' name='rejected'><i class='fas fa-trash-alt'></i></button>" +
                                "</td>";
                            tableBody += '</tr>';
                        });
                        $("#loading-row").remove();
                        dataTable.clear().rows.add($(tableBody)).draw();
                    }
                });
            }

            function validationCreateData() {
                $('#formTambah').validate({
                    rules: {
                        title: {
                            required: true
                        },
                        id_category: {
                            required: true
                        },
                        img_menu: {
                            required: true,
                            extension: "jpg|jpeg|png|webp"
                        },
                        price: {
                            required: true
                        },
                        description: {
                            required: true
                        },
                    },
                    messages: {
                        title: {
                            required: "Field ini wajib diisi"
                        },
                        id_category: {
                            required: "Field ini wajib diisi"
                        },
                        img_menu: {
                            required: "Field ini wajib diisi",
                            extension: "Format hanya png, jpg, jpeg, webp"
                        },
                        price: {
                            required: "Field ini wajib diisi"
                        },
                        description: {
                            required: "Field ini wajib diisi"
                        },
                    },
                    highlight: function(element) {
                        $(element).closest('.form-group').removeClass('has-success').addClass(
                            'has-error');
                    },

                    success: function(element) {
                        $(element).closest('.form-group').removeClass('has-error').addClass(
                            'has-success');
                    }
                });
            }

            validationCreateData();

            let isEditMode = false;

            function showModal(editMode = false, id = '') {
                isEditMode = editMode;
                if (isEditMode) {
                    $('#modal-title').text('Edit Menu');
                    $('.button-footer button[type="submit"]').text('Update');
                } else {
                    $('#modal-title').text('Tambah Menu');
                    $('.button-footer button[type="submit"]').text('Submit');
                }
                $('#id').val(id);
                $('#menuModal').modal('show');
            }

            $('#formTambah').submit(function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                let submitButton = $(this).find(':submit');

                if (isEditMode) {
                    let id = $('#id').val();
                    submitButton.attr('disabled', true);
                    $('.form-control').removeClass('border-danger');
                    $.ajax({
                        type: "POST",
                        url: "{{ url('v1/account/update') }}/" + id,
                        data: formData,
                        dataType: "JSON",
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            submitButton.attr('disabled', false);

                        },
                        error: function(xhr, status, error) {
                            console.log(error)
                            Swal.fire({
                                title: "Error",
                                html: 'Terjadi kesalahan',
                                icon: "error",
                                timer: 5000,
                                showConfirmButton: true
                            });
                        }
                    });
                } else {
                    submitButton.attr('disabled', true);
                    $.ajax({
                        type: "POST",
                        url: "{{ url('v1/menu/create') }}",
                        data: formData,
                        dataType: "JSON",
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            console.log(response)
                            submitButton.attr('disabled', false);
                            if (response.message == 'Check your validation') {
                                validationCreateData();
                            } else {
                                alert('success')
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(error)
                        }
                    });
                }
            });
        });
    </script>
@endsection
