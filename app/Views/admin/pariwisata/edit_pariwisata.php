<?= $this->extend('layout/_template') ?>

<?= $this->section('contentAdmin') ?>
<section class="content-header">
  <h1>
    Edit Menu
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="">Pariwisata</li>
    <li class="">Edit</li>
    <li class="active"><?= $pariwisata['nama'] ?></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Input Program</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">

      <!-- /.box-header -->
      <div class="box-body">
        <form action="/pariwisata/edit_pariwisata_process" method="post" enctype="multipart/form-data">
          <?= csrf_field() ?>

          <input type="hidden" name="pariwisataID" value="<?= $pariwisata['id'] ?>">
          <input type="hidden" name="nama_gambar" value="<?= $pariwisata['gambar'] ?>">

          <div class="form-group <?= ($validation->hasError('nama')) ? 'has-error' : '' ?>">
            <label>Nama</label>
            <input type="text" class="form-control" placeholder="Enter ..." name="nama" value="<?= old('nama') ? old('nama') : $pariwisata['nama'] ?>">
            <small class="text-danger"><?= $validation->getError('nama') ?></small>
          </div>

          <input id="input-id" type="file" name="gambar[]" accept=".jpg, .png, image/jpeg, image/png" multiple>
          <small class="text-danger"><?= $validation->getError('gambar') ?></small>

          <!-- checkbox -->
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="publish" <?= old('publish') ? 'checked' : ($pariwisata['published_at'] == null ? '' : 'checked') ?>>
                Publish
              </label>
            </div>
          </div>

          <button type="submit" class="btn btn-primary">UPDATE</button>
        </form>
      </div>

    </div>
    <!-- /.box-body -->
  </div>
</section>

<?= $this->endSection() ?>