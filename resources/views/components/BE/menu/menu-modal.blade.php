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