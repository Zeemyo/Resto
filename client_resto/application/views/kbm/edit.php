<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>kbm</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('kbm'); ?>">List Data kbm</a></li>
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
                        <label for="id_kbm" class="col-sm-2 col-form-label">ID kbm</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_kbm" name="id_kbm" value=" <?= $data_kbm['id_kbm']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('id_kbm') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_siswa" class="col-sm-2 col-formlabel">ID siswa</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_siswa" name="id_siswa" value=" <?= $data_kbm['id_siswa']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_siswa') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_guru" class="col-sm-2 col-formlabel">ID Guru</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_guru" name="id_guru" value=" <?= $data_kbm['id_guru']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_guru') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_mp" class="col-sm-2 col-formlabel">ID Mapel</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_mp" name="id_mp" value=" <?= $data_kbm['id_mp']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_mp') ?>
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