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
                        <?= form_open_multipart('jumlahpenduduk/save', array('class' => 'mode2 form-post-save')); ?>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="form-group item">
                                    <label for="dusun">Dusun</label>
                                    <select name="dusun" id="dusun" class="form-control select2">
                                        <option value="" disabled <?= (isset($get->nama_dusun) ? '' : 'selected') ?>>Pilih Dusun</option>
                                        <?php foreach ($individu as $row) : ?>
                                            <option value="<?= $row->nama_dusun; ?>" <?= (isset($get->nama_dusun) ? ($get->nama_dusun == $row->nama_dusun ? 'selected' : '') : '') ?>><?= $row->nama_dusun ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="form-group item col-md-6">
                                        <label for="jumlah_jiwa">Jumlah Jiwa</label>
                                        <input type="text" class="form-control" id="jumlah_jiwa" name="jumlah_jiwa" placeholder="Jumlah Jiwa" value="<?= @$get->jumlah_jiwa ?>" required />
                                    </div>
                                    <div class="form-group item col-md-6">
                                        <label for="jumlah_kk">Jumlah Kartu Keluarga</label>
                                        <input type="text" class="form-control" id="jumlah_kk" name="jumlah_kk" placeholder="Jumlah Kartu Keluarga" value="<?= @$get->jumlah_kk ?>" required />
                                    </div>
                                </div>
                                <div class="card-header">
                                    <h3 class="card-title">Jumlah Menurut Usia</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group item">
                                        <label for="umur">Umur</label>
                                        <?php $defaults = array('' => 'Pilih Berdasarkan Umur');
                                        $options = array(
                                            '0 - 4' => '0 - 4 Tahun',
                                            '5 - 9' => '5 - 9 Tahun',
                                            '10 - 14' => '10 - 14 Tahun',
                                            '15 - 19' => '15 - 19 Tahun',
                                            '20 - 24' => '20 - 24 Tahun',
                                            '25 - 29' => '25 - 29 Tahun',
                                            '30 - 34' => '30 - 34 Tahun',
                                            '35 - 39' => '35 - 39 Tahun',
                                            '40 - 44' => '40 - 44 Tahun',
                                            '45 - 49' => '45 - 49 Tahun',
                                            '50 - 54' => '50 - 54 Tahun',
                                            '55 - 59' => '55 - 59 Tahun',
                                            '60 - 64' => '60 - 64 Tahun',
                                            '65 - 69' => '65 - 69 Tahun',
                                            '70 - 74' => '70 - 74 Tahun',
                                            '75 - 79' => '75 - 79 Tahun',
                                            '80 - 84' => '80 - 84 Tahun',
                                        );
                                        echo form_dropdown('umur[]', $defaults + $options, (isset($get->umur)) ? $get->umur : '', 'class="form-control select2" id="umur" required');
                                        ?>

                                    </div>
                                    <div class="row">
                                        <div class="form-group item col-md-4">
                                            <label for="jumlah_pria">Laki - Laki</label>
                                            <input type="text" class="form-control" id="jumlah_pria" name="jumlah_pria" placeholder="Jumlah Pria" value="<?= @$get->jumlah_pria ?>" required />
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <label for="jumlah_wanita">Perempuan</label>
                                            <input type="text" class="form-control" id="jumlah_wanita" name="jumlah_wanita" placeholder="Jumlah Wanita" value="<?= @$get->jumlah_wanita ?>" required />
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <label for="jumlah">Jumlah</label>
                                            <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" value="<?= @$get->jumlah ?>" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header">
                                    <h3 class="card-title">Jumlah Menurut Agama</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group item col-md">
                                            <label for="agama_islam">Islam</label>
                                            <input type="text" class="form-control" id="agama_islam" name="agama_islam" placeholder="Jumlah Agama Islam" value="<?= @$get->agama_islam ?>" required />
                                        </div>
                                        <div class="form-group item col-md">
                                            <label for="agama_kristen">Kristen</label>
                                            <input type="text" class="form-control" id="agama_kristen" name="agama_kristen" placeholder="Jumlah Agama Kristen" value="<?= @$get->agama_kristen ?>" required />
                                        </div>
                                        <div class="form-group item col-md">
                                            <label for="agama_katolik">Katolik</label>
                                            <input type="text" class="form-control" id="agama_katolik" name="agama_katolik" placeholder="Jumlah Agama Katolik" value="<?= @$get->agama_katolik ?>" required />
                                        </div>
                                        <div class="form-group item col-md">
                                            <label for="agama_hindu">Hindu</label>
                                            <input type="text" class="form-control" id="agama_hindu" name="agama_hindu" placeholder="Jumlah Agama Hindu" value="<?= @$get->agama_hindu ?>" required />
                                        </div>
                                        <div class="form-group item col-md">
                                            <label for="agama_budha">Budha</label>
                                            <input type="text" class="form-control" id="agama_budha" name="agama_budha" placeholder="Jumlah Agama Budha" value="<?= @$get->agama_budha ?>" required />
                                        </div>
                                    </div>
                                </div>
                                <textarea name="keterangan" id="keterangan" class="text-area" cols="10" rows="10" placeholder="Keterangan...."><?= @$get->keterangan ?></textarea>
                                <input type="hidden" name="id" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />
                            </div>
                            <div class="card-footer">
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