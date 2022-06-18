<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StatistikPekerjaan extends Migration
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
            'statistik'     => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'pria'        => [
                'type'          => 'INT',
                'constraint'    => 11
            ],
            'wanita'        => [
                'type'          => 'INT',
                'constraint'    => 11
            ],
            'jumlah'        => [
                'type'          => 'INT',
                'constraint'    => 11
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('statistik_pekerjaan');
    }

    public function down()
    {
        $this->forge->dropTable('statistik_pekerjaan');
    }
}
