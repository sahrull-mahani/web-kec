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
            'bidang'     => [
                'type'          => 'ENUM',
                'constraint'    => ['peristiwa', 'kelautan', 'perdagangan', 'pertanian', 'industri', 'pendidikan'],
            ],
            'judul'        => [
                'type'          => 'VARCHAR',
                'constraint'    => 100
            ],
            'isi_potensi'        => [
                'type'          => 'TEXT'
            ],
            'published_at'        => [
                'type'          => 'DATE',
                'null'          => TRUE
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
