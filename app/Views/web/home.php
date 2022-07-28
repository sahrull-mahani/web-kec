<?= $this->extend('web/_template/index'); ?>
<?= $this->section('page-content'); ?>

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php foreach ($carousel as $key => $row) : ?>
      <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>">
        <img src="<?= site_url("Web/img_medium/$row->gambar") ?>" class="d-block w-100 img-fluid" alt="...">
      </div>
    <?php endforeach ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="container mt-lg-5">
  <div class="row">
    <div class="col-lg-8 mb-10">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h3 class="mb-15 title">Sambutan Camat Kaidipang Kabupaten Bolaang Mongondow Utara.</h3>
              <p class="text-justify mb-5">
                Website ini dimaksudkan sebagai sarana publikasi untuk memberikan Informasi dan gambaran tentang potensi Kecamatan Kaidipang Kabupaten Bolaang Mongondow Utara serta meningkatkan pelayanan kepada masyarakat untuk mengakses informasi. Melalui keberadaan website ini kiranya masyarakat dapat mengetahui seluruh informasi tentang kebijakan Pemerintah Kabupaten Bolaang Mongondow Utara, khususnya Kecamatan Kaidipang.
              </p>
              <div class="d-flex mt-2">
                <div class="flex-shrink-0">
                  <img src="https://source.unsplash.com/300x300?person" alt="Camat Kaidipang" class="mr-3 rounded-circle" style="width:60px;">
                </div>
                <div class="flex-grow-1 ms-3">
                  <h5 class="mb-0">Kamdin Thalib, Gelar</h5>
                  <p class="text-muted">Camat Kaidipang</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php foreach ($berita as $brt) : ?>
          <div class="col-md-12 mt-5 mb-3">
            <div class="row">
              <div class="col-md-6">
                <a href="/web/detail_berita/<?= $brt->slug . "_" . $brt->id_sumber ?>" class="img-hover">
                  <div class="card-img-responsive">
                    <img src="<?= base_url('Web/img_thumb') . "/$brt->sumber" ?>" alt="img-fluid">
                  </div>
                </a>
              </div>
              <div class="col-md-6 mt-3">
                <small class="text-warning text-uppercase d-block"><i class="fa fa-clock-o"></i> <?= $brt->updated_at ?> WITA</small>
                <h3 class="font-weight-bold"><?= $brt->judul ?></h3>
                <?= strip_tags(html_entity_decode(substr($brt->isi_berita, 0, 250))) ?>
                <a href="/web/detail_berita/<?= $brt->slug . "_" . $brt->id_sumber ?>">read more...</a>
              </div>
            </div>
          </div>
        <?php endforeach ?>

      </div>
    </div>
    <!-- SIDEBAR -->
    <div class="col-lg-4">
      <?= $this->include('web/_template/_sidebar') ?>
    </div>
    <!-- END SIDEBAR -->
  </div>
</div>
<!-- </div> -->

<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center mb-5">
        <h2 class="heading-section">#KecamatanKaidipang</h2>
        <div class="divider-custom"></div>
      </div>
      <div class="col-md-12">
        <div class="featured-carousel owl-carousel">
          <?php foreach ($pariwisata as $prt) : ?>
            <div class="item">
              <div class="work">
                <div class="img d-flex align-items-end justify-content-center" style="background-image: url(<?= base_url("Web/img_medium/$prt->sumber") ?>);">
                  <div class="text w-100">
                    <span class="cat">Wisata</span>
                    <h4><a href="/web/detail_obwisata/<?= $prt->id_sumber ?>"><?= ucwords($prt->nama) ?></a></h4>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="bg-custom-5 pt-5 mb-5 pb-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center mb-5">
        <h2>#Jelajah</h2>
        <div class="divider-custom"></div>
      </div>
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-4 my-4 my-4">
            <a href="/web/obyek_wisata" class="jajak-link">
              <div class="bg-white my-2 jajak-box">
                <div class="jajak-icon fa fa-map-o text-custom-1 mb-3 mt-5"></div>
                <div class="jajak-text">01</div>
                <div class="fs-1">Obyek Wisata</div>
              </div>
            </a>
          </div>
          <div class="col-md-4 my-4">
            <a href="/web/kuliner" class="jajak-link">
              <div class="bg-white my-2 jajak-box">
                <div class="jajak-icon fa fa-cutlery text-custom-1 mb-3 mt-5"></div>
                <div class="jajak-text">02</div>
                <div class="fs-1">Kuliner</div>
              </div>
            </a>
          </div>
          <div class="col-md-4 my-4">
            <a href="/web/penginapan" class="jajak-link">
              <div class="bg-white my-2 jajak-box">
                <div class="jajak-icon fa fa-bed text-custom-1 mb-3 mt-5"></div>
                <div class="jajak-text">03</div>
                <div class="fs-1">Penginapan</div>
              </div>
            </a>
          </div>

        </div>
      </div>
    </div>
  </div>

</section>

<section class="mt-5 pb-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center mb-5">
        <h2>Program Kegiatan</h2>
        <div class="divider-custom"></div>
      </div>
      <div class="col-md-12">
        <div class="row">
          <?php foreach ($program as $prg) : ?>
            <div class="col-md-4 my-3 mx-auto">
              <div class="program-box">
                <img src="<?= base_url("Web/img_thumb/$prg->sumber") ?>" alt="com">
                <div class="program-overlay">
                  <div class="program-link"><a href="/web/detail_program_kegiatan/<?= $prg->id ?>" class="fw-bold">Lihat</a></div>
                  <div class="program-text text-uppercase"><?= $prg->judul ?></div>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
      <div class="col-md-12 mt-4 text-center">
        <a href="/web/program_kegiatan" class="btn btn-info text-white">load more</a>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection(); ?>