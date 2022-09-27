<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kesehatan extends Migration
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
            'individu_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'bpjs_kes'     => [
                'type'          => 'ENUM',
                'constraint' => ['Peserta', 'Bukan Peserta'],
            ],
            'muntaber_diare'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'hepatitis_e'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'jantung'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'demam_berdarah'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'difteri'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'tbc_paru'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'campak'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'chikungunya'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'kanker'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'malaria'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'leptospirosis'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'diabetes'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'fluburung_sars'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'kolera'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'lumpuh'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'covid_19'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'gizi_buruk'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'hepatitis_b'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'lainnya'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'rs'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'praktik_bidan'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'rs_bersalin'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'poskesdes'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'puskesmas_inap'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'polindes'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'puskesmas_tanpainap'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'apotik'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'pustu'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'toko_obat'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'poliklinik'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'posyandu'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'praktik_dokter'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'posbindu'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'rumah_bersalin'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'praktik_dukun'     => [
                'type'          => 'INT',
                'constraint' => 11,
            ],
            'tunanetra'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'tunarungu'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'tunawicara'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'tunarungu_wicara'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'tunadaksa'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'tunagrahita'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'tunalaras'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'eks_kusta'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'cacat_ganda'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
            ],
            'pasung'     => [
                'type'          => 'ENUM',
                'constraint' => ['Ya', 'Tidak'],
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
        $this->forge->addForeignKey('individu_id', 'individu', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('kesehatan');
    }

    public function down()
    {
        $this->forge->dropTable('kesehatan');
    }
}
