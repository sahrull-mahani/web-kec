<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container mt-5">
  <div class="row">
    <div class="col-md-12 text-center mb-5">
      <h2>#Galeri</h2>
      <div class="divider-custom"></div>
    </div>

    <div class="col-md-12">
      <div class="row">
        <?php //foreach($berita as $brt) : 
        ?>
        <!-- <div class="col-lg-6 my-2">
          <div class="card">
            <div class="overlay-img">
              <img src="/admin_assets/galeri/<?php //$brt['gambar'] 
                                              ?>" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title"><a href="/home/detail_galeri?berita=<?php //$brt['slug']."_".$brt['id'] 
                                                                          ?>"><?php //$brt['judul'] 
                                                                                                                  ?></a></h5>
              <small class="text-muted">Rabu, 09 Maret 2022</small>
            </div>
          </div>
        </div> -->
        <?php //endforeach 
        ?>
        <?php //foreach($program as $prg) : 
        ?>
        <!-- <div class="col-lg-6 my-2">
          <div class="card">
            <div class="overlay-img">
              <img src="/admin_assets/galeri/<?php //$prg->sumber 
                                              ?>" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title"><a href="/home/detail_galeri?program=<?php //$prg->id 
                                                                          ?>"><?php //$prg->judul 
                                                                                                ?></a></h5>
              <small class="text-muted">Rabu, 09 Maret 2022</small>
            </div>
          </div>
        </div> -->
        <?php //endforeach 
        ?>
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