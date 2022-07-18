<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>kbm</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('kbm'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data kbm
                </div>
                <div class="card-body">     
                    <h5 class="card-title"><b>ID kbm :</b><br><?= $data_kbm['id_kbm'] ?></h5>
                    <p class="card-text"><b>iD siswa :</b><br><?= $data_kbm['id_siswa'] ?></p>
                    <p class="card-text"><b>ID guru :</b><br><?= $data_kbm['id_guru'] ?></p>
                    <p class="card-text"><b>Nama Guru :</b><br><?= $data_kbm['nama_guru'] ?></p>
                    <p class="card-text"><b>kode Mapel :</b><br><?= $data_kbm['kode_mp'] ?></p>
                    <p class="card-text"><b>Nama Mapel :</b><br><?= $data_kbm['nama_mp'] ?></p>
                    <p class="card-text"><b>Pertemuan :</b><br><?= $data_kbm['pertemuan'] ?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>kbm" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>