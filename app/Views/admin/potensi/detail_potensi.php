<?= $this->extend('layout/_template') ?>

<?= $this->section('contentAdmin') ?>
<section class="content-header">
  <h1>
    <?= $potensi->judul ?>
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="">Potensi</li>
    <li class=""><?= $potensi->bidang ?></li>
    <li class="active"><?= $potensi->judul ?></li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><?= $potensi->judul ?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?= $potensi->isi_potensi ?>
          <hr>
          <a href="/potensi/edit_potensi/<?= $potensi->id ?>" class="btn btn-default btn-xs"><i class="fa fa-edit"></i> Edit</a>
          <a href="/potensi/hapus_potensi/<?= $potensi->id ?>" class="btn btn-default btn-xs btn-ask" data-title="Hapus" data-text="Hapus <?= $potensi->judul ?> ?"><i class="fa fa-trash"></i> Hapus</a>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
<?= $this->endSection() ?>