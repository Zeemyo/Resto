<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Dessert</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('dessert'); ?>">List Data Dessert</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data Dessert</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Dessert
                </div>
                <div class="card-body">     
                    <h5 class="card-title"><b>ID Dessert :</b><br><?= $data_dessert['id_dessert'] ?></h5>
                    <p class="card-text"><b>Nama Dessert :</b><br><?= $data_dessert['nama_dessert'] ?></p>
                    <p class="card-text"><b>Harga Dessert :</b><br><?= $data_dessert['harga_dessert'] ?></p>
                    <p class="card-text"><b>Stok Dessert :</b><br><?= $data_dessert['stok_dessert'] ?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>dessert" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>