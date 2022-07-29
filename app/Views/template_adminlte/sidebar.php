<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
        <img src="<?= base_url('assets/dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
        <span class="brand-text font-weight-light">Kecamatan Bolangitang Barat</span>
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
                <li class="nav-item">
                    <a href="<?= site_url('/profil'); ?>" class="nav-link <?= isset($m_profil) ? $m_profil : ''; ?>">
                        <i class="nav-icon fa fa-info"></i>
                        <p>Profil</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('/agenda'); ?>" class="nav-link <?= isset($m_agenda) ? $m_agenda : ''; ?>">
                        <i class="nav-icon fa fa-calendar-check"></i>
                        <p>
                            Agenda
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('/statistik'); ?>" class="nav-link <?= isset($m_statistik) ? $m_statistik : ''; ?>">
                        <i class="nav-icon fa fa-chart-bar"></i>
                        <p>
                            Statistik
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('/pegawai'); ?>" class="nav-link <?= isset($m_statistik) ? $m_statistik : ''; ?>">
                        <i class='nav-icon bx bx-user'></i>
                        <p>
                            Pegawai
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('/carousel'); ?>" class="nav-link <?= isset($m_carousel) ? $m_carousel : ''; ?>">
                        <i class='nav-icon bx bxs-carousel'></i>
                        <p>
                            Carousel
                        </p>
                    </a>
                </li>
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