<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataKematian extends Migration
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
                'constraint'    => 255,
            ],
            'jenis_kelamin'     => [
                'type'          => 'ENUM',
                'constraint'    => ['Laki - Laki', 'Perempuan'],
            ],
            'tgl_kematian'     => [
                'type'          => 'DATE',
            ],
            'jam_kematian'     => [
                'type'          => 'TIME',
            ],
            'tempat_kematian'     => [
                'type'          => 'CHAR',
                'constraint'    => 255,
            ],
            'tgl_kubur'     => [
                'type'          => 'DATE',
            ],
            'jam_kubur'     => [
                'type'          => 'TIME',
            ],
            'tempat_kematian'     => [
                'type'          => 'CHAR',
                'constraint'    => 255,
            ],
            'alamat'     => [
                'type'          => 'CHAR',
                'constraint'    => 255,
            ],
            'updated_at'     => [
                'type'          => 'DATE',
                'null'          => true
            ],
            'deleted_at'     => [
                'type'          => 'DATE',
                'null'          => true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('datakematian');
    }

    public function down()
    {
        $this->forge->dropTable('datakematian');
    }
}
