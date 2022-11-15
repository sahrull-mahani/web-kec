<?php

namespace App\Models;

use CodeIgniter\Model;

class JumlahPendudukM extends Model
{
  protected $table = "jumlahpenduduk";
  protected $allowedFields = ['id_dusun', 'dusun', 'jumlah_jiwa', 'jumlah_kk', 'umur', 'jumlah_pria', 'jumlah_wanita', 'jumlah', 'agama_islam', 'agama_kristen', 'agama_katolik', 'agama_hindu', 'agama_budha', 'keterangan'];
  protected $primarykey = 'id';
  protected $returnType = 'object';
  protected $useSoftDeletes = false;

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  protected $validationRules = [
    // 'dusun' => 'required|max_length[150]',
    'jumlah_jiwa' => 'required|max_length[11]',
    'jumlah_kk' => 'required|max_length[11]',
    'umur' => 'required',
    'jumlah_pria' => 'required|max_length[11]',
    'jumlah_wanita' => 'required|max_length[11]',
    'jumlah' => 'required|max_length[11]',
    'agama_islam' => 'required|max_length[11]',
    'agama_kristen' => 'required|max_length[11]',
    'agama_katolik' => 'required|max_length[11]',
    'agama_hindu' => 'required|max_length[11]',
    'agama_budha' => 'required|max_length[11]',
    'keterangan' => 'required',
  ];

  protected $validationMessages = [
    // 'dusun' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Digit'],
    'jumlah_jiwa' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Digit'],
    'jumlah_kk' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Digit'],
    'umur' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Digit'],
    'jumlah_pria' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Digit'],
    'jumlah_wanita' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Digit'],
    'jumlah' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Digit'],
    'agama_islam' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Digit'],
    'agama_kristen' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Digit'],
    'agama_katolik' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Digit'],
    'agama_hindu' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Digit'],
    'agama_budha' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Digit'],
    'keterangan' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 1000 Karakter'],
  ];
  private function _get_datatables($filter_desa, $start, $end)
  {
    $column_search = array('jumlah_jiwa', 'jumlah_kk', 'keterangan');
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
      if ($filter_desa != '') {
        $this->joinDusunDesa()->where('id_desa', $filter_desa)->where('jumlahpenduduk.created_at BETWEEN "' . date('Y-m-d', $start) . '" and "' . date('Y-m-d', $end) . '"');
      } else {
        $this->joinDusunDesa();
      }
    } else {
      $this->joinDusunDesa()->where('id_desa', session('id_desa'));
    }
  }
  public function get_datatables()
  {
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

  public function joinDusunDesa()
  {
    $this->select('jumlahpenduduk.id as jp_id,jumlah_jiwa,jumlah_kk,keterangan,dusun.*, desa.*');
    $this->join('dusun', 'dusun.id=jumlahpenduduk.id_dusun');
    return $this->join('desa', 'desa.id=dusun.id_desa');
  }
}