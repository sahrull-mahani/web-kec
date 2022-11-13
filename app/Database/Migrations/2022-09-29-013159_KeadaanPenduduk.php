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
            'id_dusun' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'individu_id' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
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
        $this->forge->addForeignKey('individu_id', 'individu', 'id', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('keadaanpenduduk');
    }

    public function down()
    {
        $this->forge->dropTable('keadaanpenduduk');
    }
}