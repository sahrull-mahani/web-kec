<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JumlahPenduduk extends Migration
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
            'dusun'     => [
                'type'          => 'CHAR',
                'constraint'    => 150,
            ],
            'jumlah_jiwa'     => [
                'type'          => 'INT',
                'constraint'    => 11,
            ],
            'jumlah_kk'     => [
                'type'          => 'INT',
                'constraint'    => 11,
            ],
            'umur'     => [
                'type'          => 'ENUM',
                'constraint'    => ['0 - 4', '5 - 9', '10 - 14', '15 - 19', '20 - 24', '25 - 29', '30 - 34', '35 - 39', '40 - 44', '45 - 49', '50 - 54', '55 - 59', '60 - 64', '65 - 69', '70 - 74', '75 - 79', '80 - 84'],
            ],
            'jumlah_pria'     => [
                'type'          => 'INT',
                'constraint'    => 11,
            ],
            'jumlah_wanita'     => [
                'type'          => 'INT',
                'constraint'    => 11,
            ],
            'jumlah'     => [
                'type'          => 'INT',
                'constraint'    => 11,
            ],
            'agama_islam'     => [
                'type'          => 'INT',
                'constraint'    => 11,
            ],
            'agama_kristen'     => [
                'type'          => 'INT',
                'constraint'    => 11,
            ],
            'agama_katolik'     => [
                'type'          => 'INT',
                'constraint'    => 11,
            ],
            'agama_hindu'     => [
                'type'          => 'INT',
                'constraint'    => 11,
            ],
            'agama_budha'     => [
                'type'          => 'INT',
                'constraint'    => 11,
            ],
            'keterangan'     => [
                'type'          => 'text',
            ],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('jumlahpenduduk');
    }

    public function down()
    {
        $this->forge->dropTable('jumlahpenduduk');
    }
}
