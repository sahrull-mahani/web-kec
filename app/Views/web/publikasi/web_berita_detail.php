<?= $this->extend('web/_template/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container mt-5 pb-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-md-12">
                    <h6 class="text-custom-5 text-uppercase"><i class="fa fa-clock-o"></i> <?= hariIni('D', strtotime($berita->updated_at)) . ", " . date("d-m-Y H.i", strtotime($berita->updated_at)) ?> wita | Dibaca : <?= $total ?> kali</h6>
                    <h1 class="text-capitalize"><?= $berita->judul ?></h1>
                    <small class="text-custom-5 text-uppercase mb-4">
                        <i class="fa fa-tags"></i> Berita Kecamatan <i class="fa fa-camera"></i> FOTO: <span class="text-capitalize"><?= $berita->nama_user ?></span>
                    </small>

                    <div class="img-detail-berita rounded mt-4 mb-3">
                        <img src="<?= base_url("Web/img_medium/$berita->sumber") ?>" alt="">
                    </div>

                    <p class="text-alinea text-justify"><?= $berita->isi_berita ?></p>
                </div>

                <h3 class="my-5">Berita Lainnya</h3>

                <?php foreach ($beritaLain as $brt) : ?>
                    <div class="col-md-6">
                        <div class="card">
                            <img src="<?= base_url("Web/img_thumb/$brt->sumber") ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $brt->judul ?></h5>
                                <p class="card-text"><?= substr($brt->isi_berita, 0, 150) ?>...</p>
                                <a href="<?= site_url("web/detail_berita/$brt->slug"."_$brt->id") ?>" class="btn btn-primary">readmore</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="col-lg-4">
            <?= $this->include('web/_template/_sidebar') ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>