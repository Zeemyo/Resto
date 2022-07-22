<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Laporan</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('laporan'); ?>">List_Data_Laporan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Laporan</li>
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
                        <label for="id_laporan" class="col-sm-2 col-form-label">ID Laporan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_laporan" name="id_laporan" value="<?= set_value('id_laporan'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_laporan') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_pesan" class="col-sm-2 col-form-label">ID Pesan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_pesan" name="id_pesan" value="<?= set_value('id_pesan'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_pesan') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_order" class="col-sm-2 col-form-label">ID Order</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_order" name="id_order" value=" <?= set_value('id_order'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_order') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_makanan" class="col-sm-2 col-form-label">ID Makanan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_makanan" name="id_makanan" value=" <?= set_value('id_makanan'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_makanan') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_minuman" class="col-sm-2 col-form-label">ID Minuman</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_minuman" name="id_minuman" value=" <?= set_value('id_minuman'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_minuman') ?>
                            </small>
                        </div>
                    </div>  

                    <div class="form-group row">
                        <label for="id_dessert" class="col-sm-2 col-form-label">ID Dessert</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_dessert" name="id_dessert" value=" <?= set_value('id_dessert'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_dessert') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tgl_laporan" class="col-sm-2 col-form-label">TGL Laporan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="tgl_laporan" name="tgl_laporan" value=" <?= set_value('tgl_laporan'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('tgl_laporan') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="jumlah" name="jumlah" value=" <?= set_value('jumlah'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('jumlah') ?>
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