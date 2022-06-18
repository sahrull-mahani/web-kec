<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Galeri extends Migration
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
            'id_sumber'     => [
                'type'          => 'INT',
                'constraint'    => 11,
            ],
            'sumber'        => [
                'type'          => 'VARCHAR',
                'constraint'    => 255
            ],
            'id_user'        => [
                'type'          => 'INT',
                'constraint'    => 11
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('galeri');
    }

    public function down()
    {
        $this->forge->dropTable('galeri');
    }
}
