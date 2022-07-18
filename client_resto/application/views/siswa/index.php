<div class="container pt-5">
    <h3><?= $title ?></h3>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Siswa</a></li>
            <li class="breadcrumb-item active" aria-current="page">List Data Siswa</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary mb-2" href="<?= base_url('siswa/add')?>">Tambah Data Siswa</a>
            <div mb-2>
                <!-- Menampilkan flash data (pesan saat data error)-->
                <?php if ($this->session->flashdata('message')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Error! <?= $this->session->flashdata('message'); ?>
                        <button type="button" class="close" data-dismiss="alert" arialabel="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered tablehover text-sm" id="tablesiswa">
                            <thead>
                                <tr class="table-primary">
                                    <th>ID SISWA</th>
                                    <th>NIS</th>
                                    <th>NAMA SISWA</th>
                                    <th>TANGGAL LAHIR</th>
                                    <th>ALAMAT</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data_siswa as $row) :
                                ?>
                                    <tr>
                                        <td><?= $row['id_siswa'] ?></td>
                                        <td><?= $row['nis'] ?></td>
                                        <td><?= $row['nama_siswa'] ?></td>
                                        <td><?= $row['tgl_lahir'] ?></td>
                                        <td><?= $row['alamat'] ?></td>
                                        <td><?= $row['jns_kelamin'] ?></td>
                                        <td>
                                            <a href="<?= base_url('siswa/detail/'.$row['id_siswa'])?>" class="btn btn-primary btn-sm"><i class="fa fa-info"></i></a>
                                            <a href="<?= base_url('siswa/edit/'.$row['id_siswa'])?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="<?= base_url('siswa/delete/'.$row['id_siswa'])?>" class="btn btn-danger btn-sm item-delete tombol-hapus"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //menampilkan data ketabel dengan plugin datatables
    $('#tablesiswa').DataTable();
</script>