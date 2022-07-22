<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Order</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('order'); ?>">List Data Mapel</a></li>
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
                        <label for="id_order" class="col-sm-2 col-form-label">ID Order</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_order" name="id_ order" value=" <?= $data_mapel['id_   order']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('id_ order') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="no_meja" class="col-sm-2 col-formlabel">No Meja</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_meja" name="no_meja" value=" <?= $data_mapel['no_meja']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('no_meja') ?>
                            </small>
                        </div>
                    </div>
                
                    <div class="form-group row">
                        <label for="total_harga" class="col-sm-2 col-formlabel">Total Harga</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="total_harga" name="total_harga" rows="3"><?= $data_mapel['total_harga']; ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('total_harga') ?>
                            </small>
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <label for="uang_bayar" class="col-sm-2 col-form-label">Uang Bayar</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="uang_bayar" name="uang_bayar" value="<?= $data_mapel['uang_bayar']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('uang_bayar') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="uang_kembali" class="col-sm-2 col-form-label">Uang Kembali</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="uang_kembali" name="uang_kembali" value="<?= $data_mapel['uang_kembali']; ?>">
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