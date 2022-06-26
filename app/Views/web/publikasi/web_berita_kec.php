<?= $this->extend("web/_template/index") ?>
<?= $this->section("page-content") ?>

<div class="container mt-lg-5">
  <div class="row">
    <div class="col-lg-8 mb-5">

      <h2 class="text-center">Berita Kecamatan</h2>
      <div class="divider-custom mb-5 text-center"></div>

      <div class="row">
        <div class="col-lg-5 offset-lg-7 my-3">

          <form action="" method="get">
            <div class="input-group">
              <div class="input-group mb-3">
                <input type="text" name="keyword" value="<?= $keyword != null ? $keyword : '' ?>" class="form-control" placeholder="Cari berdasarkan judul berita..." aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="fa fa-search"></i> Cari</button>
              </div>
            </div>
          </form>

        </div>
        <?php if ($berita == null) : ?>
          <div class="col-md-12 mt-5 mb-3">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <h1 class="mx-auto">Data tidak ditemukan!!!</h1>
                </div>
              </div>
            </div>
          </div>
        <?php else : ?>
          <?php foreach ($berita as $brt) : ?>
            <div class="col-md-12 mt-5 mb-3">
              <div class="row">
                <div class="col-md-6">
                  <a href="/web/detail_berita/<?= $brt->slug . "_" . $brt->id ?>" class="img-hover">
                    <div class="card-img-responsive">
                      <img src="<?= base_url("Web/img_thumb/$brt->sumber") ?>" alt="img-fluid">
                    </div>
                  </a>
                </div>
                <div class="col-md-6 mt-3">
                  <small class="text-capitalize text-primary font-weight-bold"><i class="fa fa-clock-o"></i> Diupload <?= getHumanize($brt->updated_at) ?></small>
                  <h3 class="font-weight-bold text-capitalize"><?= $brt->judul ?></h3>
                  <?= strip_tags(substr($brt->isi_berita, 0, 150)) ?>
                  <a href="/web/detail_berita/<?= $brt->slug . "_" . $brt->id ?>">read more...</a>
                </div>
              </div>
            </div>
          <?php endforeach ?>
          <?= $pager->links('berita', 'berita_pagination') ?>
        <?php endif ?>
      </div>
    </div>
    <div class="col-lg-4 mb-5">
      <?= $this->include("web/_template/_sidebar") ?>
    </div>
  </div>
</div>

<?= $this->endSection() ?>