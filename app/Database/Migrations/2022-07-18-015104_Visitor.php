<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Visitor extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'visitor_id'        => [
                'type'          => 'INT',
                'constraint'    => 10,
                'unsign'        => true,
                'auto_increment' => true
            ],
            'no_of_visits'     => [
                'type'          => 'INT',
                'constraint'    => 10,
            ],
            'ip_address'     => [
                'type'          => 'CHAR',
                'constraint'    => 20,
            ],
            'requested_url'     => [
                'type'          => 'TINYTEXT',
            ],
            'referer_page'     => [
                'type'          => 'TINYTEXT',
            ],
            'page_name'     => [
                'type'          => 'TINYTEXT',
            ],
            'query_string'     => [
                'type'          => 'TINYTEXT',
            ],
            'user_agent'     => [
                'type'          => 'TINYTEXT',
            ],
            'is_unique'     => [
                'type'          => 'TINYINT',
                'constraint'    => 4,
            ],
            'access_date'     => [
                'type'          => 'TIMESTAMP',
                'default'       => time()
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('visitor');


        $this->forge->addField([
            'id_visitor'        => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsign'        => true,
                'auto_increment' => true
            ],
            'ip_address'     => [
                'type'          => 'CHAR',
                'constraint'    => 20,
                'null'          => TRUE
            ],
            'user_agent'     => [
                'type'          => 'TINYTEXT',
                'null'          => TRUE
            ],
            'access_date'     => [
                'type'          => 'TIMESTAMP',
                'default'       => time(),
                'null'          => TRUE
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('visitor_log');
    }

    public function down()
    {
        $this->forge->dropTable('visitors');
        $this->forge->dropTable('visitor_log');
    }
}
