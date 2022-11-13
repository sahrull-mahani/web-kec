<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dusun extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],

            'nama_dusun'        => [
                'type'          => 'VARCHAR',
                'constraint'    => 100
            ],
            'id_desa'        => [
                'type'          => 'INT',
                'constraint'    => 6,
                'unsigned' => true
            ],
            'created_at'       => [
                'type'       => 'DATE',
                'null'       => TRUE
            ],
            'updated_at'       => [
                'type'       => 'DATE',
                'null'       => TRUE
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('dusun');
    }

    public function down()
    {
        $this->forge->dropTable('dusun');
    }
}