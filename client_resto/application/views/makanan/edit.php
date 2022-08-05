<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Makanan</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('Guru'); ?>">List Data Makanan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data Makanan</li>
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
                        <label for="id_makanan" class="col-sm-2 col-form-label">ID Makanan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_makanan" name="id_makanan" value=" <?= $data_makanan['id_makanan']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('id_makanan') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_makanan" class="col-sm-2 col-formlabel">Nama Makanan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_makanan" name="nama_makanan" value=" <?= $data_makanan['nama_makanan']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('nama_makanan') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="harga_makanan" class="col-sm-2 col-formlabel">Harga_makanan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="harga_makanan" name="harga_makanan" value=" <?= $data_makanan['harga_makanan']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('harga_makanan') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="stok_makanan" class="col-sm-2 col-form-label">Stok Makanan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="stok_makanan" name="stok_makanan" rows="3"><?= $data_makanan['stok_makanan']; ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('stok_makanan') ?>
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