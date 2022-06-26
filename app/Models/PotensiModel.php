<?php

namespace App\Models;

use CodeIgniter\Model;

class PotensiModel extends Model
{
  protected $table = "potensi";
  protected $allowedFields = ['bidang', 'judul', 'isi_potensi'];
  protected $primarykey = 'id';
  protected $returnType = 'object';

  protected $validationRules = [
    'bidang' => 'required',
    'judul' => 'required|max_length[100]',
    'isi_potensi' => 'required',
  ];

  protected $validationMessages = [
    'bidang' => ['required' => 'tidak boleh kosong'],
    'judul' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 100 Karakter'],
    'isi_potensi' => ['required' => 'tidak boleh kosong'],
  ];
  private function _get_datatables()
  {
    $column_search = array('bidang', 'judul', 'isi_potensi');
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
    $this->select('potensi.*, g.sumber, u.nama_user');
    $this->join('galeri g', 'g.id_sumber=potensi.id');
    $this->join('users u', 'u.id=g.id_user');
    $this->like('g.sumber', 'potensi_');
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
}
