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
				'tahun'			=> rand(2021, 2022),
				'created_at'	=> Time::now(),
				'updated_at'	=> Time::now()
			]);
		}
		// Using Query Builder
		$this->db->table('statistik')->insertBatch($statistik);

		$dataProfil = [
			[
				'judul'	=> 'sejarah kaidipang',
				'body'	=> '<p>Loremasdas ipsusaas dolor sisst, amet consectetur adipisicing elit. Minima itaque molestias rem mollitia illum aspernatur tempore adipisci cumque? Cumque iste sequi impedit rem sunt, harum veritatis quis possimus sit itaque ducimus voluptatem quibusdam, ipsam aperiam fuga praesentium dolor libero facilis minus obcaecati voluptatum quidem alias debitis! Maiores iusto ea reiciendis, repellat laudantium pariatur voluptate est aliquid ad soluta, sed id voluptates harum, ipsa possimus earum! Quidem mollitia corrupti omnis magnam rerum veritatis maiores atque aliquid sed eveniet et, qui ea consequuntur distinctio odio eaque. Eum aperiam ad, consequatur eligendi enim assumenda ullam deserunt exercitationem nam. Suscipit sed, hic nulla reiciendis fugiat iure ratione accusantium. Dignissimos nobis consectetur excepturi? Magnam explicabo cupiditate beatae, aliquam hic nulla, rem culpa architecto repudiandae cum eos assumenda, veniam blanditiis iure ut ipsa natus ipsam dignissimos qui suscipit. Quaerat, fuga officia? Ab delectus atque saepe officia, tenetur, earum impedit nam debitis perferendis architecto obcaecati nihil? Nesciunt, neque corrupti at quisquam obcaecati iste quidem dolore dolor non quis assumenda molestiae labore. Repudiandae unde ut ipsam atque doloribus consequatur magni, adipisci nostrum, quod corporis obcaecati sed a natus ullam non enim dolores? Reiciendis animi consectetur qui quidem. Est harum ad expedita maxime! Excepturi, id magni optio vel esse fuga temporibus. Accusamus nisi in ullam, assumenda autem quas aliquid voluptatibus libero blanditiis praesentium cumque, adipisci repudiandae inventore, optio sequi. Eos quisquam suscipit magnam optio excepturi corporis hic omnis. Esse magni at illum deleniti minus, quis dolor culpa? Dolorem expedita saepe suscipit enim officiis id aliquid ratione vero et nihil ea facere facilis iure reprehenderit est temporibus, dicta corrupti dignissimos culpa soluta? Velit praesentium, ex consequatur consequuntur cumque, laboriosam esse tempora ut veritatis sit vero, cum porro pariatur quasi impedit recusandae ipsa quas asperiores. Deleniti ducimus nam quaerat minus sed, quod voluptate quidem, architecto porro beatae dolor dicta adipisci quisquam sapiente! Dignissimos, distinctio. Voluptatibus repudiandae harum at reiciendis. Ducimus accusamus maiores sint voluptate, consectetur impedit odit dignissimos delectus voluptatem iure soluta dolore doloremque ratione exercitationem eius voluptates error corrupti perferendis sapiente, autem magni animi nostrum. Incidunt ut libero atque facilis ullam molestias, dolorum sequi nisi iusto quaerat, ipsam ex magni quo, voluptatibus blanditiis eum. Nostrum modi cupiditate dolor quis porro repellat voluptas numquam voluptatibus tempora, omnis officiis hic expedita dolore accusamus dolores provident fuga! Hic repellat tempora accusantium, recusandae fugit maxime laboriosam. Dicta sequi iste veritatis harum eum, dolorum culpa laudantium quaerat dolores explicabo quos quasi deserunt nihil nisi autem?<br></p>'
			],
			[
				'judul'	=> 'letak geografis kecamatan kaidipang',
				'body'	=> '<p>Loremasdas ipsusaas dolor sisst, amet consectetur adipisicing elit. Minima itaque molestias rem mollitia illum aspernatur tempore adipisci cumque? Cumque iste sequi impedit rem sunt, harum veritatis quis possimus sit itaque ducimus voluptatem quibusdam, ipsam aperiam fuga praesentium dolor libero facilis minus obcaecati voluptatum quidem alias debitis! Maiores iusto ea reiciendis, repellat laudantium pariatur voluptate est aliquid ad soluta, sed id voluptates harum, ipsa possimus earum! Quidem mollitia corrupti omnis magnam rerum veritatis maiores atque aliquid sed eveniet et, qui ea consequuntur distinctio odio eaque. Eum aperiam ad, consequatur eligendi enim assumenda ullam deserunt exercitationem nam. Suscipit sed, hic nulla reiciendis fugiat iure ratione accusantium. Dignissimos nobis consectetur excepturi? Magnam explicabo cupiditate beatae, aliquam hic nulla, rem culpa architecto repudiandae cum eos assumenda, veniam blanditiis iure ut ipsa natus ipsam dignissimos qui suscipit. Quaerat, fuga officia? Ab delectus atque saepe officia, tenetur, earum impedit nam debitis perferendis architecto obcaecati nihil? Nesciunt, neque corrupti at quisquam obcaecati iste quidem dolore dolor non quis assumenda molestiae labore. Repudiandae unde ut ipsam atque doloribus consequatur magni, adipisci nostrum, quod corporis obcaecati sed a natus ullam non enim dolores? Reiciendis animi consectetur qui quidem. Est harum ad expedita maxime! Excepturi, id magni optio vel esse fuga temporibus. Accusamus nisi in ullam, assumenda autem quas aliquid voluptatibus libero blanditiis praesentium cumque, adipisci repudiandae inventore, optio sequi. Eos quisquam suscipit magnam optio excepturi corporis hic omnis. Esse magni at illum deleniti minus, quis dolor culpa? Dolorem expedita saepe suscipit enim officiis id aliquid ratione vero et nihil ea facere facilis iure reprehenderit est temporibus, dicta corrupti dignissimos culpa soluta? Velit praesentium, ex consequatur consequuntur cumque, laboriosam esse tempora ut veritatis sit vero, cum porro pariatur quasi impedit recusandae ipsa quas asperiores. Deleniti ducimus nam quaerat minus sed, quod voluptate quidem, architecto porro beatae dolor dicta adipisci quisquam sapiente! Dignissimos, distinctio. Voluptatibus repudiandae harum at reiciendis. Ducimus accusamus maiores sint voluptate, consectetur impedit odit dignissimos delectus voluptatem iure soluta dolore doloremque ratione exercitationem eius voluptates error corrupti perferendis sapiente, autem magni animi nostrum. Incidunt ut libero atque facilis ullam molestias, dolorum sequi nisi iusto quaerat, ipsam ex magni quo, voluptatibus blanditiis eum. Nostrum modi cupiditate dolor quis porro repellat voluptas numquam voluptatibus tempora, omnis officiis hic expedita dolore accusamus dolores provident fuga! Hic repellat tempora accusantium, recusandae fugit maxime laboriosam. Dicta sequi iste veritatis harum eum, dolorum culpa laudantium quaerat dolores explicabo quos quasi deserunt nihil nisi autem?<br></p>'
			],
			[
				'judul'	=> 'adat & budaya',
				'body'	=> '<p>Loremasdas ipsusaas dolor sisst, amet consectetur adipisicing elit. Minima itaque molestias rem mollitia illum aspernatur tempore adipisci cumque? Cumque iste sequi impedit rem sunt, harum veritatis quis possimus sit itaque ducimus voluptatem quibusdam, ipsam aperiam fuga praesentium dolor libero facilis minus obcaecati voluptatum quidem alias debitis! Maiores iusto ea reiciendis, repellat laudantium pariatur voluptate est aliquid ad soluta, sed id voluptates harum, ipsa possimus earum! Quidem mollitia corrupti omnis magnam rerum veritatis maiores atque aliquid sed eveniet et, qui ea consequuntur distinctio odio eaque. Eum aperiam ad, consequatur eligendi enim assumenda ullam deserunt exercitationem nam. Suscipit sed, hic nulla reiciendis fugiat iure ratione accusantium. Dignissimos nobis consectetur excepturi? Magnam explicabo cupiditate beatae, aliquam hic nulla, rem culpa architecto repudiandae cum eos assumenda, veniam blanditiis iure ut ipsa natus ipsam dignissimos qui suscipit. Quaerat, fuga officia? Ab delectus atque saepe officia, tenetur, earum impedit nam debitis perferendis architecto obcaecati nihil? Nesciunt, neque corrupti at quisquam obcaecati iste quidem dolore dolor non quis assumenda molestiae labore. Repudiandae unde ut ipsam atque doloribus consequatur magni, adipisci nostrum, quod corporis obcaecati sed a natus ullam non enim dolores? Reiciendis animi consectetur qui quidem. Est harum ad expedita maxime! Excepturi, id magni optio vel esse fuga temporibus. Accusamus nisi in ullam, assumenda autem quas aliquid voluptatibus libero blanditiis praesentium cumque, adipisci repudiandae inventore, optio sequi. Eos quisquam suscipit magnam optio excepturi corporis hic omnis. Esse magni at illum deleniti minus, quis dolor culpa? Dolorem expedita saepe suscipit enim officiis id aliquid ratione vero et nihil ea facere facilis iure reprehenderit est temporibus, dicta corrupti dignissimos culpa soluta? Velit praesentium, ex consequatur consequuntur cumque, laboriosam esse tempora ut veritatis sit vero, cum porro pariatur quasi impedit recusandae ipsa quas asperiores. Deleniti ducimus nam quaerat minus sed, quod voluptate quidem, architecto porro beatae dolor dicta adipisci quisquam sapiente! Dignissimos, distinctio. Voluptatibus repudiandae harum at reiciendis. Ducimus accusamus maiores sint voluptate, consectetur impedit odit dignissimos delectus voluptatem iure soluta dolore doloremque ratione exercitationem eius voluptates error corrupti perferendis sapiente, autem magni animi nostrum. Incidunt ut libero atque facilis ullam molestias, dolorum sequi nisi iusto quaerat, ipsam ex magni quo, voluptatibus blanditiis eum. Nostrum modi cupiditate dolor quis porro repellat voluptas numquam voluptatibus tempora, omnis officiis hic expedita dolore accusamus dolores provident fuga! Hic repellat tempora accusantium, recusandae fugit maxime laboriosam. Dicta sequi iste veritatis harum eum, dolorum culpa laudantium quaerat dolores explicabo quos quasi deserunt nihil nisi autem?<br></p>'
			],
			[
				'judul'	=> 'visi & misi',
				'body'	=> '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima itaque molestias rem mollitia illum aspernatur tempore adipisci cumque? Cumque iste sequi impedit rem sunt, harum veritatis quis possimus sit itaque ducimus voluptatem quibusdam, ipsam aperiam fuga praesentium dolor libero facilis minus obcaecati voluptatum quidem alias debitis! Maiores iusto ea reiciendis, repellat[|]laudantium pariatur voluptate est aliquid ad soluta, sed id voluptates harum, ipsa possimus earum! Quidem mollitia corrupti omnis magnam rerum veritatis maiores atque aliquid sed eveniet et, qui ea consequuntur distinctio odio eaque. Eum aperiam ad, consequatur eligendi enim assumenda ullam deserunt exercitationem nam. Suscipit sed, hic nulla reiciendis fugiat iure ratione accusantium. Dignissimos nobis consectetur excepturi? Magnam explicabo cupiditate beatae, aliquam hic nulla, rem culpa architecto repudiandae cum eos assumenda, veniam blanditiis iure ut ipsa natus ipsam dignissimos qui suscipit. Quaerat, fuga officia? Ab delectus atque saepe officia, tenetur, earum impedit nam debitis perferendis architecto obcaecati nihil? Nesciunt, neque corrupti at quisquam obcaecati iste quidem dolore dolor non quis assumenda molestiae labore. Repudiandae unde ut ipsam atque doloribus consequatur magni, adipisci nostrum, quod corporis obcaecati sed a natus ullam non enim dolores? Reiciendis animi consectetur qui quidem. Est harum ad expedita maxime! Excepturi, id magni optio vel esse fuga temporibus. Accusamus nisi in ullam, assumenda autem quas aliquid voluptatibus libero blanditiis praesentium cumque, adipisci repudiandae inventore, optio sequi. Eos quisquam suscipit magnam optio excepturi corporis hic omnis. Esse magni at illum deleniti minus, quis dolor culpa? Dolorem expedita saepe suscipit enim officiis id aliquid ratione vero et nihil ea facere facilis iure reprehenderit est temporibus, dicta corrupti dignissimos culpa soluta? Velit praesentium, ex consequatur consequuntur cumque, laboriosam esse tempora ut veritatis sit vero, cum porro pariatur quasi impedit recusandae ipsa quas asperiores. Deleniti ducimus nam quaerat minus sed, quod voluptate quidem, architecto porro beatae dolor dicta adipisci quisquam sapiente! Dignissimos, distinctio. Voluptatibus repudiandae harum at reiciendis. Ducimus accusamus maiores sint voluptate, consectetur impedit odit dignissimos delectus voluptatem iure soluta dolore doloremque ratione exercitationem eius voluptates error corrupti perferendis sapiente, autem magni animi nostrum. Incidunt ut libero atque facilis ullam molestias, dolorum sequi nisi iusto quaerat, ipsam ex magni quo, voluptatibus blanditiis eum. Nostrum modi cupiditate dolor quis porro repellat voluptas numquam voluptatibus tempora, omnis officiis hic expedita dolore accusamus dolores provident fuga! Hic repellat tempora accusantium, recusandae fugit maxime laboriosam. Dicta sequi iste veritatis harum eum, dolorum culpa laudantium quaerat dolores explicabo quos quasi deserunt nihil nisi autem?<br></p>'
			],
			[
				'judul'	=> 'sekilas kaidipang',
				'body'	=> '<p>Loremasdas ipsusaas dolor sisst, amet consectetur adipisicing elit. Minima itaque molestias rem mollitia illum aspernatur tempore adipisci cumque? Cumque iste sequi impedit rem sunt, harum veritatis quis possimus sit itaque ducimus voluptatem quibusdam, ipsam aperiam fuga praesentium dolor libero facilis minus obcaecati voluptatum quidem alias debitis! Maiores iusto ea reiciendis, repellat laudantium pariatur voluptate est aliquid ad soluta, sed id voluptates harum, ipsa possimus earum! Quidem mollitia corrupti omnis magnam rerum veritatis maiores atque aliquid sed eveniet et, qui ea consequuntur distinctio odio eaque. Eum aperiam ad, consequatur eligendi enim assumenda ullam deserunt exercitationem nam. Suscipit sed, hic nulla reiciendis fugiat iure ratione accusantium. Dignissimos nobis consectetur excepturi? Magnam explicabo cupiditate beatae, aliquam hic nulla, rem culpa architecto repudiandae cum eos assumenda, veniam blanditiis iure ut ipsa natus ipsam dignissimos qui suscipit. Quaerat, fuga officia? Ab delectus atque saepe officia, tenetur, earum impedit nam debitis perferendis architecto obcaecati nihil? Nesciunt, neque corrupti at quisquam obcaecati iste quidem dolore dolor non quis assumenda molestiae labore. Repudiandae unde ut ipsam atque doloribus consequatur magni, adipisci nostrum, quod corporis obcaecati sed a natus ullam non enim dolores? Reiciendis animi consectetur qui quidem. Est harum ad expedita maxime! Excepturi, id magni optio vel esse fuga temporibus. Accusamus nisi in ullam, assumenda autem quas aliquid voluptatibus libero blanditiis praesentium cumque, adipisci repudiandae inventore, optio sequi. Eos quisquam suscipit magnam optio excepturi corporis hic omnis. Esse magni at illum deleniti minus, quis dolor culpa? Dolorem expedita saepe suscipit enim officiis id aliquid ratione vero et nihil ea facere facilis iure reprehenderit est temporibus, dicta corrupti dignissimos culpa soluta? Velit praesentium, ex consequatur consequuntur cumque, laboriosam esse tempora ut veritatis sit vero, cum porro pariatur quasi impedit recusandae ipsa quas asperiores. Deleniti ducimus nam quaerat minus sed, quod voluptate quidem, architecto porro beatae dolor dicta adipisci quisquam sapiente! Dignissimos, distinctio. Voluptatibus repudiandae harum at reiciendis. Ducimus accusamus maiores sint voluptate, consectetur impedit odit dignissimos delectus voluptatem iure soluta dolore doloremque ratione exercitationem eius voluptates error corrupti perferendis sapiente, autem magni animi nostrum. Incidunt ut libero atque facilis ullam molestias, dolorum sequi nisi iusto quaerat, ipsam ex magni quo, voluptatibus blanditiis eum. Nostrum modi cupiditate dolor quis porro repellat voluptas numquam voluptatibus tempora, omnis officiis hic expedita dolore accusamus dolores provident fuga! Hic repellat tempora accusantium, recusandae fugit maxime laboriosam. Dicta sequi iste veritatis harum eum, dolorum culpa laudantium quaerat dolores explicabo quos quasi deserunt nihil nisi autem?<br></p>'
			],
		];
		$this->db->table('profil')->insertBatch($dataProfil);


		$individu = [
			[
				'id' => '1',
				'no_kk' => '987654321',
				'nik' => '7571040402950002',
				'nama' => 'muhammad nur alamsyah',
				'provinsi' => '75',
				'kab_kota' => '7571',
				'kecamatan' => '7571021',
				'kelurahan' => '7571021007',
				'dusun' => 'Dusun 1',
				'alamat' => 'Jl. Panca Wardana No.75',
				'jenis_kelamin' => 'Laki - Laki',
				'tempat_lahir' => 'Jeneponto',
				'tgl_lahir' => '04/02/1995',
				'umur' => '25 - 29',
				'status_nikah' => 'Kawin',
				'agama' => 'Islam',
				'suku' => 'Makassar',
				'kewarganegaraan' => 'WNI',
				'no_hp' => '082351381099',
				'no_wa' => '082351381099',
				'wajib_pajak' => 'Ya',
				'jumlah_pajak' => '500000',
				'keterangan' => 'Lunas',
				'email' => 'alamsyah.the99@gmail.com',
				'facebook' => 'alamsyah',
				'twitter' => '@thebright99',
				'instagram' => '@muhalamsyah',
				'created_at'	=> Time::now(),
				'updated_at'	=> Time::now(),
				'deleted_at'	=> null,
			],
			[
				'id' => '2',
				'no_kk' => '123456789',
				'nik' => '9876543210',
				'nama' => 'qwerty',
				'provinsi' => '75',
				'kab_kota' => '7571',
				'kecamatan' => '7571021',
				'kelurahan' => '7571021006',
				'dusun' => 'Dusun 1',
				'alamat' => 'Jl. Panca Wardana No.90',
				'jenis_kelamin' => 'Perempuan',
				'tempat_lahir' => 'Makassar',
				'tgl_lahir' => '04/02/1996',
				'umur' => '15 - 19',
				'status_nikah' => 'Tidak Kawin',
				'agama' => 'Kristen',
				'suku' => 'Makassar',
				'kewarganegaraan' => 'WNI',
				'no_hp' => '13131',
				'no_wa' => '2344234',
				'wajib_pajak' => 'Tidak',
				'jumlah_pajak' => '0',
				'keterangan' => 'Lunas',
				'email' => 'qqeqeqe',
				'facebook' => 'qwqwqw',
				'twitter' => '@rqrqrqr',
				'instagram' => '@muhalqrqrqamsyah',
				'created_at'	=> Time::now(),
				'updated_at'	=> Time::now(),
				'deleted_at'	=> null,
			]
		];
		// Using Query Builder
		$this->db->table('individu')->insertBatch($individu);
	}
}
