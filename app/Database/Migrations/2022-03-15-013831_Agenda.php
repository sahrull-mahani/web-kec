<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Agenda extends Migration
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
            'judul'        => [
                'type'          => 'VARCHAR',
                'constraint'    => 100
            ],
            'slug'        => [
                'type'          => 'VARCHAR',
                'constraint'    => 255
            ],
            'isi_agenda'        => [
                'type'          => 'TEXT'
            ],
            'lokasi'            => [
                'type'       => 'TEXT'
            ],
            'id_user'            => [
                'type'       => 'INT',
                'contstraint'=> 11
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
        $this->forge->createTable('agenda');
    }

    public function down()
    {
        $this->forge->dropTable('agenda');
    }
}
