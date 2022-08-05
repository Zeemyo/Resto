<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Order</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('order'); ?>">List Data Order</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Data Order</li>
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
                        <label for="id_order" class="col-sm-2 col-form-label">Id Order</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_order" name="id_order" value="<?= set_value('id_order'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_order') ?>
                            </small>
                        </div>
                    </div>

					<div class="form-group row">
                        <label for="id_makanan" class="col-sm-2 col-form-label">Makanan</label>
                        <div class="col-sm-5">
                            <select class="form-control" id="id_makanan" name="id_makanan">
                                <option value="">Pilih Makanan</option>
								<?php foreach ($data_makanan as $row):?>
								<option value="<?= $row['id_makanan']?>"><?= $row['nama_makanan']?></option>
								<?php endforeach; ?>
                                </select>
                                <small class="text-danger">
								<?php echo form_error('id_makanan') ?>
                            </small>
                        </div>
                    </div>

					<div class="form-group row">
                        <label for="id_minuman" class="col-sm-2 col-form-label">Minuman</label>
                        <div class="col-sm-5">
                            <select class="form-control" id="id_minuman" name="id_minuman">
                                <option value="">Pilih Minuman</option>
								<?php foreach ($data_minuman as $row):?>
								<option value="<?= $row['id_minuman']?>"><?= $row['nama_minuman']?></option>
								<?php endforeach; ?>
                                </select>
                                <small class="text-danger">
								<?php echo form_error('id_minuman') ?>
                            </small>
                        </div>
                    </div>

					<div class="form-group row">
                        <label for="id_dessert" class="col-sm-2 col-form-label">Dessert</label>
                        <div class="col-sm-5">
                            <select class="form-control" id="id_dessert" name="id_dessert">
                                <option value="">Pilih Dessert</option>
								<?php foreach ($data_dessert as $row):?>
								<option value="<?= $row['id_dessert']?>"><?= $row['nama_dessert']?></option>
								<?php endforeach; ?>
                                </select>
                                <small class="text-danger">
								<?php echo form_error('id_dessert') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="no_meja" class="col-sm-2 col-form-label">No Meja</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="no_meja" name="no_meja" value=" <?= set_value('no_meja'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('no_meja') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="total_harga" class="col-sm-2 col-form-label">Total Harga</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="total_harga" name="total_harga" value="<?= set_value('total_harga'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('total_harga') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="uang_bayar" class="col-sm-2 col-form-label_bayar">Uang Bayar</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="uang_bayar" name="uang_bayar" value="<?= set_value('uang_bayar'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('uang_bayar') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="uang_kembali" class="col-sm-2 col-form-label_bayar">Uang Kembali</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="uang_kembali" name="uang_kembali" value="<?= set_value('uang_kembali'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('uang_kembali') ?>
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
