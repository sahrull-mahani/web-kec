<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKematianM extends Model
{
  protected $table = "datakematian";
  protected $allowedFields = ['id_desa', 'individu_id', 'tgl_kematian', 'jam_kematian', 'tempat_kematian', 'tgl_kubur', 'jam_kubur', 'tempat_kubur', 'alamat_kubur'];
  protected $primarykey = 'id';
  protected $returnType = 'object';

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

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
  private function _get_datatables($filter_desa, $start, $end)
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
    if (is_admin()) {
      if ($filter_desa == "") {
        $this->joinIndividu();
      } else {
        $this->joinIndividu()->where('id_desa', $filter_desa)->where('datakematian.created_at BETWEEN "' . date('Y-m-d', $start) . '" and "' . date('Y-m-d', $end) . '"');
      }
    } else {
      $this->joinIndividu()->where('id_desa', session('id_desa'));
    }
  }
  public function get_datatables()
  {
    // $this->_get_datatables();
    $limit = isset($_GET['limit']) ? $_GET['limit'] : 0;
    $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
    $filter_desa = $_GET['filter_desa'] != '' ? $_GET['filter_desa'] : null;
    $start = isset($_GET['start']) ? $_GET['start'] : 0;
    $end = isset($_GET['end']) ? $_GET['end'] : 0;
    $this->_get_datatables($filter_desa, strtotime($start), strtotime($end));
    return $this->findAll($limit, $offset);
  }
  public function total()
  {
    $this->_get_datatables($_GET['filter_desa'], strtotime($_GET['start']), strtotime($_GET['end']));
    if ($this->tempUseSoftDeletes) {
      $this->where($this->table . '.' . $this->deletedField, null);
    }
    return $this->get()->getNumRows();
  }

  public function joinIndividu()
  {
    $this->select('datakematian.*, nama,jenis_kelamin');
    return $this->join('individu', 'individu.id=datakematian.individu_id');
  }
}