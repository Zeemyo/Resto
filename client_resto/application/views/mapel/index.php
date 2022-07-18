<div class="container pt-5">
    <h3><?= $title ?></h3>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Mapel</a></li>
            <li class="breadcrumb-item active" aria-current="page">List Data Mapel</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary mb-2" href="<?= base_url('mapel/add')?>">Tambah Data Mapel</a>
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
                        <table class="table table-striped table-bordered tablehover text-sm" id="tablemapel">
                            <thead>
                                <tr class="table-primary">
                                    <th>ID MAPEL</th>
                                    <th>KODE MAPEL</th>
                                    <th>NAMA MAPEL</th>
                                    <th>PERTEMUAN</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data_mapel as $row) :
                                ?>
                                    <tr>
                                        <td><?= $row['id_mp'] ?></td>
                                        <td><?= $row['kode_mp'] ?></td>
                                        <td><?= $row['nama_mp'] ?></td>
                                        <td><?= $row['pertemuan'] ?></td>
                                        <td>
                                            <a href="<?= base_url('mapel/detail/'.$row['id_mp'])?>" class="btn btn-primary btn-sm"><i class="fa fa-info"></i></a>
                                            <a href="<?= base_url('mapel/edit/'.$row['id_mp'])?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="<?= base_url('mapel/delete/'.$row['id_mp'])?>" class="btn btn-danger btn-sm item-delete tombol-hapus"><i class="fa fa-trash"></i></a>
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
    $('#tablemapel').DataTable();
</script>