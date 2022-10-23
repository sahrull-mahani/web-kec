<?php

namespace App\Models;

use CodeIgniter\Model;

class DusunM extends Model
{
    protected $table = 'dusun';
    protected $allowedFields = array('nama_dusun','id_desa');
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

private function _get_datatables(){
    $column_search = array('nama_dusun');
    $i = 0;
    foreach ($column_search as $item){ // loop column 
        if($_GET['search']){
            if($i===0){
                $this->groupStart(); 
                $this->like($item,$_GET['search']);
            }else{
                $this->orLike($item, $_GET['search']);
            }
            if(count($column_search) - 1 == $i)
                $this->groupEnd();
        }
        $i++;
    }
    if(isset($_GET['order'])){
        $this->orderBy($_GET['sort'], $_GET['order']);
    }else{
        $this->orderBy('id', 'asc');
    }
}
public function get_datatables(){
    $this->_get_datatables();
    $limit = isset($_GET['limit']) ? $_GET['limit'] : 0;
    $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
    return $this->findAll($limit,$offset);
}
public function total(){
    $this->_get_datatables();
    if ($this->tempUseSoftDeletes) {
        $this->where($this->table . '.' . $this->deletedField, null);
    }
    return $this->get()->getNumRows();
}

}
