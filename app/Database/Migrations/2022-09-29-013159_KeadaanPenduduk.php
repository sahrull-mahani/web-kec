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
            'dusun_id' => [
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
        $this->forge->addForeignKey('dusun_id', 'dusun', 'id', 'ON UPDATE', 'CASCADE');
        $this->forge->addForeignKey('individu_id', 'individu', 'id', 'ON UPDATE', 'CASCADE');
        $this->forge->createTable('keadaanpenduduk');
    }

    public function down()
    {
        $this->forge->dropTable('keadaanpenduduk');
    }
}
