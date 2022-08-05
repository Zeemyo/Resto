<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Order</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('order'); ?>">List Data Order</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data Order</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Order
                </div>
                <div class="card-body">     
                    <h5 class="card-text"><b>ID ORDER:</b><br><?= $data_order['id_order'] ?></h5>
                    <h5 class="card-text"><b>ID MAKANAN:</b><br><?= $data_order['id_makanan'] ?></h5>
                    <h5 class="card-text"><b>ID MINUMAN:</b><br><?= $data_order['id_minuman'] ?></h5>
                    <h5 class="card-text"><b>ID DESSERT:</b><br><?= $data_order['id_dessert'] ?></h5>
                    <p class="card-text"><b>NO MEJA :</b><br><?= $data_order['no_meja'] ?></p>
                    <p class="card-text"><b>TOTAL HARGA :</b><br><?= $data_order['total_harga'] ?></p>
                    <p class="card-text"><b>UANG BAYAR :</b><br><?= $data_order['uang_bayar'] ?></p>
                    <p class="card-text"><b>UANG KEMBALI :</b><br><?= $data_order['uang_kembali'] ?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>order" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>