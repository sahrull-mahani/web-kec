<?= $this->extend('layout/_template') ?>

<?= $this->section('contentAdmin') ?>
<section class="content-header">
  <h1>
    Daftar Potensi
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="">Potensi</li>
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
          <h3 class="box-title">Statistik Agama</h3>
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
                      <th>Bidang</th>
                      <th>Judul</th>
                      <th>Isi Potensi</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (empty($potensi)) : ?>
                      <tr role="row" class="odd">
                        <td class="sorting_1" colspan="5" align="center">
                          <h2"><strong>Data Belum Diisi!.</strong> <a href="/potensi"><i class="fa fa-plus"></i> Tambah Data Potensi</a></h2>
                        </td>
                      </tr>
                    <?php else : ?>
                      <?php $no = 1; ?>
                      <?php foreach ($potensi as $ptn) : ?>
                        <tr role="row" class="odd">
                          <td class="sorting_1"><?= $no++ ?></td>
                          <td><?= $ptn->bidang ?></td>
                          <td><?= $ptn->judul ?></td>
                          <td><?= substr($ptn->isi_potensi, 0, 150) ?>... <a href="/potensi/detail_potensi/<?= $ptn->id ?>">readmore</a></td>
                          <td>
                            <a href="/potensi/edit_potensi/<?= $ptn->id ?>" class="btn btn-default btn-xs"><i class="fa fa-edit"></i> Edit</a>
                            <a href="/potensi/hapus_potensi/<?= $ptn->id ?>" class="btn btn-default btn-xs btn-ask" data-title="Hapus" data-text="Hapus <?= $ptn->judul ?> ?"><i class="fa fa-trash"></i> Hapus</a>
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