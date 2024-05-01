@extends('BE.Layouts.Base')
@section('content')
    <div class="page-inner">
        <div class="page-header ">
            <h4 class="page-title">Kategori</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <div>
                            <form id="formCategory">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="category[]">Kategori 1</label>
                                            <input type="text" name="category[]" id="category1" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="img_category[]">Gambar</label>
                                            <input type="file" name="img_category[]" id="img_category1"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="category[]">Kategori 2</label>
                                            <input type="text" name="category[]" id="category1" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="img_category[]">Gambar</label>
                                            <input type="file" name="img_category[]" id="img_category1"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="category[]">Kategori 3</label>
                                            <input type="text" name="category[]" id="category1" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="img_category[]">Gambar</label>
                                            <input type="file" name="img_category[]" id="img_category1"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="category[]">Kategori 4</label>
                                            <input type="text" name="category[]" id="category1" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="img_category[]">Gambar</label>
                                            <input type="file" name="img_category[]" id="img_category1"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script></script>
@endsection
