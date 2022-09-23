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
            'individu_id' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true
            ],
            'status'     => [
                'type'          => 'CHAR',
                'constraint'    => 255,
            ],
            'tgl_pindah'     => [
                'type'          => 'DATE',
            ],
            'alamat_pindah'     => [
                'type'          => 'CHAR',
                'constraint'    => 255,
            ],
            'keterangan_pindah'     => [
                'type'          => 'TEXT',
            ],
            'created_at'     => [
                'type'          => 'DATE',
                'null'          => true
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
        $this->forge->addForeignKey('individu_id', 'individu', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('datapindah');
    }

    public function down()
    {
        $this->forge->dropTable('datapindah');
    }
}
