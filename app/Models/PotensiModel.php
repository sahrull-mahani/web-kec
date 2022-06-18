<?php

namespace App\Models;

use CodeIgniter\Model;

class PotensiModel extends Model
{
  protected $table = "potensi";
  protected $allowedFields = ['level', 'judul', 'isi_potensi'];
  protected $primarykey = 'id';
  protected $returnType = 'object';
}
