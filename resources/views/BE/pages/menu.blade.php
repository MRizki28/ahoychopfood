@extends('BE.Layouts.Base')
@section('content')
    <div class="page-inner">
        <x-BE.base-header headerName="Menu" headerIcon="fas fa-box"></x-BE.base-header>
        <x-BE.base-body useHeaderAddButton="true" modalId="#menuModal" headerAddButton="Tambah Data">
            <x-BE.base-table initId="dataTable">
                <x-slot name="thead">
                    <tr class="text-center" style="padding: 0 25px !important;">
                        <th style="padding: 0 25px !important;" width="50">No</th>
                        <th style="padding: 0 25px !important;">Nama Menu</th>
                        <th style="padding: 0 25px !important;">Jenis Kategori</th>
                        <th style="padding: 0 25px !important;">Gambar</th>
                        <th style="padding: 0 25px !important;">Harga</th>
                        <th style="padding: 0 25px !important;">Deskripsi</th>
                        <th style="padding: 0 25px !important;" width="120">Aksi</th>
                    </tr>
                </x-slot>
            </x-BE.base-table>
        </x-BE.base-body>
    </div>

    <x-BE.menu.menu-modal></x-BE.menu.menu-modal>

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
