<?= $this->extend('layout/_template') ?>

<?= $this->section('contentAdmin') ?>
<section class="content-header">
  <h1>
    Daftar Agenda Kegiatan
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="">Agenda Kegiatan</li>
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
          <h3 class="box-title">Hover Data Table</h3>
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
                      <th>Agenda Kegiatan</th>
                      <th>Lokasi</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (empty($agenda)) : ?>
                      <tr role="row" class="odd">
                        <td class="sorting_1" colspan="5">
                          <h2><strong>Data Belum Diisi!.</strong> <a href="/agenda"><i class="fa fa-plus"></i> Tambah Agenda Kegiatan</a></h2>
                        </td>
                      </tr>
                    <?php else : ?>
                      <?php $no = 1; ?>
                      <?php foreach ($agenda as $agn) : ?>
                        <tr role="row" class="odd">
                          <td class="sorting_1"><?= $no++ ?></td>
                          <td><?= $agn->judul ?></td>
                          <td><?= substr(strip_tags($agn->isi_agenda), 0, 250) ?>... <a href="/agenda/detail_agenda/<?= $agn->slug ?>">readmore</a></td>
                          <td><?= $agn->lokasi ?></td>
                          <td align="center">
                            <?php if ($agn->id_user == session('user')['id']) : ?>
                              <a href="/agenda/edit_agenda/<?= $agn->slug ?>" class="btn btn-default btn-xs"><i class="fa fa-edit"></i> Edit</a>
                              <a href="/agenda/hapus_agenda/<?= $agn->slug ?>" class="btn btn-default btn-xs btn-ask" data-judul="Hapus" data-text="Hapus <?= $agn->judul ?> ?"><i class="fa fa-trash"></i> Hapus</a>
                              <?php if ($agn->published_at == null) : ?>
                                <a href="/agenda/publish_agenda/<?= $agn->id ?>" class="btn btn-default btn-xs btn-ask" data-judul="Unpublish" data-text="Unpublish <?= $agn->judul ?> ?"><i class="fa fa-circle"></i> Unpublish</a>
                              <?php else : ?>
                                <span class="btn btn-default btn-xs" onclick="return confirm('Anda yakin?')"><i class="fa fa-check-circle-o"></i> Published</span>
                              <?php endif ?>
                            <?php elseif (session('user')['level'] == 1) : ?>
                              <a href="/agenda/edit_agenda/<?= $agn->slug ?>" class="btn btn-default btn-xs"><i class="fa fa-edit"></i> Edit</a>
                              <a href="/agenda/hapus_agenda/<?= $agn->slug ?>" class="btn btn-default btn-xs btn-ask" data-judul="Hapus" data-text="Hapus <?= $agn->judul ?> ?"><i class="fa fa-trash"></i> Hapus</a>
                              <?php if ($agn->published_at == null) : ?>
                                <a href="/agenda/publish_agenda/<?= $agn->id ?>" class="btn btn-default btn-xs btn-ask" data-judul="Unpublish" data-text="Unpublish <?= $agn->judul ?> ?"><i class="fa fa-circle"></i> Unpublish</a>
                              <?php else : ?>
                                <span class="btn btn-default btn-xs btn-ask" data-judul="Publish" data-text="Publish <?= $agn->judul ?> ?"><i class="fa fa-check-circle-o"></i> Published</span>
                              <?php endif ?>
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