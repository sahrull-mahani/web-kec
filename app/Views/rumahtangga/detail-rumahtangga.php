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
                        <div class="card-body">
                            <table border="1" cellspacing="0" cellpadding="0" width="100%">
                                <tr>
                                    <td colspan="2">
                                        <b>
                                            KEMENTERIAN DESA, PDT DAN TRANSMIGRASI <br><br>
                                            SDGs DESA <br>
                                            KUESIONER RUMAH TANGGA <br><br>

                                        </b>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%"><b>P1</b></td>
                                    <td><b>DESKRIPSI ENUMERATOR</b></td>
                                </tr>
                                <tr>
                                    <td width="10%">P101</td>
                                    <td>Nama : <b><?= (isset($get->nama_enum)) ? ucwords($get->nama_enum) : ''; ?></b></td>
                                </tr>
                                <tr>
                                    <td width="10%">P102</td>
                                    <td>Alamat : <b><?= (isset($get->alamat_enum)) ? ucwords($get->alamat_enum) : ''; ?></b></td>
                                </tr>
                                <tr>
                                    <td width="10%">P103</td>
                                    <td>HP/Telpon : <b><?= (isset($get->notelp_enum)) ? ucwords($get->notelp_enum) : ''; ?></b></td>
                                </tr>
                                <tr>
                                    <td width="10%" height="20px"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td width="10%"><b>P2</b></td>
                                    <td><b>DESKRIPSI LOKASI</b></td>
                                </tr>
                                <tr>
                                    <td width="10%">P201</td>
                                    <td>Provinsi : <b><?= (isset($get->provinsi)) ? ucwords($get->provinsi) : ''; ?></b></td>
                                </tr>
                                <tr>
                                    <td width="10%">P202</td>
                                    <td>Kabupaten/kota : <b><?= (isset($get->kab_kota)) ? ucwords($get->kab_kota) : ''; ?></b></td>
                                </tr>
                                <tr>
                                    <td width="10%">P203</td>
                                    <td>Kecamatan : <b><?= (isset($get->kecamatan)) ? ucwords($get->kecamatan) : ''; ?></b></td>
                                </tr>
                                <tr>
                                    <td width="10%">P204</td>
                                    <td>Desa : <b><?= (isset($get->kelurahan)) ? ucwords($get->kelurahan) : ''; ?></b></td>
                                </tr>
                                <tr>
                                    <td width="10%">P205</td>
                                    <td>RT/RW : <b><?= (isset($get->rt_rw)) ? ucwords($get->rt_rw) : ''; ?></b></td>
                                </tr>
                                <tr>
                                    <td width="10%">P206</td>
                                    <td>Nama : <b><?= (isset($get->nama)) ? ucwords($get->nama) : ''; ?></b></td>
                                </tr>
                                <tr>
                                    <td width="10%">P207</td>
                                    <td>Alamat : <b><?= (isset($get->alamat)) ? ucwords($get->alamat) : ''; ?></b></td>
                                </tr>
                                <tr>
                                    <td width="10%">P208</td>
                                    <td>Nomor HP : <b><?= (isset($get->no_hp)) ? ucwords($get->no_hp) : ''; ?></b></td>
                                </tr>
                                <tr>
                                    <td width="10%">P209</td>
                                    <td>Nomor telepon kabel/rumah : <b><?= (isset($get->no_telp)) ? ucwords($get->no_telp) : ''; ?></b></td>
                                </tr>
                                <tr>
                                    <td width="10%" height="20px"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td width="10%"><b>P3</b></td>
                                    <td><b>DESKRIPSI KELUARGA</b></td>
                                </tr>
                                <tr>
                                    <td width="10%">P301</td>
                                    <td>Nomor KK : <b><?= (isset($get->no_kk)) ? ucwords($get->no_kk) : ''; ?></b></td>
                                </tr>
                                <tr>
                                    <td width="10%">P302</td>
                                    <td>NIK kepala keluarga : <b><?= (isset($get->nik)) ? ucwords($get->nik) : ''; ?></b></td>
                                </tr>
                                <tr>
                                    <td width="10%" height="20px"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td width="10%"><b>P4</b></td>
                                    <td><b>PERMUKIMAN</b></td>
                                </tr>
                                <tr>
                                    <td width="10%">P401</td>
                                    <td>
                                        Tempat tinggal yang ditempati : <br>
                                        <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                                <td style="padding: 0;">
                                                    <?= ($get->tempat_tinggal == "Milik Sendiri")  ? "<b>1. " . $get->tempat_tinggal . "</b>" : "1. Milik Sendiri"; ?><br>
                                                    <?= ($get->tempat_tinggal == "Kontrak Sewa")  ? "<b>2. " . $get->tempat_tinggal . "</b>" : "2. Kontrak/Sewa"; ?><br>
                                                </td>
                                                <td style="padding: 0;">
                                                    <?= ($get->tempat_tinggal == "Bebas Sewa")  ? "<b>3. " . $get->tempat_tinggal . "</b>" : "3. Bebas Sewa"; ?><br>
                                                    <?= ($get->tempat_tinggal == "Dipinjami")  ? "<b>4. " . $get->tempat_tinggal . "</b>" : "4. Dipinjami"; ?>
                                                </td>
                                                <td style="padding: 0;">
                                                    <?= ($get->tempat_tinggal == "Dinas")  ? "<b>5. " . $get->tempat_tinggal . "</b>" : "5. Dinas"; ?><br>
                                                    <?= ($get->tempat_tinggal == "Lainnya")  ? "<b>6. " . $get->tempat_tinggal . "</b>" : "6. Lainnya"; ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">P402</td>
                                    <td>
                                        Status lahan tempa tinggal yang ditempati : <br>
                                        <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                                <td style="padding: 0;">
                                                    <?= ($get->status_lahan == "Milik Sendiri")  ? "<b>1. " . $get->status_lahan . "</b>" : "1. Milik Sendiri"; ?><br>
                                                    <?= ($get->status_lahan == "Milik Orang Lain")  ? "<b>2. " . $get->status_lahan . "</b>" : "2. Milik Orang Lain"; ?></td>
                                                <td style="padding: 0;">
                                                    <?= ($get->status_lahan == "Tanah Negara")  ? "<b>3. " . $get->status_lahan . "</b>" : "3. Tanah Negara"; ?><br>
                                                    <?= ($get->status_lahan == "Lainnya")  ? "<b>4. " . $get->status_lahan . "</b>" : "4. Lainnya"; ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">P403</td>
                                    <td>
                                        1. Luas lantai tempat tinggal : <b><?= (isset($get->luas_lantai)) ? $get->luas_lantai : ''; ?></b> (m2) <br>
                                        2. Luas lahan tempat tinggal : <b><?= (isset($get->luas_lahan)) ? $get->luas_lahan : ''; ?></b> (m2)
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">P404</td>
                                    <td>
                                        Jenis lantai tempat tinggal terluas : <br>
                                        <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                                <td style="padding: 0;">
                                                    <?= ($get->jenis_lantai == "Marmer/Granit")  ? "<b>1. " . $get->jenis_lantai . "</b>" : "1. Marmer/Granit"; ?><br>
                                                    <?= ($get->jenis_lantai == "Keramik")  ? "<b>2. " . $get->jenis_lantai . "</b>" : "2. Keramik"; ?><br>
                                                    <?= ($get->jenis_lantai == "Parket/Vinil/Permadani")  ? "<b>3. " . $get->jenis_lantai . "</b>" : "3. Parket/Vinil/Permadani"; ?><br>
                                                    <?= ($get->jenis_lantai == "Ubin/Tegel/Teraso")  ? "<b>4. " . $get->jenis_lantai . "</b>" : "4. Ubin/Tegel/Teraso"; ?>
                                                </td>
                                                <td style="padding: 0;">
                                                    <?= ($get->jenis_lantai == "Kayu/Papan Kualitas Tinggi")  ? "<b>5. " . $get->jenis_lantai . "</b>" : "5. Kayu/Papan Kualitas Tinggi"; ?><br>
                                                    <?= ($get->jenis_lantai == "Semen/Bata Merah")  ? "<b>6. " . $get->jenis_lantai . "</b>" : "6. Semen/Bata Merah"; ?><br>
                                                    <?= ($get->jenis_lantai == "Bambu")  ? "<b>7. " . $get->jenis_lantai . "</b>" : "7. Bambu"; ?><br>
                                                    <?= ($get->jenis_lantai == "Kayu/Papan Kualitas Rendah")  ? "<b>8. " . $get->jenis_lantai . "</b>" : "8. Kayu/Papan Kualitas Rendah"; ?>
                                                </td>
                                                <td style="padding: 0;">
                                                    <?= ($get->jenis_lantai == "Lainnya")  ? "<b>9. " . $get->jenis_lantai . "</b>" : "9. Lainnya"; ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">P405</td>
                                    <td>
                                        Dinding sebagian besar rumah : <br>
                                        <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                                <td style="padding: 0;">
                                                    <?= ($get->dinding == "Semen/Beton/Kayu Berkualitas Tinggi")  ? "<b>1. " . $get->dinding . "</b>" : "1. Semen/Beton/Kayu Berkualitas Tinggi"; ?><br>
                                                    <?= ($get->dinding == "Kayu Berkualitas Rendah/Bambu")  ? "<b>2. " . $get->dinding . "</b>" : "2. Kayu Berkualitas Rendah/Bambu"; ?><br>
                                                    <?= ($get->dinding == "Lainnya")  ? "<b>3. " . $get->dinding . "</b>" : "3. Lainnya"; ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">P406</td>
                                    <td>
                                        Jendela : <br>
                                        <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                                <td style="padding: 0;">
                                                    <?= ($get->jendela == "Ada, Berfungsi")  ? "<b>1. " . $get->jendela . "</b>" : "1. Ada, Berfungsi"; ?><br>
                                                    <?= ($get->jendela == "Ada, Tidak Berfungsi")  ? "<b>2. " . $get->jendela . "</b>" : "2. Ada, Tidak Berfungsi"; ?><br>
                                                    <?= ($get->jendela == "Tidak Ada")  ? "<b>3. " . $get->jendela . "</b>" : "3. Tidak Ada"; ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">P407</td>
                                    <td>
                                        Atap : <br>
                                        <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                                <td style="padding: 0;">
                                                    <?= ($get->atap == "Genteng")  ? "<b>1. " . $get->atap . "</b>" : "1. Genteng"; ?><br>
                                                    <?= ($get->atap == "Kayu/Jerami")  ? "<b>2. " . $get->atap . "</b>" : "2. Kayu/Jerami"; ?><br>
                                                    <?= ($get->atap == "Lainnya")  ? "<b>3. " . $get->atap . "</b>" : "3. Lainnya"; ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">P408</td>
                                    <td>
                                        Penerangan rumah : <br>
                                        <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                                <td style="padding: 0;">
                                                    <?= ($get->penerangan == "Listrik PLN")  ? "<b>1. " . $get->penerangan . "</b>" : "1. Listrik PLN"; ?><br>
                                                    <?= ($get->penerangan == "Listrik Non PLN")  ? "<b>2. " . $get->penerangan . "</b>" : "2. Listrik Non PLN"; ?><br>
                                                    <?= ($get->penerangan == "Lampu Minyak/Lilin")  ? "<b>3. " . $get->penerangan . "</b>" : "3. Lampu Minyak/Lilin"; ?>
                                                </td>
                                                <td style="padding: 0;">
                                                    <?= ($get->penerangan == "Sumber Penerangan Lainnya")  ? "<b>4. " . $get->penerangan . "</b>" : "4. Sumber Penerangan Lainnya"; ?><br>
                                                    <?= ($get->penerangan == "Tidak Ada")  ? "<b>5. " . $get->penerangan . "</b>" : "5. Tidak Ada"; ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">P409</td>
                                    <td>
                                        Energi untuk memasak : <br>
                                        <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                                <td style="padding: 0;">
                                                    <?= ($get->energi == "Gas Kota/LPG/Biogas (Ke P407)")  ? "<b>1. " . $get->energi . "</b>" : "1. Gas Kota/LPG/Biogas (Ke P407)"; ?><br>
                                                    <?= ($get->energi == "Minyak Tanah/Batu Bara (Ke P407)")  ? "<b>2. " . $get->energi . "</b>" : "2. Minyak Tanah/Batu Bara (Ke P407)"; ?>
                                                </td>
                                                <td style="padding: 0;">
                                                    <?= ($get->energi == "Kayu Bakar")  ? "<b>3. " . $get->energi . "</b>" : "3. Kayu Bakar"; ?><br>
                                                    <?= ($get->energi == "Lainnya (Ke P407)")  ? "<b>4. " . $get->energi . "</b>" : "4. Lainnya (Ke P407)"; ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">P410</td>
                                    <td>
                                        Jika menggunakan kayu bakar untuk memasak, sumber kayu bakar : <br>
                                        <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                                <td style="padding: 0;">
                                                    <?= ($get->sumber_kayubakar == "Pembelian")  ? "<b>1. " . $get->sumber_kayubakar . "</b>" : "1. Pembelian"; ?><br>
                                                    <?= ($get->sumber_kayubakar == "Diambil Dari Hutan")  ? "<b>2. " . $get->sumber_kayubakar . "</b>" : "2. Diambil Dari Hutan"; ?>
                                                </td>
                                                <td style="padding: 0;">
                                                    <?= ($get->sumber_kayubakar == "Diambil Di Luar/Bukan Hutan")  ? "<b>3. " . $get->sumber_kayubakar . "</b>" : "3. Diambil Di Luar/Bukan Hutan"; ?><br>
                                                    <?= ($get->sumber_kayubakar == "Lainnya")  ? "<b>4. " . $get->sumber_kayubakar . "</b>" : "4. Lainnya"; ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">P411</td>
                                    <td>
                                        Tempat pembuangan sampah : <br>
                                        <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                                <td style="padding: 0;">
                                                    <?= ($get->tps == "Tidak Ada")  ? "<b>1. " . $get->tps . "</b>" : "1. Tidak Ada"; ?><br>
                                                    <?= ($get->tps == "Di Kebun/Sungai/Drainase")  ? "<b>2. " . $get->tps . "</b>" : "2. Di Kebun/Sungai/Drainase"; ?><br>
                                                    <?= ($get->tps == "Dibakar")  ? "<b>3. " . $get->tps . "</b>" : "3. Dibakar"; ?>
                                                </td>
                                                <td style="padding: 0;">
                                                    <?= ($get->tps == "Tempat Sampah")  ? "<b>4. " . $get->tps . "</b>" : "4. Tempat Sampah"; ?><br>
                                                    <?= ($get->tps == "Tempat Sampah Diangkut Reguler")  ? "<b>5. " . $get->tps . "</b>" : "5. Tempat Sampah Diangkut Reguler"; ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">P412</td>
                                    <td>
                                        Fasilitas MCK : <br>
                                        <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                                <td style="padding: 0;">
                                                    <?= ($get->mck == "Sendiri")  ? "<b>1. " . $get->mck . "</b>" : "1. Sendiri"; ?><br>
                                                    <?= ($get->mck == "Berkelompok/Tetangga")  ? "<b>2. " . $get->mck . "</b>" : "2. Berkelompok/Tetangga"; ?>
                                                </td>
                                                <td style="padding: 0;">
                                                    <?= ($get->mck == "MCK Umum")  ? "<b>3. " . $get->mck . "</b>" : "3. MCK Umum"; ?><br>
                                                    <?= ($get->mck == "Tidak Ada")  ? "<b>4. " . $get->mck . "</b>" : "4. Tidak Ada"; ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">P413</td>
                                    <td>
                                        Sumber air mandi terbanyak dari : <br>
                                        <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                                <td style="padding: 0;">
                                                    <?= ($get->sumber_airmandi == "Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan")  ? "<b>1. " . $get->sumber_airmandi . "</b>" : "1. Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan"; ?><br>
                                                    <?= ($get->sumber_airmandi == "Perpipaan")  ? "<b>2. " . $get->sumber_airmandi . "</b>" : "2. Perpipaan"; ?><br>
                                                    <?= ($get->sumber_airmandi == "Mata Air/Sumur")  ? "<b>3. " . $get->sumber_airmandi . "</b>" : "3. Mata Air/Sumur"; ?>
                                                </td>
                                                <td style="padding: 0;">
                                                    <?= ($get->sumber_airmandi == "Sungai, Danau, Embung")  ? "<b>4. " . $get->sumber_airmandi . "</b>" : "4. Sungai, Danau, Embung"; ?><br>
                                                    <?= ($get->sumber_airmandi == "Tadah Air Hujan")  ? "<b>5. " . $get->sumber_airmandi . "</b>" : "5. Tadah Air Hujan"; ?><br>
                                                    <?= ($get->sumber_airmandi == "Lainnya")  ? "<b>6. " . $get->sumber_airmandi . "</b>" : "6. Lainnya"; ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">P414</td>
                                    <td>
                                        Fasilitas buang air besar : <br>
                                        <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                                <td style="padding: 0;">
                                                    <?= ($get->fasilitas_bab == "Jamban Sendiri")  ? "<b>1. " . $get->fasilitas_bab . "</b>" : "1. Jamban Sendiri"; ?><br>
                                                    <?= ($get->fasilitas_bab == "Jamban Bersama/Tetangga")  ? "<b>2. " . $get->fasilitas_bab . "</b>" : "2. Jamban Bersama/Tetangga"; ?>
                                                </td>
                                                <td style="padding: 0;">
                                                    <?= ($get->fasilitas_bab == "Jamban Umum")  ? "<b>3. " . $get->fasilitas_bab . "</b>" : "3. Jamban Umum"; ?><br>
                                                    <?= ($get->fasilitas_bab == "Lainnya")  ? "<b>4. " . $get->fasilitas_bab . "</b>" : "4. Lainnya"; ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">P415</td>
                                    <td>
                                        Sumber air minum terbanyak dari : <br>
                                        <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                                <td style="padding: 0;">
                                                    <?= ($get->sumber_airminum == "Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan")  ? "<b>1. " . $get->sumber_airminum . "</b>" : "1. Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan"; ?><br>
                                                    <?= ($get->sumber_airminum == "Mata Air/Sumur")  ? "<b>2. " . $get->sumber_airminum . "</b>" : "2. Mata Air/Sumur"; ?><br>
                                                    <?= ($get->sumber_airminum == "Sungai, Danau, Embung")  ? "<b>3. " . $get->sumber_airminum . "</b>" : "3. Sungai, Danau, Embung"; ?>
                                                </td>
                                                <td style="padding: 0;">
                                                    <?= ($get->sumber_airminum == "Tadah Air Hujan")  ? "<b>4. " . $get->sumber_airminum . "</b>" : "4. Tadah Air Hujan"; ?><br>
                                                    <?= ($get->sumber_airminum == "Lainnya")  ? "<b>5. " . $get->sumber_airminum . "</b>" : "5. Lainnya"; ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">P416</td>
                                    <td>
                                        Tempat pembuangan limbah cair : <br>
                                        <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                                <td style="padding: 0;">
                                                    <?= ($get->tempat_plc == "Tangki/Instalasi Pengelolaan Limbah")  ? "<b>1. " . $get->tempat_plc . "</b>" : "1. Tangki/Instalasi Pengelolaan Limbah"; ?><br>
                                                    <?= ($get->tempat_plc == "Sawah/Kolam/Sungai/Drainase/Laut")  ? "<b>2. " . $get->tempat_plc . "</b>" : "2. Sawah/Kolam/Sungai/Drainase/Laut"; ?>
                                                </td>
                                                <td style="padding: 0;">
                                                    <?= ($get->tempat_plc == "Lubang Di Tanah")  ? "<b>3. " . $get->tempat_plc . "</b>" : "3. Lubang Di Tanah"; ?><br>
                                                    <?= ($get->tempat_plc == "Lainnya")  ? "<b>4. " . $get->tempat_plc . "</b>" : "4. Lainnya"; ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">P417</td>
                                    <td>
                                        Rumah berada di bawah SUTET/SUTT/SUTTAS : <br>
                                        <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                                <td style="padding: 0;">
                                                    <?= ($get->tower == "Ya")  ? "<b>1. " . $get->tower . "</b>" : "1. Ya"; ?><br>
                                                    <?= ($get->tower == "Tidak")  ? "<b>2. " . $get->tower . "</b>" : "2. Tidak"; ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">P418</td>
                                    <td>
                                        Rumah di bantaran sungai : <br>
                                        <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                                <td style="padding: 0;">
                                                    <?= ($get->rumah_sungai == "Ya")  ? "<b>1. " . $get->rumah_sungai . "</b>" : "1. Ya"; ?><br>
                                                    <?= ($get->rumah_sungai == "Tidak")  ? "<b>2. " . $get->rumah_sungai . "</b>" : "2. Tidak"; ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">P419</td>
                                    <td>
                                        Rumah di lereng bukit/gunung : <br>
                                        <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                                <td style="padding: 0;">
                                                    <?= ($get->rumah_bukit == "Ya")  ? "<b>1. " . $get->rumah_bukit . "</b>" : "1. Ya"; ?><br>
                                                    <?= ($get->rumah_bukit == "Tidak")  ? "<b>2. " . $get->rumah_bukit . "</b>" : "2. Tidak"; ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">P420</td>
                                    <td>
                                        Secara keseluruhan kondisi rumah : <br>
                                        <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                                <td style="padding: 0;">
                                                    <?= ($get->kondisi_rumah == "Kumuh")  ? "<b>1. " . $get->kondisi_rumah . "</b>" : "1. Kumuh"; ?><br>
                                                    <?= ($get->kondisi_rumah == "Tidak Kumuh")  ? "<b>2. " . $get->kondisi_rumah . "</b>" : "2. Tidak Kumuh"; ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">P421</td>
                                    <td>
                                        Akses Pendidikan terdekat <br>
                                        <table cellspacing="0" cellpadding="0" border="1" width="100%">
                                            <tr>
                                                <td>No</td>
                                                <td>Fasilitas</td>
                                                <td>Jarak (Km)</td>
                                                <td>Waktu Tempuh (jam)</td>
                                                <td>Kemudahan <br> 1. Mudah <br> 2.Sulit </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>PAUD</td>
                                                <td><?= ($get->akses_pendidikan == "PAUD")  ? $get->jarak_pendidikan : ''; ?></td>
                                                <td><?= ($get->akses_pendidikan == "PAUD")  ? $get->waktu_pendidikan : ''; ?></td>
                                                <td><?= ($get->akses_pendidikan == "PAUD")  ? $get->kemudahan_pendidikan : ''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>TK/RA</td>
                                                <td><?= ($get->akses_pendidikan == "TK/RA")  ? $get->jarak_pendidikan : ''; ?></td>
                                                <td><?= ($get->akses_pendidikan == "TK/RA")  ? $get->waktu_pendidikan : ''; ?></td>
                                                <td><?= ($get->akses_pendidikan == "TK/RA")  ? $get->kemudahan_pendidikan : ''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>SD/MI atau sederajat</td>
                                                <td><?= ($get->akses_pendidikan == "SD/MI ata Sederajat")  ? $get->jarak_pendidikan : ''; ?></td>
                                                <td><?= ($get->akses_pendidikan == "SD/MI ata Sederajat")  ? $get->waktu_pendidikan : ''; ?></td>
                                                <td><?= ($get->akses_pendidikan == "SD/MI ata Sederajat")  ? $get->kemudahan_pendidikan : ''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>SMP/MTs atau sederajat</td>
                                                <td><?= ($get->akses_pendidikan == "SMP/MTs atau Sederajat")  ? $get->jarak_pendidikan : ''; ?></td>
                                                <td><?= ($get->akses_pendidikan == "SMP/MTs atau Sederajat")  ? $get->waktu_pendidikan : ''; ?></td>
                                                <td><?= ($get->akses_pendidikan == "SMP/MTs atau Sederajat")  ? $get->kemudahan_pendidikan : ''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>SMA/MA atau sederajat</td>
                                                <td><?= ($get->akses_pendidikan == "SMA/MA atau Sederajat")  ? $get->jarak_pendidikan : ''; ?></td>
                                                <td><?= ($get->akses_pendidikan == "SMA/MA atau Sederajat")  ? $get->waktu_pendidikan : ''; ?></td>
                                                <td><?= ($get->akses_pendidikan == "SMA/MA atau Sederajat")  ? $get->kemudahan_pendidikan : ''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Perguruan tinggi</td>
                                                <td><?= ($get->akses_pendidikan == "Perguruan Tinggi")  ? $get->jarak_pendidikan : ''; ?></td>
                                                <td><?= ($get->akses_pendidikan == "Perguruan Tinggi")  ? $get->waktu_pendidikan : ''; ?></td>
                                                <td><?= ($get->akses_pendidikan == "Perguruan Tinggi")  ? $get->kemudahan_pendidikan : ''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Pesantren</td>
                                                <td><?= ($get->akses_pendidikan == "Pesantren")  ? $get->jarak_pendidikan : ''; ?></td>
                                                <td><?= ($get->akses_pendidikan == "Pesantren")  ? $get->waktu_pendidikan : ''; ?></td>
                                                <td><?= ($get->akses_pendidikan == "Pesantren")  ? $get->kemudahan_pendidikan : ''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Seminari</td>
                                                <td><?= ($get->akses_pendidikan == "Seminari")  ? $get->jarak_pendidikan : ''; ?></td>
                                                <td><?= ($get->akses_pendidikan == "Seminari")  ? $get->waktu_pendidikan : ''; ?></td>
                                                <td><?= ($get->akses_pendidikan == "Seminari")  ? $get->kemudahan_pendidikan : ''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>Pendidikan keagamaan lain</td>
                                                <td><?= ($get->akses_pendidikan == "Pendidikan Keagamaan Lain")  ? $get->jarak_pendidikan : ''; ?></td>
                                                <td><?= ($get->akses_pendidikan == "Pendidikan Keagamaan Lain")  ? $get->waktu_pendidikan : ''; ?></td>
                                                <td><?= ($get->akses_pendidikan == "Pendidikan Keagamaan Lain")  ? $get->kemudahan_pendidikan : ''; ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">P422</td>
                                    <td>
                                        Akses Fasilitas Kesehatan terdekat <br>
                                        <table cellspacing="0" cellpadding="0" border="1" width="100%">
                                            <tr>
                                                <td>No</td>
                                                <td>Fasilitas</td>
                                                <td>Jarak (Km)</td>
                                                <td>Waktu Tempuh (jam)</td>
                                                <td>Kemudahan <br> 1. Mudah <br> 2.Sulit </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Rumah sakit</td>
                                                <td><?= ($get->akses_kesehatan == "Rumah Sakit")  ? $get->jarak_kesehatan : ''; ?></td>
                                                <td><?= ($get->akses_kesehatan == "Rumah Sakit")  ? $get->waktu_kesehatan : ''; ?></td>
                                                <td><?= ($get->akses_kesehatan == "Rumah Sakit")  ? $get->kemudahan_kesehatan : ''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Rumah sakit bersalin</td>
                                                <td><?= ($get->akses_kesehatan == "Rumah Sakit Bersalin")  ? $get->jarak_kesehatan : ''; ?></td>
                                                <td><?= ($get->akses_kesehatan == "Rumah Sakit Bersalin")  ? $get->waktu_kesehatan : ''; ?></td>
                                                <td><?= ($get->akses_kesehatan == "Rumah Sakit Bersalin")  ? $get->kemudahan_kesehatan : ''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Poliklinik</td>
                                                <td><?= ($get->akses_kesehatan == "Poliklinik")  ? $get->jarak_kesehatan : ''; ?></td>
                                                <td><?= ($get->akses_kesehatan == "Poliklinik")  ? $get->waktu_kesehatan : ''; ?></td>
                                                <td><?= ($get->akses_kesehatan == "Poliklinik")  ? $get->kemudahan_kesehatan : ''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Puskesmas</td>
                                                <td><?= ($get->akses_kesehatan == "Puskesmas")  ? $get->jarak_kesehatan : ''; ?></td>
                                                <td><?= ($get->akses_kesehatan == "Puskesmas")  ? $get->waktu_kesehatan : ''; ?></td>
                                                <td><?= ($get->akses_kesehatan == "Puskesmas")  ? $get->kemudahan_kesehatan : ''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Puskesmas pembantu/pustu</td>
                                                <td><?= ($get->akses_kesehatan == "Puskesmas Pembantu/PUSTU")  ? $get->jarak_kesehatan : ''; ?></td>
                                                <td><?= ($get->akses_kesehatan == "Puskesmas Pembantu/PUSTU")  ? $get->waktu_kesehatan : ''; ?></td>
                                                <td><?= ($get->akses_kesehatan == "Puskesmas Pembantu/PUSTU")  ? $get->kemudahan_kesehatan : ''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Polindes</td>
                                                <td><?= ($get->akses_kesehatan == "Polindes")  ? $get->jarak_kesehatan : ''; ?></td>
                                                <td><?= ($get->akses_kesehatan == "Polindes")  ? $get->waktu_kesehatan : ''; ?></td>
                                                <td><?= ($get->akses_kesehatan == "Polindes")  ? $get->kemudahan_kesehatan : ''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Poskesdes</td>
                                                <td><?= ($get->akses_kesehatan == "Poskesdes")  ? $get->jarak_kesehatan : ''; ?></td>
                                                <td><?= ($get->akses_kesehatan == "Poskesdes")  ? $get->waktu_kesehatan : ''; ?></td>
                                                <td><?= ($get->akses_kesehatan == "Poskesdes")  ? $get->kemudahan_kesehatan : ''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Posyandu</td>
                                                <td><?= ($get->akses_kesehatan == "Posyandu")  ? $get->jarak_kesehatan : ''; ?></td>
                                                <td><?= ($get->akses_kesehatan == "Posyandu")  ? $get->waktu_kesehatan : ''; ?></td>
                                                <td><?= ($get->akses_kesehatan == "Posyandu")  ? $get->kemudahan_kesehatan : ''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>Apotik</td>
                                                <td><?= ($get->akses_kesehatan == "Apotik")  ? $get->jarak_kesehatan : ''; ?></td>
                                                <td><?= ($get->akses_kesehatan == "Apotik")  ? $get->waktu_kesehatan : ''; ?></td>
                                                <td><?= ($get->akses_kesehatan == "Apotik")  ? $get->kemudahan_kesehatan : ''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>Toko Obat</td>
                                                <td><?= ($get->akses_kesehatan == "Toko Obat")  ? $get->jarak_kesehatan : ''; ?></td>
                                                <td><?= ($get->akses_kesehatan == "Toko Obat")  ? $get->waktu_kesehatan : ''; ?></td>
                                                <td><?= ($get->akses_kesehatan == "Toko Obat")  ? $get->kemudahan_kesehatan : ''; ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">P423</td>
                                    <td>
                                        Akses tenaga kesehatan terdekat <br>
                                        <table cellspacing="0" cellpadding="0" border="1" width="100%">
                                            <tr>
                                                <td>No</td>
                                                <td>Fasilitas</td>
                                                <td>Jarak (Km)</td>
                                                <td>Waktu Tempuh (jam)</td>
                                                <td>Kemudahan <br> 1. Mudah <br> 2.Sulit </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Dokter spesialis</td>
                                                <td><?= ($get->akses_nakes == "Dokter Spesialis")  ? $get->jarak_nakes : ''; ?></td>
                                                <td><?= ($get->akses_nakes == "Dokter Spesialis")  ? $get->waktu_nakes : ''; ?></td>
                                                <td><?= ($get->akses_nakes == "Dokter Spesialis")  ? $get->kemudahan_nakes : ''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Dokter umum</td>
                                                <td><?= ($get->akses_nakes == "Dokter Umum")  ? $get->jarak_nakes : ''; ?></td>
                                                <td><?= ($get->akses_nakes == "Dokter Umum")  ? $get->waktu_nakes : ''; ?></td>
                                                <td><?= ($get->akses_nakes == "Dokter Umum")  ? $get->kemudahan_nakes : ''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Bidan</td>
                                                <td><?= ($get->akses_nakes == "Bidan")  ? $get->jarak_nakes : ''; ?></td>
                                                <td><?= ($get->akses_nakes == "Bidan")  ? $get->waktu_nakes : ''; ?></td>
                                                <td><?= ($get->akses_nakes == "Bidan")  ? $get->kemudahan_nakes : ''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Tenaga kesehatan</td>
                                                <td><?= ($get->akses_nakes == "Tenaga Kesehatan")  ? $get->jarak_nakes : ''; ?></td>
                                                <td><?= ($get->akses_nakes == "Tenaga Kesehatan")  ? $get->waktu_nakes : ''; ?></td>
                                                <td><?= ($get->akses_nakes == "Tenaga Kesehatan")  ? $get->kemudahan_nakes : ''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Dukun</td>
                                                <td><?= ($get->akses_nakes == "Dukun")  ? $get->jarak_nakes : ''; ?></td>
                                                <td><?= ($get->akses_nakes == "Dukun")  ? $get->waktu_nakes : ''; ?></td>
                                                <td><?= ($get->akses_nakes == "Dukun")  ? $get->kemudahan_nakes : ''; ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%">P424</td>
                                    <td>
                                        Akses Prasarana dan Sarana Transportasi <br>
                                        <table cellspacing="0" cellpadding="0" border="1" width="100%">
                                            <tr>
                                                <td style="vertical-align: bottom;">No</td>
                                                <td style="vertical-align: bottom;">Tujuan</td>
                                                <td style="vertical-align: bottom;">Jenis <br> Transportasi <br> terlama: <br>1. Darat<br>2. Air<br>3. Udara</td>
                                                <td style="vertical-align: bottom;">Penggunaan<br> transportasi<br> umum<br> 1. Ya <br> 2. Tidak</td>
                                                <td style="vertical-align: bottom;">Waktu<br> Tempuh<br> Sekali<br> jalan (jam)</td>
                                                <td style="vertical-align: bottom;">Biaya<br> Sekali<br> jalan<br> (Rp)</td>
                                                <td style="vertical-align: bottom;">Kemudahan <br> 1. Mudah <br> 2.Sulit </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Lokasi pekerjaan utama</td>
                                                <td><?= ($get->akses_transportasi == "Lokasi Pekerjaan Utama")  ? $get->jenis_transportasi : ''; ?></td>
                                                <td><?= ($get->akses_transportasi == "Lokasi Pekerjaan Utama")  ? $get->penggunaan_transportasi : ''; ?></td>
                                                <td><?= ($get->akses_transportasi == "Lokasi Pekerjaan Utama")  ? $get->waktu_tempuh : ''; ?></td>
                                                <td><?= ($get->akses_transportasi == "Lokasi Pekerjaan Utama")  ? $get->biaya : ''; ?></td>
                                                <td><?= ($get->akses_transportasi == "Lokasi Pekerjaan Utama")  ? $get->kemudahan_transportasi : ''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Lahan pertanian yang sedang diusahakan</td>
                                                <td><?= ($get->akses_transportasi == "Lokasi Pertanian Yang Sedang Diusahakan")  ? $get->jenis_transportasi : ''; ?></td>
                                                <td><?= ($get->akses_transportasi == "Lokasi Pertanian Yang Sedang Diusahakan")  ? $get->penggunaan_transportasi : ''; ?></td>
                                                <td><?= ($get->akses_transportasi == "Lokasi Pertanian Yang Sedang Diusahakan")  ? $get->waktu_tempuh : ''; ?></td>
                                                <td><?= ($get->akses_transportasi == "Lokasi Pertanian Yang Sedang Diusahakan")  ? $get->biaya : ''; ?></td>
                                                <td><?= ($get->akses_transportasi == "Lokasi Pertanian Yang Sedang Diusahakan")  ? $get->kemudahan_transportasi : ''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Sekolah</td>
                                                <td><?= ($get->akses_transportasi == "Sekolah")  ? $get->jenis_transportasi : ''; ?></td>
                                                <td><?= ($get->akses_transportasi == "Sekolah")  ? $get->penggunaan_transportasi : ''; ?></td>
                                                <td><?= ($get->akses_transportasi == "Sekolah")  ? $get->waktu_tempuh : ''; ?></td>
                                                <td><?= ($get->akses_transportasi == "Sekolah")  ? $get->biaya : ''; ?></td>
                                                <td><?= ($get->akses_transportasi == "Sekolah")  ? $get->kemudahan_transportasi : ''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Berobat</td>
                                                <td><?= ($get->akses_transportasi == "Berobat")  ? $get->jenis_transportasi : ''; ?></td>
                                                <td><?= ($get->akses_transportasi == "Berobat")  ? $get->penggunaan_transportasi : ''; ?></td>
                                                <td><?= ($get->akses_transportasi == "Berobat")  ? $get->waktu_tempuh : ''; ?></td>
                                                <td><?= ($get->akses_transportasi == "Berobat")  ? $get->biaya : ''; ?></td>
                                                <td><?= ($get->akses_transportasi == "Berobat")  ? $get->kemudahan_transportasi : ''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Beribadah mingguan/bulanan/tahunan</td>
                                                <td><?= ($get->akses_transportasi == "Beribadah Mingguan/Bulanan/Tahunan")  ? $get->jenis_transportasi : ''; ?></td>
                                                <td><?= ($get->akses_transportasi == "Beribadah Mingguan/Bulanan/Tahunan")  ? $get->penggunaan_transportasi : ''; ?></td>
                                                <td><?= ($get->akses_transportasi == "Beribadah Mingguan/Bulanan/Tahunan")  ? $get->waktu_tempuh : ''; ?></td>
                                                <td><?= ($get->akses_transportasi == "Beribadah Mingguan/Bulanan/Tahunan")  ? $get->biaya : ''; ?></td>
                                                <td><?= ($get->akses_transportasi == "Beribadah Mingguan/Bulanan/Tahunan")  ? $get->kemudahan_transportasi : ''; ?></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Rekreasi terdekat</td>
                                                <td><?= ($get->akses_transportasi == "Rekreasi Terdekat")  ? $get->jenis_transportasi : ''; ?></td>
                                                <td><?= ($get->akses_transportasi == "Rekreasi Terdekat")  ? $get->penggunaan_transportasi : ''; ?></td>
                                                <td><?= ($get->akses_transportasi == "Rekreasi Terdekat")  ? $get->waktu_tempuh : ''; ?></td>
                                                <td><?= ($get->akses_transportasi == "Rekreasi Terdekat")  ? $get->biaya : ''; ?></td>
                                                <td><?= ($get->akses_transportasi == "Rekreasi Terdekat")  ? $get->kemudahan_transportasi : ''; ?></td>
                                            </tr>
                                        </table>
                                </tr>
                                <tr>
                                    <td width="10%">P425</td>
                                    <td>
                                        Pemanfaat/penerima program pemerintah<br>
                                        <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                                <td style="padding: 0;">
                                                    1. BLT Dana Desa : <?= ($get->blt == "Ya")  ? "<b>" . $get->blt . "</b>" : "Tidak"; ?><br>
                                                    2. Program Keluarga Harapan/PKH : <?= ($get->pkh == "Ya")  ? "<b>" . $get->pkh . "</b>" : "Tidak"; ?><br>
                                                    3. Bantuan Sosial Tunai /BST : <?= ($get->banst == "Ya")  ? "<b>" . $get->banst . "</b>" : "Tidak"; ?><br>
                                                    4. Bantuan Presiden/Banpres : <?= ($get->banpres == "Ya")  ? "<b>" . $get->banpres . "</b>" : "Tidak"; ?><br>
                                                    5. Bantuan UMKM: <?= ($get->banumkm == "Ya")  ? "<b>" . $get->banumkm . "</b>" : "Tidak"; ?>
                                                </td>
                                                <td style="padding: 0;">
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                </td>
                                                <td style="padding: 0;">
                                                    6. Bantuan untuk pekerja : <?= ($get->buk == "Ya")  ? "<b>" . $get->buk . "</b>" : "Tidak"; ?><br>
                                                    7. Bantuan pendidikan anak : <?= ($get->bpa == "Ya")  ? "<b>" . $get->bpa . "</b>" : "Tidak"; ?><br>
                                                    8. Lainnya : <?= ($get->lainnya == "Ya")  ? "<b>" . $get->lainnya . "</b>" : "Tidak"; ?>
                                                </td>
                                                <td style="padding: 0;">
                                                    <br>
                                                    <br>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
</div>
</section>

</div>
<?= $this->endSection() ?>