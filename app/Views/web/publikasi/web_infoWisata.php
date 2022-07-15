<?= $this->extend("web/_template/index") ?>
<?= $this->section("page-content") ?>

<div class="container mt-5">
  <div class="row">
    <div class="col-lg-8">
      <div class="col-md-12 text-center mb-5">
        <h2>Informasi Wisatawan</h2>
        <div class="divider-custom"></div>
      </div>

      <div class="col-md-12">
        <h4 class="d-flex justify-content-between">Obyek Wisata <small><a href="/web/pariwisata">selengkapnya...</a></small></h4>
        <div class="row">

          <?php foreach ($wisata as $row) : ?>
            <div class="col-md">
              <div class="card">
                <img src="<?= base_url("Web/img_thumb/$row->sumber") ?>" class="card-img-top border-bottom" alt="Wisata">
                <div class="card-body">
                  <h5 class="card-text"><?= $row->nama ?></h5>
                </div>
              </div>
            </div>
          <?php endforeach ?>

        </div>
      </div>

      <div class="col-md-12 mt-5">
        <h4 class="d-flex justify-content-between">Kuliner <small><a href="/web/kuliner">selengkapnya...</a></small></h4>
        <div class="row">

          <?php foreach ($kuliner as $row) : ?>
            <div class="col-md">
              <div class="card">
                <img src="<?= base_url("Web/img_thumb/$row->sumber") ?>" class="card-img-top border-bottom" alt="Kuliner">
                <div class="card-body">
                  <h5 class="card-text"><?= $row->nama ?></h5>
                </div>
              </div>
            </div>
          <?php endforeach ?>

        </div>
      </div>

      <div class="col-md-12 mt-5">
        <h4 class="d-flex justify-content-between">Penginapan <small><a href="/web/penginapan">selengkapnya...</a></small></h4>
        <div class="row">

          <?php foreach ($penginapan as $row) : ?>
            <div class="col-md">
              <div class="card">
                <img src="<?= base_url("Web/img_thumb/$row->sumber") ?>" class="card-img-top border-bottom" alt="Penginapan">
                <div class="card-body">
                  <h5 class="card-text"><?= $row->nama ?></h5>
                </div>
              </div>
            </div>
          <?php endforeach ?>

        </div>
      </div>

    </div>

    <div class="col-lg-4">
      <?= $this->include("web/_template/_sidebar") ?>
    </div>
  </div>
</div>

<?= $this->endSection() ?>