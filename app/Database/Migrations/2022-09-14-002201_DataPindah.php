<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataPindah extends Migration
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
            'status'     => [
                'type'          => 'CHAR',
                'constraint'    => 255,
            ],
            'jenis_kelamin'     => [
                'type'          => 'ENUM',
                'constraint'    => ['Laki - Laki', 'Perempuan'],
            ],
            'tgl_pindah'     => [
                'type'          => 'DATE',
            ],
            'alamat_pindah'     => [
                'type'          => 'CHAR',
                'constraint'    => 255,
            ],
            'keterangan'     => [
                'type'          => 'TEXT',
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
        $this->forge->createTable('datapindah');
    }

    public function down()
    {
        $this->forge->dropTable('datapindah');
    }
}
