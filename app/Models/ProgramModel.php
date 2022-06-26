<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgramModel extends Model
{
  protected $table = "program";
  protected $allowedFields = ['judul', 'isi_program', 'gambar', 'published_at'];
  protected $primarykey = 'id';
  protected $returnType = 'object';
  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  protected $validationRules = [
    'judul' => 'required|max_length[255]',
    'isi_program' => 'required|max_length[65535]',
  ];

  protected $validationMessages = [
    'judul' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 255 Karakter'],
    'isi_program' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 65535 Karakter'],
  ];
  private function _get_datatables()
  {
    $column_search = array('judul', 'isi_program');
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
    if (!is_admin()) {
      $this->where('published_at', null);
    }
    $this->select('program.*, u.nama_user, g.sumber');
    $this->join('galeri g', 'g.id_sumber=program.id');
    $this->join('users u', 'u.id=g.id_user');
    $this->like('g.sumber', 'program_');
    $this->groupBy('id_sumber');
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

  public function joinGaleriGroupByIdSumber()
  {
    return $this->join('galeri g', "program.id=g.id_sumber")->groupBy("id_sumber")->like('sumber', "program_");
  }
}
