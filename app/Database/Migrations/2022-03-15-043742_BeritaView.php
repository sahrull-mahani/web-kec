<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BeritaView extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_berita'       => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'ip_address'       => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'user_agent'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('berita_view');
    }

    public function down()
    {
        $this->forge->dropTable('berita_view');
    }
}
