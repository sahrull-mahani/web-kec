<?= $this->extend("web/_template/index") ?>

<?= $this->section("page-content") ?>
<div class="container mt-lg-5">
  <div class="row">
    <div class="col-lg-8 mb-10">

      <h2 class="mb-5">Visi & Misi</h2>

      <?php $vimi = explode('[|]', $visimisi->body) ?>
      <?php foreach ($vimi as $key => $row) : ?>
        <h3 class="mb-1"><?= $key == 0 ? 'Visi' : 'Misi' ?></h3>
        <blockquote class="blockstyle"> <span class="triangle"></span><?= $row ?></blockquote>
      <?php endforeach ?>
    </div>
    <!-- SIDEBAR -->
    <div class="col-lg-4">
      <?= $this->include('web/_template/_sidebar') ?>
    </div>
    <!-- END SIDEBAR -->
  </div>
</div>
<?= $this->endSection() ?>