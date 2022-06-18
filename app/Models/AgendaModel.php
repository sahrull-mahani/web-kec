<?php

namespace App\Models;

use CodeIgniter\Model;

class AgendaModel extends Model
{
  protected $table = "agenda";
  protected $allowedFields = ['judul', 'slug', 'isi_agenda', 'lokasi', 'id_user', 'published_at'];
  protected $primarykey = 'id';
  protected $returnType = 'object';
  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
}
