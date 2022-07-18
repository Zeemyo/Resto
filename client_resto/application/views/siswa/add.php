<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Siswa</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('siswa'); ?>">List Data Siswa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Data Siswa</li>
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
                        <label for="id_siswa" class="col-sm-2 col-form-label">ID Siswa</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_siswa" name="id_siswa" value="<?= set_value('id_siswa'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_siswa') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="nis" name="nis" value=" <?= set_value('nis'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('nis') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_siswa" class="col-sm-2 col-form-label">Nama Siswa</label>
                        <div class="col-sm-5">
                            <input class="form-control" id="nama_siswa" name="nama_siswa" rows="3"><?= set_value('nama_siswa'); ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('nama_siswa') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-5">
                            <input class="form-control" id="tgl_lahir" name="tgl_lahir" rows=""><?= set_value('tgl_lahir'); ?></input>
                            <small class="text-danger">
                                <?php echo form_error('tgl_lahir') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= set_value('alamat'); ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('alamat') ?>
                            </small>
                        </div>
                    </div>

                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="jns_kelamin" name="jns_kelamin" value="p"
                                        <?php if (set_value('jns_kelamin') == "p") : echo "checked"; endif; ?>>
                                    <label class="form-check-label" for="jns_kelamin">
                                        Perempuan
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="jns_kelamin2" name="jns_kelamin" value="L"
                                        <?php if (set_value('jns_kelamin') == "L") : echo "checked"; endif; ?>>
                                    <label class="form-check-label" for="jns_kelamin2">
                                        Laki Laki
                                    </label>
                                </div>
                                <small class="text-danger">
                                    <?php echo form_error('jns_kelamin') ?>
                                </small>
                            </div>
                        </div>
                    </fieldset>

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