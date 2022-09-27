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
                        <?= form_open_multipart('datakematian/save', array('class' => 'mode2 form-post-save')); ?>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group item col-md-8">
                                        <label for="nama">Nama</label>
                                        <select name="individu_id" id="datakematian" class="form-control select2">
                                            <option value="" disabled <?= (isset($get->individu_id) ? '' : 'selected') ?>>Pilih Data</option>
                                            <?php foreach ($individu as $row) : ?>
                                                <option value="<?= $row->id; ?>" <?= (isset($get->individu_id) ? ($get->individu_id == $row->id ? 'selected' : '') : '') ?>><?= $row->nik . ' - ' .  ucwords($row->nama) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group item col-md-4">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <?php $defaults = array('' => 'Pilih');
                                        $options = array(
                                            'Laki - Laki' => 'Laki - Laki',
                                            'Perempuan' => 'Perempuan',
                                        );
                                        echo form_dropdown('jenis_kelamin[]', $defaults + $options, (isset($data->jenis_kelamin)) ? $data->jenis_kelamin : '', 'class="form-control" id="jenis_kelamin" readonly');
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group item col-md-6">
                                        <label for="tgl_kematian">Tanggal Kematian</label>
                                        <input type="date" class="form-control" id="tgl_kematian" name="tgl_kematian" value="<?= @$get->tgl_kematian ?>" required />
                                    </div>
                                    <div class="form-group item col-md-6">
                                        <label for="jam_kematian">Tanggal Kematian</label>
                                        <input type="time" class="form-control" id="jam_kematian" name="jam_kematian" value="<?= @$get->jam_kematian ?>" required />
                                    </div>
                                </div>
                                <div class="form-group item">
                                    <label for="tempat_kematian">Tempat Kematian</label>
                                    <input type="text" class="form-control" id="tempat_kematian" name="tempat_kematian" placeholder="Tempat Kematian" value="<?= @$get->tempat_kematian ?>" required />
                                </div>
                                <div class="row">
                                    <div class="form-group item col-md-6">
                                        <label for="tgl_kubur">Tanggal Dikebumikan</label>
                                        <input type="date" class="form-control" id="tgl_kubur" name="tgl_kubur" value="<?= @$get->tgl_kubur ?>" required />
                                    </div>
                                    <div class="form-group item col-md-6">
                                        <label for="jam_kubur">Jam Dikebumikan</label>
                                        <input type="time" class="form-control" id="jam_kubur" name="jam_kubur" value="<?= @$get->jam_kubur ?>" required />
                                    </div>
                                </div>
                                <div class="form-group item">
                                    <label for="tempat_kubur">Tempat Pekuburan</label>
                                    <input type="text" class="form-control" id="tempat_kubur" name="tempat_kubur" placeholder="Tempat Pekuburan" value="<?= @$get->tempat_kubur ?>" required />
                                </div>
                                <div class="form-group item">
                                    <label for="alamat">Alamat Pekuburan</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat_kubur" placeholder="Alamat Pekuburan" value="<?= @$get->alamat_kubur ?>" required />
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
</div>
</section>
</div>
<?= $this->endSection() ?>