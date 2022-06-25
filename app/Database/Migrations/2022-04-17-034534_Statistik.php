<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Statistik extends Migration
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
                'constraint'    => ['agama','pekerjaan','pendidikan','perkawinan'],
            ],
            'statistik'     => [
                'type'          => 'CHAR',
                'constraint'    => 150,
            ],
            'usia'        => [
                'type'          => 'TINYINT',
                'constraint'    => 2
            ],
            'jk'        => [
                'type'          => 'TINYINT',
                'constraint'    => 1
            ],
            'created_at'    => [
                'type'          => 'DATE',
                'null'          => TRUE
            ],
            'updated_at'    => [
                'type'          => 'DATE',
                'null'          => TRUE
            ],
            'deleted_at'    => [
                'type'          => 'DATE',
                'null'          => TRUE
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('statistik');
    }

    public function down()
    {
        $this->forge->dropTable('statistik');
    }
}
