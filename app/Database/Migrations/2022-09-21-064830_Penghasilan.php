<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penghasilan extends Migration
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
            'individu_id' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'tahun' => [
                'type' => 'YEAR',
                'constraint'    => 4
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
        $this->forge->addForeignKey('individu_id', 'individu', 'id', 'ON UPDATE', 'CASCADE');
        $this->forge->createTable('penghasilan');
    }

    public function down()
    {
        $this->forge->dropTable('penghasilan');
    }
}
