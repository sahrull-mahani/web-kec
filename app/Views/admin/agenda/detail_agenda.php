<?= $this->extend('layout/_template') ?>

<?= $this->section('contentAdmin') ?>
<section class="content-header">
  <h1>
    <?= $agenda->judul ?>
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="">Berita</li>
    <li class="active"><?= $agenda->judul ?></li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><?= $agenda->judul ?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <i class="fa fa-clock-o"></i> <?= hariIni('D', strtotime($agenda->created_at)) . ", " . date('d-m-Y H.i', strtotime($agenda->created_at)) . " - " . $agenda->username ?>
          <hr>
          <?= $agenda->isi_agenda ?>

          <?php if ($agenda->published_at == null && session('user')['id'] == $agenda->id_user) : ?>
            <hr>
            <a href="/berita/publish_berita/<?= $agenda->id_berita ?>" class="btn btn-primary btn-ask" data-judul="Publish" data-text="Publish <?= $agenda->judul ?>">PUBLISH</a>
            <?php elseif (session('user')['level'] == 1 && $agenda->published_at == null) : ?>
              <hr>
              <a href="/berita/publish_berita/<?= $agenda->id_berita ?>" class="btn btn-primary btn-ask" data-judul="Publish" data-text="Publish <?= $agenda->judul ?>">PUBLISH</a>
          <?php endif ?>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
<?= $this->endSection() ?>