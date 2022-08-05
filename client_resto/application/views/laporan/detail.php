<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Laporan</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('laporan'); ?>">List Data Laporan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Laporan
                </div>
                <div class="card-body">     
                    <h5 class="card-title"><b>ID Laporan:</b><br><?= $data_kbm['id_laporan'] ?></h5>
                    <p class="card-text"><b>iD Pesan :</b><br><?= $data_kbm['id_pesan'] ?></p>
                    <p class="card-text"><b>ID Order :</b><br><?= $data_kbm['id_order'] ?></p>
                    <p class="card-text"><b>Makanan :</b><br><?= $data_kbm['id_makanan'] ?></p>
                    <p class="card-text"><b>Minuman :</b><br><?= $data_kbm['id_minuman'] ?></p>
                    <p class="card-text"><b>Dessert :</b><br><?= $data_kbm['id_dessert'] ?></p>
                    <p class="card-text"><b>Tanggal Laporan :</b><br><?= $data_kbm['tgl_laporan'] ?></p>
                    <p class="card-text"><b>Jumlah :</b><br><?= $data_kbm['jumlah'] ?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>laporan" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>