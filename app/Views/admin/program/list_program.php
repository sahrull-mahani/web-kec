<?= $this->extend('layout/_template') ?>

<?= $this->section('contentAdmin') ?>
<section class="content-header">
  <h1>
    Daftar Program Kegiatan
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="">Program Kegiatan</li>
    <li class="active">Daftar</li>
  </ol>
  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
      <?= session()->getFlashdata('success') ?>
    </div>
  <?php endif ?>
</section>

<div class="row">
  <div class="col-md-12">
    <section class="content">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Daftar Program Kegiatan</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
              <div class="col-sm-6"></div>
              <div class="col-sm-6"></div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                  <thead>
                    <tr role="row">
                      <th>No.</th>
                      <th>Judul</th>
                      <th>Program Kegiatan</th>
                      <th>Gambar</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (empty($program)) : ?>
                      <tr role="row" class="odd">
                        <td class="sorting_1" colspan="5" align="center">
                          <h2"><strong>Data Belum Diisi!.</strong> <a href="/program"><i class="fa fa-plus"></i> Tambah Program Kegiatan</a></h2>
                        </td>
                      </tr>
                    <?php else : ?>
                      <?php $no = 1; ?>
                      <?php foreach ($program as $prg) : ?>
                        <tr role="row" class="odd">
                          <td class="sorting_1"><?= $no++ ?></td>
                          <td><?= $prg->judul ?></td>
                          <td><?= strip_tags($prg->isi_program) ?>... <a href="/program/detail_program/<?= $prg->id_sumber ?>">readmore</a></td>
                          <td><a href="/admin_assets/galeri/<?= $prg->sumber ?>" data-lightbox="program_kegiatan" data-title="<?= $prg->judul ?>"><img src="/admin_assets/galeri/<?= $prg->sumber ?>" alt="poto-program" class="img-thumb-overlay"></a></td>
                          <td>
                            <a href="/program/edit_program/<?= $prg->id_sumber ?>" class="btn btn-default btn-xs"><i class="fa fa-edit"></i> Edit</a>
                            <a href="/program/hapus_program/<?= $prg->id_sumber ?>" class="btn btn-default btn-xs btn-ask" data-title="Hapus" data-text="Hapus <?= $prg->judul ?> ?"><i class="fa fa-trash"></i> Hapus</a>
                            <?php if ($prg->published_at == null) : ?>
                              <a href="/program/publish_program/<?= $prg->id_sumber ?>" class="btn btn-default btn-xs btn-ask" data-title="Unpblished" data-text="unpblished <?= $prg->judul ?> ?"><i class="fa fa-circle"></i> Unpublish</a>
                            <?php else : ?>
                              <span class="btn btn-default btn-xs btn-ask" data-title="Published" data-text="Published <?= $prg->judul ?> ?"><i class="fa fa-check-circle-o"></i> Published</span>
                            <?php endif ?>
                          </td>
                        </tr>
                      <?php endforeach ?>
                    <?php endif ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
    </section>
  </div>
</div>
<?= $this->endSection() ?>