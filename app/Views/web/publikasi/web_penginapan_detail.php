<?= $this->extend('web/_template/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container mt-5 pb-5">
  <div class="row">
    <div class="col-lg-8">
      <div class="row">
        <div class="col-md-12">
          <h6 class="text-custom-5 text-uppercase"><i class="fa fa-clock-o"></i> <?= hariIni('D', strtotime($penginapan->published_at)) . ", " . date('d-m-Y H.i', strtotime($penginapan->published_at)) ?> WITA</h6>
          <h1 class="text-capitalize"><?= ucwords($penginapan->nama) ?></h1>
          <small class="text-custom-5 text-uppercase mb-4">
            <i class="fa fa-tags"></i> Penginapan
          </small>

          <div class="isi-ket">
            <?= $penginapan->keterangan ?>
          </div>

          <div class="grid-wrapper mb-5">
            <?php foreach ($gambar as $gmb) : ?>
              <a href="<?= base_url("Web/img_medium/$gmb->sumber") ?>" class="mason" data-lightbox="masonry" data-title="image-<?= $penginapan->nama ?>">
                <img src="<?= base_url("Web/img_medium/$gmb->sumber") ?>" alt="" />
              </a>
            <?php endforeach ?>
          </div>
        </div>

        <h3 class="my-5">Wisata Lainnya</h3>

        <?php foreach ($penginapanLain as $pari) : ?>
          <div class="col-md-6">
            <div class="card">
              <img src="<?= base_url("Web/img_medium/$pari->sumber") ?>" class="card-img-top" alt="Pariwisata">
              <div class="card-body">
                <h5 class="card-title"><?= ucwords($pari->nama) ?></h5>
                <a href="<?= base_url("Web/detail_obwisata/$pari->id_sumber") ?>" class="btn btn-primary">readmore</a>
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
<?= $this->endSection() ?>