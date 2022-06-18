<?= $this->extend('web/index'); ?>
<?php $session = \Config\Services::session(); ?>
<?php

use CodeIgniter\I18n\Time; ?>
<?= $this->section('page-content'); ?>

<!--Main layout-->
<main class="my-5">
    <div class="container">
        <!--Section: Content-->
        <section class="text-center">
            <h4 class="mb-5"><strong>Berita Terbaru</strong></h4>

            <?php foreach ($items as $item) : ?>
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <img src="<?= site_url("berita/img_thumb/" . $item->gambar) ?>" width="300" height="185" alt="">
                        </div>
                        <div class="col-md-8 col-sm-12 text-start">
                            <div class="fw-bolder">
                                <?= strtoupper($item->alias) ?> . <?= Time::parse($item->tanggal)->humanize() ?>
                            </div>
                            <div class="my-3">
                                <h5><a class="text-decoration-none" href="<?= site_url("web/detail_b/$item->id") ?>"><?= $item->judul ?></a></h5>
                            </div>
                            <div class="lh-sm">
                                <p><?= substr(strip_tags($item->body), 0, 300) ?>...</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
            <?php endforeach ?>
        </section>
        <!--Section: Content-->

        <!-- Pagination -->
        <nav class="my-4" aria-label="...">
            <ul class="pagination pagination-circle justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</main>
<!--Main layout-->

<?= $this->endSection(); ?>