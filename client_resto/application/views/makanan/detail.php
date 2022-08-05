<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Makanan</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('makanan'); ?>">List Data Makanan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data Makanan</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Makanan
                </div>
                <div class="card-body">     
                    <h5 class="card-title"><b>ID Makanan :</b><br><?= $data_makanan['id_makanan'] ?></h5>
                    <p class="card-text"><b>Nama Makanan :</b><br><?= $data_makanan['nama_makanan'] ?></p>
                    <p class="card-text"><b>Harga Makanan :</b><br><?= $data_makanan['harga_makanan'] ?></p>
                    <p class="card-text"><b>Stok Makanan :</b><br><?= $data_makanan['stok_makanan'] ?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>makanan" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>