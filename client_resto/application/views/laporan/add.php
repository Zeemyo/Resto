<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Laporan</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('laporan'); ?>">List Data Laporan</a></li>
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
                        <label for="id_pesan" class="col-sm-2 col-form-label">Pesan</label>
                        <div class="col-sm-5">
                            <select class="form-control" id="id_pesan" name="id_pesan">
                                <option value="">Pilih Pesanan</option>
								<?php foreach ($data_pesan as $row):?>
								<option value="<?= $row['id_pesan']?>"><?= $row['id_pesan']?></option>
								<?php endforeach; ?>
                                </select>
                                <small class="text-danger">
								<?php echo form_error('id_pesan') ?>
                            </small>
                        </div>
                    </div>

					<div class="form-group row">
                        <label for="id_order" class="col-sm-2 col-form-label">Orderan</label>
                        <div class="col-sm-5">
                            <select class="form-control" id="id_order" name="id_order">
                                <option value="">Pilih Orderan</option>
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
                        <label for="tgl_laporan" class="col-sm-2 col-form-label">Tanggal Laporan</label>
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
