<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataPajak extends Migration
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
            'no_kk'     => [
                'type'          => 'CHAR',
                'constraint'    => 16,
            ],
            'nik'     => [
                'type'          => 'CHAR',
                'constraint'    => 16,
            ],
            'nama'     => [
                'type'          => 'CHAR',
                'constraint'    => 255,
            ],
            'alamat'     => [
                'type'          => 'TEXT',
            ],
            'wajib_pajak'     => [
                'type'          => 'ENUM',
                'constraint'    => ['Ya', 'Tidak'],
            ],
            'jumlah'     => [
                'type'          => 'CHAR',
                'constraint'    => 100,
            ],
            'keterangan'     => [
                'type'          => 'ENUM',
                'constraint'    => ['Lunas', 'Belum Lunas'],
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
        $this->forge->createTable('datapajak');
    }

    public function down()
    {
        $this->forge->dropTable('datapajak');
    }
}
