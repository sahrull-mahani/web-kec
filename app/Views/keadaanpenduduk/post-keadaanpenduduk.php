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
                                    <select class="form-control select2" name="dusun" id="dusun">
                                        <?php foreach ($dusun as $row) : ?>
                                            <option value='<?= $row->dusun ?>'><?= $row->dusun ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="form-group item col-md-6">
                                        <label for="no_kk">Nomor Kartu Keluarga</label>
                                        <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="Nomor Kartu Keluarga" required />
                                    </div>
                                    <div class="form-group item col-md-6">
                                        <label for="nik">Nomor Induk Kependudukan</label>
                                        <input type="text" class="form-control" id="nik" name="nik" placeholder="Nomor Induk Kependudukan" required />
                                    </div>
                                </div>
                                <div class="form-group item">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required />
                                </div>
                                <div class="form-group item">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <select class="form-control" name="pekerjaan[]" id="pekerjaan">
                                        <option value="">Pilih Pekerjaan</option>

                                        <option value="Petani Pemilik Lahan">Petani Pemilik Lahan Tahun</option>
                                        <option value="Petani Penyewa">Petani Penyewa</option>
                                        <option value="Buruh Tani">Buruh Tani</option>
                                        <option value="Nelayan Pemilik Kapal/Perahu">Nelayan Pemilik Kapal/Perahu</option>
                                        <option value="Nelayan Penyewa Kapal/Perahu">Nelayan Penyewa Kapal/Perahu</option>
                                        <option value="Buruh Nelayan">Buruh Nelayan</option>
                                        <option value="Guru">Guru</option>
                                        <option value="Guru Agama">Guru Agama</option>
                                        <option value="Pedagang">Pedagang</option>
                                        <option value="Pengolahan/Industri">Pengolahan/Industri</option>
                                        <option value="PNS">PNS</option>
                                        <option value="TNI">TNI</option>
                                        <option value="Perangkat Desa">Perangkat Desa</option>
                                        <option value="Pegawai Kantor Desa">Pegawai Kantor Desa</option>
                                        <option value="TKI">TKI</option>
                                        <option value="Lainnya">Lainnya</option>

                                    </select>
                                    <!-- <?php $defaults = array('' => 'Pilih Pekerjaan');
                                            $options = array(
                                                'Petani Pemilik Lahan' => 'Petani Pemilik Lahan Tahun',
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
                                            echo form_dropdown('pekerjaan[]', $defaults + $options, (isset($get->pekerjaan)) ? $get->pekerjaan : '', 'class="form-control select2" id="pekerjaan" required');
                                            ?> -->
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
                                            echo form_dropdown('muntaber_diare[]', $defaults + $options, (isset($get->muntaber_diare)) ? $get->muntaber_diare : '', 'class="form-control" id="muntaber_diare" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <label for="hepatitis_e">Hepatitis E</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('hepatitis_e[]', $defaults + $options, (isset($get->hepatitis_e)) ? $get->hepatitis_e : '', 'class="form-control select2" id="hepatitis_e" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <label for="jantung">Jantung</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('jantung[]', $defaults + $options, (isset($get->jantung)) ? $get->jantung : '', 'class="form-control select2" id="jantung" required');
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
                                            echo form_dropdown('demam_berdarah[]', $defaults + $options, (isset($get->demam_berdarah)) ? $get->demam_berdarah : '', 'class="form-control select2" id="demam_berdarah" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <label for="difteri">Difteri</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('difteri[]', $defaults + $options, (isset($get->difteri)) ? $get->difteri : '', 'class="form-control select2" id="difteri" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <label for="tbc_paru">TBC Paru Paru</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('tbc_paru[]', $defaults + $options, (isset($get->tbc_paru)) ? $get->tbc_paru : '', 'class="form-control select2" id="tbc_paru" required');
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
                                            echo form_dropdown('campak[]', $defaults + $options, (isset($get->campak)) ? $get->campak : '', 'class="form-control select2" id="campak" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <label for="cikungunya">Cikungunya</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('cikungunya[]', $defaults + $options, (isset($get->cikungunya)) ? $get->cikungunya : '', 'class="form-control select2" id="cikungunya" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <label for="kanker">Kanker</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('kanker[]', $defaults + $options, (isset($get->kanker)) ? $get->kanker : '', 'class="form-control select2" id="kanker" required');
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
                                            echo form_dropdown('malaria[]', $defaults + $options, (isset($get->malaria)) ? $get->malaria : '', 'class="form-control select2" id="malaria" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <label for="leptospirosis">Leptospirosis</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('leptospirosis[]', $defaults + $options, (isset($get->leptospirosis)) ? $get->leptospirosis : '', 'class="form-control select2" id="leptospirosis" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <label for="diabetes">Diabetes</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('diabetes[]', $defaults + $options, (isset($get->diabetes)) ? $get->diabetes : '', 'class="form-control select2" id="diabetes" required');
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
                                            echo form_dropdown('fluburung_sars[]', $defaults + $options, (isset($get->fluburung_sars)) ? $get->fluburung_sars : '', 'class="form-control select2" id="fluburung_sars" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <label for="kolera">Kolera</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('kolera[]', $defaults + $options, (isset($get->kolera)) ? $get->kolera : '', 'class="form-control select2" id="kolera" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <label for="lumpuh">Lumpuh</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('lumpuh[]', $defaults + $options, (isset($get->lumpuh)) ? $get->lumpuh : '', 'class="form-control select2" id="lumpuh" required');
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
                                            echo form_dropdown('covid_19[]', $defaults + $options, (isset($get->covid_19)) ? $get->covid_19 : '', 'class="form-control select2" id="covid_19" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <label for="gizi_buruk">Gizi Buruk</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('gizi_buruk[]', $defaults + $options, (isset($get->gizi_buruk)) ? $get->gizi_buruk : '', 'class="form-control select2" id="gizi_buruk" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <label for="hepatitis_b">Hepatitis B</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('hepatitis_b[]', $defaults + $options, (isset($get->hepatitis_b)) ? $get->hepatitis_b : '', 'class="form-control select2" id="hepatitis_b" required');
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
                                            echo form_dropdown('lainnya[]', $defaults + $options, (isset($get->lainnya)) ? $get->lainnya : '', 'class="form-control select2" id="lainnya" required');
                                            ?>
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