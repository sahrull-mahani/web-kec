<?= $this->extend("web/_template/index") ?>

<?= $this->section("page-content") ?>
<div class="container mt-lg-5">
  <div class="row">
    <div class="col-lg-8 mb-10">
      <h2 class="mb-5">Adat & Budaya</h2>

      <h4 class="text-center mb-5 text-capitalize"><?= $adat->judul ?></h4>
      <div class="text-justify text-alinea"><?= $adat->body ?></div>
    </div>
    <!-- SIDEBAR -->
    <div class="col-lg-4">
      <?= $this->include('web/_template/_sidebar') ?>
    </div>
    <!-- END SIDEBAR -->
  </div>
</div>
<?= $this->endSection() ?>