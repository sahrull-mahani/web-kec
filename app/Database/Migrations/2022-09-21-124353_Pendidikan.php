<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pendidikan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'        => true,
                'auto_increment' => true
            ],
            'pendidikan'     => [
                'type'          => 'ENUM',
                'constraint' => ['Tidak Sekolah', 'SD dan Sederajat', 'SMP dan Sederajat', 'SMA dan Sederajat', 'Diploma 1-3', 'S1 dan Sederajat', 'S2 dan Sederajat', 'S3 dan Sederajat', 'Pesantren, Seminari, Wihara dan Sejenisnya', 'Lainnya'],
            ],
            'bahasa_lokal'     => [
                'type'          => 'CHAR',
                'constraint' => 150,
            ],
            'bahasa_formal'     => [
                'type'          => 'CHAR',
                'constraint' => 150,
            ],
            'kerja_bakti'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'siskamling'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'pesta_rakyat'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'pertolongan_kematian'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'pertolongan_sakit'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'pertolongan_kecelakaan'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'created_at'     => [
                'type'          => 'DATETIME',
                'null'          => true
            ],
            'updated_at'     => [
                'type'          => 'DATETIME',
                'null'          => true
            ],
            'deleted_at'     => [
                'type'          => 'DATETIME',
                'null'          => true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pendidikan');
    }

    public function down()
    {
        $this->forge->dropTable('pendidikan');
    }
}
