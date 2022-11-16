<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataPajak extends Migration
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
            'id_desa' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'individu_id' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'no_kk'     => [
                'type'          => 'CHAR',
                'constraint' => 20,
            ],
            'nik'     => [
                'type'          => 'CHAR',
                'constraint' => 20,
            ],
            'nama'     => [
                'type'          => 'CHAR',
                'constraint' => 100,
            ],
            'alamat'     => [
                'type'          => 'TEXT',
            ],
            'wajib_pajak'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'jumlah_pajak'     => [
                'type'          => 'CHAR',
                'constraint' => 150,
            ],
            'keterangan'     => [
                'type'          => 'ENUM',
                'constraint' => ['Lunas', 'Belum Lunas'],
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
        $this->forge->addForeignKey('id_desa', 'desa', 'id', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('individu_id', 'individu', 'id', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('datapajak');
    }

    public function down()
    {
        $this->forge->dropTable('datapajak');
    }
}