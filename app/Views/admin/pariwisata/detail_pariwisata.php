<?= $this->extend('layout/_template') ?>

<?= $this->section('contentAdmin') ?>
<section class="content-header">
  <h1>
    <?= $pariwisata->nama ?>
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="">Pariwisata</li>
    <li class="active"><?= $pariwisata->nama ?></li>
  </ol>
  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
      <?= session()->getFlashdata('success') ?>
    </div>
  <?php endif ?>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><?= $pariwisata->nama ?> | </h3> <i class="fa fa-clock-o"></i> <?= hariIni('D', strtotime($pariwisata->created_at)) . ", " . date('d-m-Y H.i', strtotime($pariwisata->created_at)) ?>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <?php $no = 1 ?>
            <?php foreach ($gambar as $gmb) : ?>
              <div class="col-md-6" style="margin-top: 20px;">
                <div class="program-box">
                  <a href="/admin_assets/galeri/<?= $gmb->sumber ?>" data-lightbox="galeri" data-title="Galeri">
                    <img src="/admin_assets/galeri/<?= $gmb->sumber ?>" alt="com">
                  </a>
                  <div class="program-overlay">
                    <a href="/program/hapus_galeri/<?= $gmb->id ?>" class="program-link btn-ask" data-judul="Hapus" data-text="Hapus gambar ini?"><i class="fa fa-trash fa-lg"></i></a>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
          </div>

          <?php if ($pariwisata->published_at == null) : ?>
            <hr>
            <a href="/pariwisata/publish_pariwisata/<?= $pariwisata->idPro ?>" class="btn btn-primary btn-ask" data-judul="Publish" data-text="Publish <?= $pariwisata->nama ?>">PUBLISH</a>
          <?php endif ?>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
<?= $this->endSection() ?>