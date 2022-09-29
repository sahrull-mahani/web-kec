<?php

namespace App\Models;

use CodeIgniter\Model;

class PekerjaanM extends Model
{
    protected $table = "pekerjaan";
    protected $allowedFields = [
        'kondisi_pekerjaan',
        'pekerjaan',
        'jamsos',
        'sumber_penghasilan',
        'jumlah',
        'satuan',
        'penghasilan',
        'ekspor'
    ];
    protected $primarykey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // protected $validationRules = [
    //     'kondisi_pekerjaan' => 'required',
    //     'pekerjaan' => 'required',
    //     'jamsos' => 'required',
    //     'sumber_penghasilan' => 'required',
    //     'jumlah' => 'required',
    //     'satuan' => 'required',
    //     'penghasilan' => 'required',
    //     'ekspor' => 'required',
    // ];

    // protected $validationMessages = [
    //     'kondisi_pekerjaan' => ['required' => 'tidak boleh kosong'],
    //     'pekerjaan' => ['required' => 'tidak boleh kosong'],
    //     'jamsos' => ['required' => 'tidak boleh kosong'],
    //     'sumber_penghasilan' => ['required' => 'tidak boleh kosong'],
    //     'jumlah' => ['required' => 'tidak boleh kosong'],
    //     'satuan' => ['required' => 'tidak boleh kosong'],
    //     'penghasilan' => ['required' => 'tidak boleh kosong'],
    //     'ekspor' => ['required' => 'tidak boleh kosong'],
    // ];
    private function _get_datatables()
    {
        $column_search = array('kondisi_pekerjaan', 'pekerjaan', 'jamsos', 'sumber_penghasilan');
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
