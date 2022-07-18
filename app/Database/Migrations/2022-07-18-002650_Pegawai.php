<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pegawai extends Migration
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
                'constraint'    => 250,
            ],
            'nip'     => [
                'type'          => 'INT',
                'constraint'    => 18,
            ],
            'jk'     => [
                'type'          => 'ENUM',
                'constraint'    => ['Laki-laki', 'Perempuan'],
            ],
            'tempat_lahir'     => [
                'type'          => 'CHAR',
                'constraint'    => 50,
            ],
            'tgl_lahir'     => [
                'type'          => 'DATE',
            ],
            'gelar_depan'     => [
                'type'          => 'CHAR',
                'constraint'    => 50,
            ],
            'gelar_belakang'     => [
                'type'          => 'CHAR',
                'constraint'    => 50,
            ],
            'pangkat'     => [
                'type'          => 'CHAR',
                'constraint'    => 150,
            ],
            'alamat'     => [
                'type'          => 'TEXT',
            ],
            'pendidikan'     => [
                'type'          => 'ENUM',
                'constraint'    => ['S3','S2','S1/D4','D3','D2','D1','SMA/SMK/MA'],
            ],
            'lulusan'     => [
                'type'          => 'CHAR',
                'constraint'    => 100,
            ],
            'poto'     => [
                'type'          => 'CHAR',
                'constraint'    => 150,
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
        $this->forge->createTable('pegawai');
    }

    public function down()
    {
        $this->forge->dropTable('pegawai');
    }
}
