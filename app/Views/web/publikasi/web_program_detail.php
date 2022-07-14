<?= $this->extend("web/_template/index") ?>

<?= $this->section("page-content") ?>
<div class="container mt-5 pb-5">
  <div class="row">
    <div class="col-lg-8">
      <div class="row">
        <div class="col-md-12">
          <small class="text-custom-5 text-uppercase float-end"><i class="fa fa-clock-o"></i> <?= hariIni('D', strtotime($program->published_at)) . ", " . date('d-m-Y H.i', strtotime($program->published_at)) ?> wita</small>
          <h1 class="text-capitalize"><?= $program->judul ?></h1>

          <div class="grid-wrapper mb-5">
            <?php foreach ($gambar as $gbr) : ?>
              <a href="<?= base_url("Web/img_medium/$gbr->sumber") ?>" class="mason" data-lightbox="masonry" data-title="image-<?= $gbr->sumber ?>">
                <img src="<?= base_url("Web/img_medium/$gbr->sumber") ?>" alt="" />
              </a>
            <?php endforeach ?>
          </div>

          <p class="text-justify text-alinea"><?= $program->isi_program ?></p>
        </div>

        <h3 class="my-5">Program Lainnya</h3>

        <?php foreach ($programLain as $prg) : ?>
          <div class="col-md-6">
            <div class="card">
              <img src="/admin_assets/galeri" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?= $prg->judul ?></h5>
                <p class="card-text"><?= substr($prg->isi_berita, 0, 100) ?>...</p>
                <a href="/web/detail_program/<?= $prg->id_sumber ?>" class="btn btn-primary">readmore</a>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
    <div class="col-lg-4">
      <?= $this->include("web/_template/_sidebar") ?>
    </div>
  </div>
</div>
<?= $this->endSection() ?>