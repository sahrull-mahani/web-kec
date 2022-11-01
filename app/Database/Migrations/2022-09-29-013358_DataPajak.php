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
        $this->forge->addForeignKey('id_desa', 'desa', 'id', 'NO UPDATE', 'CASCADE');
        $this->forge->addForeignKey('individu_id', 'individu', 'id', 'ON UPDATE', 'CASCADE');
        $this->forge->createTable('datapajak');
    }

    public function down()
    {
        $this->forge->dropTable('datapajak');
    }
}
