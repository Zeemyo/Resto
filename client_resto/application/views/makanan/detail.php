<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Makanan</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('makanan'); ?>">List Data Makanan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Makanan
                </div>
                <div class="card-body">     
                    <h5 class="card-title"><b>ID Makanan :</b><br><?= $data_guru['id_makanan'] ?></h5>
                    <p class="card-text"><b>Nama Makanan :</b><br><?= $data_guru['nama_makanan'] ?></p>
                    <p class="card-text"><b>Harga Makanan :</b><br><?= $data_guru['harga_makanan'] ?></p>
                    <p class="card-text"><b>Stok Makanan :</b><br><?= $data_guru['stok_makanan'] ?></p>
                    <h6 class="card-subtitle mb-2 text-muted"><b>Email :</b><br><?= $data_guru['email'] ?></h6>
                    <p></p>
                    <a href="<?= base_url(); ?>guru" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>