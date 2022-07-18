<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penginapan extends Migration
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
            'nama'     => [
                'type'          => 'CHAR',
                'constraint'    => 150,
            ],
            'keterangan'     => [
                'type'          => 'TEXT',
            ],
            'published_at'     => [
                'type'          => 'DATETIME',
                'null'          => true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('penginapan');
    }

    public function down()
    {
        $this->forge->dropTable('penginapan');
    }
}
