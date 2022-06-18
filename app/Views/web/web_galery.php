<?= $this->extend('web/index'); ?>
<?php $session = \Config\Services::session(); ?>
<?= $this->section('page-content'); ?>

<section class="py-5">
    <div class="container">
        <!-- Gallery -->
        <div class="row">
            <?php foreach ($items as $item) :?>
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0 py-3">
                <a href="<?= site_url("Berita/img_medium/" . $item->sumber) ?>" data-lightbox="image-1" data-title="<?= $item->deskripsi?>" class="galery-cover shadow">
                    <img src="<?= site_url("Berita/img_medium/" . $item->sumber) ?>" class="w-100 shadow-1-strong rounded mb-4" alt="<?=$item->judul?>" />
                </a>
            </div>
            <?php endforeach ?>
        </div>
        <!-- Gallery -->
    </div>
</section>

<?= $this->endSection(); ?>