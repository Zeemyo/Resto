<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Guru</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('Guru'); ?>">List Data Guru</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data Guru</li>
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
                        <label for="id_guru" class="col-sm-2 col-form-label">ID Guru</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_guru" name="id_guru" value=" <?= $data_guru['id_guru']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('id_guru') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nip" class="col-sm-2 col-formlabel">NIP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nip" name="nip" value=" <?= $data_guru['nip']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('nip') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_guru" class="col-sm-2 col-formlabel">Nama Guru</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_guru" name="nama_guru" value=" <?= $data_guru['nama_guru']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('nama_guru') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $data_guru['alamat']; ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('alamat') ?>
                            </small>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="email" name="email" value=" <?= $data_guru ['email']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('email') ?>
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