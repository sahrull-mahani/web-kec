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

  public function joinGaleriGroupByIdSumber()
  {
    return $this->join('galeri g', "program.id=g.id_sumber")->groupBy("id_sumber")->like('sumber', "program_");
  }
}
