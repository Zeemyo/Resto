<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>tu</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('guru'); ?>">List Data tu</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Data tu</li>
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
                        <label for="id_tu" class="col-sm-2 col-form-label">Id TU</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_tu" name="id_tu" value="<?= set_value('id_tu'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_tu') ?>
                            </small>
                        </div>
                    </div>

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