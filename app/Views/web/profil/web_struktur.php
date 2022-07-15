<?= $this->extend("web/_template/index") ?>

<?= $this->section("page-content") ?>
<div class="container mt-lg-5">

  <h2 class="mb-3">Struktur Organisasi</h2>
  <div class="row">
    <div class="col-md">
      <img src="/assets/img/struktur.png" class="img-fluid d-block mx-auto" alt="...">
    </div>
  </div>

  <?php if (count($struktur) > 0) : ?>
    <h2 class="mb-3 mt-5">Kepegawaian</h2>
    <div class="row">

      <?php foreach ($struktur as $row) : ?>
        <div class="col-lg-6">
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="<?= base_url("Web/img_thumb/$row->poto") ?>" class="img-fluid rounded-start img-pegawai" alt="pegawai">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?= ($row->gelar_depan != '-' ? "$row->gelar_depan " : '') . $row->nama . ($row->gelar_belakang != '-' ? ", $row->gelar_belakang" : '') ?></h5>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">NIP. <?= $row->nip ?></li>
                    <li class="list-group-item"><?= ucwords($row->tempat_lahir) . ", $row->tgl_lahir" ?></li>
                    <li class="list-group-item"><?= $row->pendidikan ?></li>
                  </ul>
                  <p class="card-text"><i class="fa fa-check-circle-o text-custom-5"></i> <small class="text-muted"><?= strtoupper($row->pangkat) ?></small></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    <?php endif ?>
  </div>
</div>
<?= $this->endSection() ?>