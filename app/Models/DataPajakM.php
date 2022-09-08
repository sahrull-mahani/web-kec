<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPajakM extends Model
{
  protected $table = "datapajak";
  protected $allowedFields = ['no_kk', 'nik', 'nama', 'alamat', 'wajib_pajak', 'jumlah', 'keterangan'];
  protected $primarykey = 'id';
  protected $returnType = 'object';

  protected $validationRules = [
    'no_kk' => 'required|max_length[16]',
    'nik' => 'required|max_length[16]',
    'nama' => 'required|max_length[150]',
    'alamat' => 'required|max_length[500]',
    'wajib_pajak' => 'required',
    'jumlah' => 'required|max_length[100]',
    'keterangan' => 'required',
  ];

  protected $validationMessages = [
    'no_kk' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 16 Digit'],
    'nik' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 16 Digit'],
    'nama' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 150 Karakter'],
    'alamat' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 150 Karakter'],
    'wajib_pajak' => ['required' => 'tidak boleh kosong'],
    'jumlah' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 100 Digit'],
    'keterangan' => ['required' => 'tidak boleh kosong'],
  ];
  private function _get_datatables()
  {
    $column_search = array('nama', 'wajib_pajak', 'jumlah', 'keterangan', 'alamat');
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
