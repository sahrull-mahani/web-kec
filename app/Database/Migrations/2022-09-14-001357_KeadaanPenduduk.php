<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KeadaanPenduduk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsign'        => true,
                'auto_increment' => true
            ],
            'dusun'     => [
                'type'          => 'CHAR',
                'constraint'    => 150,
            ],
            'no_kk'     => [
                'type'          => 'CHAR',
                'constraint'    => 16,
            ],
            'nik'     => [
                'type'          => 'CHAR',
                'constraint'    => 16,
            ],
            'nama'     => [
                'type'          => 'CHAR',
                'constraint'    => 150,
            ],
            'pekerjaan'     => [
                'type'          => 'ENUM',
                'constraint'    => ['Petani Pemilik Lahan', 'Petani Penyewa', 'Buruh Tani', 'Nelayan Pemilik Kapal/Perahu', 'Nelayan Penyewa Kapal/Perahu', 'Buruh Nelayan', 'Guru', 'Guru Agama', 'Pedagang', 'Pengolahan/Industri', 'PNS', 'TNI', 'Perangkat Desa', 'Pegawai Kantor Desa', 'TKI', 'Lainnya'],
            ],
            'muntaber_diare'     => [
                'type'          => 'ENUM',
                'constraint'    => ['Ya', 'Tidak'],
            ],
            'hepatitis_e'     => [
                'type'          => 'ENUM',
                'constraint'    => ['Ya', 'Tidak'],
            ],
            'jantung'     => [
                'type'          => 'ENUM',
                'constraint'    => ['Ya', 'Tidak'],
            ],
            'demam_berdarah'     => [
                'type'          => 'ENUM',
                'constraint'    => ['Ya', 'Tidak'],
            ],
            'difteri'     => [
                'type'          => 'ENUM',
                'constraint'    => ['Ya', 'Tidak'],
            ],
            'tbc_paru'     => [
                'type'          => 'ENUM',
                'constraint'    => ['Ya', 'Tidak'],
            ],
            'campak'     => [
                'type'          => 'ENUM',
                'constraint'    => ['Ya', 'Tidak'],
            ],
            'chikungunya'     => [
                'type'          => 'ENUM',
                'constraint'    => ['Ya', 'Tidak'],
            ],
            'kanker'     => [
                'type'          => 'ENUM',
                'constraint'    => ['Ya', 'Tidak'],
            ],
            'malaria'     => [
                'type'          => 'ENUM',
                'constraint'    => ['Ya', 'Tidak'],
            ],
            'leptospirosis'     => [
                'type'          => 'ENUM',
                'constraint'    => ['Ya', 'Tidak'],
            ],
            'diabetes'     => [
                'type'          => 'ENUM',
                'constraint'    => ['Ya', 'Tidak'],
            ],
            'fluburung_sars'     => [
                'type'          => 'ENUM',
                'constraint'    => ['Ya', 'Tidak'],
            ],
            'kolera'     => [
                'type'          => 'ENUM',
                'constraint'    => ['Ya', 'Tidak'],
            ],
            'lumpuh'     => [
                'type'          => 'ENUM',
                'constraint'    => ['Ya', 'Tidak'],
            ],
            'covid_19'     => [
                'type'          => 'ENUM',
                'constraint'    => ['Ya', 'Tidak'],
            ],
            'gizi_buruk'     => [
                'type'          => 'ENUM',
                'constraint'    => ['Ya', 'Tidak'],
            ],
            'hepatitis_b'     => [
                'type'          => 'ENUM',
                'constraint'    => ['Ya', 'Tidak'],
            ],
            'lainnya'     => [
                'type'          => 'ENUM',
                'constraint'    => ['Ya', 'Tidak'],
            ],
            'created_at'     => [
                'type'          => 'DATE',
                'null'          => true
            ],
            'updated_at'     => [
                'type'          => 'DATE',
                'null'          => true
            ],
            'deleted_at'     => [
                'type'          => 'DATE',
                'null'          => true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('keadaanpenduduk');
    }

    public function down()
    {
        $this->forge->dropTable('keadaanpenduduk');
    }
}
