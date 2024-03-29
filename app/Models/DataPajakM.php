<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPajakM extends Model
{
  protected $table = "datapajak";
  protected $allowedFields = ['id_desa', 'individu_id', 'no_kk', 'nik', 'nama', 'alamat_pajak', 'wajib_pajak', 'jumlah_pajak', 'keterangan', 'alamat'];
  protected $primarykey = 'id';
  protected $returnType = 'object';

  protected $useSoftDeletes = false;

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';
  private function _get_datatables($filter_desa, $start, $end)
  {
    $column_search = array('nik', 'nama', 'wajib_pajak', 'jumlah_pajak', 'keterangan', 'alamat');
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
        $this->joinIndividuDesa();
      } else {
        $this->joinIndividuDesa()->where('id_desa', $filter_desa)->where('datapajak.created_at BETWEEN "' . date('Y-m-d', $start) . '" and "' . date('Y-m-d', $end) . '"');
      }
    } else {
      $this->joinIndividuDesa()->where('id_desa', session('id_desa'));
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
  public function joinIndividuDesa()
  {
    $this->select('datapajak.*, desa.*,individu.nama as individu_nama,wajib_pajak,jumlah_pajak,keterangan,individu.alamat as individu_alamat, individu.nik as individu_nik');
    $this->join('individu', 'individu.id=datapajak.individu_id', 'left');
    return $this->join('desa', 'desa.id=datapajak.id_desa');
  }
}