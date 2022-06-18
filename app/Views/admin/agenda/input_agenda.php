<?= $this->extend('layout/_template') ?>

<?= $this->section('contentAdmin') ?>
<section class="content-header">
  <h1>
    Input Menu
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="">Agenda</li>
    <li class="active">Input</li>
  </ol>
</section>


<!-- Main content -->
<section class="content">
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Input Agenda Kegiatan</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <form action="/agenda/process_input_agenda" method="post">
        <?= csrf_field() ?>

        <div class="form-group <?= ($validation->hasError('judul')) ? 'has-error' : '' ?>">
          <label>Judul</label>
          <input type="text" class="form-control" placeholder="Enter ..." name="judul" value="<?= old('judul') ?>">
          <small class="text-danger"><?= $validation->getError('judul') ?></small>
        </div>

        <!-- tools box -->
        <h3 class="box-title">Tuliskan Agenda Kegiatan
          <small class="text-danger"><?= $validation->getError('isi_agenda') ?></small>
        </h3>
        <!-- /. tools -->
        <!-- /.box-header -->
        <div class="box-body pad">
          <textarea id="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="isi_agenda"><?= old('isi_agenda') ?></textarea>
        </div>

        <div class="form-group <?= ($validation->hasError('lokasi')) ? 'has-error' : '' ?>">
          <label>Lokasi</label>
          <input type="text" class="form-control" placeholder="Enter ..." name="lokasi" value="<?= old('lokasi') ?>">
          <small class="text-danger"><?= $validation->getError('lokasi') ?></small>
        </div>

        <!-- checkbox -->
        <div class="form-group">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="publish" <?= old('publish') ? 'checked' : '' ?>>
              Publish
            </label>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">SUBMIT</button>
      </form>

    </div>
    <!-- /.box-body -->
  </div>
</section>

<?= $this->endSection() ?>