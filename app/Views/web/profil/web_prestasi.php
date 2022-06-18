<?= $this->extend("web/_template/index") ?>

<?= $this->section("page-content") ?>
<div class="container mt-lg-5">
  <div class="row">
    <div class="col-lg-8 mb-10">
      <h2 class="mb-5">Prestasi Kaidipang</h2>
    </div>
    <!-- SIDEBAR -->
    <div class="col-lg-4">
      <?= $this->include('web/_template/_sidebar') ?>
    </div>
    <!-- END SIDEBAR -->
  </div>
</div>
<?= $this->endSection() ?>