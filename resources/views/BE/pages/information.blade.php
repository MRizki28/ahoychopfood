@extends('BE.Layouts.Base')
@section('content')
    <style>
        .form-group.has-error span {
            color: #F25961;
            font-size: 14px;
        }

        .border.has-error span {
            color: #F25961;
            font-size: 14px;
        }

        .description-border-validation {
            border: 1px solid #F25961 !important
        }

        .description-border-validation-success {
            border: 1px solid #31CE36 !important
        }

        .custom-file.has-error span {
            color: #F25961;
            font-size: 14px;
        }
    </style>
    <div class="page-inner">
        <x-BE.base-header headerName="Menu" headerIcon="fas fa-box"></x-BE.base-header>
        <x-BE.base-body useHeaderAddButton="true" modalId="#menuModal" headerAddButton="Tambah Data">
            <div class="d-flex justify-content-end">
                {{-- Form Search --}}
                <div class="input-icon col-md-2 mb-2 ">
                    <input type="text" class="form-control" placeholder="Cari..." id="form-search">
                    <span class="input-icon-addon p-3 text-center" id="search-button">
                        <i class="fa fa-search " style="cursor: pointer;"></i>
                    </span>
                </div>
            </div>
            <x-BE.base-table initId="table">
                <x-slot name="thead">
                    <tr class="text-center" style="padding: 0 25px !important;">
                        <th style="padding: 0 25px !important;" width="50">No</th>
                        <th style="padding: 0 25px !important;">Title</th>
                        <th style="padding: 0 25px !important;">Gambar</th>
                        <th style="padding: 0 25px !important;">Deskripsi</th>
                        <th style="padding: 0 25px !important;" width="120">Aksi</th>
                    </tr>
                </x-slot>
            </x-BE.base-table>
        </x-BE.base-body>
    </div>

    <x-BE.information.information-modal></x-BE.information.information-modal>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const paramsSearch = () => {
                const search = document.getElementById("form-search").value;
                return {
                    search
                };
            };

            document.getElementById("form-search").addEventListener("keyup", function(event) {
                if (event.keyCode === 13) {
                    getAllData();
                }
            });

            document.getElementById("search-button").addEventListener("click", function() {
                getAllData();
            });

            document.addEventListener("click", async function(event) {
                const pageLink = event.target.closest(".page-link");
                if (pageLink) {
                    event.preventDefault();

                    const url = new URL(pageLink.getAttribute("href"));
                    const fullUrl = url.pathname + url.search;
                    await getAllData(fullUrl);
                }
            });

            const getAllData = async (url) => {
                try {
                    let params = paramsSearch();
                    console.log(params);
                    let endpoint = paramsUrl(
                        url || "{{ url('v1/information') }}",
                        params
                    );
                    console.log(endpoint);
                    const pagination = document.querySelector(".pagination");
                    const tableBody = document.querySelector("#table tbody");
                    const dataNotFoundElem = document.querySelector("#dataNotFound");
                    tableBody.innerHTML = '';
                    pagination.innerHTML = '';

                    const response = await fetch(endpoint);
                    const responseData = await response.json();
                    console.log('data disini', responseData);

                    if (responseData.code == 200) {
                        responseData.data.data.forEach((item, index) => {
                            tableBody.innerHTML += `
                            <tr>
                                <td style='padding: 0 25px !important;' class='text-center'>${index + 1}</td>
                                <td style='padding: 0 25px !important;' class='text-center'>${item.title}</td>
                                <td><a href="/img_information/${item.img_information}" class="fa-xl" target="_blank"><i class="fa fa-eye"></i></a></td>
                                <td style='padding: 0 25px !important;' class='text-center'>${stripHtmlTags(item.description)}</td>
                                <td style='padding: 0 10px !important;' class='text-left text-center '>
                                    <button class='btn btn-sm edit-modal mr-1' data-toggle='modal' data-target='#typeDocumentEditModal' data-id='${item.id}'><i class='fas fa-edit'></i></button>
                                    <button type='submit' class='delete-confirm btn btn-sm' data-id='${item.id}' name='rejected'><i class='fas fa-trash-alt'></i></button>
                                </td>
                            </tr>`;

                            dataNotFoundElem.innerHTML = "";
                        });

                        paginationLink(pagination, responseData);
                    } else {
                        pagination.innerHTML = '';
                        tableBody.innerHTML = '';
                        dataNotFoundElem.innerHTML = dataNotFound();
                    }
                } catch (error) {
                    console.error('Error:', error);
                }
            };
            getAllData();

            let isEditMode = false;

            const showModal = (editMode = false, id = '') => {
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
            };

            document.addEventListener('change', event => {
                if (event.target.matches('#img_information')) {
                    const fileName = event.target.value.split('\\').pop();
                    $('#efile_information-label').text(fileName);
                }
            });

            document.getElementById('formTambah').addEventListener('submit', async e => {
                e.preventDefault();

                validationInformation();
                const formData = new FormData(e.target);
                const submitButton = e.target.querySelector('button[type="submit"]');

                if (isEditMode) {
                    const id = document.getElementById('id').value;
                    submitButton.disabled = true;

                    try {
                        const response = await fetch(`{{ url('v1/account/update') }}/${id}`, {
                            method: 'POST',
                            body: formData
                        });

                        if (response.ok) {
                            submitButton.disabled = false;
                        } else {
                            throw new Error('Network response was not ok.');
                        }
                    } catch (error) {
                        console.error(error);
                        Swal.fire({
                            title: 'Error',
                            html: 'Terjadi kesalahan',
                            icon: 'error',
                            timer: 5000,
                            showConfirmButton: true
                        });
                    }
                } else {
                    submitButton.disabled = true;
                    try {
                        const response = await fetch('{{ url('v1/information/create') }}', {
                            method: 'POST',
                            body: formData
                        });

                        if (response.ok) {
                            const responseData = await response.json();
                            console.log(responseData)
                            submitButton.disabled = false;
                            if (responseData.message === 'Check your validation') {
                                warningAlert();
                            } else {
                                successAlert();
                                window.location.reload()
                            }
                        } else {
                            throw new Error('Network response was not ok.');
                        }
                    } catch (error) {
                        console.error(error);
                    }
                }
            });
        });
    </script>
@endsection
