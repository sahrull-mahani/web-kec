<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Potensi extends Migration
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
            'level'     => [
                'type'          => 'INT',
                'constraint'    => 11,
            ],
            'judul'        => [
                'type'          => 'VARCHAR',
                'constraint'    => 100
            ],
            'isi_potensi'        => [
                'type'          => 'TEXT'
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('potensi');
    }

    public function down()
    {
        $this->forge->dropTable('potensi');
    }
}
