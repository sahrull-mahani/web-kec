<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pekerjaan extends Migration
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
            // 'individu_id'        => [
            //     'type'          => 'INT',
            //     'constraint'    => 11,
            //     'unsigned' => true,
            //     'null' => true
            // ],
            'individu_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true],
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
            'sumber_penghasilan'     => [
                'type'          => 'TEXT',
            ],
            'jumlah'     => [
                'type'          => 'TEXT',
            ],
            'satuan'     => [
                'type'          => 'TEXT',
            ],
            'penghasilan'     => [
                'type'          => 'TEXT',
            ],
            'ekspor'     => [
                'type'          => 'TEXT',
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
        $this->forge->createTable('pekerjaan');
    }

    public function down()
    {
        $this->forge->dropTable('pekerjaan');
    }
}
