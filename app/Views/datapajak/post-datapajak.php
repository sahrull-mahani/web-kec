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
                        <?= form_open_multipart('datapajak/save', array('class' => 'mode2 form-post-save')); ?>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group item col-md-6">
                                        <label for="no_kk">Nomor Kartu Keluarga</label>
                                        <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="Nomor Kartu Keluarga" value="<?= @$data->no_kk ?>" readonly />
                                    </div>
                                    <div class="form-group item col-md-6">
                                        <label for="nik">Nomor Induk Kependudukan</label>
                                        <select name="individu_id" id="nik_pajak" class="form-control select2">
                                            <option value="" disabled <?= (isset($get->individu_id) ? '' : 'selected') ?>>Pilih Data</option>
                                            <?php foreach ($individu as $row) : ?>
                                                <option value="<?= $row->id; ?>" <?= (isset($get->individu_id) ? ($get->individu_id == $row->id ? 'selected' : '') : '') ?>><?= $row->nik . ' - ' . ucwords($row->nama) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group item">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= @$data->no_kk ?>" readonly />
                                </div>
                                <div class="form-group item">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= @$data->alamat ?>" readonly />
                                </div>
                                <div class="row">
                                    <div class="form-group item col-md-4">
                                        <label for="wajib_pajak">Wajib Pajak</label>
                                        <?php $defaults = array('' => 'Pilih');
                                        $options = array(
                                            'Ya' => 'Ya',
                                            'Tidak' => 'Tidak',
                                        );
                                        echo form_dropdown('wajib_pajak[]', $defaults + $options, (isset($data->wajib_pajak)) ? $data->wajib_pajak : '', 'class="form-control" id="wajib_pajak" readonly');
                                        ?>
                                    </div>
                                    <div class="form-group item col-md-4">
                                        <label for="jumlah">Besarnya (Rp)</label>
                                        <input type="text" class="form-control" id="jumlah_pajak" name="jumlah_pajak" placeholder="Jumlah Pajak" value="<?= @$data->jumlah_pajak ?>" readonly />
                                    </div>
                                    <div class="form-group item col-md-4">
                                        <label for="keterangan">Keterangan</label>
                                        <?php $defaults = array('' => 'Pilih');
                                        $options = array(
                                            'Lunas' => 'Lunas',
                                            'Belum Lunas' => 'Belum Lunas',
                                        );
                                        echo form_dropdown('keterangan[]', $defaults + $options, (isset($data->keterangan)) ? $data->keterangan : '', 'class="form-control" id="keterangan" readonly');
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="hidden" name="id" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />
                            <input type='hidden' name='action' value="<?= (isset($get->id)) ? 'update' : 'insert'; ?>" />
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
    </section>
</div>
<?= $this->endSection() ?>