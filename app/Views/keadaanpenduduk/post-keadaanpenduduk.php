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
                        <?= form_open_multipart('keadaanpenduduk/save', array('class' => 'mode2 form-post-save')); ?>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="form-group item">
                                    <label for="dusun">Dusun</label>
                                    <input type="text" class="form-control" id="dusun" name="dusun" placeholder="Dusun" value="<?= @$data->dusun ?>" required />
                                </div>
                                <div class="row">
                                    <div class="form-group item col-md-6">
                                        <label for="no_kk">Nomor Kartu Keluarga</label>
                                        <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="Nomor Kartu Keluarga" value="<?= @$data->no_kk ?>" required />
                                    </div>
                                    <div class="form-group item col-md-6">
                                        <label for="nik">Nomor Induk Kependudukan</label>
                                        <select name="individu_id" id="nik" class="form-control">
                                            <option value="" disabled <?= (isset($get->individu_id) ? '' : 'selected') ?>>--Pilih NIK--</option>
                                            <?php foreach ($individu as $row) : ?>
                                                <option value="<?= $row->id; ?>" <?= (isset($get->individu_id) ? ($get->individu_id == $row->id ? 'selected' : '') : '') ?>><?= $row->nik . ' - ' . ucwords($row->nama) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group item">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= @ucwords($data->nama) ?>" required />
                                </div>
                                <div class="form-group item">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <?php $defaults = array('' => 'Pilih Pekerjaan');
                                    $options = array(
                                        'Petani Pemilik Lahan' => 'Petani Pemilik Lahan',
                                        'Petani Penyewa' => 'Petani Penyewa',
                                        'Buruh Tani' => 'Buruh Tani',
                                        'Nelayan Pemilik Kapal/Perahu' => 'Nelayan Pemilik Kapal/Perahu',
                                        'Nelayan Penyewa Kapal/Perahu' => 'Nelayan Penyewa Kapal/Perahu',
                                        'Buruh Nelayan' => 'Buruh Nelayan',
                                        'Guru' => 'Guru',
                                        'Guru Agama' => 'Guru Agama',
                                        'Pedagang' => 'Pedagang',
                                        'Pengolahan/Industri' => 'Pengolahan/Industri',
                                        'PNS' => 'PNS',
                                        'TNI' => 'TNI',
                                        'Perangkat Desa' => 'Perangkat Desa',
                                        'Pegawai Kantor Desa' => 'Pegawai Kantor Desa',
                                        'TKI' => 'TKI',
                                        'Lainnya' => 'Lainnya',
                                    );
                                    echo form_dropdown('pekerjaan[]', $defaults + $options, (isset($data->pekerjaan)) ? $data->pekerjaan : '', 'class="form-control " id="pekerjaan" required');
                                    ?>
                                </div>
                                <div class="card-header">
                                    <h3 class="card-title">Penyakit Yang Di Derita Selama 1 Tahun Terakhir</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group item col-md-4">
                                            <label for="muntaber_diare">Muntaber/Diare</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('muntaber_diare[]', $defaults + $options, (isset($data->muntaber_diare)) ? $data->muntaber_diare : '', 'class="form-control " id="muntaber_diare" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <label for="hepatitis_e">Hepatitis E</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('hepatitis_e[]', $defaults + $options, (isset($data->hepatitis_e)) ? $data->hepatitis_e : '', 'class="form-control " id="hepatitis_e" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <label for="jantung">Jantung</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('jantung[]', $defaults + $options, (isset($data->jantung)) ? $data->jantung : '', 'class="form-control " id="jantung" required');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group item col-md-4">
                                            <label for="demam_berdarah">Demam Berdarah</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('demam_berdarah[]', $defaults + $options, (isset($data->demam_berdarah)) ? $data->demam_berdarah : '', 'class="form-control " id="demam_berdarah" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <label for="difteri">Difteri</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('difteri[]', $defaults + $options, (isset($data->difteri)) ? $data->difteri : '', 'class="form-control " id="difteri" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <label for="tbc_paru">TBC Paru Paru</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('tbc_paru[]', $defaults + $options, (isset($data->tbc_paru)) ? $data->tbc_paru : '', 'class="form-control " id="tbc_paru" required');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group item col-md-4">
                                            <label for="campak">Campak</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('campak[]', $defaults + $options, (isset($data->campak)) ? $data->campak : '', 'class="form-control " id="campak" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <label for="cikungunya">Cikungunya</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('cikungunya[]', $defaults + $options, (isset($data->cikungunya)) ? $data->cikungunya : '', 'class="form-control " id="cikungunya" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <label for="kanker">Kanker</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('kanker[]', $defaults + $options, (isset($data->kanker)) ? $data->kanker : '', 'class="form-control " id="kanker" required');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group item col-md-4">
                                            <label for="malaria">Malaria</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('malaria[]', $defaults + $options, (isset($data->malaria)) ? $data->malaria : '', 'class="form-control " id="malaria" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <label for="leptospirosis">Leptospirosis</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('leptospirosis[]', $defaults + $options, (isset($data->leptospirosis)) ? $data->leptospirosis : '', 'class="form-control " id="leptospirosis" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <label for="diabetes">Diabetes</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('diabetes[]', $defaults + $options, (isset($data->diabetes)) ? $data->diabetes : '', 'class="form-control " id="diabetes" required');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group item col-md-4">
                                            <label for="fluburung_sars">Flu Burung/SARS</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('fluburung_sars[]', $defaults + $options, (isset($data->fluburung_sars)) ? $data->fluburung_sars : '', 'class="form-control " id="fluburung_sars" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <label for="kolera">Kolera</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('kolera[]', $defaults + $options, (isset($data->kolera)) ? $data->kolera : '', 'class="form-control " id="kolera" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <label for="lumpuh">Lumpuh</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('lumpuh[]', $defaults + $options, (isset($data->lumpuh)) ? $data->lumpuh : '', 'class="form-control " id="lumpuh" required');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group item col-md-4">
                                            <label for="covid_19">Covid-19</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('covid_19[]', $defaults + $options, (isset($data->covid_19)) ? $data->covid_19 : '', 'class="form-control " id="covid_19" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <label for="gizi_buruk">Gizi Buruk</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('gizi_buruk[]', $defaults + $options, (isset($data->gizi_buruk)) ? $data->gizi_buruk : '', 'class="form-control " id="gizi_buruk" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <label for="hepatitis_b">Hepatitis B</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('hepatitis_b[]', $defaults + $options, (isset($data->hepatitis_b)) ? $data->hepatitis_b : '', 'class="form-control " id="hepatitis_b" required');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group item col-md-4">
                                            <label for="lainnya">Lainnya</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('lainnya[]', $defaults + $options, (isset($data->lainnya)) ? $data->lainnya : '', 'class="form-control " id="lainnya" required');
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
        </div>
    </section>
</div>
<?= $this->endSection() ?>