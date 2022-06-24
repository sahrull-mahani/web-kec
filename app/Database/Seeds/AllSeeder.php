<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class AllSeeder extends Seeder
{
    public function run()
    {
        $config = config('IonAuth\\Config\\IonAuth');
		$this->DBGroup = empty($config->databaseGroupName) ? '' : $config->databaseGroupName;
		$tables        = $config->tables;

		$groups = [
			[
				'id'          => 1,
				'name'        => 'admin',
				'description' => 'Administrator',
			],
			[
				'id'          => 2,
				'name'        => 'members',
				'description' => 'General User',
			],
		];
		$this->db->table($tables['groups'])->insertBatch($groups);

		$users = [
			[
				'ip_address'              => '127.0.0.1',
				'username'                => 'administrator',
				'password'                => '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa',
				'email'                   => 'admin@admin.com',
				'activation_code'         => '',
				'forgotten_password_code' => null,
				'created_on'              => '1268889823',
				'last_login'              => '1268889823',
				'active'                  => '1',
				'nama_user'               => 'Admin',
				'img'                     => null,
				'phone'                   => '0',
			],
		];
		$this->db->table($tables['users'])->insertBatch($users);

		$usersGroups = [
			[
				'user_id'  => '1',
				'group_id' => '1',
			],
			[
				'user_id'  => '1',
				'group_id' => '2',
			],
		];
		$this->db->table($tables['users_groups'])->insertBatch($usersGroups);





        $agenda = [];
        for ($i = 1; $i <= 10; $i++) {
            $judul = "ini agenda " . sprintf('%02d', $i);
            $isi = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit dolores totam quis est ipsa tempora nobis officia beatae earum fuga dolorum quaerat necessitatibus numquam praesentium maxime, accusamus aliquam quos id ipsam, architecto, dolore assumenda incidunt quas. Veniam natus maiores officiis quisquam nihil pariatur libero, impedit ex nobis odit hic, quaerat eius rem. Sunt quam odio illum adipisci.";
            array_push($agenda, [
                'judul'       => $judul,
                'slug'        => str_replace(" ", "-", $judul),
                'isi_agenda'  => $isi,
                'lokasi'      => "CAMAT RUPAT, HANAFI,SPI., MSI AKAN MEMBUKA SECARA RESMI PERTANDINGAN SEPAK BOLA RUPAT CUP III DI DESA PANGKALAN PINANG",
                'id_user' => 1,
                'published_at' => Time::now(),
                'created_at'  => Time::now(),
                'updated_at'  => Time::now()
            ]);

        }
        // Using Query Builder
        $this->db->table('agenda')->insertBatch($agenda);





        $StatistikAgama = [];
        for ($i = 1; $i <= 10; $i++) {
            $judul = "ini statistik agama " . sprintf('%02d', $i);
            array_push($StatistikAgama, [
                'statistik' => $judul,
                'pria'      => rand(0, 150),
                'wanita'    => rand(0, 150),
                'jumlah'    => rand(0, 150)
            ]);

        }
        // Using Query Builder
        $this->db->table('statistik_agama')->insertBatch($StatistikAgama);



        $StatistikPekerjaan = [];
        for ($i = 1; $i <= 10; $i++) {
            $judul = "ini statistik pekerjaan " . sprintf('%02d', $i);
            array_push($StatistikPekerjaan, [
                'statistik' => $judul,
                'pria'      => rand(0, 150),
                'wanita'    => rand(0, 150),
                'jumlah'    => rand(0, 150)
            ]);
        }
        // Using Query Builder
        $this->db->table('statistik_pekerjaan')->insertBatch($StatistikPekerjaan);



        $StatistikPendidikan = [];
        for ($i = 1; $i <= 10; $i++) {
            $judul = "ini statistik pendidikan " . sprintf('%02d', $i);
            array_push($StatistikPendidikan, [
                'statistik' => $judul,
                'pria'      => rand(0, 150),
                'wanita'    => rand(0, 150),
                'jumlah'    => rand(0, 150)
            ]);
        }
        // Using Query Builder
        $this->db->table('statistik_pendidikan')->insertBatch($StatistikPendidikan);



        $StatistikPerkawinan = [];
        for ($i = 1; $i <= 10; $i++) {
            $judul = "ini statistik perkawianan " . sprintf('%02d', $i);
            array_push($StatistikPerkawinan, [
                'statistik' => $judul,
                'pria'      => rand(0, 150),
                'wanita'    => rand(0, 150),
                'jumlah'    => rand(0, 150)
            ]);
        }
        // Using Query Builder
        $this->db->table('statistik_perkawinan')->insertBatch($StatistikPerkawinan);
    }
}
