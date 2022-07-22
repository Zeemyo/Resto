<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>tu</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('pesan'); ?>">List Data Pesan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Data Pesan</li>
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
                        <label for="id_pesan" class="col-sm-2 col-form-label">Id Pesan</label>
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
                            <input type="text" class="form-control" id="id_order" name="id_order" value="<?= set_value('id_order'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_order') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_user" class="col-sm-2 col-form-label">ID User</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_user" name="id_user" value="<?= set_value('id_user'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_user') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= set_value('jumlah'); ?>">
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