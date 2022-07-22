<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Pesan</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('tu'); ?>">List Data Pesan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data Pesan</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Tata Pesan
                </div>
                <div class="card-body">     
                    <h5 class="card-title"><b>ID Pesan :</b><br><?= $data_tu['id_pesan'] ?></h5>
                    <p class="card-text"><b>ID Order :</b><br><?= $data_tu['id_order'] ?></p>
                    <p class="card-text"><b>ID User :</b><br><?= $data_tu['id_user'] ?></p>
                    <p class="card-text"><b>jumlah :</b><br><?= $data_tu['jumlah'] ?></p>   
                    <p></p>
                    <a href="<?= base_url(); ?>tu" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>