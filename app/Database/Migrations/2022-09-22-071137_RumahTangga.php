<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RumahTangga extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'        => true,
                'auto_increment' => true
            ],
            'individu_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'rt_rw'     => [
                'type'          => 'CHAR',
                'constraint' => 150,
            ],
            'no_telp'     => [
                'type'          => 'CHAR',
                'constraint' => 16,
            ],
            'tempat_tinggal'     => [
                'type'          => 'ENUM',
                'constraint' => ['Milik Sendiri', 'Kontrak Sewa', 'Bebas Sewa', 'Dipinjami', 'Dinas', 'Lainnya'],
            ],
            'status_lahan'     => [
                'type'          => 'ENUM',
                'constraint' => ['Milik Sendiri', 'Milik Orang Lain', 'Tanah Negara', 'Lainnya'],
            ],
            'luas_lantai'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'luas_lahan'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'jenis_lantai'     => [
                'type'          => 'ENUM',
                'constraint' => ['Marmer/Granit', 'Keramik', 'Parket/Vinil/Permadani', 'Ubin/Tegel/Teraso', 'Kayu/Papan Kualitas Tinggi', 'Semen/Bata Merah', 'Bambu', 'Kayu/Papan Kualitas Rendah', 'Lainnya'],
            ],
            'dinding'     => [
                'type'          => 'ENUM',
                'constraint' => ['Semen/Beton/Kayu Berkualitas Tinggi', 'Kayu Berkualitas Rendah/Bambu', 'Lainnya'],
            ],
            'jendela'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ada, Berfungsi', 'Ada, Tidak Berfungsi', 'Tidak Ada'],
            ],
            'atap'     => [
                'type'          => 'ENUM',
                'constraint' => ['Genteng', 'Kayu/Jerami', 'Lainnya'],
            ],
            'penerangan'     => [
                'type'          => 'ENUM',
                'constraint' => ['Listrik PLN', 'Listrik Non PLN', 'Lampu Minyak/Lilin', 'Sumber Penerangan Lainnya', 'Tidak Ada'],
            ],
            'energi'     => [
                'type'          => 'ENUM',
                'constraint' => ['Gas Kota/LPG/Biogas (Ke P407)', 'Minyak Tanah/Batu Bara (Ke P407)', 'Kayu Bakar', 'Lainnya (Ke P407)'],
            ],
            'sumber_kayubakar'     => [
                'type'          => 'ENUM',
                'constraint' => ['Pembelian', 'Diambil Dari Hutan', 'Diambil Di Luar/Bukan Hutan', 'Lainnya'],
            ],
            'tps'     => [
                'type'          => 'ENUM',
                'constraint' => ['Tidak Ada', 'Di Kebun/Sungai/Drainase', 'Dibakar', 'Tempat Sampah', 'Tidak'],
            ],
            'mck'     => [
                'type'          => 'ENUM',
                'constraint' => ['Sendiri', 'Berkelompok/Tetangga', 'MCK Umum', 'Tidak Ada'],
            ],
            'sumber_airmandi'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Perpipaan', 'Mata Air/Sumur', 'Sungai, Danau, Embung', 'Tadah Air Hujan', 'Lainnya'],
            ],
            'fasilitas_bab'     => [
                'type'          => 'ENUM',
                'constraint' => ['Jamban Sendiri', 'Jamban Bersama/Tetangga', 'Jamban Umum', 'Lainnya'],
            ],
            'sumber_airminum'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Mata Air/Sumur' => 'Mata Air/Sumur', 'Sungai, Danau, Embung', 'Tadah Air Hujan', 'Lainnya'],
            ],
            'tempat_plc'     => [
                'type'          => 'ENUM',
                'constraint' => ['Tangki/Instalasi Pengelolaan Limbah', 'Sawah/Kolam/Sungai/Drainase/Laut', 'Lubang Di Tanah', 'Lainnya'],
            ],
            'tower'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'rumah_sungai'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'rumah_bukit'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'kondisi_rumah'     => [
                'type'          => 'ENUM',
                'constraint' => ['Kumuh', 'Tidak Kumuh'],
            ],
            'akses_pendidikan'     => [
                'type'          => 'ENUM',
                'constraint' => ['PAUD', 'TK/RA', 'SD/MI ata Sederajat', 'SMP/MTs atau Sederajat', 'SMA/MA atau Sederajat', 'Perguruan Tinggi', 'Pesantren', 'Seminari', 'Pendidikan Keagamaan Lain'],
            ],
            'jarak_pendidikan'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'waktu_pendidikan'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'kemudahan_pendidikan'     => [
                'type'          => 'ENUM',
                'constraint' => ['Sulit', 'Mudah'],
            ],
            'akses_kesehatan'     => [
                'type'          => 'ENUM',
                'constraint' => ['Rumah Sakit', 'Rumah Sakit Bersalin', 'Poliklinik', 'Puskesmas', 'Puskesmas Pembantu/PUSTU', 'Polindes', 'Poskesdes', 'Posyandu', 'Apotik', 'Toko Obat'],
            ],
            'jarak_kesehatan'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'waktu_kesehatan'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'kemudahan_kesehatan'     => [
                'type'          => 'ENUM',
                'constraint' => ['Sulit', 'Mudah'],
            ],
            'akses_nakes'     => [
                'type'          => 'ENUM',
                'constraint' => ['Dokter Spesialis', 'Dokter Umum', 'Bidan', 'Tenaga Kesehatan', 'Dukun'],
            ],
            'jarak_nakes'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'waktu_nakes'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'kemudahan_nakes'     => [
                'type'          => 'ENUM',
                'constraint' => ['Sulit', 'Mudah'],
            ],
            'akses_transportasi'     => [
                'type'          => 'ENUM',
                'constraint' => ['Lokasi Pekerjaan Utama', 'Lokasi Pertanian Yang Sedang Diusahakan', 'Sekolah', 'Berobat', 'Beribadah Mingguan/Bulanan/Tahunan', 'Rekreasi Terdekat'],
            ],
            'jenis_transportasi'     => [
                'type'          => 'ENUM',
                'constraint' => ['Air', 'Udara', 'Darat'],
            ],
            'penggunaan_transportasi'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'waktu_tempuh'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'biaya'     => [
                'type'          => 'CHAR',
                'constraint' => 100,
            ],
            'kemudahan_transportasi'     => [
                'type'          => 'ENUM',
                'constraint' => ['Sulit', 'Mudah'],
            ],
            'blt'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'pkh'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'banst'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'banpres'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'banumkm'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'buk'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'bpa'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'lainnya'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'created_at'     => [
                'type'          => 'DATETIME',
                'null'          => true
            ],
            'updated_at'     => [
                'type'          => 'DATETIME',
                'null'          => true
            ],
            'deleted_at'     => [
                'type'          => 'DATETIME',
                'null'          => true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('individu_id', 'individu', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('rumahtangga');
    }

    public function down()
    {
        $this->forge->dropTable('rumahtangga');
    }
}
