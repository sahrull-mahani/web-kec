<?php

namespace App\Models;

use CodeIgniter\Model;

class PariwisataModel extends Model
{
  protected $table = "pariwisata";
  protected $allowedFields = ['nama', 'published_at'];
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
    $column_search = array('nama', 'gambar');
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
    $this->select('pariwisata.*, g.sumber');
    $this->join('galeri g', 'g.id_sumber=pariwisata.id');
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
    return $this->join('galeri g', "pariwisata.id=g.id_sumber")->groupBy("id_sumber")->like('sumber', "pariwisata_");
  }

  public function joinGaleriGroupById()
  {
    return $this->select('*, pariwisata.id idP')->join('galeri g', 'pariwisata.id=g.id_sumber')->groupBy('idP');
  }
}
