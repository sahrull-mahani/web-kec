<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaViewModel extends Model
{
  protected $table = "berita_view";
  protected $useTimestamps = true;
  protected $allowedFields = ['id_berita', 'ip_address', 'user_agent'];
  protected $primarykey = 'id';
  protected $returnType = 'object';

  public function set_counter($id_berita, $ip_address, $user_agent)
  {
    $data = [
      'id_berita'   => $id_berita,
      'ip_address'  => $ip_address,
      'user_agent'  => $user_agent
    ];
    if (count($this->where(['id_berita' => $id_berita,'ip_address' => $ip_address, 'user_agent' => $user_agent])->findAll()) == 0) {
      $this->insert($data);
    }
  }

  public function get_counter()
  {
    return $this->select('b.id, berita_view.id_berita,judul,slug,gambar')->selectCount('*')->join('berita b', 'berita_view.id_berita=b.id')->groupBy('id_berita')->orderBy('total', 'DESC')->findAll(3);
    // return $this->db->query("SELECT b.id,bv.id_berita,judul,slug,gambar, COUNT(*) total FROM `berita_view` bv INNER JOIN `berita` b ON bv.id_berita = b.id GROUP BY id_berita ORDER BY total DESC LIMIT 3")->getResult();
  }
}