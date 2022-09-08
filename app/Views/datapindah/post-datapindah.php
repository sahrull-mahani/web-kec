<?= $this->extend("template_adminlte/index") ?>
<?= $this->section("page-content") ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $breadcome ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= $breadcome ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?= $breadcome ?></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <?= form_open_multipart('datapindah/save', array('class' => 'mode2 form-post-save')); ?>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="form-group item">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required />
                                </div>
                                <div class="form-group item">
                                    <label for="status">Status Dalam KK</label>
                                    <input type="text" class="form-control" id="status" name="status" placeholder="Status Dalam Kartu Keluarga" required />
                                </div>
                                <div class="form-group item">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <?php $defaults = array('' => 'Pilih');
                                    $options = array(
                                        'Laki - Laki' => 'Laki - Laki',
                                        'Wanita' => 'Wanita',
                                    );
                                    echo form_dropdown('jenis_kelamin[]', $defaults + $options, (isset($get->jenis_kelamin)) ? $get->jenis_kelamin : '', 'class="form-control select2" id="jenis_kelamin" required');
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_pindah">Tanggal Pindah</label>
                                    <input type="date" class="form-control" id="tgl_pindah" name="tgl_pindah" />
                                </div>
                                <div class="form-group item">
                                    <label for="alamat_pindah">Alamat Pindah</label>
                                    <input type="text" class="form-control" id="alamat_pindah" name="alamat_pindah" placeholder="Alamat Pindah" required />
                                </div>
                                <div class="form-group item">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type='hidden' name='action' value="insert" />
                        <button type="submit" class="btn btn-primary btn-sub">Submit</button>
                        <button class="btn btn-primary btn-load d-none" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
</div>
</div>
</section>
</div>
<?= $this->endSection() ?>