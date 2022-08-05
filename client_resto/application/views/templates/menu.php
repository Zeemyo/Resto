<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#">Restoran Rest</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav" >
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('makanan'); ?>">Makanan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('minuman'); ?>">Minuman</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dessert'); ?>">Dessert</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('order'); ?>">Order</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('pesan'); ?>">Pesan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('laporan'); ?>">Laporan</a>
            </li>
        </ul>
    </div>
</nav>