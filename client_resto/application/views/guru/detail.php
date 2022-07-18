<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Guru</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('guru'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data guru
                </div>
                <div class="card-body">     
                    <h5 class="card-title"><b>ID Guru :</b><br><?= $data_guru['id_guru'] ?></h5>
                    <p class="card-text"><b>NIP :</b><br><?= $data_guru['nip'] ?></p>
                    <p class="card-text"><b>Nama Guru :</b><br><?= $data_guru['nama_guru'] ?></p>
                    <p class="card-text"><b>Alamat :</b><br><?= $data_guru['alamat'] ?></p>
                    <h6 class="card-subtitle mb-2 text-muted"><b>Email :</b><br><?= $data_guru['email'] ?></h6>
                    <p></p>
                    <a href="<?= base_url(); ?>guru" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>