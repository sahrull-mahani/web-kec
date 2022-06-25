<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProgramKegiatan extends Migration
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
            'judul'       => [
                'type'       => 'CHAR',
                'constraint' => 150,
            ],
            'isi_program'       => [
                'type'       => 'TEXT'
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
        $this->forge->createTable('program');
    }

    public function down()
    {
        $this->forge->dropTable('program');
    }
}
