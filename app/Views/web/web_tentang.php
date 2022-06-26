<?= $this->extend('web/_template/index') ?>

<?= $this->section('page-content') ?>
<div class="container">
  <div class="row">
    <div class="col-lg-8">
      <div class="row">
        <div class="col-md-12">
          <h2>Tentang Kecamantan Kaidipang</h2>

          <p class="text-justify text-alinea">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, mollitia! Maxime adipisci minima, expedita tempora eos illo nobis eius deserunt ad quidem quo quam placeat corrupti iste pariatur qui vero distinctio harum. Error corrupti aut delectus? Praesentium eos voluptatum dolorem quasi nemo id odio modi facilis facere ut debitis expedita odit quam ratione ipsa laboriosam sed aperiam, adipisci vitae doloribus iste voluptatibus impedit dolores earum. Atque aliquid sed eius commodi laborum quod libero distinctio assumenda, dolore sequi cupiditate deleniti quibusdam nisi tenetur blanditiis hic accusamus, quisquam iure est quasi. Itaque repellat atque, non reprehenderit perferendis voluptatibus quidem beatae dolores nam. Odit minima deleniti, nisi mollitia, harum perferendis reprehenderit, ullam ducimus numquam unde nemo dolores tenetur vel accusamus impedit corporis eligendi? At, nisi! Asperiores laudantium deleniti, labore est perferendis illum maiores dicta alias. Laborum incidunt provident, debitis qui fugit optio ad sint vitae exercitationem, hic consequuntur sit nisi corrupti assumenda ullam.
          </p>

          <h2 class="mt-5">Obyek Wisata</h2>
          <div class="featured-carousel owl-carousel">
            <?php foreach ($pariwisata as $prt) : ?>
              <div class="item">
                <div class="work">
                  <div class="img d-flex align-items-end justify-content-center" style="background-image: url(<?= base_url("Web/img_medium/$prt->sumber") ?>);">
                    <div class="text w-100">
                      <span class="cat">Wisata</span>
                      <h5><a href="<?= base_url("Web/img_medium/$prt->sumber") ?>" data-lightbox="masonry" data-title="image-<?= $prt->sumber ?>"><?= ucwords($prt->nama) ?></a></h5>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
        <div class="col-md-12">
          <h2 class="mt-4">Peta Kecamatan Kaidipang</h2>
          <div class="card">
            <div class="mapouter">
              <div class="gmap_canvas"><iframe height="1080" id="gmap_canvas" src="https://maps.google.com/maps?q=kaidipang&t=k&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="width: 100%;"></iframe><a href="https://www.whatismyip-address.com"></a><br>
                <style>
                  .mapouter {
                    position: relative;
                    text-align: right;
                    height: 1080px;
                    width: 100%;
                  }
                </style><a href="https://www.embedgooglemap.net">google map api for website</a>
                <style>
                  .gmap_canvas {
                    overflow: hidden;
                    background: none !important;
                    height: 1080px;
                    width: 100%;
                  }
                </style>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4"><?= $this->include('web/_template/_sidebar') ?></div>
  </div>
</div>
<?= $this->endSection() ?>