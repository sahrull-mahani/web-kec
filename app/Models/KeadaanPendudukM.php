<?php

namespace App\Models;

use CodeIgniter\Model;

class KeadaanPendudukM extends Model
{
  protected $table = "keadaanpenduduk";
  protected $allowedFields = ['id_dusun','individu_id'];
  protected $primarykey = 'id';
  protected $returnType = 'object';
  protected $useSoftDeletes = false;

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  private function _get_datatables()
  {
    $column_search = array('dusun', 'no_kk', 'nik', 'nama', 'pekerjaan', 'penyakit');
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
    if(!is_admin()){
      $this->joinKeadaanPenduduk()->where('id_desa', session('id_desa'));
    }else{
      $this->joinKeadaanPenduduk();
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

  public function joinKeadaanPenduduk(){
    $this->select('keadaanpenduduk.*, nama_dusun,no_kk,nik,nama,pekerjaan,muntaber_diare,hepatitis_e,jantung,demam_berdarah,difteri,tbc_paru,campak,chikungunya,kanker,malaria,leptospirosis,diabetes,fluburung_sars,kolera,lumpuh,covid_19,gizi_buruk,hepatitis_b,lainnya');
    $this->join('individu', 'individu.id=keadaanpenduduk.individu_id');
    $this->join('dusun', 'dusun.id=individu.id_dusun');
    return $this->join('kesehatan', 'kesehatan.id=individu.kesehatan_id');
  }

}
