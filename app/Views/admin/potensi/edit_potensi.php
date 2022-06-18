<?= $this->extend('layout/_template') ?>

<?= $this->section('contentAdmin') ?>
<section class="content-header">
  <h1>
    Input Menu
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="">Potensi</li>
    <li class="">Bidang</li>
    <li class="active">Edit</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Edit Potensi Bidang</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <form action="/potensi/process_edit_potensi" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="id" value="<?= $potensi->id ?>">
        <!-- select -->
        <div class="form-group <?= ($validation->hasError('bidang')) ? 'has-error' : '' ?>">
          <label>Bidang Potensi</label>
          <select class="form-control" name="bidang">
            <option value="" disabled>pilih</option>
            <option value="peristiwa" <?= old('bidang') == "pariwisata" ? 'selected' : '' ?>>Peristiwa</option>
            <option value="kelautan" <?= old('bidang') == "kelautan" ? 'selected' : '' ?>>Kelautan</option>
            <option value="perdagangan" <?= old('bidang') == "perdagangan" ? 'selected' : '' ?>>Perdagangan</option>
            <option value="pertanian" <?= old('bidang') == "pertanian" ? 'selected' : '' ?>>Pertanian</option>
            <option value="industri" <?= old('bidang') == "industri" ? 'selected' : '' ?>>Industri</option>
            <option value="pendidikan" <?= old('bidang') == "pendidikan" ? 'selected' : '' ?>>Pendidikan</option>
          </select>
          <small class="text-danger"><?= $validation->getError('bidang') ?></small>
        </div>

        <div class="form-group <?= ($validation->hasError('judul')) ? 'has-error' : '' ?>">
          <label>Judul</label>
          <input type="text" class="form-control" placeholder="Enter ..." name="judul" value="<?= old('judul') ? old('judul') : $potensi->judul ?>">
          <small class="text-danger"><?= $validation->getError('judul') ?></small>
        </div>

        `
        <!-- tools box -->
        <h3 class="box-title">Tuliskan Potensi
          <small class="text-danger"><?= $validation->getError('isi_potensi') ?></small>
        </h3>
        <!-- /. tools -->
        <!-- /.box-header -->
        <div class="box-body pad">
          <textarea id="textarea" placeholder="Potensi" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="isi_potensi"><?= old('isi_potensi') ? old('isi_potensi') : $potensi->isi_potensi ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">SUBMIT</button>
      </form>

    </div>
    <!-- /.box-body -->
  </div>
</section>

<?= $this->endSection() ?>