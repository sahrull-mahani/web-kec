<?= $this->extend("web/_template/index") ?>

<?= $this->section("page-content") ?>
<div class="container mt-5 pb-5">
  <div class="row">
    <div class="col-lg-8">
      <h2>Obyek Wisata</h2>
      <div class="row">
        <?php foreach ($pariwisata as $pari) : ?>
          <div class="col-md-6 mb-3">
            <div class="card">
              <img src="<?= base_url("Web/img_thumb/$pari->sumber") ?>" class="card-img-top" alt="Pariwisata">
              <div class="card-body">
                <h5 class="card-title"><?= ucwords($pari->nama) ?></h5>
                <a href="/web/detail_obwisata/<?= $pari->id_sumber ?>" class="btn btn-primary btn-sm">readmore</a>
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