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
				'first_name'              => 'Admin',
				'last_name'               => 'istrator',
				'company'                 => 'ADMIN',
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



        // $pariwisata = [];
        // for ($i = 1; $i <= 10; $i++) {
        //     $judul = "ini pariwisata " . sprintf('%02d', $i);
        //     array_push($pariwisata, [
        //         'nama'       => $judul,
        //         'gambar'    => 'default.jpg',
        //         'published_at' => Time::now(),
        //     ]);

        // }
        // // Using Query Builder
        // $this->db->table('pariwisata')->insertBatch($pariwisata);



        $berita = [];
        for ($i = 1; $i <= 10; $i++) {
            $judul = "ini berita " . sprintf('%02d', $i);
            $isi = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit dolores totam quis est ipsa tempora nobis officia beatae earum fuga dolorum quaerat necessitatibus numquam praesentium maxime, accusamus aliquam quos id ipsam, architecto, dolore assumenda incidunt quas. Veniam natus maiores officiis quisquam nihil pariatur libero, impedit ex nobis odit hic, quaerat eius rem. Sunt quam odio illum adipisci, ab, quidem veniam corrupti, tenetur doloribus possimus maiores nisi totam? Quos placeat vero recusandae, aspernatur sed magni animi. Delectus voluptatibus aliquid, modi explicabo corrupti obcaecati harum iusto aut nesciunt necessitatibus totam rerum quod? Omnis quibusdam, hic reiciendis officia dolor enim voluptas. Sunt, ab repudiandae iste tempora aperiam, eius esse voluptates id iure molestiae alias ipsum eum, cumque pariatur libero eaque animi omnis debitis! Perspiciatis nihil eius suscipit similique atque magnam, numquam iste? Ea consequuntur quo dicta id ratione exercitationem expedita molestias modi, sint reprehenderit repudiandae nesciunt soluta nihil quibusdam harum, aut eveniet maxime saepe, unde est. A ea harum eius beatae possimus optio vel, laudantium labore eum dignissimos accusamus aliquid commodi repellat. Alias nobis dicta ab id neque laboriosam ex explicabo rem illum totam cumque commodi nisi, et culpa, non dolore nemo quidem aliquam corrupti qui consequatur animi sed dolores odit. Explicabo eos nihil hic quo ea modi porro illum esse atque asperiores perspiciatis officia similique dolor a, repudiandae autem ipsam facere deserunt maiores error, adipisci accusantium laboriosam. Delectus, quisquam. Repudiandae reiciendis, nam consectetur eveniet fugit quis facilis beatae debitis, corporis tenetur dolorem non dignissimos minima porro error. Hic molestias accusantium ad quos dicta quia necessitatibus natus quo illum omnis inventore expedita officiis at error, amet maiores adipisci temporibus ducimus! Blanditiis ipsam explicabo ratione, quibusdam reiciendis nemo at ad sapiente voluptatibus labore laborum ea, eaque et culpa praesentium eum. Possimus aut, cumque nam repellat voluptatum ad doloribus laudantium, eius repellendus ab sapiente iure?";
            array_push($berita, [
                'judul'       => $judul,
                'level'       => rand(1,3),
                'slug'        => str_replace(" ", "-", $judul),
                'excerpt'     => substr($isi, 100),
                'isi_berita'  => $isi,
                'gambar'   => 'default.png',
                'id_user'   => 1,
                'published_at' => Time::now(),
                'created_at'  => Time::now(),
                'updated_at'  => Time::now()
            ]);

        }
        // Using Query Builder
        $this->db->table('berita')->insertBatch($berita);



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
