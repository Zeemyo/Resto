<div class="container pt-5">
    <h3><?= $title ?></h3>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>kbm</a></li>
            <li class="breadcrumb-item active" aria-current="page">List Data kbm</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary mb-2" href="<?= base_url('kbm/add')?>">Tambah Data KBM</a>
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
                        <table class="table table-striped table-bordered tablehover text-sm" id="tableMahasiswa">
                            <thead>
                                <tr class="table-primary">
                                    <th>ID KBM</th>
                                    <th>ID SISWA</th>
                                    <th>ID GURU</th>
                                    <th>ID MAPEL</th>
                                    <th>NAMA GURU</th>
                                    <th>KODE MP</th>
                                    <th>NAMA MP</th>
                                    <th>PERTEMUAN</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data_kbm as $row) :
                                ?>
                                    <tr>
                                        <td><?= $row['id_kbm'] ?></td>
                                        <td><?= $row['id_siswa'] ?></td>
                                        <td><?= $row['id_guru'] ?></td>
                                        <td><?= $row['id_mp'] ?></td>
                                        <td><?= $row['nama_guru'] ?></td>
                                        <td><?= $row['kode_mp'] ?></td>
                                        <td><?= $row['nama_mp'] ?></td>
                                        <td><?= $row['pertemuan'] ?></td>
                                        <td>
                                            <a href="<?= base_url('kbm/detail/'.$row['id_kbm'])?>" class="btn btn-primary btn-sm"><i class="fa fa-info"></i></a>
                                            <a href="<?= base_url('kbm/edit/'.$row['id_kbm'])?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="<?= base_url('kbm/delete/'.$row['id_kbm'])?>" class="btn btn-danger btn-sm item-delete tombol-hapus"><i class="fa fa-trash"></i></a>
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
    $('#tableMahasiswa').DataTable();
</script>