<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Dessert</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('dessert'); ?>">List Data Dessert</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data Dessert</li>
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
                        <label for="id_dessert" class="col-sm-2 col-form-label">ID Dessert</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_dessert" name="id_dessert" value=" <?= $data_siswa['id_dessert']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('id_dessert') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_dessert" class="col-sm-2 col-formlabel">Dessert</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_dessert" name="nama_dessert" value=" <?= $data_siswa['nama_dessert']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('nama_dessert') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="harga_dessert" class="col-sm-2 col-formlabel">Harga Dessert</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="harga_dessert" name="harga_dessert" rows="3"><?= $data_siswa['harga_dessert']; ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('harga_dessert') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="stok_dessert" class="col-sm-2 col-formlabel">Stok Dessert</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="stok_dessert" name="stok_dessert" value=" <?= $data_siswa['stok_dessert']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('stok_dessert') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-md-2">
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