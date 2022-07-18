<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Mapel</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('mapel'); ?>">List Data Mapel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data Mapel</li>
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
                        <label for="id_mp" class="col-sm-2 col-form-label">ID Mapel</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_mp" name="id_mp" value=" <?= $data_mapel['id_mp']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('id_mp') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="kode_mp" class="col-sm-2 col-formlabel">Kode Mapel</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kode_mp" name="kode_mp" value=" <?= $data_mapel['kode_mp']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('kode_mp') ?>
                            </small>
                        </div>
                    </div>
                
                    <div class="form-group row">
                        <label for="nama_mp" class="col-sm-2 col-formlabel">Nama Mapel</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="nama_mp" name="nama_mp" rows="3"><?= $data_mapel['nama_mp']; ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('nama_mp') ?>
                            </small>
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <label for="pertemuan" class="col-sm-2 col-form-label">Pertemuan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="pertemuan" name="pertemuan" value="<?= $data_mapel['pertemuan']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('pertemuan') ?>
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