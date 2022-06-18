<?php

namespace App\Models;

use CodeIgniter\Model;

class StatistikModel extends Model {
  protected $table = "statistik";
  protected $allowedFields = ['bidang', 'statistik', 'pria', 'wanita', 'jumlah'];
}