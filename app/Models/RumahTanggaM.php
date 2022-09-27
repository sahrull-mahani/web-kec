<?php

namespace App\Models;

use CodeIgniter\Model;

class RumahTanggaM extends Model
{
  protected $table = "rumahtangga";
  protected $allowedFields = ['individu_id', 'rt_rw', 'no_telp', 'tempat_tinggal', 'status_lahan', 'luas_lantai', 'luas_lahan', 'jenis_lantai', 'dinding', 'jendela', 'atap', 'penerangan', 'energi', 'sumber_kayubakar', 'tps', 'mck', 'sumber_airmandi', 'fasilitas_bab', 'sumber_airminum', 'tempat_plc', 'tower', 'rumah_sungai', 'rumah_bukit', 'kondisi_rumah', 'akses_pendidikan', 'jarak_pendidikan', 'waktu_pendidikan', 'kemudahan_pendidikan', 'akses_kesehatan', 'jarak_kesehatan', 'waktu_kesehatan', 'kemudahan_kesehatan', 'akses_transportasi', 'jenis_transportasi', 'penggunaan_transportasi', 'waktu_tempuh', 'biaya', 'kemudahan_transportasi', 'blt', 'pkh', 'banst', 'banpres', 'banumkm', 'buk', 'bpa', 'lainnya'];
  protected $primarykey = 'id';
  protected $returnType = 'object';

  // protected $validationRules = [
  //   'individu_id' => 'required|max_length[11]',
  //   'rt_rw' => 'required|max_length[150]',
  //   'no_telp' => 'required|max_length[16]',
  //   'tempat_tinggal' => 'required',
  //   'status_tempat' => 'required',
  //   'luas_lantai' => 'required|max_length[11]',
  //   'luas_lahan' => 'required|max_length[11]',
  //   'jenis_lantai' => 'required',
  //   'dinding' => 'required',
  //   'jendela' => 'required',
  //   'atap' => 'required',
  //   'penerangan' => 'required',
  //   'energi' => 'required',
  //   'sumber_kayubakar' => 'required',
  //   'tps' => 'required',
  //   'mck' => 'required',
  //   'sumber_airmandi' => 'required',
  //   'fasilitas_bab' => 'required',
  //   'sumber_airminum' => 'required',
  //   'tempat_plc' => 'required',
  //   'tower' => 'required',
  //   'rumah_sungai' => 'required',
  //   'rumah_bukit' => 'required',
  //   'kondisi_rumah' => 'required',
  //   'akses_pendidikan' => 'required',
  //   'jarak_pendidikan' => 'required|max_length[11]',
  //   'waktu_pendidikan' => 'required|max_length[11]',
  //   'kemudahan_pendidikan' => 'required',
  //   'akses_kesehatan' => 'required',
  //   'jarak_kesehatan' => 'required|max_length[11]',
  //   'waktu_kesehatan' => 'required|max_length[11]',
  //   'kemudahan_kesehatan' => 'required',
  //   'akses_nakes' => 'required',
  //   'jarak_nakes' => 'required|max_length[11]',
  //   'waktu_nakes' => 'required|max_length[11]',
  //   'kemudahan_nakes' => 'required',
  //   'akses_transportasi' => 'required',
  //   'jenis_transportasi' => 'required',
  //   'penggunaan_transportasi' => 'required',
  //   'waktu_tempuh' => 'required|max_length[11]',
  //   'biaya' => 'required|max_length[100]',
  //   'kemudahan_transportasi' => 'required',
  //   'blt' => 'required',
  //   'pkh' => 'required',
  //   'banst' => 'required',
  //   'banpres' => 'required',
  //   'banumkm' => 'required',
  //   'buk' => 'required',
  //   'bpa' => 'required',
  //   'lainnya' => 'required',
  // ];

  // protected $validationMessages = [
  //   'individu_id' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Digit'],
  //   'rt_rw' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 150 Karakter'],
  //   'no_telp' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 16 Karakter'],
  //   'tempat_tinggal' => ['required' => 'tidak boleh kosong'],
  //   'status_tempat' => ['required' => 'tidak boleh kosong'],
  //   'luas_lantai' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Digit'],
  //   'luas_lahan' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Digit'],
  //   'jenis_lantai' => ['required' => 'tidak boleh kosong'],
  //   'dinding' => ['required' => 'tidak boleh kosong'],
  //   'jendela' => ['required' => 'tidak boleh kosong'],
  //   'atap' => ['required' => 'tidak boleh kosong'],
  //   'penerangan' => ['required' => 'tidak boleh kosong'],
  //   'energi' => ['required' => 'tidak boleh kosong'],
  //   'sumber_kayubakar' => ['required' => 'tidak boleh kosong'],
  //   'tps' => ['required' => 'tidak boleh kosong'],
  //   'mck' => ['required' => 'tidak boleh kosong'],
  //   'sumber_airmandi' => ['required' => 'tidak boleh kosong'],
  //   'fasilitas_bab' => ['required' => 'tidak boleh kosong'],
  //   'sumber_airminum' => ['required' => 'tidak boleh kosong'],
  //   'tempat_plc' => ['required' => 'tidak boleh kosong'],
  //   'tower' => ['required' => 'tidak boleh kosong'],
  //   'rumah_sungai' => ['required' => 'tidak boleh kosong'],
  //   'rumah_bukit' => ['required' => 'tidak boleh kosong'],
  //   'kondisi_rumah' => ['required' => 'tidak boleh kosong'],
  //   'akses_pendidikan' => ['required' => 'tidak boleh kosong'],
  //   'jarak_pendidikan' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Digit'],
  //   'waktu_pendidikan' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Digit'],
  //   'kemudahan_pendidikan' => ['required' => 'tidak boleh kosong'],
  //   'akses_kesehatan' => ['required' => 'tidak boleh kosong'],
  //   'jarak_kesehatan' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Digit'],
  //   'waktu_kesehatan' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Digit'],
  //   'kemudahan_kesehatan' => ['required' => 'tidak boleh kosong'],
  //   'akses_nakes' => ['required' => 'tidak boleh kosong'],
  //   'jarak_nakes' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Digit'],
  //   'waktu_nakes' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Digit'],
  //   'kemudahan_nakes' => ['required' => 'tidak boleh kosong'],
  //   'akses_transportasi' => ['required' => 'tidak boleh kosong'],
  //   'jenis_transportasi' => ['required' => 'tidak boleh kosong'],
  //   'penggunaan_transportasi' => ['required' => 'tidak boleh kosong'],
  //   'waktu_tempuh' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Digit'],
  //   'biaya' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 100 Digit'],
  //   'kemudahan_transportasi' => ['required' => 'tidak boleh kosong'],
  //   'blt' => ['required' => 'tidak boleh kosong'],
  //   'pkh' => ['required' => 'tidak boleh kosong'],
  //   'banst' => ['required' => 'tidak boleh kosong'],
  //   'banpres' => ['required' => 'tidak boleh kosong'],
  //   'banumkm' => ['required' => 'tidak boleh kosong'],
  //   'buk' => ['required' => 'tidak boleh kosong'],
  //   'bpa' => ['required' => 'tidak boleh kosong'],
  //   'lainnya' => ['required' => 'tidak boleh kosong'],
  // ];
  private function _get_datatables()
  {
    $column_search = array('nama', 'alamat', 'no_hp');
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
    $this->select('rumahtangga.*, nama,alamat,no_hp');
    // $this->whereNotIn('id_kejadian',)
    $this->join('individu', 'individu.id=rumahtangga.individu_id');
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
