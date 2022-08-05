<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Minuman</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('minuman'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Minuman
                </div>
                <div class="card-body">     
                    <h5 class="card-title"><b>ID MINUMAN :</b><br><?= $data_minuman['id_minuman'] ?></h5>
                    <p class="card-text"><b>NAMA MINUMAN :</b><br><?= $data_minuman['nama_minuman'] ?></p>
                    <p class="card-text"><b>HARGA MINUMAN :</b><br><?= $data_minuman['harga_minuman'] ?></p>
                    <p class="card-text"><b>STOK MINUMAN :</b><br><?= $data_minuman['stok_minuman'] ?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>minuman" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>