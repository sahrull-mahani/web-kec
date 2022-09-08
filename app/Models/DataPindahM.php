<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPindahM extends Model
{
  protected $table = "datapindah";
  protected $allowedFields = ['nama', 'status', 'jenis_kelamin', 'tgl_pindah', 'alamat_pindah', 'keterangan'];
  protected $primarykey = 'id';
  protected $returnType = 'object';

  protected $validationRules = [
    'nama' => 'required|max_length[150]',
    'status' => 'required|max_length[150]',
    'jenis_kelamin' => 'required',
    'tgl_pindah' => 'required',
    'alamat_pindah' => 'required|max_length[150]',
    'keterangan' => 'required|max_length[500]',
  ];

  protected $validationMessages = [
    'nama' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 150 Karakter'],
    'status' => ['required' => 'tidak boleh kosong'],
    'jenis_kelamin' => ['required' => 'tidak boleh kosong'],
    'tgl_pindah' => ['required' => 'tidak boleh kosong'],
    'alamat_pindah' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 150 Karakter'],
    'keterangan' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 500 Karakter'],
  ];
  private function _get_datatables()
  {
    $column_search = array('nama', 'status', 'jenis_kelamin', 'tgl_pindah', 'alamat_pindah');
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
