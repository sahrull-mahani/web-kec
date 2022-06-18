<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Berita extends Migration
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
            'level'       => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'judul'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'slug'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'excerpt'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'isi_berita'       => [
                'type'       => 'TEXT'
            ],
            'gambar'        => [
                'type'       => 'VARCHAR',
                'constraint' => 255
            ],
            'id_user'        => [
                'type'       => 'INT',
                'constraint' => '11'
            ],
            'published_at'        => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'created_at'        => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'updated_at'        => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('berita');
    }

    public function down()
    {
        $this->forge->dropTable('berita');
    }
}
