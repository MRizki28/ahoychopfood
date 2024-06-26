<div class="modal fade " id="informationModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title">
                                <span></span>
                            </div>
                            <div class="form-group">
                                <label for="img_information">Gambar</label>
                                <div class="custom-file">
                                    <input type="file" name="img_information" id="img_information" class="custom-file-input">
                                    <label class="custom-file-label" for="img_information" id="efile_information-label">Pilih
                                        file...</label>
                                    <span></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="border p-2">
                                    <label for="description">Deskripsi</label>
                                    <textarea name="description" class="input-description " id="description"></textarea>
                                    <span class="error-description"></span>
                                </div>
                            </div>
                            <div class="button-footer d-flex justify-content-between mt-4">
                                <div class="d-flex justify-content-end align-items-end" style="width: 100%;">
                                    <button type="button" class="btn text-white mr-3"
                                        style="background-color:#495057; border-radius: 0px;" data-dismiss="modal"
                                        aria-label="Close">Batal</button>
                                    <button class="btn btn-outline-danger" type="submit"
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
        $('#description').summernote({
            tabsize: 2,
            height: 100,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['view', ['codeview']]
            ],
        });
    });
</script>
