<?= $this->extend("web/_template/index") ?>

<?= $this->section("page-content") ?>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-12 text-center mb-5">
      <h2>#Galeri</h2>
      <div class="divider-custom"></div>
    </div>

    <div class="col-md-12">
      <div class="row">
        <div class="grid-wrapper mb-5">
          <?php foreach ($gambar as $gbr) : ?>
            <a href="/admin_assets/galeri/<?= $gbr->sumber ?>" class="mason" data-lightbox="masonry" data-title="image-<?= $gbr->sumber ?>">
              <img src="/admin_assets/galeri/<?= $gbr->sumber ?>" alt="" />
            </a>
          <?php endforeach ?>
        </div>

      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>