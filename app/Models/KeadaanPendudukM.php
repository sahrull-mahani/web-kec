<?php

namespace App\Models;

use CodeIgniter\Model;

class KeadaanPendudukM extends Model
{
  protected $table = "keadaanpenduduk";
  protected $allowedFields = ['dusun', 'no_kk', 'nik', 'nama', 'pekerjaan', 'muntaber_diare', 'hepatitis_e', 'jantung', 'demam_berdarah', 'difteri', 'tbc_paru', 'campak', 'cikungunya', 'kanker', 'malaria', 'leptospirosis', 'diabetes', 'fluburung_sars', 'kolera', 'lumpuh', 'covid_19', 'gizi_buruk', 'lainnya', 'hepatitis_b'];
  protected $primarykey = 'id';
  protected $returnType = 'object';

  protected $validationRules = [
    'dusun' => 'required|max_length[150]',
    'no_kk' => 'required|max_length[16]',
    'nik' => 'required|max_length[16]',
    'nama' => 'required|max_length[150]',
    'pekerjaan' => 'required',
    'muntaber_diare' => 'required',
    'hepatitis_e' => 'required',
    'jantung' => 'required',
    'demam_berdarah' => 'required',
    'difteri' => 'required',
    'tbc_paru' => 'required',
    'campak' => 'required',
    'cikungunya' => 'required',
    'kanker' => 'required',
    'malaria' => 'required',
    'leptospirosis' => 'required',
    'diabetes' => 'required',
    'fluburung_sars' => 'required',
    'kolera' => 'required',
    'lumpuh' => 'required',
    'covid_19' => 'required',
    'gizi_buruk' => 'required',
    'lainnya' => 'required',
    'hepatitis_b' => 'required',
  ];

  protected $validationMessages = [
    'dusun' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 150 Karakter'],
    'no_kk' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 16 Digit'],
    'nik' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 16 Digit'],
    'nama' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 150 Karakter'],
    'pekerjaan' => ['required' => 'tidak boleh kosong'],
    'muntaber_diare' => ['required' => 'tidak boleh kosong'],
    'hepatitis_e' => ['required' => 'tidak boleh kosong'],
    'jantung' => ['required' => 'tidak boleh kosong'],
    'demam_berdarah' => ['required' => 'tidak boleh kosong'],
    'difteri' => ['required' => 'tidak boleh kosong'],
    'tbc_paru' => ['required' => 'tidak boleh kosong'],
    'campak' => ['required' => 'tidak boleh kosong'],
    'cikungunya' => ['required' => 'tidak boleh kosong'],
    'kanker' => ['required' => 'tidak boleh kosong'],
    'malaria' => ['required' => 'tidak boleh kosong'],
    'leptospirosis' => ['required' => 'tidak boleh kosong'],
    'diabetes' => ['required' => 'tidak boleh kosong'],
    'fluburung_sars' => ['required' => 'tidak boleh kosong'],
    'kolera' => ['required' => 'tidak boleh kosong'],
    'lumpuh' => ['required' => 'tidak boleh kosong'],
    'covid_19' => ['required' => 'tidak boleh kosong'],
    'gizi_buruk' => ['required' => 'tidak boleh kosong'],
    'lainnya' => ['required' => 'tidak boleh kosong'],
    'hepatitis_b' => ['required' => 'tidak boleh kosong'],
  ];
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
