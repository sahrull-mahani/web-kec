<?= $this->extend("template_adminlte/index") ?>
<?= $this->section("page-content") ?>

<!-- <script>
    $(document).ready(function(){
        $('#provinsi').change(function(){
            let id_provinsi = $(this).val();

            fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/{id_provinsi}.json`)
            .then(response => response.json())
            .then(regencies => console.log(regencies));

            // $.ajax({
            //     type:'POST',
            //     url: 
            // })

        });
    });
</script> -->


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
                        <?= form_open_multipart('rumahtangga/save', array('class' => 'mode2 form-post-save')); ?>
                        <div class="card-body" id="kuisioner">
                            <div class="col-md-12">
                                <div id="Enum">
                                    <div class=" card-header">
                                        <h3 class="card-title">Deskripsi Enumerator</h3>
                                    </div>
                                    <div class="row">
                                        <div class="form-group item col-md-8">
                                            <label for="nama_enum">Nama</label>
                                            <input type="text" class="form-control" id="nama_enum" name="nama_enum" placeholder="Nama Lengkap" required />
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <label for="notelp_enum">HP/Telepon</label>
                                            <input type="text" class="form-control" id="notelp_enum" name="notelp_enum" placeholder="No. HP/Telepon" required />
                                        </div>
                                    </div>
                                    <div class="form-group item">
                                        <label for="alamat_enum">Alamat</label>
                                        <input type="text" class="form-control" id="alamat_enum" name="alamat_enum" placeholder="Alamat Enumerator" required />
                                    </div>
                                    <button type="button" name="next" class="btn btn-sm btn-primary btn-user float-right next" onclick="Step2()">Selanjutnya</button>
                                </div>
                                <div id="Lokasi">
                                    <div class="card-header">
                                        <h3 class="card-title">Deskripsi Lokasi</h3>
                                    </div>
                                    <div class="row">

                                    <div class="form-group item col-md-4">
                                    <label for="provinsi">Provinsi</label>
                                        <select name="provinsi" id="provinsi" class="form-control">
                                            <option>--Pilih Provinsi--</option>
                                            <?php foreach($provinsi as $prov): ?>
                                                <option value="<?= $prov['id']; ?>"><?= $prov['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group item col-md-4">
                                        <label for="kabupaten">Kabupaten/Kota</label>
                                        <select name="kabupaten" id="kabupaten" class="form-control">
                                             <option>--Pilih Kabupaten--</option>
                                        </select>
                                    </div>
                                    <div class="form-group item col-md-4">
                                        <label for="kecamatan">Kecamatan</label>
                                        <select name="kecamatan" id="kecamatan" class="form-control">
                                            <option>--Pilih Kecamatan--</option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="form-group item col-md-8">
                                        <label for="desa">Desa</label>
                                        <select name="desa" id="desa" class="form-control">
                                            <option>--Pilih Desa--</option>
                                        </select>
                                    </div>
                                        <div class="form-group item col-md-4">
                                            <label for="rt_rw">RT/RW</label>
                                            <input type="text" class="form-control" id="rt_rw" name="rt_rw" placeholder="RT/RW" required />
                                        </div>
                                    </div>
                                    <div class="form-group item">
                                        <label for="nama_lokasi">Nama</label>
                                        <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" placeholder="Nama Lengkap" required />
                                    </div>
                                    <div class="form-group item">
                                        <label for="alamat_lokasi">Alamat</label>
                                        <input type="text" class="form-control" id="alamat_lokasi" name="alamat_lokasi" placeholder="Alamat" required />
                                    </div>
                                    <div class="row">
                                        <div class="form-group item col-md-6">
                                            <label for="notelp_lokasi">Nomor HP</label>
                                            <input type="text" class="form-control" id="notelp_lokasi" name="notelp_lokasi" placeholder="Nomor HP" required />
                                        </div>
                                        <div class="form-group item col-md-6">
                                            <label for="nohp_lokasi">Nomor Telepon Kabel/Rumah</label>
                                            <input type="text" class="form-control" id="nohp_lokasi" name="nohp_lokasi" placeholder="Nomor Telepon Kabel/Rumah" required />
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-secondary btn-user float-left" onclick="Step()">Sebelumnya</button>
                                    <button type="button" class="btn btn-sm btn-primary btn-user float-right" onclick="Step3()">Selanjutnya</button>
                                </div>
                                <div id="Keluarga">
                                    <div class="card-header">
                                        <h3 class="card-title">Deskripsi Keluarga</h3>
                                    </div>
                                    <div class="form-group item">
                                        <label for="no_kk">Nomor Kartu Keluarga</label>
                                        <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="Nomor Kartu Keluarga" required />
                                    </div>
                                    <div class="form-group item">
                                        <label for="nik">NIK Kepala Keluarga</label>
                                        <input type="text" class="form-control" id="nik" name="nik" placeholder="Nomor Induk Kependudukan Kepala Keluarga" required />
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
                                    <button type="button" class="btn btn-sm btn-secondary btn-user float-left" onclick="Step2()">Sebelumnya</button>
                                    <button type="button" class="btn btn-sm btn-primary btn-user float-right" onclick="Step4()">Selanjutnya</button>
                                </div>
                                <div id="Permukiman">
                                    <div class="card-header">
                                        <h3 class="card-title">Deskripsi Permukiman</h3>
                                    </div>
                                    <div class="form-group item">
                                        <label for="tempat_tinggal">Tempat Tinggal Yang Ditempati</label>
                                        <?php $defaults = array('' => 'Pilih');
                                        $options = array(
                                            'Milik Sendiri' => 'Milik Sendiri',
                                            'Kontrak/Sewa' => 'Kontrak/Sewa',
                                            'Bebas Sewa' => 'Bebas Sewa',
                                            'Dipinjami' => 'Dipinjami',
                                            'Dinas' => 'Dinas',
                                            'Lainnya' => 'Lainnya',
                                        );
                                        echo form_dropdown('tempat_tinggal[]', $defaults + $options, (isset($get->tempat_tinggal)) ? $get->tempat_tinggal : '', 'class="form-control select2" id="tempat_tinggal" required');
                                        ?>
                                    </div>
                                    <div class="form-group item">
                                        <label for="status_tempat">Status Lahan Tempat Tinggal Yang Ditempati</label>
                                        <?php $defaults = array('' => 'Pilih');
                                        $options = array(
                                            'Milik Sendiri' => 'Milik Sendiri',
                                            'Milik Orang Lain' => 'Milik Orang Lain',
                                            'Tanah Negara' => 'Tanah Negara',
                                            'Lainnya' => 'Lainnya',
                                        );
                                        echo form_dropdown('status_tempat[]', $defaults + $options, (isset($get->status_tempat)) ? $get->status_tempat : '', 'class="form-control select2" id="status_tempat" required');
                                        ?>
                                    </div>
                                    <div class="row">
                                        <div class="form-group item col-md-6">
                                            <label for="luas_lantai">Luas Lantai (m2)</label>
                                            <input type="text" class="form-control" id="luas_lantai" name="luas_lantai" placeholder="Luas Lantai (m2)" required />
                                        </div>
                                        <div class="form-group item col-md-6">
                                            <label for="luas_lahan">Luas Lahan (m2)</label>
                                            <input type="text" class="form-control" id="luas_lahan" name="luas_lahan" placeholder="Luas Lahan (m2)" required />
                                        </div>
                                    </div>
                                    <div class="form-group item">
                                        <label for="jenis_lantai">Jenis Lantai Tempat Tinggal Terluas</label>
                                        <?php $defaults = array('' => 'Pilih');
                                        $options = array(
                                            'Marmer/Granit' => 'Marmer/Granit',
                                            'Keramik' => 'Keramik',
                                            'Parket/Vinil/Permadani' => 'Parket/Vinil/Permadani',
                                            'Ubin/Tegel/Teraso' => 'Ubin/Tegel/Teraso',
                                            'Kayu/Papan Kualitas Tinggi' => 'Kayu/Papan Kualitas Tinggi',
                                            'Semen/Bata Merah' => 'Semen/Bata Merah',
                                            'Bambu' => 'Bambu',
                                            'Kayu/Papan Kualitas Rendah' => 'Kayu/Papan Kualitas Rendah',
                                            'Lainnya' => 'Lainnya',
                                        );
                                        echo form_dropdown('jenis_lantai[]', $defaults + $options, (isset($get->jenis_lantai)) ? $get->jenis_lantai : '', 'class="form-control select2" id="jenis_lantai" required');
                                        ?>
                                    </div>
                                    <div class="form-group item">
                                        <label for="dinding">Dinding Sebagian Besar Rumah</label>
                                        <?php $defaults = array('' => 'Pilih');
                                        $options = array(
                                            'Semen/Beton/Kayu Berkualitas Tinggi' => 'Semen/Beton/Kayu Berkualitas Tinggi',
                                            'Kayu Berkualitas Rendah/Bambu' => 'Kayu Berkualitas Rendah/Bambu',
                                            'Lainnya' => 'Lainnya',
                                        );
                                        echo form_dropdown('dinding[]', $defaults + $options, (isset($get->dinding)) ? $get->dinding : '', 'class="form-control select2" id="dinding" required');
                                        ?>
                                    </div>
                                    <div class="row">
                                        <div class="form-group item col-md-6">
                                            <label for="jendela">Jendela</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ada, Berfungsi' => 'Ada, Berfungsi',
                                                'Ada, Tidak Berfungsi' => 'Ada, Tidak Berfungsi',
                                                'Tidak Ada' => 'Tidak Ada',
                                            );
                                            echo form_dropdown('jendela[]', $defaults + $options, (isset($get->jendela)) ? $get->jendela : '', 'class="form-control select2" id="jendela" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-6">
                                            <label for="atap">Atap</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Genteng' => 'Genteng',
                                                'Kayu/Jerami' => 'Kayu/Jerami',
                                                'Lainnya' => 'Lainnya',
                                            );
                                            echo form_dropdown('atap[]', $defaults + $options, (isset($get->atap)) ? $get->atap : '', 'class="form-control select2" id="atap" required');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group item col-md-6">
                                            <label for="penerangan">Penerangan Rumah</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Listrik PLN' => 'Listrik PLN',
                                                'Listrik Non PLN' => 'Listrik Non PLN',
                                                'Lampu Minyak/Lilin' => 'Lampu Minyak/Lilin',
                                                'Sumber Penerangan Lainnya' => 'Sumber Penerangan Lainnya',
                                                'Tidak Ada' => 'Tidak Ada',
                                            );
                                            echo form_dropdown('penerangan[]', $defaults + $options, (isset($get->penerangan)) ? $get->penerangan : '', 'class="form-control select2" id="penerangan" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-6">
                                            <label for="energi">Energi Untuk Memasak</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Gas Kota/LPG/Biogas (Ke P407)' => 'Gas Kota/LPG/Biogas (Ke P407)',
                                                'Minyak Tanah/Batu Bara (Ke P407)' => 'Minyak Tanah/Batu Bara (Ke P407)',
                                                'Kayu Bakar' => 'Kayu Bakar',
                                                'Lainnya (Ke P407)' => 'Lainnya (Ke P407)',
                                            );
                                            echo form_dropdown('energi[]', $defaults + $options, (isset($get->energi)) ? $get->energi : '', 'class="form-control select2" id="energi" required');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group item">
                                        <label for="sumber_kayubakar">Sumber Kayu Bakar</label>
                                        <?php $defaults = array('' => 'Pilih');
                                        $options = array(
                                            'Pembelian' => 'Pembelian',
                                            'Diambil Dari Hutan' => 'Diambil Dari Hutan',
                                            'Diambil Di Luar/Bukan Hutan' => 'Diambil Di Luar/Bukan Hutan',
                                            'Lainnya' => 'Lainnya',
                                        );
                                        echo form_dropdown('sumber_kayubakar[]', $defaults + $options, (isset($get->sumber_kayubakar)) ? $get->sumber_kayubakar : '', 'class="form-control select2" id="sumber_kayubakar" required');
                                        ?>
                                    </div>
                                    <div class="row">
                                        <div class="form-group item col-md-6">
                                            <label for="tps">Tempat Pembuangan Sampah</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Tidak Ada' => 'Tidak Ada',
                                                'Di Kebun/Sungai/Drainase' => 'Di Kebun/Sungai/Drainase',
                                                'Dibakar' => 'Dibakar',
                                                'Tempat Sampah' => 'Tempat Sampah',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('tps[]', $defaults + $options, (isset($get->tps)) ? $get->tps : '', 'class="form-control select2" id="tps" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-6">
                                            <label for="mck">Fasilitas MCK</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Sendiri' => 'Sendiri',
                                                'Berkelompok/Tetangga' => 'Berkelompok/Tetangga',
                                                'MCK Umum' => 'MCK Umum',
                                                'Tidak Ada' => 'Tidak Ada',
                                            );
                                            echo form_dropdown('mck[]', $defaults + $options, (isset($get->mck)) ? $get->mck : '', 'class="form-control select2" id="mck" required');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group item">
                                        <label for="sumber_airmandi">Sumber Air Mandir Terbanyak Dari</label>
                                        <?php $defaults = array('' => 'Pilih');
                                        $options = array(
                                            'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan' => 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan',
                                            'Perpipaan' => 'Perpipaan',
                                            'Mata Air/Sumur' => 'Mata Air/Sumur',
                                            'Sungai, Danau, Embung' => 'Sungai, Danau, Embung',
                                            'Tadah Air Hujan' => 'Tadah Air Hujan',
                                            'Lainnya' => 'Lainnya',
                                        );
                                        echo form_dropdown('sumber_airmandi[]', $defaults + $options, (isset($get->sumber_airmandi)) ? $get->sumber_airmandi : '', 'class="form-control select2" id="sumber_airmandi" required');
                                        ?>
                                    </div>
                                    <div class="form-group item">
                                        <label for="fasilitas_bab">Fasilitas Buang Air Besar</label>
                                        <?php $defaults = array('' => 'Pilih');
                                        $options = array(
                                            'Jamban Sendiri' => 'Jamban Sendiri',
                                            'Jamban Bersama/Tetangga' => 'Jamban Bersama/Tetangga',
                                            'Jamban Umum' => 'Jamban Umum',
                                            'Lainnya' => 'Lainnya',
                                        );
                                        echo form_dropdown('fasilitas_bab[]', $defaults + $options, (isset($get->fasilitas_bab)) ? $get->fasilitas_bab : '', 'class="form-control select2" id="fasilitas_bab" required');
                                        ?>
                                    </div>
                                    <div class="form-group item">
                                        <label for="sumber_airminum">Sumber Air Minum Terbanyak Dari</label>
                                        <?php $defaults = array('' => 'Pilih');
                                        $options = array(
                                            'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan' => 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan',
                                            'Mata Air/Sumur' => 'Mata Air/Sumur',
                                            'Sungai, Danau, Embung' => 'Sungai, Danau, Embung',
                                            'Tadah Air Hujan' => 'Tadah Air Hujan',
                                            'Lainnya' => 'Lainnya',
                                        );
                                        echo form_dropdown('sumber_airminum[]', $defaults + $options, (isset($get->sumber_airminum)) ? $get->sumber_airminum : '', 'class="form-control select2" id="sumber_airminum" required');
                                        ?>
                                    </div>
                                    <div class="form-group item">
                                        <label for="tempat_plc">Tempat Pembuangan Limbah Cair</label>
                                        <?php $defaults = array('' => 'Pilih');
                                        $options = array(
                                            'Tangki/Instalasi Pengelolaan Limbah' => 'Tangki/Instalasi Pengelolaan Limbah',
                                            'Sawah/Kolam/Sungai/Drainase/Laut' => 'Sawah/Kolam/Sungai/Drainase/Laut',
                                            'Lubang Di Tanah' => 'Lubang Di Tanah',
                                            'Lainnya' => 'Lainnya',
                                        );
                                        echo form_dropdown('tempat_plc[]', $defaults + $options, (isset($get->tempat_plc)) ? $get->tempat_plc : '', 'class="form-control select2" id="tempat_plc" required');
                                        ?>
                                    </div>
                                    <div class="form-group item">
                                        <label for="tower">Rumah Berada Di Bawah SUTET/SUTT/SUTTAS</label>
                                        <?php $defaults = array('' => 'Pilih');
                                        $options = array(
                                            'Ya' => 'Ya',
                                            'Tidak' => 'Tidak',
                                        );
                                        echo form_dropdown('tower[]', $defaults + $options, (isset($get->tower)) ? $get->tower : '', 'class="form-control select2" id="tower" required');
                                        ?>
                                    </div>
                                    <div class="row">
                                        <div class="form-group item col-md-6">
                                            <label for="rumah_sungai">Rumah Di Bantaran Sungai</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('rumah_sungai[]', $defaults + $options, (isset($get->rumah_sungai)) ? $get->rumah_sungai : '', 'class="form-control select2" id="rumah_sungai" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-6">
                                            <label for="rumah_bukit">Rumah Di Lereng Bukit/Gunung</label>
                                            <?php $defaults = array('' => 'Pilih');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('rumah_bukit[]', $defaults + $options, (isset($get->rumah_bukit)) ? $get->rumah_bukit : '', 'class="form-control select2" id="rumah_bukit" required');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group item">
                                        <label for="kondisi_rumah">Secara Keseluruhan Kondisi Rumah</label>
                                        <?php $defaults = array('' => 'Pilih');
                                        $options = array(
                                            'Kumuh' => 'Kumuh',
                                            'Tidak Kumuh' => 'Tidak Kumuh',
                                        );
                                        echo form_dropdown('kondisi_rumah[]', $defaults + $options, (isset($get->kondisi_rumah)) ? $get->kondisi_rumah : '', 'class="form-control select2" id="kondisi_rumah" required');
                                        ?>
                                    </div>
                                    <div class="form-group item">
                                        <label for="akses_pendidikan">Akses Pendidikan Terdekat</label>
                                        <?php $defaults = array('' => 'Pilih');
                                        $options = array(
                                            'PAUD' => 'PAUD',
                                            'TK/RA' => 'TK/RA',
                                            'SD/MI ata Sederajat' => 'SD/MI ata Sederajat',
                                            'SMP/MTs atau Sederajat' => 'SMP/MTs atau Sederajat',
                                            'SMA/MA atau Sederajat' => 'SMA/MA atau Sederajat',
                                            'Perguruan Tinggi' => 'Perguruan Tinggi',
                                            'Pesantren' => 'Pesantren',
                                            'Seminari' => 'Seminari',
                                            'Pendidikan Keagamaan Lain' => 'Pendidikan Keagamaan Lain',
                                        );
                                        echo form_dropdown('akses_pendidikan[]', $defaults + $options, (isset($get->akses_pendidikan)) ? $get->akses_pendidikan : '', 'class="form-control select2" id="akses_pendidikan" required');
                                        ?>
                                    </div>
                                    <div class="row">
                                        <div class="form-group item col-md-4">
                                            <input type="text" class="form-control" id="jarak_pendidikan" name="jarak_pendidikan" placeholder="Jarak (km)" required />
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <input type="text" class="form-control" id="waktu_pendidikan" name="waktu_pendidikan" placeholder="Waktu Tempuh (jam)" required />
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <?php $defaults = array('' => 'Kemudahan');
                                            $options = array(
                                                'Sulit' => 'Sulit',
                                                'Mudah' => 'Mudah',
                                            );
                                            echo form_dropdown('kemudahan_pendidikan[]', $defaults + $options, (isset($get->kemudahan_pendidikan)) ? $get->kemudahan_pendidikan : '', 'class="form-control select2" id="kemudahan_pendidikan" required');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group item">
                                        <label for="akses_kesehatan">Akses Fasilitas Kesehatan Terdekat</label>
                                        <?php $defaults = array('' => 'Fasilitas');
                                        $options = array(
                                            'Rumah Sakit' => 'Rumah Sakit',
                                            'Rumah Sakit Bersalin' => 'Rumah Sakit Bersalin',
                                            'Poliklinik' => 'Poliklinik',
                                            'Puskesmas' => 'Puskesmas',
                                            'Puskesmas Pembantu/PUSTU' => 'Puskesmas Pembantu/PUSTU',
                                            'Polindes' => 'Polindes',
                                            'Poskesdes' => 'Poskesdes',
                                            'Posyandu' => 'Posyandu',
                                            'Apotik' => 'Apotik',
                                            'Toko Obat' => 'Toko Obat',
                                        );
                                        echo form_dropdown('akses_kesehatan[]', $defaults + $options, (isset($get->akses_kesehatan)) ? $get->akses_kesehatan : '', 'class="form-control select2" id="akses_kesehatan" required');
                                        ?>
                                    </div>
                                    <div class="row">
                                        <div class="form-group item col-md-4">
                                            <input type="text" class="form-control" id="jarak_kesehatan" name="jarak_kesehatan" placeholder="Jarak (km)" required />
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <input type="text" class="form-control" id="waktu_kesehatan" name="waktu_kesehatan" placeholder="Waktu Tempuh (jam)" required />
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <?php $defaults = array('' => 'Kemudahan');
                                            $options = array(
                                                'Sulit' => 'Sulit',
                                                'Mudah' => 'Mudah',
                                            );
                                            echo form_dropdown('kemudahan_kesehatan[]', $defaults + $options, (isset($get->kemudahan_kesehatan)) ? $get->kemudahan_kesehatan : '', 'class="form-control select2" id="kemudahan_kesehatan" required');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group item">
                                        <label for="akses_nakes">Akses Tenaga Kesehatan Terdekat</label>
                                        <?php $defaults = array('' => 'Fasilitas');
                                        $options = array(
                                            'Dokter Spesialis' => 'Dokter Spesialis',
                                            'Dokter Umum' => 'Dokter Umum',
                                            'Bidan' => 'Bidan',
                                            'Tenaga Kesehatan' => 'Tenaga Kesehatan',
                                            'Dukun' => 'Dukun',
                                        );
                                        echo form_dropdown('akses_nakes[]', $defaults + $options, (isset($get->akses_nakes)) ? $get->akses_nakes : '', 'class="form-control select2" id="akses_nakes" required');
                                        ?>
                                    </div>
                                    <div class="row">
                                        <div class="form-group item col-md-4">
                                            <input type="text" class="form-control" id="jarak_nakes" name="jarak_nakes" placeholder="Jarak (km)" required />
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <input type="text" class="form-control" id="waktu_nakes" name="waktu_nakes" placeholder="Waktu Tempuh (jam)" required />
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <?php $defaults = array('' => 'Kemudahan');
                                            $options = array(
                                                'Sulit' => 'Sulit',
                                                'Mudah' => 'Mudah',
                                            );
                                            echo form_dropdown('kemudahan_nakes[]', $defaults + $options, (isset($get->kemudahan_nakes)) ? $get->kemudahan_nakes : '', 'class="form-control select2" id="kemudahan_nakes" required');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group item">
                                        <label for="akses_transportasi">Akses Prasarana Dan Saran Transportasi</label>
                                        <?php $defaults = array('' => 'Tujuan');
                                        $options = array(
                                            'Lokasi Pekerjaan Utama' => 'Lokasi Pekerjaan Utama',
                                            'Lokasi Pertanian Yang Sedang Diusahakan' => 'Lokasi Pertanian Yang Sedang Diusahakan',
                                            'Sekolah' => 'Sekolah',
                                            'Berobat' => 'Berobat',
                                            'Beribadah Mingguan/Bulanan/Tahunan' => 'Beribadah Mingguan/Bulanan/Tahunan',
                                            'Rekreasi Terdekat' => 'Rekreasi Terdekat',
                                        );
                                        echo form_dropdown('akses_transportasi[]', $defaults + $options, (isset($get->akses_transportasi)) ? $get->akses_transportasi : '', 'class="form-control select2" id="akses_transportasi" required');
                                        ?>
                                    </div>
                                    <div class="row">
                                        <div class="form-group item col-md-6">
                                            <?php $defaults = array('' => 'Jenis Transportasi Terlama');
                                            $options = array(
                                                'Darat' => 'Darat',
                                                'Air' => 'Air',
                                                'Udara' => 'Udara',
                                            );
                                            echo form_dropdown('jenis_transportasi[]', $defaults + $options, (isset($get->jenis_transportasi)) ? $get->jenis_transportasi : '', 'class="form-control select2" id="jenis_transportasi" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-6">
                                            <?php $defaults = array('' => 'Penggunaan Transportasi Umum');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('penggunaan_transportasi[]', $defaults + $options, (isset($get->penggunaan_transportasi)) ? $get->penggunaan_transportasi : '', 'class="form-control select2" id="penggunaan_transportasi" required');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group item col-md-4">
                                            <input type="text" class="form-control" id="waktu_tempuh" name="waktu_tempuh" placeholder="Waktu Tempuh (jam)" required />
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <input type="text" class="form-control" id="biaya" name="biaya" placeholder="Biaya Sekali Jalan (Rp)" required />
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <?php $defaults = array('' => 'Kemudahan');
                                            $options = array(
                                                'Sulit' => 'Sulit',
                                                'Mudah' => 'Mudah',
                                            );
                                            echo form_dropdown('kemudahan_transportasi[]', $defaults + $options, (isset($get->kemudahan_transportasi)) ? $get->kemudahan_transportasi : '', 'class="form-control select2" id="kemudahan_transportasi" required');
                                            ?>
                                        </div>
                                    </div>
                                    <label for="blt">Pemanfaatan/Penerima Program Pemerintah</label>
                                    <div class="row">
                                        <div class="form-group item col-md-8">
                                            <?php $defaults = array('' => 'BLT Dana Desa');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('blt[]', $defaults + $options, (isset($get->blt)) ? $get->blt : '', 'class="form-control select2" id="blt" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <?php $defaults = array('' => 'Program Keluarga Harapan (PKH)');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('pkh[]', $defaults + $options, (isset($get->pkh)) ? $get->pkh : '', 'class="form-control select2" id="pkh" required');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group item col-md-4">
                                            <?php $defaults = array('' => 'Bantuan Sosial Tunai');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('banst[]', $defaults + $options, (isset($get->banst)) ? $get->banst : '', 'class="form-control select2" id="banst" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <?php $defaults = array('' => 'Bantuan Presiden/Banpres');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('banpres[]', $defaults + $options, (isset($get->banpres)) ? $get->banpres : '', 'class="form-control select2" id="banpres" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <?php $defaults = array('' => 'Bantuan UMKM');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('banumkm[]', $defaults + $options, (isset($get->banumkm)) ? $get->banumkm : '', 'class="form-control select2" id="banumkm" required');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group item col-md-4">
                                            <?php $defaults = array('' => 'Bantuan Untuk Pekerja');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('buk[]', $defaults + $options, (isset($get->buk)) ? $get->buk : '', 'class="form-control select2" id="buk" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <?php $defaults = array('' => 'Bantuan Pendidikan Anak');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('bpa[]', $defaults + $options, (isset($get->bpa)) ? $get->bpa : '', 'class="form-control select2" id="bpa" required');
                                            ?>
                                        </div>
                                        <div class="form-group item col-md-4">
                                            <?php $defaults = array('' => 'Lainnya');
                                            $options = array(
                                                'Ya' => 'Ya',
                                                'Tidak' => 'Tidak',
                                            );
                                            echo form_dropdown('lainnya[]', $defaults + $options, (isset($get->lainnya)) ? $get->lainnya : '', 'class="form-control select2" id="lainnya" required');
                                            ?>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-secondary btn-user float-left" onclick="Step3()">Sebelumnya</button>
                                    <input type='hidden' name='action' value="insert" />
                                    <button type="submit" class="btn btn-sm btn-primary btn-user float-right">Submit</button>
                                    <button class="btn btn-primary btn-load d-none" type="button" disabled>
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        Loading...
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card-footer">
                        <input type='hidden' name='action' value="insert" />
                        <button type="submit" class="btn btn-primary btn-sub">Submit</button>
                        <button class="btn btn-primary btn-load d-none" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                    </div> -->
                    <?= form_close() ?>
                </div>
            </div>
        </div>

</div>
</div>
</section>

</div>
<?= $this->endSection() ?>