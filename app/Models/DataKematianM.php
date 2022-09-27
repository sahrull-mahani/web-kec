<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKematianM extends Model
{
  protected $table = "datakematian";
  protected $allowedFields = ['user_id', 'individu_id', 'tgl_kematian', 'jam_kematian', 'tempat_kematian', 'tgl_kubur', 'jam_kubur', 'tempat_kubur', 'alamat_kubur'];
  protected $primarykey = 'id';
  protected $returnType = 'object';

  protected $validationRules = [
    'tgl_kematian' => 'required',
    'jam_kematian' => 'required',
    'tempat_kematian' => 'required|max_length[150]',
    'tgl_kubur' => 'required',
    'jam_kubur' => 'required',
    'tempat_kubur' => 'required|max_length[150]',
    'alamat_kubur' => 'required|max_length[150]',
  ];

  protected $validationMessages = [
    'tgl_kematian' => ['required' => 'tidak boleh kosong'],
    'jam_kematian' => ['required' => 'tidak boleh kosong'],
    'tempat_kematian' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 150 Karakter'],
    'tgl_kubur' => ['required' => 'tidak boleh kosong'],
    'jam_kubur' => ['required' => 'tidak boleh kosong'],
    'tempat_kubur' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 150 Karakter'],
    'alamat_kubur' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 150 Karakter'],
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
    $this->select('datakematian.*, nama,jenis_kelamin');
    $this->join('individu', 'individu.id=datakematian.individu_id');
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
