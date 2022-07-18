<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>siswa</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('siswa'); ?>">List Data Siswa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data Siswa</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data siswa
                </div>
                <div class="card-body">     
                    <h5 class="card-title"><b>ID Siswa :</b><br><?= $data_siswa['id_siswa'] ?></h5>
                    <p class="card-text"><b>NIS :</b><br><?= $data_siswa['nis'] ?></p>
                    <p class="card-text"><b>Nama Siswa :</b><br><?= $data_siswa['nama_siswa'] ?></p>
                    <p class="card-text"><b>Tanggal Lahir :</b><br><?= $data_siswa['tgl_lahir'] ?></p>
                    <p class="card-text"><b>Alamat :</b><br><?= $data_siswa['alamat'] ?></p>
                    <p class="card-text"><b>Jenis Kelamin :</b><br><?= $data_siswa['jns_kelamin'] ?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>siswa" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>