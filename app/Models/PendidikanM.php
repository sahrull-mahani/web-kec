<?php

namespace App\Models;

use CodeIgniter\Model;

class PendidikanM extends Model
{
    protected $table = "pendidikan";
    protected $allowedFields = [
        'individu_id',
        'pendidikan',
        'bahasa_lokal',
        'bahasa_formal',
        'kerja_bakti',
        'siskamling',
        'pesta_rakyat',
        'pertolongan_kematian',
        'pertolongan_sakit',
        'pertolongan_kecelakaan'
    ];
    protected $primarykey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules = [
        'individu_id' => 'required',
        'pendidikan' => 'required',
        'bahasa_lokal' => 'required',
        'bahasa_formal' => 'required',
        'kerja_bakti' => 'required',
        'siskamling' => 'required',
        'pesta_rakyat' => 'required',
        'pertolongan_kematian' => 'required',
        'pertolongan_sakit' => 'required',
        'pertolongan_kecelakaan' => 'required'
    ];

    protected $validationMessages = [
        'individu_id' => ['required' => 'tidak boleh kosong'],
        'pendidikan' => ['required' => 'tidak boleh kosong'],
        'bahasa_lokal' => ['required' => 'tidak boleh kosong'],
        'bahasa_formal' => ['required' => 'tidak boleh kosong'],
        'kerja_bakti' => ['required' => 'tidak boleh kosong'],
        'siskamling' => ['required' => 'tidak boleh kosong'],
        'pesta_rakyat' => ['required' => 'tidak boleh kosong'],
        'pertolongan_kematian' => ['required' => 'tidak boleh kosong'],
        'pertolongan_sakit' => ['required' => 'tidak boleh kosong'],
        'pertolongan_kecelakaan' => ['required' => 'tidak boleh kosong'],
    ];
    private function _get_datatables()
    {
        $column_search = array('pendidikan', 'bahasa_lokal', 'bahasa_formal');
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
