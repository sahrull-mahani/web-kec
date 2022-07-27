<?= $this->extend("web/_template/index") ?>

<?= $this->section("page-content") ?>
<div class="container mt-lg-5">
  <div class="row">
    <div class="col-lg-8 mb-10">
      <h2>Sejarah</h2>

      <h4 class="text-center mb-5"><?= ucwords($sejarah->judul) ?></h4>

      <div class="mt-5 text-justify"><?= $sejarah->body ?></div>
    </div>
    <!-- SIDEBAR -->
    <div class="col-lg-4">
      <?= $this->include('web/_template/_sidebar') ?>
    </div>
    <!-- END SIDEBAR -->
  </div>
</div>
<?= $this->endSection() ?>