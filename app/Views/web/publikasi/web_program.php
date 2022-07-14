<?= $this->extend("web/_template/index") ?>

<?= $this->section("page-content") ?>

<div class="container">
  <div class="row">
    <div class="col-lg-8">
      <div class="row">
        <?php foreach ($program as $prg) : ?>
          <div class="col-md-6 my-3">
            <div class="program-box">
              <img src="<?= base_url("Web/img_thumb/$prg->sumber") ?>" alt="com">
              <div class="program-overlay">
                <div class="program-link"><a href="/web/detail_program/<?= $prg->id_sumber ?>" class="fw-bold">Lihat</a></div>
                <div class="program-text"><?= $prg->judul ?></div>
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