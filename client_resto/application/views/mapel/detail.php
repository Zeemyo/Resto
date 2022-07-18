<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Mapel</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('mp'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Mapel
                </div>
                <div class="card-body">     
                    <h5 class="card-title"><b>ID MP :</b><br><?= $data_mapel['id_mp'] ?></h5>
                    <p class="card-text"><b>KODE MP :</b><br><?= $data_mapel['kode_mp'] ?></p>
                    <p class="card-text"><b>NAMA MP :</b><br><?= $data_mapel['nama_mp'] ?></p>
                    <p class="card-text"><b>pertemuan :</b><br><?= $data_mapel['pertemuan'] ?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>mp" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>