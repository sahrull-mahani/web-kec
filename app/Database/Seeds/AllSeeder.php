<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Faker\Factory;

class AllSeeder extends Seeder
{
	public function run()
	{
		$faker = Factory::create();
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
			[
				'ip_address'              => '127.0.0.1',
				'username'                => 'msm',
				'password'                => '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa',
				'email'                   => 'sural@admin.com',
				'activation_code'         => '',
				'forgotten_password_code' => null,
				'created_on'              => '1268889823',
				'last_login'              => '1268889823',
				'active'                  => '1',
				'nama_user'               => 'Sural Mahajani',
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
			[
				'user_id'  => '2',
				'group_id' => '2',
			],
		];
		$this->db->table($tables['users_groups'])->insertBatch($usersGroups);





		$agenda = [];
		for ($i = 1; $i <= 10; $i++) {
			$judul = "ini agenda " . sprintf('%02d', $i);
			array_push($agenda, [
				'judul'       => $judul,
				'slug'        => str_replace(" ", "-", $judul),
				'isi_agenda'  => $faker->text(200),
				'lokasi'      => "CAMAT RUPAT, HANAFI,SPI., MSI AKAN MEMBUKA SECARA RESMI PERTANDINGAN SEPAK BOLA RUPAT CUP III DI DESA PANGKALAN PINANG",
				'id_user' => 1,
				'published_at' => Time::now(),
				'created_at'  => Time::now(),
				'updated_at'  => Time::now()
			]);
		}
		// Using Query Builder
		$this->db->table('agenda')->insertBatch($agenda);

		$statistik = [];
		$bidang = ['agama', 'pekerjaan', 'pendidikan', 'perkawinan'];
		$stat0 = ['islam', 'kristen', 'katholik', 'hindu', 'budha', 'kong hu chu', 'lainnya'];
		$stat2 = ['belum masuk paud/tk', 'putus sekolah', 'd-1', 'd-2', 'd-3', 's-1', 's-2', 's-3', 'sd', 'smp', 'sma', 'tk/paud'];
		$stat3 = ['belum kawin', 'cerai hidup', 'kawin', 'cerai mati', 'tidak diketahui'];
		for ($i = 1; $i <= 100; $i++) {
			$rand = rand(0, count($bidang) - 1);
			switch ($rand) {
				case 0:
					$stat = $stat0[rand(0, count($stat0) - 1)];
					break;
				case 1:
					$stat = $faker->jobTitle();
					break;
				case 2:
					$stat = $stat2[rand(0, count($stat2) - 1)];
					break;
				case 3:
					$stat = $stat3[rand(0, count($stat3) - 1)];
					break;
			}
			array_push($statistik, [
				'bidang'		=> $bidang[$rand],
				'statistik'		=> $stat,
				'usia'			=> rand(5, 60),
				'jk'			=> rand(0, 1),
				'created_at'	=> Time::now(),
				'updated_at'	=> Time::now()
			]);
		}
		// Using Query Builder
		$this->db->table('statistik')->insertBatch($statistik);
	}
}
