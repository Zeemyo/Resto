<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>kbm</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('laporan'); ?>">List Data kbm</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data kbm</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes); ?>
                    <div class="form-group row">
                        <label for="id_laporan" class="col-sm-2 col-form-label">ID Laporan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_laporan" name="id_laporan" value=" <?= $data_kbm['id_laporan']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('id_laporan') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_pesan" class="col-sm-2 col-formlabel">ID Pesan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_pesan" name="id_pesan" value=" <?= $data_kbm['id_pesan']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_pesan') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_makanan" class="col-sm-2 col-formlabel">ID Makanan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_makanan" name="id_makanan" value=" <?= $data_kbm['id_makanan']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_makanan') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_minuman" class="col-sm-2 col-formlabel">ID Minuman</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_minuman" name="id_minuman" value=" <?= $data_kbm['id_minuman']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_minuman') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_dessert" class="col-sm-2 col-formlabel">ID Dessert</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_dessert" name="id_dessert" value=" <?= $data_kbm['id_dessert']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_dessert') ?>
                            </small>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-5 offset-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>