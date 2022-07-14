<?= $this->extend("web/_template/index") ?>

<?= $this->section("page-content") ?>
<div class="container mt-5 pb-5">
  <div class="row">
    <div class="col-lg-8">
      <h2>Penginapan Kaidipang</h2>
      <div class="row">
        <?php foreach ($penginapan as $row) : ?>
          <div class="col-md-6 mb-3">
            <div class="card">
              <img src="<?= base_url("Web/img_thumb/$row->sumber") ?>" class="card-img-top" alt="Pariwisata">
              <div class="card-body">
                <h5 class="card-title"><?= ucwords($row->nama) ?></h5>
                <a href="/web/detail_penginapan/<?= $row->id_sumber ?>" class="btn btn-primary btn-sm">readmore</a>
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