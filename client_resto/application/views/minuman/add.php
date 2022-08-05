<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Minuman</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('minuman'); ?>">List Data Minuman</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Data Minuman</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes);
                    ?>
                    <div class="form-group row">
                        <label for="id_minuman" class="col-sm-2 col-form-label">ID Minuman</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_minuman" name="id_minuman" value="<?= set_value('id_minuman'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_minuman') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_minuman" class="col-sm-2 col-form-label">Nama Minuman</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_minuman" name="nama_minuman" value=" <?= set_value('nama_minuman'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('nama_minuman') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="harga_minuman" class="col-sm-2 col-form-label">Harga Minuman</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="harga_minuman" name="harga_minuman" value=" <?= set_value('harga_minuman'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('harga_minuman') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="stok_minuman" class="col-sm-2 col-form-label">Stok Minuman</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="stok_minuman" name="stok_minuman" value=" <?= set_value('stok_minuman'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('stok_minuman') ?>
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