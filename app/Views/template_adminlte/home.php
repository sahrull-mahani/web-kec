<?= $this->extend('template_adminlte/index'); ?>
<?= $this->section('page-content'); ?>

<!-- Main content -->
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?= count($berita); ?><sup style="font-size: 20px"></sup></h3>
                            <p>Berita</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <a href="<?= site_url('berita'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= count($agenda) ?><sup style="font-size: 20px"></sup></h3>
                            <p>Agenda</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <a href="<?= site_url('agenda') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= count($program) ?></h3>
                            <p>Program</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <a href="<?= site_url('program'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= count($wisata) ?></h3>
                            <p>Pariwisata</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-tree"></i>
                        </div>
                        <a href="<?= site_url('pariwisata'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-6">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Chart Agama</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="agama"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Chart Pekerjaan</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="pekerjaan"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Chart Pendidikan</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="pendidikan"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card card-outline card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Chart Perkawinan</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="perkawinan"></canvas>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

</div>
<!-- /.content -->
</div>

<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>


<?= $this->endSection(); ?>