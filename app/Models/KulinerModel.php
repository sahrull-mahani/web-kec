<?php

namespace App\Models;

use CodeIgniter\Model;

class KulinerModel extends Model
{
  protected $table = "kuliner";
  protected $allowedFields = ['nama', 'keterangan', 'published_at'];
  protected $primarykey = 'id';
  protected $returnType = 'object';

  protected $validationRules = [
    'nama' => 'required|max_length[150]',
  ];

  protected $validationMessages = [
    'nama' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 150 Karakter'],
  ];
  private function _get_datatables()
  {
    $column_search = array('nama', 'keterangan');
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
    if (!is_admin()) {
      $this->where('published_at', null);
    }
    $this->select('kuliner.*, g.sumber');
    $this->join('galeri g', 'g.id_sumber=kuliner.id');
    $this->like('g.sumber', 'kuliner_');
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

  public function joinGaleriGroupByIdSumber()
  {
    return $this->join('galeri g', "kuliner.id=g.id_sumber")->groupBy("id_sumber")->like('sumber', "kuliner_");
  }

  public function joinGaleriGroupById()
  {
    return $this->select('*, kuliner.id idP')->join('galeri g', 'kuliner.id=g.id_sumber')->groupBy('idP');
  }
}
