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
            <?= form_open_multipart('individu/save', array('class' => 'mode2 form-post-save')); ?>
            <div class="card-body" id="kuisioner">
              <div class="col-md-12">
                <div id="Enum">
                  <div class=" card-header">
                    <h3 class="card-title">Deskripsi Individu</h3>
                  </div>
                  <div class="row">
                    <div class="form-group item col-md-6">
                      <label for="no_kk">Nomor Kartu Keluarga</label>
                      <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="Nomor Kartu Keluarga" value="<?= @$get->no_kk ?>" />
                    </div>
                    <div class="form-group item col-md-6">
                      <label for="nik">Nomor Induk Kependudukan (NIK)</label>
                      <input type="text" class="form-control" id="nik_individu" name="nik" placeholder="Nomor Indik Kependudukan" value="<?= @$get->nik ?>" />
                    </div>
                  </div>
                  <div class="form-group item">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= @$get->nama ?>" />
                  </div>
                  <div class="row">
                    <div class="form-group item col-md-4">
                      <label for="provinsi">Provinsi</label>
                      <select name="provinsi" id="provinsi" class="form-control select2">
                        <option value="" disabled <?= (isset($get->provinsi) ? '' : 'selected') ?>>--Pilih Provinsi--</option>
                        <?php foreach ($provinsi as $prov) : ?>
                          <option value="<?= $prov['id']; ?>" <?= (isset($get->provinsi) ? ($get->provinsi == $prov['id'] ? 'selected' : '') : '') ?>><?= $prov['name'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group item col-md-4">
                      <label for="kab_kota">Kabupaten/Kota</label>
                      <select name="kab_kota" id="kabupaten" class="form-control select2" data-kabupaten="<?= @$get->kab_kota ?>">
                        <option value="">--Pilih Kabupaten--</option>
                      </select>
                    </div>
                    <div class="form-group item col-md-4">
                      <label for="kecamatan">Kecamatan</label>
                      <select name="kecamatan" id="kecamatan" class="form-control select2" data-kecamatan="<?= @$get->kecamatan ?>">
                        <option>--Pilih Kecamatan--</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group item col-md-4">
                      <label for="kelurahan">Desa/Kelurahan</label>
                      <select name="kelurahan" id="desa" class="form-control select2" data-kelurahan="<?= @$get->kelurahan ?>">
                        <option>--Pilih Desa--</option>
                      </select>
                    </div>
                    <div class="form-group item col-md-4">
                      <label for="dusun">Dusun</label>
                      <input type="text" class="form-control" id="dusun_individu" name="dusun" placeholder="Dusun" value="<?= @$get->dusun ?>" />
                    </div>
                  </div>
                  <div class="form-group item">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= @$get->alamat ?>" />
                  </div>
                  <div class="row">
                    <div class="form-group item col-md-4">
                      <label for="jenis_kelamin">Jenis Kelamin</label>
                      <?php $defaults = array('' => 'Pilih');
                      $options = array(
                        'Laki - Laki' => 'Laki - Laki',
                        'Perempuan' => 'Perempuan',
                      );
                      echo form_dropdown('jenis_kelamin[]', $defaults + $options, (isset($get->jenis_kelamin)) ? $get->jenis_kelamin : '', 'class="form-control select2" id="jenis_kelamin" ');
                      ?>
                    </div>
                    <div class="form-group item col-md-4">
                      <label for="tempat_lahir">Tempat Lahir</label>
                      <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="<?= @$get->tempat_lahir ?>" />
                    </div>
                    <div class="form-group item col-md-4">
                      <label for="tgl_lahir">Tanggal Lahir</label>
                      <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= date('Y-m-d', strtotime(@$get->tgl_lahir)) ?>" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group item col-md-4">
                      <label for="umur">Umur</label>
                      <?php $defaults = array('' => 'Pilih');
                      $options = array(
                        '0 - 4' => '0 - 4',
                        '5 - 9' => '5 - 9',
                        '10 - 14' => '10 - 14',
                        '15 - 19' => '15 - 19',
                        '20 - 24' => '20 - 24',
                        '25 - 29' => '25 - 29',
                        '30 - 34' => '30 - 34',
                        '35 - 39' => '35 - 39',
                        '40 - 44' => '40 - 44',
                        '45 - 49' => '45 - 49',
                        '50 - 54' => '50 - 54',
                        '55 - 59' => '55 - 59',
                        '60 - 64' => '60 - 64',
                        '65 - 69' => '65 - 69',
                        '70 - 74' => '70 - 74',
                        '75 - 79' => '75 - 79',
                        '80 - 84' => '80 - 84'
                      );
                      echo form_dropdown('umur[]', $defaults + $options, (isset($get->umur)) ? $get->umur : '', 'class="form-control select2" id="umur_individu" ');
                      ?>
                    </div>
                    <div class="form-group item col-md-4">
                      <label for="status_nikah">Status Pernikahan</label>
                      <?php $defaults = array('' => 'Pilih');
                      $options = array(
                        'Kawin' => 'Kawin',
                        'Tidak Kawin' => 'Tidak Kawin',
                        'Duda/Janda' => 'Duda/Janda',
                      );
                      echo form_dropdown('status_nikah[]', $defaults + $options, (isset($get->status_nikah)) ? $get->status_nikah : '', 'class="form-control select2" id="status_nikah" ');
                      ?>
                    </div>
                    <div class="form-group item col-md-4">
                      <label for="agama">Agama</label>
                      <?php $defaults = array('' => 'Pilih');
                      $options = array(
                        'Islam' => 'Islam',
                        'Kristen' => 'Kristen',
                        'Katolik' => 'Katolik',
                        'Hindu' => 'Hindu',
                        'Budha' => 'Budha',
                      );
                      echo form_dropdown('agama[]', $defaults + $options, (isset($get->agama)) ? $get->agama : '', 'class="form-control select2" id="agama" ');
                      ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group item col-md-6">
                      <label for="suku">Suku Bangsa</label>
                      <input type="text" class="form-control" id="suku" name="suku" placeholder="Suku Bangsa" value="<?= @$get->suku ?>" />
                    </div>
                    <div class="form-group item col-md-6">
                      <label for="kewarganegaraan">Warga Negara</label>
                      <?php $defaults = array('' => 'Pilih');
                      $options = array(
                        'WNI' => 'WNI',
                        'WNA' => 'WNA',
                      );
                      echo form_dropdown('kewarganegaraan[]', $defaults + $options, (isset($get->kewarganegaraan)) ? $get->kewarganegaraan : '', 'class="form-control select2" id="kewarganegaraan" ');
                      ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group item col-md-6">
                      <label for="no_hp">Nomor HP</label>
                      <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor HP" value="<?= @$get->no_hp ?>" />
                    </div>
                    <div class="form-group item col-md-6">
                      <label for="no_wa">Nomor WhatsApp</label>
                      <input type="text" class="form-control" id="no_wa" name="no_wa" placeholder="Nomor WhatsApp" value="<?= @$get->no_wa ?>" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group item col-md-4">
                      <label for="wajib_pajak">Wajib Pajak</label>
                      <?php $defaults = array('' => 'Pilih');
                      $options = array(
                        'Ya' => 'Ya',
                        'Tidak' => 'Tidak',
                      );
                      echo form_dropdown('wajib_pajak[]', $defaults + $options, (isset($get->wajib_pajak)) ? $get->wajib_pajak : '', 'class="form-control select2" id="wajib_pajak" ');
                      ?>
                    </div>
                    <div class="form-group item col-md-4">
                      <label for="jumlah_pajak">Besarnya</label>
                      <input type="text" class="form-control" id="jumlah_pajak" name="jumlah_pajak[]" placeholder="Jumlah Pajak" value="<?= @$get->jumlah_pajak ?>" />
                    </div>
                    <div class="form-group item col-md-4">
                      <label for="keterangan">Keterangan</label>
                      <?php $defaults = array('' => 'Pilih');
                      $options = array(
                        'Lunas' => 'Lunas',
                        'Belum Lunas' => 'Belum Lunas',
                      );
                      echo form_dropdown('keterangan[]', $defaults + $options, (isset($get->keterangan)) ? $get->keterangan : '', 'class="form-control select2" id="keterangan" ');
                      ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group item col-md-6">
                      <label for="email">Alamat email Pribadi</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="xxxxxx@gmail.com" value="<?= @$get->email ?>" />
                    </div>
                    <div class="form-group item col-md-6">
                      <label for="facebook">Alamat Facebook Pribadi</label>
                      <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Nama Facebook" value="<?= @$get->facebook ?>" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group item col-md-6">
                      <label for="twitter">Alamat Twitter Pribadi</label>
                      <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Nama Twitter" value="<?= @$get->twitter ?>" />
                    </div>
                    <div class="form-group item col-md-6">
                      <label for="instagram">Alamat Instagram Pribadi</label>
                      <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Nama Instagram" value="<?= @$get->instagram ?>" />
                    </div>
                  </div>
                  <button type="button" name="next" class="btn btn-sm btn-primary btn-user float-right next" onclick="Step2()">Selanjutnya</button>
                </div>
                <div id="Lokasi">
                  <div class="card-header">
                    <h3 class="card-title">Deskripsi Pekerjaan</h3>
                  </div>
                  <div class="row">
                    <div class="form-group item col-md-4">
                      <label for="kondisi_pekerjaan">Kondisi Pekerjaan</label>
                      <?php $defaults = array('' => 'Pilih');
                      $options = array(
                        'Bersekolah' => 'Bersekolah',
                        'Ibu Rumah Tangga' => 'Ibu Rumah Tangga',
                        'Tidak Bekerja' => 'Tidak Bekerja',
                        'Sedang Mencari Pekerjaan' => 'Sedang Mencari Pekerjaan',
                        'Bekerja' => 'Bekerja',
                      );
                      echo form_dropdown('kondisi_pekerjaan[]', $defaults + $options, (isset($get->kondisi_pekerjaan)) ? $get->kondisi_pekerjaan : '', 'class="form-control select2" id="kondisi_pekerjaan" ');
                      ?>
                    </div>
                    <div class="form-group item col-md-4">
                      <label for="pekerjaan">Pekerjaan Utama</label>
                      <?php $defaults = array('' => 'Pilih');
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
                      echo form_dropdown('pekerjaan[]', $defaults + $options, (isset($get->pekerjaan)) ? $get->pekerjaan : '', 'class="form-control select2" id="pekerjaan" ');
                      ?>
                    </div>
                    <div class="form-group item col-md-4">
                      <label for="jamsos">Jaminan Sosial</label>
                      <?php $defaults = array('' => 'Pilih');
                      $options = array(
                        'Peserta' => 'Peserta',
                        'Bukan Peserta' => 'Bukan Peserta',
                      );
                      echo form_dropdown('jamsos[]', $defaults + $options, (isset($get->jamsos)) ? $get->jamsos : '', 'class="form-control select2" id="jamsos" ');
                      ?>
                    </div>
                  </div>
                  <input type="text" name="tahun[]" id="tahun" class="form-control" value="<?= @$get->tahun ?>" placeholder="Tahun contoh:<?= date('Y') ?>">


                  <div id="job-clone" data-edit="<?= @$get->individu_id ?>">
                    <div class="property-fields__rows">
                      <div id="property-fields__row-1" class="property-fields__row property-fields__row-item row">
                        <div class="line-item-property__field line-item-property__team col-sm">
                          <div class="row">
                            <div class="form-group item col-md-10">
                              <label for="team-name">Sumber Penghasilan</label>
                              <?php $defaults = array('' => 'Sumber Penghasilan');
                              $options = array(
                                'Padi' => 'Padi',
                                'Palawija (Jagung, Kacang-kacangan, Ubi-ubian, Dll)' => 'Palawija (Jagung, Kacang-kacangan, Ubi-ubian, Dll)',
                                'Hortikultura (Buah-buahan, Sayur-sayuran, Tanaman Hias, Tanaman Obat-obatan, Dll)' => 'Hortikultura (Buah-buahan, Sayur-sayuran, Tanaman Hias, Tanaman Obat-obatan, Dll)',
                                'Karet' => 'Karet',
                                'Kelapa Sawit' => 'Kelapa Sawit',
                                'Kakao' => 'Kakao',
                                'Kelapa' => 'Kelapa',
                                'Lada' => 'Lada',
                                'Cengkeh' => 'Cengkeh',
                                'Tembakau' => 'Tembakau',
                                'Tebu' => 'Tebu',
                                'Sapi Potong' => 'Sapi Potong',
                                'Susu Sapi' => 'Susu Sapi',
                                'Domba' => 'Domba',
                                'Ternak Besar Lainnya (Kuda, Kerbau, Dll)' => 'Ternak Besar Lainnya (Kuda, Kerbau, Dll)',
                                'Ayam Pedaging' => 'Ayam Pedaging',
                                'Telur Ayam' => 'Telur Ayam',
                                'Ternak Kecil Lainnya (Bebek, Burung, Dll)' => 'Ternak Kecil Lainnya (Bebek, Burung, Dll)',
                                'Perikanan Tangkap (Termasuk Biota Lainnya)' => 'Perikanan Tangkap (Termasuk Biota Lainnya)',
                                'Perikanan Budidaya (Termasuk Biota Lainnya)' => 'Perikanan Budidaya (Termasuk Biota Lainnya)',
                                'Bambu' => 'Bambu',
                                'Budidaya Tanaman Kehutanan (Jati, Mahoni, Sengon, Dll)' => 'Budidaya Tanaman Kehutanan (Jati, Mahoni, Sengon, Dll)',
                                'Pemungutan Hasil Hutan (Madu, Gaharu, Buah-buahan, Kayu Bakar, Rotan, Dll)' => 'Pemungutan Hasil Hutan (Madu, Gaharu, Buah-buahan, Kayu Bakar, Rotan, Dll)',
                                'Penangkapan Satwa Liar (Babi, Ayam Hutan, Kijang, Dll)' => 'Penangkapan Satwa Liar (Babi, Ayam Hutan, Kijang, Dll)',
                                'Penangkaran Satwa Liar (Arwana, Buaya, Dll)' => 'Penangkaran Satwa Liar (Arwana, Buaya, Dll)',
                                'Jasa Pertanian (Sewa Traktor, Penggilingan, Dll)' => 'Jasa Pertanian (Sewa Traktor, Penggilingan, Dll)',
                                'Pertambangan dan Penggalian' => 'Pertambangan dan Penggalian',
                                'Industri Kerajinan' => 'Industri Kerajinan',
                                'Industri Pengolahan' => 'Industri Pengolahan',
                                'Perdagangan' => 'Perdagangan',
                                'Warung dan Rumah Makan' => 'Warung dan Rumah Makan',
                                'Angkutan' => 'Angkutan',
                                'Pergudangan' => 'Pergudangan',
                                'Komunikasi' => 'Komunikasi',
                                'Jasa Di Luar Pertanian' => 'Jasa Di Luar Pertanian',
                                'Karyawan Tetap' => 'Karyawan Tetap',
                                'Karyawan Tidak Tetap' => 'Karyawan Tidak Tetap',
                                'TNI' => 'TNI',
                                'PNS' => 'PNS',
                                'TKI Di Luar Negeri' => 'TKI Di Luar Negeri',
                                'Sumbangan (Dari Keluarga, Dari Pemerintah)' => 'Sumbangan (Dari Keluarga, Dari Pemerintah)',
                                'Lainnya' => 'Lainnya'
                              );
                              echo form_dropdown('sumber_penghasilan[]', $defaults + $options, isset($get) ? $get->sumber_penghasilan : '', 'class="custom-select" id="sumber-penghasilan"');
                              ?>
                            </div>
                            <div class="form-group item col-md-2">
                              <label for="team-name">Jumlah</label>
                              <input type="text" class="form-control" id="jumlah" name="jumlah[]" placeholder="Jumlah" value="<?= @$get->jumlah ?>" />
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group item col-md-4">
                              <label for="team-name">Satuan</label>
                              <?php $defaults = array('' => 'Satuan');
                              $options = array(
                                'Batang' => 'Batang',
                                'Bulan' => 'Bulan',
                                'Ekor' => 'Ekor',
                                'Hari' => 'Hari',
                                'Kg' => 'Kg',
                                'Liter' => 'Liter',
                                'Ton' => 'Ton',
                              );
                              echo form_dropdown('satuan[]', $defaults + $options, isset($get) ? $get->satuan : '', 'class="custom-select" id="satuan" ');
                              ?>
                            </div>
                            <div class="form-group item col-md-3">
                              <label for="team-name">Penghasilan</label>
                              <input type="text" class="form-control" id="penghasilan" name="penghasilan[]" placeholder="Penghasilan Setahun (Rp)" value="<?= isset($get) ? $get->penghasilan : '' ?>" />
                            </div>
                            <div class="form-group item col-md">
                              <label for="team-name">Ekspor</label>
                              <?php $defaults = array('' => 'Ekspor :');
                              $options = array(
                                'Semua' => 'Semua',
                                'Sebagian Besar' => 'Sebagian Besar',
                                'Tidak' => 'Tidak'
                              );
                              echo form_dropdown('ekspor[]', $defaults + $options, isset($get) ? $get->ekspor : '', 'class="custom-select" id="ekspor" ');
                              ?>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="line-item-property__actions mt-1 mb-3">
                        <button type="button" id="btnAdd" class="btn btn-primary btn-sm">+</button>
                        <button type="button" id="btnDel" class="btn btn-danger btn-sm">-</button>
                      </div>
                    </div>
                  </div>


                  <button type="button" class="btn btn-sm btn-secondary btn-user float-left" onclick="Step()">Sebelumnya</button>
                  <button type="button" class="btn btn-sm btn-primary btn-user float-right" onclick="Step3()">Selanjutnya</button>
                </div>
                <div id="Keluarga">
                  <div class="card-header">
                    <h3 class="card-title">Deskripsi Kesehatan</h3>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Penyakit Yang Diderita Setahun Sekali</h3>
                    </div>
                    <div class="card-body">
                      <div class="form-group item">
                        <label for="bpjs_kes">Jaminan Sosial Kesehatan</label>
                        <?php $defaults = array('' => 'Pilih');
                        $options = array(
                          'Peserta' => 'Peserta',
                          'Bukan Peserta' => 'Bukan Peserta',
                        );
                        echo form_dropdown('bpjs_kes[]', $defaults + $options, (isset($get->bpjs_kes)) ? $get->bpjs_kes : '', 'class="form-control select2" id="bpjs_kes" ');
                        ?>
                      </div>
                      <div class="row">
                        <div class="form-group item col-md-4">
                          <label for="muntaber_diare">Muntaber/Diare</label>
                          <?php $defaults = array('' => 'Pilih');
                          $options = array(
                            'Ya' => 'Ya',
                            'Tidak' => 'Tidak',
                          );
                          echo form_dropdown('muntaber_diare[]', $defaults + $options, (isset($get->muntaber_diare)) ? $get->muntaber_diare : '', 'class="form-control select2" id="muntaber_diare" ');
                          ?>
                        </div>
                        <div class="form-group item col-md-4">
                          <label for="hepatitis_e">Hepatitis E</label>
                          <?php $defaults = array('' => 'Pilih');
                          $options = array(
                            'Ya' => 'Ya',
                            'Tidak' => 'Tidak',
                          );
                          echo form_dropdown('hepatitis_e[]', $defaults + $options, (isset($get->hepatitis_e)) ? $get->hepatitis_e : '', 'class="form-control select2" id="hepatitis_e" ');
                          ?>
                        </div>
                        <div class="form-group item col-md-4">
                          <label for="jantung">Jantung</label>
                          <?php $defaults = array('' => 'Pilih');
                          $options = array(
                            'Ya' => 'Ya',
                            'Tidak' => 'Tidak',
                          );
                          echo form_dropdown('jantung[]', $defaults + $options, (isset($get->jantung)) ? $get->jantung : '', 'class="form-control select2" id="jantung" ');
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
                          echo form_dropdown('demam_berdarah[]', $defaults + $options, (isset($get->demam_berdarah)) ? $get->demam_berdarah : '', 'class="form-control select2" id="demam_berdarah" ');
                          ?>
                        </div>
                        <div class="form-group item col-md-4">
                          <label for="difteri">Difteri</label>
                          <?php $defaults = array('' => 'Pilih');
                          $options = array(
                            'Ya' => 'Ya',
                            'Tidak' => 'Tidak',
                          );
                          echo form_dropdown('difteri[]', $defaults + $options, (isset($get->difteri)) ? $get->difteri : '', 'class="form-control select2" id="difteri" ');
                          ?>
                        </div>
                        <div class="form-group item col-md-4">
                          <label for="tbc_paru">TBC Paru-Paru</label>
                          <?php $defaults = array('' => 'Pilih');
                          $options = array(
                            'Ya' => 'Ya',
                            'Tidak' => 'Tidak',
                          );
                          echo form_dropdown('tbc_paru[]', $defaults + $options, (isset($get->tbc_paru)) ? $get->tbc_paru : '', 'class="form-control select2" id="tbc_paru" ');
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
                          echo form_dropdown('campak[]', $defaults + $options, (isset($get->campak)) ? $get->campak : '', 'class="form-control select2" id="campak" ');
                          ?>
                        </div>
                        <div class="form-group item col-md-4">
                          <label for="chikungunya">Chikungunya</label>
                          <?php $defaults = array('' => 'Pilih');
                          $options = array(
                            'Ya' => 'Ya',
                            'Tidak' => 'Tidak',
                          );
                          echo form_dropdown('chikungunya[]', $defaults + $options, (isset($get->chikungunya)) ? $get->chikungunya : '', 'class="form-control select2" id="chikungunya" ');
                          ?>
                        </div>
                        <div class="form-group item col-md-4">
                          <label for="kanker">Kanker</label>
                          <?php $defaults = array('' => 'Pilih');
                          $options = array(
                            'Ya' => 'Ya',
                            'Tidak' => 'Tidak',
                          );
                          echo form_dropdown('kanker[]', $defaults + $options, (isset($get->kanker)) ? $get->kanker : '', 'class="form-control select2" id="kanker" ');
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
                          echo form_dropdown('malaria[]', $defaults + $options, (isset($get->malaria)) ? $get->malaria : '', 'class="form-control select2" id="malaria" ');
                          ?>
                        </div>
                        <div class="form-group item col-md-4">
                          <label for="leptospirosis">Leptospirosis</label>
                          <?php $defaults = array('' => 'Pilih');
                          $options = array(
                            'Ya' => 'Ya',
                            'Tidak' => 'Tidak',
                          );
                          echo form_dropdown('leptospirosis[]', $defaults + $options, (isset($get->leptospirosis)) ? $get->leptospirosis : '', 'class="form-control select2" id="leptospirosis" ');
                          ?>
                        </div>
                        <div class="form-group item col-md-4">
                          <label for="diabetes">Diabetes</label>
                          <?php $defaults = array('' => 'Pilih');
                          $options = array(
                            'Ya' => 'Ya',
                            'Tidak' => 'Tidak',
                          );
                          echo form_dropdown('diabetes[]', $defaults + $options, (isset($get->diabetes)) ? $get->diabetes : '', 'class="form-control select2" id="diabetes" ');
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
                          echo form_dropdown('fluburung_sars[]', $defaults + $options, (isset($get->fluburung_sars)) ? $get->fluburung_sars : '', 'class="form-control select2" id="fluburung_sars" ');
                          ?>
                        </div>
                        <div class="form-group item col-md-4">
                          <label for="kolera">Kolera</label>
                          <?php $defaults = array('' => 'Pilih');
                          $options = array(
                            'Ya' => 'Ya',
                            'Tidak' => 'Tidak',
                          );
                          echo form_dropdown('kolera[]', $defaults + $options, (isset($get->kolera)) ? $get->kolera : '', 'class="form-control select2" id="kolera" ');
                          ?>
                        </div>
                        <div class="form-group item col-md-4">
                          <label for="lumpuh">Lumpuh</label>
                          <?php $defaults = array('' => 'Pilih');
                          $options = array(
                            'Ya' => 'Ya',
                            'Tidak' => 'Tidak',
                          );
                          echo form_dropdown('lumpuh[]', $defaults + $options, (isset($get->lumpuh)) ? $get->lumpuh : '', 'class="form-control select2" id="lumpuh" ');
                          ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group item col-md-4">
                          <label for="covid_19">Covid - 19</label>
                          <?php $defaults = array('' => 'Pilih');
                          $options = array(
                            'Ya' => 'Ya',
                            'Tidak' => 'Tidak',
                          );
                          echo form_dropdown('covid_19[]', $defaults + $options, (isset($get->covid_19)) ? $get->covid_19 : '', 'class="form-control select2" id="covid_19" ');
                          ?>
                        </div>
                        <div class="form-group item col-md-4">
                          <label for="gizi_buruk">Gizi Buruk</label>
                          <?php $defaults = array('' => 'Pilih');
                          $options = array(
                            'Ya' => 'Ya',
                            'Tidak' => 'Tidak',
                          );
                          echo form_dropdown('gizi_buruk[]', $defaults + $options, (isset($get->gizi_buruk)) ? $get->gizi_buruk : '', 'class="form-control select2" id="gizi_buruk" ');
                          ?>
                        </div>
                        <div class="form-group item col-md-4">
                          <label for="hepatitis_b">Hepatitis B</label>
                          <?php $defaults = array('' => 'Pilih');
                          $options = array(
                            'Ya' => 'Ya',
                            'Tidak' => 'Tidak',
                          );
                          echo form_dropdown('hepatitis_b[]', $defaults + $options, (isset($get->hepatitis_b)) ? $get->hepatitis_b : '', 'class="form-control select2" id="hepatitis_b" ');
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
                          echo form_dropdown('lainnya[]', $defaults + $options, (isset($get->lainnya)) ? $get->lainnya : '', 'class="form-control select2" id="lainnya" ');
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Berapa Kali Fasilitas Kesehatan Berikut Didatangi Setahun Terakhir untuk Pengobatan/Perawatan (Jumlah)</h3>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="form-group item col-md-6">
                          <label for="rs">Rumah Sakit</label>
                          <input type="text" class="form-control" id="rs" name="rs" value="<?= @$get->rs ?>" />
                        </div>
                        <div class="form-group item col-md-6">
                          <label for="praktik_bidan">Tempat Praktik Bidan</label>
                          <input type="text" class="form-control" id="praktik_bidan" name="praktik_bidan" value="<?= @$get->praktik_bidan ?>" />
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group item col-md-6">
                          <label for="rs_bersalin">Rumah Sakit Bersalin</label>
                          <input type="text" class="form-control" id="rs_bersalin" name="rs_bersalin" value="<?= @$get->rs_bersalin ?>" />
                        </div>
                        <div class="form-group item col-md-6">
                          <label for="poskesdes">Poskesdes</label>
                          <input type="text" class="form-control" id="poskesdes" name="poskesdes" value="<?= @$get->poskesdes ?>" />
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group item col-md-6">
                          <label for="puskesmas_inap">Puskesmas Dengan Rawat Inap</label>
                          <input type="text" class="form-control" id="puskesmas_inap" name="puskesmas_inap" value="<?= @$get->puskesmas_inap ?>" />
                        </div>
                        <div class="form-group item col-md-6">
                          <label for="polindes">Polindes</label>
                          <input type="text" class="form-control" id="polindes" name="polindes" value="<?= @$get->polindes ?>" />
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group item col-md-6">
                          <label for="puskesmas_tanpainap">Puskesmas Tanpa Rawat Inap</label>
                          <input type="text" class="form-control" id="puskesmas_tanpainap" name="puskesmas_tanpainap" value="<?= @$get->puskesmas_tanpainap ?>" />
                        </div>
                        <div class="form-group item col-md-6">
                          <label for="apotik">Apotik</label>
                          <input type="text" class="form-control" id="apotik" name="apotik" value="<?= @$get->apotik ?>" />
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group item col-md-6">
                          <label for="pustu">Puskesmas Pembantu</label>
                          <input type="text" class="form-control" id="pustu" name="pustu" value="<?= @$get->pustu ?>" />
                        </div>
                        <div class="form-group item col-md-6">
                          <label for="toko_obat">Toko Khusus Obat/Jamu</label>
                          <input type="text" class="form-control" id="toko_obat" name="toko_obat" value="<?= @$get->toko_obat ?>" />
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group item col-md-6">
                          <label for="poliklinik">Poliklinik/ Balai Pengobatan</label>
                          <input type="text" class="form-control" id="poliklinik" name="poliklinik" value="<?= @$get->poliklinik ?>" />
                        </div>
                        <div class="form-group item col-md-6">
                          <label for="posyandu">Posyandu</label>
                          <input type="text" class="form-control" id="posyandu" name="posyandu" value="<?= @$get->posyandu ?>" />
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group item col-md-6">
                          <label for="praktik_dokter">Tempat Praktik Dokter</label>
                          <input type="text" class="form-control" id="praktik_dokter" name="praktik_dokter" value="<?= @$get->praktik_dokter ?>" />
                        </div>
                        <div class="form-group item col-md-6">
                          <label for="posbindu">Posbindu</label>
                          <input type="text" class="form-control" id="posbindu" name="posbindu" value="<?= @$get->posbindu ?>" />
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group item col-md-6">
                          <label for="rumah_bersalin">Rumah Bersalin</label>
                          <input type="text" class="form-control" id="rumah_bersalin" name="rumah_bersalin" value="<?= @$get->rumah_bersalin ?>" />
                        </div>
                        <div class="form-group item col-md-6">
                          <label for="praktik_dukun">Tempat Praktik Dukun Bayi/Bersalin/Paraji</label>
                          <input type="text" class="form-control" id="praktik_dukun" name="praktik_dukun" value="<?= @$get->praktik_dukun ?>" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Disabilitas</h3>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="form-group item col-md-6">
                          <label for="tunanetra">Tunanetra (Buta)</label>
                          <?php $defaults = array('' => 'Pilih');
                          $options = array(
                            'Ya' => 'Ya',
                            'Tidak' => 'Tidak',
                          );
                          echo form_dropdown('tunanetra[]', $defaults + $options, (isset($get->tunanetra)) ? $get->tunanetra : '', 'class="form-control select2" id="tunanetra" ');
                          ?>
                        </div>
                        <div class="form-group item col-md-6">
                          <label for="tunarungu">Tunarungu (Tuli)</label>
                          <?php $defaults = array('' => 'Pilih');
                          $options = array(
                            'Ya' => 'Ya',
                            'Tidak' => 'Tidak',
                          );
                          echo form_dropdown('tunarungu[]', $defaults + $options, (isset($get->tunarungu)) ? $get->tunarungu : '', 'class="form-control select2" id="tunarungu" ');
                          ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group item col-md-6">
                          <label for="tunawicara">Tunawicara (Bisu)</label>
                          <?php $defaults = array('' => 'Pilih');
                          $options = array(
                            'Ya' => 'Ya',
                            'Tidak' => 'Tidak',
                          );
                          echo form_dropdown('tunawicara[]', $defaults + $options, (isset($get->tunawicara)) ? $get->tunawicara : '', 'class="form-control select2" id="tunawicara" ');
                          ?>
                        </div>
                        <div class="form-group item col-md-6">
                          <label for="tunarungu_wicara">Tunarungu-wicara (Tuli-Bisu)</label>
                          <?php $defaults = array('' => 'Pilih');
                          $options = array(
                            'Ya' => 'Ya',
                            'Tidak' => 'Tidak',
                          );
                          echo form_dropdown('tunarungu_wicara[]', $defaults + $options, (isset($get->tunarungu_wicara)) ? $get->tunarungu_wicara : '', 'class="form-control select2" id="tunarungu_wicara" ');
                          ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group item col-md-6">
                          <label for="tunadaksa">Tunadaksa (Cacat Tubuh)</label>
                          <?php $defaults = array('' => 'Pilih');
                          $options = array(
                            'Ya' => 'Ya',
                            'Tidak' => 'Tidak',
                          );
                          echo form_dropdown('tunadaksa[]', $defaults + $options, (isset($get->tunadaksa)) ? $get->tunadaksa : '', 'class="form-control select2" id="tunadaksa" ');
                          ?>
                        </div>
                        <div class="form-group item col-md-6">
                          <label for="tunagrahita">Tunagrahita (Cacat Mental)</label>
                          <?php $defaults = array('' => 'Pilih');
                          $options = array(
                            'Ya' => 'Ya',
                            'Tidak' => 'Tidak',
                          );
                          echo form_dropdown('tunagrahita[]', $defaults + $options, (isset($get->tunagrahita)) ? $get->tunagrahita : '', 'class="form-control select2" id="tunagrahita" ');
                          ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group item col-md-6">
                          <label for="tunalaras">Tunalaras (Eks-Sakit Jiwa</label>
                          <?php $defaults = array('' => 'Pilih');
                          $options = array(
                            'Ya' => 'Ya',
                            'Tidak' => 'Tidak',
                          );
                          echo form_dropdown('tunalaras[]', $defaults + $options, (isset($get->tunalaras)) ? $get->tunalaras : '', 'class="form-control select2" id="tunalaras" ');
                          ?>
                        </div>
                        <div class="form-group item col-md-6">
                          <label for="eks_kusta">Cacat Eks-Sakit Kusta</label>
                          <?php $defaults = array('' => 'Pilih');
                          $options = array(
                            'Ya' => 'Ya',
                            'Tidak' => 'Tidak',
                          );
                          echo form_dropdown('eks_kusta[]', $defaults + $options, (isset($get->eks_kusta)) ? $get->eks_kusta : '', 'class="form-control select2" id="eks_kusta" ');
                          ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group item col-md-6">
                          <label for="cacat_ganda">Cacat Ganda (Cacat Fisik-Mental)</label>
                          <?php $defaults = array('' => 'Pilih');
                          $options = array(
                            'Ya' => 'Ya',
                            'Tidak' => 'Tidak',
                          );
                          echo form_dropdown('cacat_ganda[]', $defaults + $options, (isset($get->cacat_ganda)) ? $get->cacat_ganda : '', 'class="form-control select2" id="cacat_ganda" ');
                          ?>
                        </div>
                        <div class="form-group item col-md-6">
                          <label for="pasung">Dipasung</label>
                          <?php $defaults = array('' => 'Pilih');
                          $options = array(
                            'Ya' => 'Ya',
                            'Tidak' => 'Tidak',
                          );
                          echo form_dropdown('pasung[]', $defaults + $options, (isset($get->pasung)) ? $get->pasung : '', 'class="form-control select2" id="pasung" ');
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" class="btn btn-sm btn-secondary btn-user float-left" onclick="Step2()">Sebelumnya</button>
                  <button type="button" class="btn btn-sm btn-primary btn-user float-right" onclick="Step4()">Selanjutnya</button>
                </div>
                <div id="Permukiman">
                  <div class="card-header">
                    <h3 class="card-title">Deskripsi Pendidikan</h3>
                  </div>
                  <div class="form-group item">
                    <label for="pendidikan">Pendidikan Tertinggi yang Ditamatkan</label>
                    <?php $defaults = array('' => 'Pilih');
                    $options = array(
                      'Tidak Sekolah' => 'Tidak Sekolah',
                      'SD dan Sederajat' => 'SD dan Sederajat',
                      'SMP dan Sederajat' => 'SMP dan Sederajat',
                      'SMA dan Sederajat' => 'SMA dan Sederajat',
                      'Diploma 1-3' => 'Diploma 1-3',
                      'S1 dan Sederajat' => 'S1 dan Sederajat',
                      'S2 dan Sederajat' => 'S2 dan Sederajat',
                      'S3 dan Sederajat' => 'S3 dan Sederajat',
                      'Pesantren, Seminari, Wihara dan Sejenisnya' => 'Pesantren, Seminari, Wihara dan Sejenisnya',
                      'Lainnya' => 'Lainnya',
                    );
                    echo form_dropdown('pendidikan[]', $defaults + $options, (isset($get->pendidikan)) ? $get->pendidikan : '', 'class="form-control select2" id="pendidikan" ');
                    ?>
                  </div>
                  <div class="form-group item">
                    <label for="bahasa_lokal">Bahasa Digunakan Di Rumah dan Permukiman (Tuliskan)</label>
                    <input type="text" class="form-control" id="bahasa_lokal" name="bahasa_lokal[]" value="<?= @$get->bahasa_lokal ?>" />
                  </div>
                  <div class="form-group item">
                    <label for="bahasa_formal">Bahasa Digunakan Di Lembaga Formal (Sekolah, Tempat Kerja, Tuliskan)</label>
                    <input type="text" class="form-control" id="bahasa_formal" name="bahasa_formal[]" value="<?= @$get->bahasa_formal ?>" />
                  </div>
                  <div class="form-group item">
                    <label for="kerja_bakti">Kerja Bakti Setahun Terakhir (Jumlah)</label>
                    <input type="text" class="form-control" id="kerja_bakti" name="kerja_bakti[]" value="<?= @$get->kerja_bakti ?>" />
                  </div>
                  <div class="form-group item">
                    <label for="siskamling">Siskamling Setahun Terakhir (Jumlah)</label>
                    <input type="text" class="form-control" id="siskamling" name="siskamling[]" value="<?= @$get->siskamling ?>" />
                  </div>
                  <div class="form-group item">
                    <label for="pesta_rakyat">Pesta Rakyat/Adat Setahun Terakhir (Jumlah)</label>
                    <input type="text" class="form-control" id="pesta_rakyat" name="pesta_rakyat[]" value="<?= @$get->pesta_rakyat ?>" />
                  </div>
                  <div class="form-group item">
                    <label for="pertolongan_kematian">Menolong Warga yang Mengalami Kematian Setahun Terakhir (Jumlah)</label>
                    <input type="text" class="form-control" id="pertolongan_kematian" name="pertolongan_kematian[]" value="<?= @$get->pertolongan_kematian ?>" />
                  </div>
                  <div class="form-group item">
                    <label for="pertolongan_sakit">Menolong Warga yang Sedang Sakit Setahun Terakhir (Jumlah)</label>
                    <input type="text" class="form-control" id="pertolongan_sakit" name="pertolongan_sakit[]" value="<?= @$get->pertolongan_sakit ?>" />
                  </div>
                  <div class="form-group item">
                    <label for="pertolongan_kecelakaan">Menolong Warga yang Kecelakaan Setahun Terakhir (Jumlah)</label>
                    <input type="text" class="form-control" id="pertolongan_kecelakaan" name="pertolongan_kecelakaan[]" value="<?= @$get->pertolongan_kecelakaan ?>" />
                  </div>
                  <button type="button" class="btn btn-sm btn-secondary btn-user float-left" onclick="Step3()">Sebelumnya</button>
                  <input type="hidden" name="id" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />
                  <input type='hidden' name='action' value="<?= (isset($get->id)) ? 'update' : 'insert'; ?>" />
                  <button type="submit" class="btn btn-sm btn-primary btn-user float-right">Submit</button>
                  <button class="btn btn-primary btn-load d-none" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Loading...
                  </button>
                </div>
              </div>
            </div>
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