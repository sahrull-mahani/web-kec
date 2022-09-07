<?php namespace App\Models;
use CodeIgniter\Model;
class IndividuM extends Model{ 
    protected $table = 'individu';
    protected $allowedFields = array('nkk','nik','nama','provinsi','kabupaten','kecamatan','desa','dusun','alamat','jenis_kelamin','tempat_lahir','tanggal_lahir','umur','status_nikah','agama','suku_bangsa','warga_negara','no_hp','no_wa','wajib_pajak','besar_pajak','ket_pajak','email','facebook','twiteer','instagram');
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules = ['nkk' => 'required|max_length[50]',
		'nik' => 'required|max_length[50]',
		'nama' => 'required|max_length[100]',
		'provinsi' => 'required|max_length[100]',
		'kabupaten' => 'required|max_length[100]',
		'kecamatan' => 'required|max_length[100]',
		'desa' => 'required|max_length[100]',
		'dusun' => 'required|max_length[100]',
		'alamat' => 'required|max_length[150]',
		'jenis_kelamin' => 'required|max_length[10]',
		'tempat_lahir' => 'required|max_length[50]',
		'tanggal_lahir' => 'required|max_length[20]',
		'umur' => 'required|max_length[20]',
		'status_nikah' => 'required|max_length[20]',
		'agama' => 'required|max_length[20]',
		'suku_bangsa' => 'required|max_length[50]',
		'warga_negara' => 'required|max_length[50]',
		'no_hp' => 'required|max_length[20]',
		'no_wa' => 'required|max_length[20]',
		'wajib_pajak' => 'required|max_length[10]',
		'besar_pajak' => 'required|max_length[20]',
		'ket_pajak' => 'required|max_length[50]',
		'email' => 'required|max_length[50]',
		'facebook' => 'required|max_length[50]',
		'twiteer' => 'required|max_length[50]',
		'instagram' => 'required|max_length[50]',
			];

    protected $validationMessages = ['nkk' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 50 Karakter'],
		'nik' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 50 Karakter'],
		'nama' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 100 Karakter'],
		'provinsi' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 100 Karakter'],
		'kabupaten' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 100 Karakter'],
		'kecamatan' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 100 Karakter'],
		'desa' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 100 Karakter'],
		'dusun' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 100 Karakter'],
		'alamat' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 150 Karakter'],
		'jenis_kelamin' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 10 Karakter'],
		'tempat_lahir' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 50 Karakter'],
		'tanggal_lahir' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 20 Karakter'],
		'umur' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 20 Karakter'],
		'status_nikah' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 20 Karakter'],
		'agama' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 20 Karakter'],
		'suku_bangsa' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 50 Karakter'],
		'warga_negara' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 50 Karakter'],
		'no_hp' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 20 Karakter'],
		'no_wa' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 20 Karakter'],
		'wajib_pajak' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 10 Karakter'],
		'besar_pajak' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 20 Karakter'],
		'ket_pajak' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 50 Karakter'],
		'email' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 50 Karakter'],
		'facebook' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 50 Karakter'],
		'twiteer' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 50 Karakter'],
		'instagram' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 50 Karakter'],
		];
    private function _get_datatables(){
        $column_search = array('nkk','nik','nama','provinsi','kabupaten','kecamatan','desa','dusun','alamat','jenis_kelamin','tempat_lahir','tanggal_lahir','umur','status_nikah','agama','suku_bangsa','warga_negara','no_hp','no_wa','wajib_pajak','besar_pajak','ket_pajak','email','facebook','twiteer','instagram');
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
/* End of file IndividuM.php */
/* Location: ./app/models/IndividuM.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-07 14:04:24 */