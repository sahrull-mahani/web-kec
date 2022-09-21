<?= form_open_multipart('individu/save', array('class' => 'form-horizontal mode2')); ?>
<div class="card-body">
    <table border="1" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td colspan="2">
                <b>
                    KEMENTERIAN DESA, PDT DAN TRANSMIGRASI <br><br>
                    SDGs DESA <br>
                    KUESIONER INDIVIDU <br><br>

                </b>
            </td>
        </tr>
        <tr>
            <td width="10%"><b>P1</b></td>
            <td><b>DESKRIPSI INDIVIDU</b></td>
        </tr>
        <tr>
            <td width="10%">P101</td>
            <td>Nomor Kartu Keluarga : <b><?= (isset($get->no_kk)) ? $get->no_kk : ''; ?></b></td>
        </tr>
        <tr>
            <td width="10%">P102</td>
            <td>NIK : <b><?= (isset($get->nik)) ? $get->nik : ''; ?></b></td>
        </tr>
        <tr>
            <td width="10%">P103</td>
            <td>Nama : <b><?= (isset($get->nama)) ? $get->nama : ''; ?></b></td>
        </tr>
        <tr>
            <td width="10%">P104</td>
            <td>Jenis Kelamin : <b><?= (isset($get->jenis_kelamin)) ? $get->jenis_kelamin : ''; ?></b></td>
        </tr>
        <tr>
            <td width="10%">P105</td>
            <td>Tempat Lahir : <b><?= (isset($get->tempat_lahir)) ? $get->tempat_lahir : ''; ?></b></td>
        </tr>
        <tr>
            <td width="10%">P106</td>
            <td>Tanggal Lahir : <b><?= (isset($get->tgl_lahir)) ? $get->tgl_lahir : ''; ?></b></td>
        </tr>
        <tr>
            <td width="10%">P107</td>
            <td>Status Pernikahan : <b><?= (isset($get->status_nikah)) ? $get->status_nikah : ''; ?></b></td>
        </tr>
        <tr>
            <td width="10%">P108</td>
            <td>Agama : <b><?= (isset($get->agama)) ? $get->agama : ''; ?></b></td>
        </tr>
        <tr>
            <td width="10%">P109</td>
            <td>Suku Bangsa : <b><?= (isset($get->suku)) ? $get->suku : ''; ?></b></td>
        </tr>
        <tr>
            <td width="10%">P110</td>
            <td>Warganegara : <b><?= (isset($get->kewarganegaraan)) ? $get->kewarganegaraan : ''; ?></b></td>
        </tr>
        <tr>
            <td width="10%">P111</td>
            <td>Nomor HP : <b><?= (isset($get->no_hp)) ? $get->no_hp : ''; ?></b></td>
        </tr>
        <tr>
            <td width="10%">P112</td>
            <td>Nomor untuk Whatsapp : <b><?= (isset($get->no_wa)) ? $get->no_wa : ''; ?></b></td>
        </tr>
        <tr>
            <td width="10%">P113</td>
            <td>Alamat Email Pribadi : <b><?= (isset($get->email)) ? $get->email : ''; ?></b></td>
        </tr>
        <tr>
            <td width="10%">P114</td>
            <td>Alamat Facebook Pribadi : <b><?= (isset($get->facebook)) ? $get->facebook : ''; ?></b></td>
        </tr>
        <tr>
            <td width="10%">P115</td>
            <td>Alamat Twitter Pribadi : <b><?= (isset($get->twitter)) ? $get->twitter : ''; ?></b></td>
        </tr>
        <tr>
            <td width="10%">P116</td>
            <td>Alamat Instagram Pribadi : <b><?= (isset($get->instagram)) ? $get->instagram : ''; ?></b></td>
        </tr>
        <tr>
            <td width="10%">P117</td>
            <td>Provinsi : <b><?= (isset($get->provinsi)) ? $get->provinsi : ''; ?></b></td>
        </tr>
        <tr>
            <td width="10%">P118</td>
            <td>Kota/Kabupaten : <b><?= (isset($get->kab_kota)) ? $get->kab_kota : ''; ?></b></td>
        </tr>
        <tr>
            <td width="10%">P119</td>
            <td>Kecamatan : <b><?= (isset($get->kecamatan)) ? $get->kecamatan : ''; ?></b></td>
        </tr>
        <tr>
            <td width="10%">P120</td>
            <td>Desa/Kelurahan : <b><?= (isset($get->kelurahan)) ? $get->kelurahan : ''; ?></b></td>
        </tr>
        <tr>
            <td width="10%">P121</td>
            <td>Dusun : <b>adasda</b></td>
        </tr>
        <tr>
            <td width="10%">P122</td>
            <td>Alamat : <b><?= (isset($get->alamat)) ? $get->alamat : ''; ?></b></td>
        </tr>
        <tr>
            <td width="10%" height="20px"></td>
            <td></td>
        </tr>
        <tr>
            <td width="10%"><b>P2</b></td>
            <td><b>DESKRIPSI PEKERJAAN</b></td>
        </tr>
        <tr>
            <td width="10%">P201</td>
            <td>Kondisi pekerjaan : <br>
                <table cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td style="padding: 0;">
                            <?= ($get->kondisi_pekerjaan == "Bersekolah")  ? "<b>1. " . $get->kondisi_pekerjaan . "</b>" : "1. Bersekolah"; ?><br>
                            <?= ($get->kondisi_pekerjaan == "Ibu Rumah Tangga") ? "<b>2. " . $get->kondisi_pekerjaan . "</b>" : "2. Ibu Rumah Tangga"; ?><br>
                            <?= ($get->kondisi_pekerjaan == "Tidak Bekerja") ? "<b>3. " . $get->kondisi_pekerjaan . "</b>" : "3. Tidak Bekerja"; ?>
                        </td>
                        <td style="padding: 0;">
                            <?= ($get->kondisi_pekerjaan == "Sedang Mencari Pekerjaan") ? "<b>4. " . $get->kondisi_pekerjaan . "</b>" : "4. Sedang Mencari Pekerjaan"; ?><br>
                            <?= ($get->kondisi_pekerjaan == "Bekerja") ? "<b>5. " . $get->kondisi_pekerjaan . "</b>" : "5. Bekerja"; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td width="10%">P202</td>
            <td>Pekerjaan utama : <br>
                <table cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td style="padding: 0;">
                            <?= ($get->pekerjaan == "Petani Pemilik Lahan")  ? "<b>1. " . $get->pekerjaan . "</b>" : "1. Petani Pemilik Lahan"; ?><br>
                            <?= ($get->pekerjaan == "Petani Penyewa")  ? "<b>2. " . $get->pekerjaan . "</b>" : "2. Petani Penyewa"; ?><br>
                            <?= ($get->pekerjaan == "Buruh Tani")  ? "<b>3. " . $get->pekerjaan . "</b>" : "3. Buruh Tani"; ?><br>
                            <?= ($get->pekerjaan == "Nelayan Pemilik Kapal/Perahu")  ? "<b>4. " . $get->pekerjaan . "</b>" : "4. Nelayan Pemilik Kapal/Perahu"; ?><br>
                            <?= ($get->pekerjaan == "Nelayan Penyewa Kapal/Perahu")  ? "<b>5. " . $get->pekerjaan . "</b>" : "5. Nelayan Penyewa Kapal/Perahu"; ?><br>
                            <?= ($get->pekerjaan == "Buruh Nelayan")  ? "<b>6. " . $get->pekerjaan . "</b>" : "6. Buruh Nelayan"; ?>
                        <td>
                        <td style="padding: 0;">
                            <?= ($get->pekerjaan == "Guru")  ? "<b>7. " . $get->pekerjaan . "</b>" : "7. Guru"; ?><br>
                            <?= ($get->pekerjaan == "Guru Agama")  ? "<b>8. " . $get->pekerjaan . "</b>" : "8. Guru Agama"; ?><br>
                            <?= ($get->pekerjaan == "Pedagang")  ? "<b>9. " . $get->pekerjaan . "</b>" : "9. Pedagang"; ?><br>
                            <?= ($get->pekerjaan == "Pengolahan/Industri")  ? "<b>10. " . $get->pekerjaan . "</b>" : "10. Pengolahan/Industri"; ?><br>
                            <?= ($get->pekerjaan == "PNS")  ? "<b>11. " . $get->pekerjaan . "</b>" : "11. PNS"; ?><br>
                            <?= ($get->pekerjaan == "TNI")  ? "<b>12. " . $get->pekerjaan . "</b>" : "12. TNI"; ?>
                        <td>
                        <td style="padding: 0;">
                            <?= ($get->pekerjaan == "Perangkat Desa")  ? "<b>13. " . $get->pekerjaan . "</b>" : "13. Perangkat Desa"; ?><br>
                            <?= ($get->pekerjaan == "TKI")  ? "<b>14. " . $get->pekerjaan . "</b>" : "14. TKI"; ?><br>
                            <?= ($get->pekerjaan == "Lainnya")  ? "<b>15. " . $get->pekerjaan . "</b>" : "15. Lainnya"; ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td width="10%">P203</td>
            <td>Jaminan sosial ketenagakerjaan : <span style="margin-left: 15px;"><b>1. Peserta</b></span> <span style="margin-left: 15px;">2. Bukan Peserta</span> </td>
        </tr>
        <tr>
            <td width="10%">P204</td>
            <td>
                Penghasilan setahun terakhir dari (Rp) : <br>
                <table cellspacing="0" cellpadding="0" border="1" width="100%">
                    <tr>
                        <td style="vertical-align: bottom; text-align: center" rowspan="2">No</td>
                        <td style="vertical-align: bottom; text-align: center; width: 35%" rowspan="2">Sumber Penghasilan</td>
                        <td style="vertical-align: middle; text-align: center" colspan="2">Volume</td>
                        <td style="vertical-align: bottom; text-align: center" rowspan="2">Penghasilan <br> Setahun (Rp)</td>
                        <td style="vertical-align: bottom; text-align: center; width: 15%" rowspan="2">Diekspor<br> 1. Semua<br> 2. Sebagian besar<br> 3. tidak </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: bottom; text-align: center">Jumlah</td>
                        <td style="vertical-align: bottom; text-align: center">Satuan</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle; text-align: center">Kelapa</td>
                        <td style="vertical-align: middle; text-align: left">
                            <div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

                            </div>
                        </td>
                        <td style="vertical-align: middle; text-align: center">123123123</td>
                        <td style="vertical-align: middle; text-align: center">kg</td>
                        <td style="vertical-align: middle; text-align: center">1232131</td>
                        <td style="vertical-align: middle; text-align: center">Sebagian besar</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle; text-align: center">Ayam pedaging</td>
                        <td style="vertical-align: middle; text-align: left">
                            <div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

                            </div>
                        </td>
                        <td style="vertical-align: middle; text-align: center">35345</td>
                        <td style="vertical-align: middle; text-align: center">kg</td>
                        <td style="vertical-align: middle; text-align: center">1231233</td>
                        <td style="vertical-align: middle; text-align: center">Sebagian besar</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td width="10%" height="20px"></td>
            <td></td>
        </tr>
        <tr>
            <td width="10%"><b>P4</b></td>
            <td><b>DESKRIPSI KESEHATAN</b></td>
        </tr>
        <tr>
            <td width="10%">P401</td>
            <td>
                Penyakit yang diderita setahun terakhir : <br>
                <table cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td style="padding: 0;">
                            1. Muntaber/diare : <br>
                            2. Demam berdarah : <br>
                            3. Campak : <br>
                            4. Malaria : <br>
                            5. Flu burung/SARS : <br>
                            6. Covid-19 : <br>
                            7. Hepatitis B : <br>
                            8. Hepatitis E : <br>
                            9. Difteri : <br>
                            10. Chikungunya :
                        </td>
                        <td style="padding: 0;">
                            <b>1. Ya</b> 2. Tidak<br>
                            1. Ya <b>2. Tidak</b><br>
                            1. Ya <b>2. Tidak</b><br>
                            1. Ya <b>2. Tidak</b><br>
                            1. Ya <b>2. Tidak</b><br>
                            1. Ya <b>2. Tidak</b><br>
                            1. Ya <b>2. Tidak</b><br>
                            1. Ya <b>2. Tidak</b><br>
                            1. Ya <b>2. Tidak</b><br>
                            1. Ya <b>2. Tidak</b>
                        </td>
                        <td style="padding: 0;">
                            11. Leptospirosis : <br>
                            12. Kolera : <br>
                            13. Gizi buruk (marasmus dan kwasiorkor) : <br>
                            14. Jantung : <br>
                            15. TBC paru-paru : <br>
                            16. Kanker : <br>
                            17. Diabetes/kencing manis/ gula : <br>
                            18. Lumpuh : <br>
                            19. Lainnya :
                        </td>
                        <td style="padding: 0;">
                            1. Ya <b>2. Tidak</b><br>
                            1. Ya <b>2. Tidak</b><br>
                            1. Ya <b>2. Tidak</b><br>
                            1. Ya <b>2. Tidak</b><br>
                            1. Ya <b>2. Tidak</b><br>
                            1. Ya <b>2. Tidak</b><br>
                            1. Ya <b>2. Tidak</b><br>
                            1. Ya <b>2. Tidak</b><br>
                            1. Ya <b>2. Tidak</b> </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td width="10%">P402</td>
            <td>
                Berapa kali fasilitas kesehatan berikut didatangi setahun terakhir untuk pengobatan/perawatan (jumlah) : <br>
                <table cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td style="padding: 0; width: 30%">
                            1. Rumah sakit <br>
                            2. Rumah sakit bersalin <br>
                            3. Puskesmas dengan rawat inap <br>
                            4. Puskesmas tanpa rawat inap <br>
                            5. Puskesmas pembantu <br>
                            6. Poliklinik/ balai pengobatan <br>
                            7. Tempat praktik dokter <br>
                            8. Rumah bersalin
                        </td>
                        <td style="padding: 0;">
                            : 1<br>
                            : 1<br>
                            : 1<br>
                            : 1<br>
                            : 1<br>
                            : 1<br>
                            : 1<br>
                            : 1 </td>
                        <td style="padding: 0; width: 30%">
                            9. Tempat praktik bidan <br>
                            10. Poskesdes <br>
                            11. Polindes <br>
                            12. Apotik <br>
                            13. Toko khusus obat/ jamu <br>
                            14. Posyandu <br>
                            15. Posbindu <br>
                            16. Tempat praktik dukun bayi/ bersalin/ paraji
                        </td>
                        <td style="padding: 0;">
                            : 1<br>
                            : 1<br>
                            : 1<br>
                            : 1<br>
                            : 1<br>
                            : 1<br>
                            : 1<br>
                            : 1 </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td width="10%"></td>
            <td>Jaminan sosial kesehatan : <span style="margin-left: 15px;"><b>1. Peserta</b></span> <span style="margin-left: 15px;">2. Bukan Peserta</span> </td>
        </tr>
        <tr>
            <td width="10%">P403</td>
            <td>
                Disabilitas : <br>
                <table cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td style="padding: 0; width: 65%">
                            1. Tunanetra (buta) <br>
                            2. Tunarungu (tuli) <br>
                            3. Tunawicara (bisu) <br>
                            4. Tunarungu–wicara (tuli–bisu) <br>
                            5. Tunadaksa (cacat tubuh): kelumpuhan/kelainan/ketidaklengkapan anggota gerak <br>
                            6. Tunagrahita (cacat mental, keterbelakangan mental) <br>
                            7. Tunalaras (eks–sakit jiwa, gangguan mengendalikan emosi dan kontrol sosial) <br>
                            8. Cacat eks–sakit kusta: pernah sakit kusta dan dinyatakan sembuh oleh dokter <br>
                            9. Cacat ganda (cacat fisik–mental): cacat fisik dan cacat mental <br>
                            10. Dipasung
                        </td>
                        <td style="padding: 0;">
                            1. Ya <b>2. Tidak</b><br>
                            1. Ya <b>2. Tidak</b><br>
                            <b>1. Ya</b> 2. Tidak<br>
                            1. Ya <b>2. Tidak</b><br>
                            1. Ya <b>2. Tidak</b><br>
                            1. Ya <b>2. Tidak</b><br>
                            1. Ya <b>2. Tidak</b><br>
                            1. Ya <b>2. Tidak</b><br>
                            1. Ya <b>2. Tidak</b><br>
                            1. Ya <b>2. Tidak</b>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td width="10%" height="20px"></td>
            <td></td>
        </tr>
        <tr>
            <td width="10%"><b>P5</b></td>
            <td><b>DESKRIPSI PENDIDIKAN</b></td>
        </tr>
        <tr>
            <td width="10%">P501</td>
            <td>Pendidikan tertinggi yang ditamatkan : <br>
                <table cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td style="padding: 0;">
                            <b>1. Tidak sekolah</b><br>
                            2. SD dan sederajat<br>
                            3. SMP dan sederajat<br>
                            4. SMA dan sederajat
                        </td>
                        <td style="padding: 0;">
                            5. Diploma 1-3<br>
                            6. S1 dan sederajat<br>
                            7. S2 dan sederajat<br>
                            8. S3 dan sederajat </td>
                        <td style="padding: 0;">
                            9. Pesantren, seminari, wihara dan sejenisnya<br>
                            10. Lainnya </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td width="10%">P502</td>
            <td>
                Bahasa digunakan di rumah dan permukiman (tuliskan) : asdada </td>
        </tr>
        <tr>
            <td width="10%">P503</td>
            <td>
                Bahasa digunakan di lembaga formal (sekolah, tempat kerja, tuliskan) : asdad </td>
        </tr>
        <tr>
            <td width="10%">P504</td>
            <td>
                Kerja bakti setahun terakhir (jumlah) : 1 </td>
        </tr>
        <tr>
            <td width="10%">P505</td>
            <td>
                Siskamling setahun terakhir (jumlah) : 1 </td>
        </tr>
        <tr>
            <td width="10%">P506</td>
            <td>
                Pesta rakyat/adat setahun terakhir (jumlah) : 1 </td>
        </tr>
        <tr>
            <td width="10%">P507</td>
            <td>
                Menolong warga yang mengalami kematian keluarga setahun terakhir (jumlah) : 1 </td>
        </tr>
        <tr>
            <td width="10%">P508</td>
            <td>
                Menolong warga yang sedang sakit setahun terakhir (jumlah) : 1 </td>
        </tr>
        <tr>
            <td width="10%">P509</td>
            <td>
                Menolong warga yang kecelakaan setahun terakhir (jumlah) : 1 </td>
        </tr>
    </table>
</div>
<?= form_close(); ?>