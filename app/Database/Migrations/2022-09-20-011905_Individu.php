<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Individu extends Migration
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
            'id_dusun'     => [
                'type'          => 'INT',
                'constraint' => '6',
                'unsigned' => true,
            ],
            'kesehatan_id' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true
            ],
            'no_kk'     => [
                'type'          => 'CHAR',
                'constraint' => 16,
            ],
            'nik'     => [
                'type'          => 'CHAR',
                'constraint' => 16,
            ],
            'nama'     => [
                'type'          => 'VARCHAR',
                'constraint' => 255,
            ],
            'provinsi'     => [
                'type'          => 'CHAR',
                'constraint' => 150,
            ],
            'kab_kota'     => [
                'type'          => 'CHAR',
                'constraint' => 150,
            ],
            'kecamatan'     => [
                'type'          => 'CHAR',
                'constraint' => 150,
            ],
            'kelurahan'     => [
                'type'          => 'CHAR',
                'constraint' => 150,
            ],

            'alamat'     => [
                'type'          => 'VARCHAR',
                'constraint' => 255,
            ],
            'jenis_kelamin'     => [
                'type'          => 'ENUM',
                'constraint' => ['Laki - Laki', 'Perempuan'],
            ],
            'tempat_lahir'     => [
                'type'          => 'CHAR',
                'constraint' => 150,
            ],
            'tgl_lahir'     => [
                'type'          => 'DATE',
            ],
            'umur'     => [
                'type'          => 'ENUM',
                'constraint' => ['0 - 4', '5 - 9', '10 - 14', '15 - 19', '20 - 24', '25 - 29', '30 - 34', '35 - 39', '40 - 44', '45 - 49', '50 - 54', '55 - 59', '60 - 64', '65 - 69', '70 - 74', '75 - 79', '80 - 84'],
            ],
            'status_nikah'     => [
                'type'          => 'ENUM',
                'constraint' => ['Kawin', 'Tidak Kawin', 'Duda/Janda'],
            ],
            'agama'     => [
                'type'          => 'ENUM',
                'constraint' => ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha'],
            ],
            'suku'     => [
                'type'          => 'CHAR',
                'constraint' => 150,
            ],
            'kewarganegaraan'     => [
                'type'          => 'ENUM',
                'constraint' => ['WNI', 'WNA'],
            ],
            'kondisi_pekerjaan'     => [
                'type'          => 'ENUM',
                'constraint' => ['Bersekolah', 'Ibu Rumah Tangga', 'Tidak Bekerja', 'Sedang Mencari Pekerjaan', 'Bekerja'],
            ],
            'pekerjaan'     => [
                'type'          => 'ENUM',
                'constraint' => ['Petani Pemilik Lahan', 'Petani Penyewa', 'Buruh Tani', 'Nelayan Pemilik Kapal/Perahu', 'Nelayan Penyewa Kapal/Perahu', 'Buruh Nelayan', 'Guru', 'Guru Agama', 'Pedagang', 'Pengolahan/Industri', 'PNS', 'TNI', 'Perangkat Desa', 'Pegawai Kantor Desa', 'TKI', 'Lainnya'],
            ],
            'jamsos'     => [
                'type'          => 'ENUM',
                'constraint' => ['Peserta', 'Bukan Peserta'],
            ],
            'no_hp'     => [
                'type'          => 'CHAR',
                'constraint' => 12,
            ],
            'no_wa'     => [
                'type'          => 'CHAR',
                'constraint' => 12,
            ],

            'email'     => [
                'type'          => 'CHAR',
                'constraint' => 150,
            ],
            'facebook'     => [
                'type'          => 'CHAR',
                'constraint' => 150,
            ],
            'twitter'     => [
                'type'          => 'CHAR',
                'constraint' => 150,
            ],
            'instagram'     => [
                'type'          => 'CHAR',
                'constraint' => 150,
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
        $this->forge->addForeignKey('id_dusun', 'dusun', 'id', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('kesehatan_id', 'kesehatan', 'id', 'ON DELETE', 'CASCADE', 'RESTRICT', 'SET NULL');
        $this->forge->createTable('individu');
    }

    public function down()
    {
        $this->forge->dropTable('individu');
    }
}