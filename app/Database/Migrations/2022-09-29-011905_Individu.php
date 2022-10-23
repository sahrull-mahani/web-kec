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
            'id_desa' => [
                'type'       => 'INT',
                'constraint' => '6',
                'unsigned'   => true,
            ],
            'kesehatan_id' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true
            ],
            'dusun_id'     => [
                'type'          => 'INT',
                'constraint' => 6,
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
            'no_hp'     => [
                'type'          => 'CHAR',
                'constraint' => 12,
            ],
            'no_wa'     => [
                'type'          => 'CHAR',
                'constraint' => 12,
            ],
            // 'wajib_pajak'     => [
            //     'type'          => 'ENUM',
            //     'constraint' => ['Ya', 'Tidak'],
            // ],
            // 'jumlah_pajak'     => [
            //     'type'          => 'CHAR',
            //     'constraint' => 150,
            // ],
            // 'keterangan'     => [
            //     'type'          => 'ENUM',
            //     'constraint' => ['Lunas', 'Belum Lunas'],
            // ],
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
        $this->forge->addForeignKey('id_desa', 'desa', 'id', 'NO ACTION', 'CASCADE');
        $this->forge->addForeignKey('pekerjaan_id', 'pekerjaan', 'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('kesehatan_id', 'kesehatan', 'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('pendidikan_id', 'pendidikan', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('individu');
    }

    public function down()
    {
        $this->forge->dropTable('individu');
    }
}
