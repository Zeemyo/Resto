<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Tata Usaha</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('tu'); ?>">List Data Tata Usaha</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data Tata Usaha</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Tata Usaha
                </div>
                <div class="card-body">     
                    <h5 class="card-title"><b>ID Tata usaha :</b><br><?= $data_tu['id_tu'] ?></h5>
                    <p class="card-text"><b>ID Siswa :</b><br><?= $data_tu['id_siswa'] ?></p>
                    <p class="card-text"><b>NIS :</b><br><?= $data_tu['nis'] ?></p>
                    <p class="card-text"><b>Nama Siswa :</b><br><?= $data_tu['nama_siswa'] ?></p>   
                    <p></p>
                    <a href="<?= base_url(); ?>tu" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>