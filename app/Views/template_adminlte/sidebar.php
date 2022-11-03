<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
        <img src="<?= base_url('assets/dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
        <?php 
        (is_admin()) ? $appName = "Kecamatan kaidipang" : $appName = session('desa');
        
        ?>
        <span class="brand-text font-weight-light"><?= $appName; ?> </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= session('foto') ?>" class="img-circle elevation-2" alt="User Image" />
            </div>
            <div class="info">
                <a href="<?= site_url('profile'); ?>" class="d-block"><?= session('nama_user') ?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= site_url('/home'); ?>" class="nav-link <?= isset($m_home) ? $m_home : ''; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item <?= isset($m_open_penduduk) ? $m_open_penduduk : ''; ?>">
                    <a href="#" class="nav-link <?= isset($mm_penduduk) ? $mm_penduduk : ''; ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Penduduk
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item <?= isset($m_open_jumlahpenduduk) ? $m_open_jumlahpenduduk : ''; ?>">
                            <a href="<?= site_url('jumlahpenduduk'); ?>" class="nav-link <?= isset($m_jumlahpenduduk) ? $m_jumlahpenduduk : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jumlah Penduduk</p>
                            </a>
                        </li>
                        <li class="nav-item <?= isset($m_open_keadaanpenduduk) ? $m_open_keadaanpenduduk : ''; ?>">
                            <a href="<?= site_url('keadaanpenduduk'); ?>" class="nav-link <?= isset($m_keadaanpenduduk) ? $m_keadaanpenduduk : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Keadaan Penduduk</p>
                            </a>
                        </li>
                        <li class="nav-item <?= isset($m_open_datapindah) ? $m_open_datapindah : ''; ?>">
                            <a href="<?= site_url('datapindah'); ?>" class="nav-link <?= isset($m_datapindah) ? $m_datapindah : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Pindah</p>
                            </a>
                        </li>
                        <li class="nav-item <?= isset($m_open_datakematian) ? $m_open_datakematian : ''; ?>">
                            <a href="<?= site_url('datakematian'); ?>" class="nav-link <?= isset($m_datakematian) ? $m_datakematian : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Kematian</p>
                            </a>
                        </li>
                        <li class="nav-item <?= isset($m_open_datapajak) ? $m_open_datapajak : ''; ?>">
                            <a href="<?= site_url('datapajak'); ?>" class="nav-link <?= isset($m_datapajak) ? $m_datapajak : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Pajak</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= isset($m_open_kuisioner) ? $m_open_kuisioner : ''; ?>">
                    <a href="#" class="nav-link <?= isset($mm_kuisioner) ? $mm_kuisioner : ''; ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Kuisioner
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item <?= isset($m_open_rumahtangga) ? $m_open_rumahtangga : ''; ?>">
                            <a href="<?= site_url('rumahtangga'); ?>" class="nav-link <?= isset($m_rumahtangga) ? $m_rumahtangga : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rumah Tangga</p>
                            </a>
                        </li>
                        <li class="nav-item <?= isset($m_open_individu) ? $m_open_individu : ''; ?>">
                            <a href="<?= site_url('individu'); ?>" class="nav-link <?= isset($m_individu) ? $m_individu : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Individu</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php if (is_admin()) : ?>
                <li class="nav-item <?= isset($m_open_berita) ? $m_open_berita : ''; ?>">
                    <a href="#" class="nav-link <?= isset($mm_berita) ? $mm_berita : ''; ?>">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Berita
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= site_url('post-berita'); ?>" class="nav-link <?= isset($m_post) ? $m_post : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Post Berita</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('berita'); ?>" class="nav-link <?= isset($m_berita) ? $m_berita : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Berita</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if (is_admin()) : ?>
                <li class="nav-item <?= isset($m_open_pariwisata) ? $m_open_pariwisata : ''; ?>">
                    <a href="#" class="nav-link <?= isset($mm_pariwisata) ? $mm_pariwisata : ''; ?>">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Pariwisata
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= site_url('post-pariwisata'); ?>" class="nav-link <?= isset($m_post_pariwisata) ? $m_post_pariwisata : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Post Pariwisata</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('pariwisata'); ?>" class="nav-link <?= isset($m_pariwisata) ? $m_pariwisata : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Pariwisata</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if (is_admin()) : ?>
                <li class="nav-item <?= isset($m_open_kuliner) ? $m_open_kuliner : ''; ?>">
                    <a href="#" class="nav-link <?= isset($mm_kuliner) ? $mm_kuliner : ''; ?>">
                        <i class='nav-icon bx bxs-bowl-hot'></i>
                        <p>
                            Kuliner
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= site_url('post-kuliner'); ?>" class="nav-link <?= isset($m_post_kuliner) ? $m_post_kuliner : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Post Kuliner</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('kuliner'); ?>" class="nav-link <?= isset($m_kuliner) ? $m_kuliner : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Kuliner</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if (is_admin()) : ?>
                <li class="nav-item <?= isset($m_open_penginapan) ? $m_open_penginapan : ''; ?>">
                    <a href="#" class="nav-link <?= isset($mm_penginapan) ? $mm_penginapan : ''; ?>">
                        <i class='nav-icon bx bxs-store-alt'></i>
                        <p>
                            Penginapan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= site_url('post-penginapan'); ?>" class="nav-link <?= isset($m_post_penginapan) ? $m_post_penginapan : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Post Penginapan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('penginapan'); ?>" class="nav-link <?= isset($m_penginapan) ? $m_penginapan : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Penginapan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if (is_admin()) : ?>
                <li class="nav-item <?= isset($m_open_program) ? $m_open_program : ''; ?>">
                    <a href="#" class="nav-link <?= isset($mm_program) ? $mm_program : ''; ?>">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>
                            Program
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= site_url('post-program'); ?>" class="nav-link <?= isset($m_post_program) ? $m_post_program : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Post Program</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('program'); ?>" class="nav-link <?= isset($m_program) ? $m_program : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Program</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if (is_admin()) : ?>
                <li class="nav-item <?= isset($m_open_potensi) ? $m_open_potensi : ''; ?>">
                    <a href="#" class="nav-link <?= isset($mm_potensi) ? $mm_potensi : ''; ?>">
                        <i class="nav-icon fas fa-hammer"></i>
                        <p>
                            Potensi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= site_url('post-potensi'); ?>" class="nav-link <?= isset($m_post_potensi) ? $m_post_potensi : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Post Potensi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('potensi'); ?>" class="nav-link <?= isset($m_potensi) ? $m_potensi : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Potensi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if (is_admin()) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('/profil'); ?>" class="nav-link <?= isset($m_profil) ? $m_profil : ''; ?>">
                        <i class="nav-icon fa fa-info"></i>
                        <p>Profil</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (is_admin()) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('/agenda'); ?>" class="nav-link <?= isset($m_agenda) ? $m_agenda : ''; ?>">
                        <i class="nav-icon fa fa-calendar-check"></i>
                        <p>
                            Agenda
                        </p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (is_admin()) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('/statistik'); ?>" class="nav-link <?= isset($m_statistik) ? $m_statistik : ''; ?>">
                        <i class="nav-icon fa fa-chart-bar"></i>
                        <p>
                            Statistik
                        </p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (is_admin()) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('/pegawai'); ?>" class="nav-link <?= isset($m_statistik) ? $m_statistik : ''; ?>">
                        <i class='nav-icon bx bx-user'></i>
                        <p>
                            Pegawai
                        </p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (is_admin()) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('/carousel'); ?>" class="nav-link <?= isset($m_carousel) ? $m_carousel : ''; ?>">
                        <i class='nav-icon bx bxs-carousel'></i>
                        <p>
                            Carousel
                        </p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (is_admin()) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('/desa'); ?>" class="nav-link <?= isset($m_desa) ? $m_desa : ''; ?>">
                        <i class='nav-icon bx bxs-carousel'></i>
                        <p>
                            Desa
                        </p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (is_admin()) : ?>
                    <li class="nav-item">
                        <a href="<?= site_url('/users'); ?>" class="nav-link <?= isset($m_users) ? $m_users : ''; ?>">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Users
                            </p>
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <div class="sidebar-custom">
        <!-- <a href="<?= site_url('setting'); ?>" class="btn btn-link"><i class="fas fa-cogs"></i></a> -->
        <a href="<?= site_url('auth/logout'); ?>" class="btn btn-danger hide-on-collapse pos-right">log Out <i class="fas fa-sign-out-alt"></i></a>
    </div>
</aside>