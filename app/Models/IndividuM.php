<?php

namespace App\Models;

use CodeIgniter\Model;

class IndividuM extends Model
{
	protected $table = 'individu';
	protected $allowedFields = array('user_id', 'pekerjaan_id', 'kesehatan_id', 'pendidikan_id', 'no_kk', 'nik', 'nama', 'provinsi', 'kab_kota', 'kecamatan', 'kelurahan', 'dusun', 'alamat', 'jenis_kelamin', 'tempat_lahir', 'tgl_lahir', 'umur', 'status_nikah', 'agama', 'suku', 'kewarganegaraan', 'no_hp', 'no_wa', 'wajib_pajak', 'jumlah_pajak', 'keterangan', 'email', 'facebook', 'twitter', 'instagram');
	protected $returnType     = 'object';
	protected $useSoftDeletes = false;

	protected $useTimestamps = true;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';

	// protected $validationRules = [
	// 	'no_kk' => 'required|max_length[50]',
	// 	'nik' => 'required|max_length[50]',
	// 	'nama' => 'required|max_length[100]',
	// 	'provinsi' => 'required|max_length[100]',
	// 	'kab_kota' => 'required|max_length[100]',
	// 	'kecamatan' => 'required|max_length[100]',
	// 	'kelurahan' => 'required|max_length[100]',
	// 	'dusun' => 'required|max_length[100]',
	// 	'alamat' => 'required|max_length[150]',
	// 	'jenis_kelamin' => 'required',
	// 	'tempat_lahir' => 'required|max_length[50]',
	// 	'tgl_lahir' => 'required',
	// 	'umur' => 'required',
	// 	'status_nikah' => 'required',
	// 	'agama' => 'required',
	// 	'suku' => 'required|max_length[50]',
	// 	'kewarganegaraan' => 'required',
	// 	'no_hp' => 'required|max_length[12]',
	// 	'no_wa' => 'required|max_length[12]',
	// 	'wajib_pajak' => 'required',
	// 	'jumlah_pajak' => 'required|max_length[20]',
	// 	'keterangan' => 'required',
	// 	'email' => 'required|max_length[50]',
	// 	'facebook' => 'required|max_length[50]',
	// 	'twitter' => 'required|max_length[50]',
	// 	'instagram' => 'required|max_length[50]',
	// ];

	// protected $validationMessages = [
	// 	'no_kk' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 16 Karakter'],
	// 	'nik' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 16 Karakter'],
	// 	'nama' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 100 Karakter'],
	// 	'provinsi' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 100 Karakter'],
	// 	'kab_kota' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 100 Karakter'],
	// 	'kecamatan' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 100 Karakter'],
	// 	'kelurahan' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 100 Karakter'],
	// 	'dusun' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 100 Karakter'],
	// 	'alamat' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 150 Karakter'],
	// 	'jenis_kelamin' => ['required' => 'tidak boleh kosong'],
	// 	'tempat_lahir' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 50 Karakter'],
	// 	'tgl_lahir' => ['required' => 'tidak boleh kosong'],
	// 	'umur' => ['required' => 'tidak boleh kosong'],
	// 	'status_nikah' => ['required' => 'tidak boleh kosong'],
	// 	'agama' => ['required' => 'tidak boleh kosong'],
	// 	'suku' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 50 Karakter'],
	// 	'kewarganegaraan' => ['required' => 'tidak boleh kosong'],
	// 	'no_hp' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 12 Karakter'],
	// 	'no_wa' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 12 Karakter'],
	// 	'wajib_pajak' => ['required' => 'tidak boleh kosong'],
	// 	'jumlah_pajak' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 20 Karakter'],
	// 	'keterangan' => ['required' => 'tidak boleh kosong'],
	// 	'email' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 50 Karakter'],
	// 	'facebook' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 50 Karakter'],
	// 	'twitter' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 50 Karakter'],
	// 	'instagram' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 50 Karakter'],
	// ];
	private function _get_datatables()
	{
		$column_search = array('no_kk', 'nik', 'nama', 'provinsi', 'kab_kota', 'kecamatan', 'kelurahan', 'dusun', 'alamat', 'jenis_kelamin', 'tempat_lahir', 'tgl_lahir', 'umur', 'status_nikah', 'agama', 'suku', 'kewarganegaraan', 'no_hp', 'no_wa', 'wajib_pajak', 'jumlah_pajak', 'keterangan', 'email', 'facebook', 'twitter', 'instagram');
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
		// $this->select('individu.*, nama');
		//  $this->whereNotIn('id_kejadian',)
		// $this->join('pekerjaan', 'pekerjaan.individu_id=individu.id');
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
/* End of file IndividuM.php */
/* Location: ./app/models/IndividuM.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-07 14:04:24 */