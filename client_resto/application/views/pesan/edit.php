<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Pesan</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('pesan'); ?>">List Data Pesan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data Pesan</li>
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
                        <label for="id_pesan" class="col-sm-2 col-form-label">ID Pesan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_pesan" name="id_pesan" value=" <?= $data_pesan['id_pesan']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('id_pesan') ?>
                            </small>
                        </div>
                    </div>

					<div class="form-group row">
                        <label for="id_order" class="col-sm-2 col-form-label">Id Order</label>
                        <div class="col-sm-5">
                            <select class="form-control" id="id_order" name="id_order">
                                <option value="">Pilih Id Order</option>
								<?php foreach ($data_order as $row):?>
								<option value="<?= $row['id_order']?>"><?= $row['id_order']?></option>
								<?php endforeach; ?>
                                </select>
                                <small class="text-danger">
								<?php echo form_error('id_order') ?>
                            </small>
                        </div>
                    </div>

					<div class="form-group row">
                        <label for="id_user" class="col-sm-2 col-form-label">Id User</label>
                        <div class="col-sm-5">
                            <select class="form-control" id="id_user" name="id_user">
                                <option value="">Pilih Id User</option>
								<?php foreach ($data_user as $row):?>
								<option value="<?= $row['id_user']?>"><?= $row['id_user']?></option>
								<?php endforeach; ?>
                                </select>
                                <small class="text-danger">
								<?php echo form_error('id_user') ?>
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
