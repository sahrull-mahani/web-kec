<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Desa extends Migration
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

            'nama_desa'        => [
                'type'          => 'VARCHAR',
                'constraint'    => 100
            ],
            'kepala_desa'        => [
                'type'          => 'VARCHAR',
                'constraint'    => 100
            ],
            'sekdes'        => [
                'type'          => 'VARCHAR',
                'constraint'    => 100
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
        $this->forge->createTable('desa');
    }

    public function down()
    {
        $this->forge->dropTable('desa');
    }
}