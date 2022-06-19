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
                <div class="col-lg-4 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= count($berita); ?><sup style="font-size: 20px"></sup></h3>
                            <p>Berita</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-list-alt"></i>
                        </div>
                        <a href="<?= site_url('berita'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-6">

                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= 30 ?><sup style="font-size: 20px"></sup></h3>
                            <p>Photo</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-file-image"></i>
                        </div>
                        <a href="<?= site_url('photo') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-6">

                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= 50 ?></h3>
                            <p>Video</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-file-video"></i>
                        </div>
                        <a href="<?= site_url('video'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">

                <section class="col-lg-12 connectedSortable">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-bar mr-1"></i>
                                Statistik Stunting
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <canvas id="myCharts"></canvas>
                            </div>
                        </div>
                    </div>

                </section>

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