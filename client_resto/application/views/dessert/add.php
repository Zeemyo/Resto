<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Dessert</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('dessert'); ?>">List Data Dessert</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Data Dessert</li>
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
                        <label for="id_dessert" class="col-sm-2 col-form-label">ID Dessert</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_dessert" name="id_dessert" value="<?= set_value('id_dessert'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_dessert') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_dessert" class="col-sm-2 col-form-label">Nama Dessert</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="nama_dessert" name="nama_dessert" value=" <?= set_value('nama_dessert'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('nama_dessert') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="harga_dessert" class="col-sm-2 col-form-label">Harga Dessert</label>
                        <div class="col-sm-5">
                            <input class="form-control" id="harga_dessert" name="harga_dessert" rows="3"><?= set_value('harga_dessert'); ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('harga_dessert') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="stok_dessert" class="col-sm-2 col-form-label">Stok Dessert</label>
                        <div class="col-sm-5">
                            <input class="form-control" id="stok_dessert" name="stok_dessert" rows=""><?= set_value('stok_dessert'); ?></input>
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