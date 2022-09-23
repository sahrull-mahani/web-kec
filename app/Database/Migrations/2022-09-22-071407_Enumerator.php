<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Enumerator extends Migration
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
            'rumahtangga_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'nama_enum'     => [
                'type'          => 'CHAR',
                'constraint' => 150,
            ],
            'notelp_enum'     => [
                'type'          => 'CHAR',
                'constraint' => 16,
            ],
            'alamat_enum'     => [
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
        $this->forge->addForeignKey('rumahtangga_id', 'rumahtangga', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('enumerator');
    }

    public function down()
    {
        $this->forge->dropTable('enumerator');
    }
}
