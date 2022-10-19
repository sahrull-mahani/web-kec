<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPajakM extends Model
{
  protected $table = "datapajak";
  protected $allowedFields = ['id_desa', 'individu_id','wajib_pajak','jumlah_pajak','keterangan'];
  protected $primarykey = 'id';
  protected $returnType = 'object';

  protected $useSoftDeletes = false;

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';
  private function _get_datatables()
  {
    $column_search = array('nama', 'wajib_pajak', 'jumlah_pajak', 'keterangan', 'alamat');
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
    $this->select('datapajak.*, nama,wajib_pajak,jumlah_pajak,keterangan,alamat');
    $this->join('individu', 'individu.id=datapajak.individu_id');
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
