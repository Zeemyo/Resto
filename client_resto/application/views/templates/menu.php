<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#">Sekolah Sekolahan</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav" >
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('kbm'); ?>">KBM</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('guru'); ?>">Guru</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('siswa'); ?>">Siswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('mapel'); ?>">Mapel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('tu'); ?>">Tata Usaha</a>
            </li>
        </ul>
    </div>
</nav>