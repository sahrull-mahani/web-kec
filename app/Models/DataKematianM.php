<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKematianM extends Model
{
  protected $table = "datakematian";
  protected $allowedFields = ['nama', 'jenis_kelamin', 'tgl_kematian', 'jam_kematian', 'tempat_kematian', 'tgl_kubur', 'jam_kubur', 'tempat_kubur', 'alamat'];
  protected $primarykey = 'id';
  protected $returnType = 'object';

  protected $validationRules = [
    'nama' => 'required|max_length[150]',
    'jenis_kelamin' => 'required',
    'tgl_kematian' => 'required',
    'jam_kematian' => 'required',
    'tempat_kematian' => 'required|max_length[150]',
    'tgl_kubur' => 'required',
    'jam_kubur' => 'required',
    'tempat_kubur' => 'required|max_length[150]',
    'alamat' => 'required|max_length[150]',
  ];

  protected $validationMessages = [
    'nama' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 150 Karakter'],
    'jenis_kelamin' => ['required' => 'tidak boleh kosong'],
    'tgl_kematian' => ['required' => 'tidak boleh kosong'],
    'jam+kematian' => ['required' => 'tidak boleh kosong'],
    'tempat_kematian' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 150 Karakter'],
    'tgl_kubur' => ['required' => 'tidak boleh kosong'],
    'jam_kubur' => ['required' => 'tidak boleh kosong'],
    'tempat_kubur' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 150 Karakter'],
    'alamat' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 150 Karakter'],
  ];
  private function _get_datatables()
  {
    $column_search = array('nama', 'jenis_kelamin', 'tgl_kematian', 'jam_kematian', 'tempat_kematian');
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
