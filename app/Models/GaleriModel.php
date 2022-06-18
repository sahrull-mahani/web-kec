<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriModel extends Model
{
  protected $table = "galeri";
  protected $allowedFields = ['id_sumber', 'sumber', 'id_user'];
  protected $primarykey = 'id';
  protected $returnType = 'object';
}
