<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
  protected $table = "berita";
  protected $useTimestamps = true;
  protected $allowedFields = ['level', 'judul', 'slug', 'excerpt', 'isi_berita', 'gambar', 'id_user', 'published_at'];
  protected $primarykey = 'id';
  protected $returnType = 'object';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  public function set_counter($id_berita, $ip_address, $user_agent)
  {
    $data = [
      'id_berita'   => $id_berita,
      'ip_address'  => $ip_address,
      'user_agent'  => $user_agent
    ];
    if (count($this->db->table('berita_view')->getWhere(['id_berita' => $id_berita,'ip_address' => $ip_address, 'user_agent' => $user_agent])->getResultArray()) == 0) {
      $this->db->table('berita_view')->insert($data);
    }
  }

  public function get_counter()
  {
    return $this->db->query("SELECT b.id,bv.id_berita,judul,slug,gambar, COUNT(*) total FROM `berita_view` bv INNER JOIN `berita` b ON bv.id_berita = b.id GROUP BY id_berita ORDER BY total DESC LIMIT 3")->getResult();
  }
}