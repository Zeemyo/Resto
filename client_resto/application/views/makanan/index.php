<div class="container pt-5">
    <h3><?= $title ?></h3>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Makanan</a></li>
            <li class="breadcrumb-item active" aria-current="page">List Data Makanan</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary mb-2" href="<?= base_url('makanan/add')?>">Tambah Data Makanan</a>
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
                        <table class="table table-striped table-bordered tablehover text-sm" id="tableMakanan">
                            <thead>
                                <tr class="table-primary">
                                    <th>ID MAKANAN</th>
                                    <th>NAMA MAKANAN</th>
                                    <th>HARGA MAKANAN</th>
                                    <th>STOK MAKANAN</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data_makanan as $row) :
                                ?>
                                    <tr>
                                        <td><?= $row['id_makanan'] ?></td>
                                        <td><?= $row['nama_makanan'] ?></td>
                                        <td><?= $row['harga_makanan'] ?></td>
                                        <td><?= $row['stok_makanan'] ?></td>
                                        <td>
                                            <a href="<?= base_url('makanan/detail/'.$row['id_makanan'])?>" class="btn btn-primary btn-sm"><i class="fa fa-info"></i></a>
                                            <a href="<?= base_url('makanan/edit/'.$row['id_makanan'])?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="<?= base_url('makanan/delete/'.$row['id_makanan'])?>" class="btn btn-danger btn-sm item-delete tombol-hapus"><i class="fa fa-trash"></i></a>
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
    $('#tableMakanan').DataTable();
</script>