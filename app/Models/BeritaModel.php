<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
  protected $table = "berita";
  protected $allowedFields = ['level', 'judul', 'slug', 'isi_berita', 'id_user', 'status'];
  protected $primarykey = 'id';
  protected $returnType = 'object';

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  protected $validationRules = [
    'level' => 'required|max_length[1]',
    'judul' => 'required|max_length[255]',
    'slug' => 'required|max_length[255]',
    'isi_berita' => 'required|max_length[65535]',
    'id_user' => 'required|max_length[1]',
  ];

  protected $validationMessages = [
    'level' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal  Karakter'],
    'judul' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 255 Karakter'],
    'slug' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 255 Karakter'],
    'isi_berita' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 65535 Karakter'],
    'id_user' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal  Karakter'],
  ];
  private function _get_datatables()
  {
    $column_search = array('level', 'judul', 'slug', 'excerpt', 'isi_berita', 'gambar', 'id_user', 'published_at');
    $i = 0;
    foreach ($column_search as $item) { // loop column 
      if ($_GET['search']) {
        if ($i === 0) {
          $this->groupStart();
          $this->like($item, $_GET['search']);
        } else {
          $this->orLike($item, $_GET['search']);
        }
        if (count($column_search) - 1 == $i)
          $this->groupEnd();
      }
      $i++;
    }
    if (isset($_GET['order'])) {
      $this->orderBy($_GET['sort'], $_GET['order']);
    } else {
      $this->orderBy('id', 'asc');
    }
    $this->select('berita.*, u.nama_user, g.sumber');
    $this->join('users u', 'u.id=berita.id_user');
    $this->join('galeri g', 'g.id_sumber=berita.id');
    $this->groupBy('id_sumber');
  }
  public function get_datatables()
  {
    $this->_get_datatables();
    $limit = isset($_GET['limit']) ? $_GET['limit'] : 0;
    $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
    return $this->findAll($limit, $offset);
  }
  public function total()
  {
    $this->_get_datatables();
    if ($this->tempUseSoftDeletes) {
      $this->where($this->table . '.' . $this->deletedField, null);
    }
    return $this->get()->getNumRows();
  }

  public function set_counter($id_berita, $ip_address, $user_agent)
  {
    $data = [
      'id_berita'   => $id_berita,
      'ip_address'  => $ip_address,
      'user_agent'  => $user_agent
    ];
    if (count($this->db->table('berita_view')->getWhere(['id_berita' => $id_berita, 'ip_address' => $ip_address, 'user_agent' => $user_agent])->getResultArray()) == 0) {
      $this->db->table('berita_view')->insert($data);
    }
  }

  public function get_counter()
  {
    return $this->db->query("SELECT b.id,bv.id_berita,judul,slug,gambar, COUNT(*) total FROM `berita_view` bv INNER JOIN `berita` b ON bv.id_berita = b.id GROUP BY id_berita ORDER BY total DESC LIMIT 3")->getResult();
  }
}
