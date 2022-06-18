<?php

namespace App\Models;

use CodeIgniter\Model;

class PariwisataModel extends Model
{
  protected $table = "pariwisata";
  protected $allowedFields = ['nama', 'gambar', 'published_at'];
  protected $primarykey = 'id';
  protected $returnType = 'object';
  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  public function joinGaleriGroupByIdSumber()
  {
    return $this->join('galeri g', "pariwisata.id=g.id_sumber")->groupBy("id_sumber")->like('sumber', "pariwisata_");
  }
}
