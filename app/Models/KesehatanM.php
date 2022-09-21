<?php

namespace App\Models;

use CodeIgniter\Model;

class KesehatanM extends Model
{
    protected $table = "kesehatan";
    protected $allowedFields = [
        'individu_id',
        'bpjs_kes',
        'muntaber_diare',
        'hepatitis_e',
        'jantung',
        'demam_berdarah',
        'difteri',
        'tbc_paru',
        'campak',
        'chikungunya',
        'kanker',
        'malaria',
        'leptospirosis',
        'diabetes',
        'fluburung_sars',
        'kolera',
        'lumpuh',
        'covid_19',
        'gizi_buruk',
        'hepatitis_b',
        'lainnya',
        'rs',
        'praktik_bidan',
        'rs_bersalin',
        'poskesdes',
        'puskesmas_inap',
        'polindes',
        'puskesmas_tanpainap',
        'apotik',
        'pustu',
        'toko_obat',
        'poliklinik',
        'posyandu',
        'praktik_dokter',
        'posbindu',
        'rumah_bersalin',
        'praktik_dukun',
        'tunanetra',
        'tunarungu',
        'tunawicara',
        'tunarungu_wicara',
        'tunadaksa',
        'tunagrahita',
        'tunalaras',
        'eks_kusta',
        'cacat_ganda',
        'pasung'
    ];
    protected $primarykey = 'id';
    protected $returnType = 'object';

    protected $validationRules = [
        'bpjs_kes' => 'required',
        'muntaber_diare' => 'required',
        'hepatitis_e' => 'required',
        'jantung' => 'required',
        'demam_berdarah' => 'required',
        'difteri' => 'required',
        'tbc_paru' => 'required',
        'campak' => 'required',
        'chikungunya' => 'required',
        'kanker' => 'required',
        'malaria' => 'required',
        'leptospirosis' => 'required',
        'diabetes' => 'required',
        'fluburung_sars' => 'required',
        'kolera' => 'required',
        'lumpuh' => 'required',
        'covid_19' => 'required',
        'gizi_buruk' => 'required',
        'hepatitis_b' => 'required',
        'lainnya' => 'required',
        'rs' => 'required|max_length[11]',
        'praktik_bidan' => 'required|max_length[11]',
        'rs_bersalin' => 'required|max_length[11]',
        'poskesdes' => 'required|max_length[11]',
        'puskesmas_inap' => 'required|max_length[11]',
        'polindes' => 'required|max_length[11]',
        'puskesmas_tanpainap' => 'required|max_length[11]',
        'apotik' => 'required|max_length[11]',
        'pustu' => 'required|max_length[11]',
        'toko_obat' => 'required|max_length[11]',
        'poliklinik' => 'required|max_length[11]',
        'posyandu' => 'required|max_length[11]',
        'praktik_dokter' => 'required|max_length[11]',
        'posbindu' => 'required|max_length[11]',
        'rumah_bersalin' => 'required|max_length[11]',
        'praktik_dukun' => 'required|max_length[11]',
        'tunanetra' => 'required',
        'tunarungu' => 'required',
        'tunawicara' => 'required',
        'tunarungu_wicara' => 'required',
        'tunadaksa' => 'required',
        'tunagrahita' => 'required',
        'tunalaras' => 'required',
        'eks_kusta' => 'required',
        'cacat_ganda' => 'required',
        'pasung' => 'required'
    ];

    protected $validationMessages = [
        'bpjs_kes' => ['required' => 'tidak boleh kosong'],
        'muntaber_diare' => ['required' => 'tidak boleh kosong'],
        'hepatitis_e' => ['required' => 'tidak boleh kosong'],
        'jantung' => ['required' => 'tidak boleh kosong'],
        'demam_berdarah' => ['required' => 'tidak boleh kosong'],
        'difteri' => ['required' => 'tidak boleh kosong'],
        'tbc_paru' => ['required' => 'tidak boleh kosong'],
        'campak' => ['required' => 'tidak boleh kosong'],
        'chikungunya' => ['required' => 'tidak boleh kosong'],
        'kanker' => ['required' => 'tidak boleh kosong'],
        'malaria' => ['required' => 'tidak boleh kosong'],
        'leptospirosis' => ['required' => 'tidak boleh kosong'],
        'diabetes' => ['required' => 'tidak boleh kosong'],
        'fluburung_sars' => ['required' => 'tidak boleh kosong'],
        'kolera' => ['required' => 'tidak boleh kosong'],
        'lumpuh' => ['required' => 'tidak boleh kosong'],
        'covid_19' => ['required' => 'tidak boleh kosong'],
        'gizi_buruk' => ['required' => 'tidak boleh kosong'],
        'hepatitis_b' => ['required' => 'tidak boleh kosong'],
        'lainnya' => ['required' => 'tidak boleh kosong'],
        'rs' => ['required' => 'tidak boleh kosong', 'max_length', 'Maximal 11 Digit'],
        'praktik_bidan' => ['required' => 'tidak boleh kosong', 'max_length', 'Maximal 11 Digit'],
        'rs_bersalin' => ['required' => 'tidak boleh kosong', 'max_length', 'Maximal 11 Digit'],
        'poskesdes' => ['required' => 'tidak boleh kosong', 'max_length', 'Maximal 11 Digit'],
        'puskesmas_inap' => ['required' => 'tidak boleh kosong', 'max_length', 'Maximal 11 Digit'],
        'polindes' => ['required' => 'tidak boleh kosong', 'max_length', 'Maximal 11 Digit'],
        'puskesmas_tanpainap' => ['required' => 'tidak boleh kosong', 'max_length', 'Maximal 11 Digit'],
        'apotik' => ['required' => 'tidak boleh kosong', 'max_length', 'Maximal 11 Digit'],
        'pustu' => ['required' => 'tidak boleh kosong', 'max_length', 'Maximal 11 Digit'],
        'toko_obat' => ['required' => 'tidak boleh kosong', 'max_length', 'Maximal 11 Digit'],
        'poliklinik' => ['required' => 'tidak boleh kosong', 'max_length', 'Maximal 11 Digit'],
        'posyandu' => ['required' => 'tidak boleh kosong', 'max_length', 'Maximal 11 Digit'],
        'praktik_dokter' => ['required' => 'tidak boleh kosong', 'max_length', 'Maximal 11 Digit'],
        'posbindu' => ['required' => 'tidak boleh kosong', 'max_length', 'Maximal 11 Digit'],
        'rumah_bersalin' => ['required' => 'tidak boleh kosong', 'max_length', 'Maximal 11 Digit'],
        'praktik_dukun' => ['required' => 'tidak boleh kosong', 'max_length', 'Maximal 11 Digit'],
        'tunanetra' => 'required',
        'tunarungu' => 'required',
        'tunawicara' => 'required',
        'tunarungu_wicara' => 'required',
        'tunadaksa' => 'required',
        'tunagrahita' => 'required',
        'tunalaras' => 'required',
        'eks_kusta' => 'required',
        'cacat_ganda' => 'required',
        'pasung' => 'required'
    ];
    private function _get_datatables()
    {
        $column_search = array('no_kk', 'nik', 'nama', 'jenis_kelamin', 'no_hp');
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
