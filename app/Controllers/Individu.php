<?php namespace App\Controllers;
use App\Models\IndividuM;
class Individu extends BaseController{
    protected $individum;
    function __construct(){
        $this->individum = new IndividuM();
    }
    public function index(){
		$this->data = array('title'=>'Individu | Admin','breadcome'=>'Individu','url'=>'individu/','m_individu'=>'active','session'=>$this->session);
        
        echo view('App\Views\individu\individu_list',$this->data);
    } 
    
    public function ajax_request() {
		$list = $this->individum->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
			$row['nkk'] = $rows->nkk;
			$row['nik'] = $rows->nik;
			$row['nama'] = $rows->nama;
			$row['provinsi'] = $rows->provinsi;
			$row['kabupaten'] = $rows->kabupaten;
			$row['kecamatan'] = $rows->kecamatan;
			$row['desa'] = $rows->desa;
			$row['dusun'] = $rows->dusun;
			$row['alamat'] = $rows->alamat;
			$row['jenis_kelamin'] = $rows->jenis_kelamin;
			$row['tempat_lahir'] = $rows->tempat_lahir;
			$row['tanggal_lahir'] = $rows->tanggal_lahir;
			$row['umur'] = $rows->umur;
			$row['status_nikah'] = $rows->status_nikah;
			$row['agama'] = $rows->agama;
			$row['suku_bangsa'] = $rows->suku_bangsa;
			$row['warga_negara'] = $rows->warga_negara;
			$row['no_hp'] = $rows->no_hp;
			$row['no_wa'] = $rows->no_wa;
			$row['wajib_pajak'] = $rows->wajib_pajak;
			$row['besar_pajak'] = $rows->besar_pajak;
			$row['ket_pajak'] = $rows->ket_pajak;
			$row['email'] = $rows->email;
			$row['facebook'] = $rows->facebook;
			$row['twiteer'] = $rows->twiteer;
			$row['instagram'] = $rows->instagram;
			$data[] = $row;
        }
        $output = array(
            "total" => $this->individum->total(),
            "totalNotFiltered" => $this->individum->countAllResults(),
            "rows" => $data,
        );
        echo json_encode($output);
    }
    public function create(){
		$this->data = array('action'=>'insert','btn'=>'<i class="fas fa-save"></i> Save');
        $num_of_row = $this->request->getPost('num_of_row');
        for ($x = 1; $x <= $num_of_row; $x++){
            $data['nama'] = 'Data '.$x;
            $this->data['form_input'][] = view('App\Views\individu\form_input',$data);
        }
        $status['html']         = view('App\Views\individu\form_modal',$this->data);
        $status['modal_title']  = 'Tambah Data Individu';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function edit(){
		$id = $this->request->getPost('id');
        $this->data = array('action'=>'update','btn'=>'<i class="fas fa-edit"></i> Edit');
        foreach($id as $ids){
            $get = $this->individum->find($ids);
            $data = array(
                'nama'=>'<b>'.$get->nama.'</b>',
                'get'=>$get,
            );
            $this->data['form_input'][] = view('App\Views\individu\form_input',$data);
        }
        $status['html']         = view('App\Views\individu\form_modal',$this->data);
        $status['modal_title']  = 'Update Data Individu';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function save(){
		switch ($this->request->getPost('action')) {
        case 'insert':
            $nama = $this->request->getPost('nama');
            $data = array();
            foreach($nama as $key => $val){
                array_push($data, array(
					'nkk' => $this->request->getPost('nkk')[$key],
					'nik' => $this->request->getPost('nik')[$key],
					'nama' => $this->request->getPost('nama')[$key],
					'provinsi' => $this->request->getPost('provinsi')[$key],
					'kabupaten' => $this->request->getPost('kabupaten')[$key],
					'kecamatan' => $this->request->getPost('kecamatan')[$key],
					'desa' => $this->request->getPost('desa')[$key],
					'dusun' => $this->request->getPost('dusun')[$key],
					'alamat' => $this->request->getPost('alamat')[$key],
					'jenis_kelamin' => $this->request->getPost('jenis_kelamin')[$key],
					'tempat_lahir' => $this->request->getPost('tempat_lahir')[$key],
					'tanggal_lahir' => $this->request->getPost('tanggal_lahir')[$key],
					'umur' => $this->request->getPost('umur')[$key],
					'status_nikah' => $this->request->getPost('status_nikah')[$key],
					'agama' => $this->request->getPost('agama')[$key],
					'suku_bangsa' => $this->request->getPost('suku_bangsa')[$key],
					'warga_negara' => $this->request->getPost('warga_negara')[$key],
					'no_hp' => $this->request->getPost('no_hp')[$key],
					'no_wa' => $this->request->getPost('no_wa')[$key],
					'wajib_pajak' => $this->request->getPost('wajib_pajak')[$key],
					'besar_pajak' => $this->request->getPost('besar_pajak')[$key],
					'ket_pajak' => $this->request->getPost('ket_pajak')[$key],
					'email' => $this->request->getPost('email')[$key],
					'facebook' => $this->request->getPost('facebook')[$key],
					'twiteer' => $this->request->getPost('twiteer')[$key],
					'instagram' => $this->request->getPost('instagram')[$key],
				));
            }
            if ($this->individum->insertBatch($data)) {
                $status['type'] = 'success';
                $status['text'] = 'Data Individu Tersimpan';
            }else{
                $status['type'] = 'error';
                $status['text'] = $this->individum->errors();
            }
            echo json_encode($status);
            break;
        case 'update':
            $id = $this->request->getPost('id');
            $data = array();
            foreach($id as $key => $val){
                array_push($data, array(
                    'id'=> $val,
					'nkk' => $this->request->getPost('nkk')[$key],
					'nik' => $this->request->getPost('nik')[$key],
					'nama' => $this->request->getPost('nama')[$key],
					'provinsi' => $this->request->getPost('provinsi')[$key],
					'kabupaten' => $this->request->getPost('kabupaten')[$key],
					'kecamatan' => $this->request->getPost('kecamatan')[$key],
					'desa' => $this->request->getPost('desa')[$key],
					'dusun' => $this->request->getPost('dusun')[$key],
					'alamat' => $this->request->getPost('alamat')[$key],
					'jenis_kelamin' => $this->request->getPost('jenis_kelamin')[$key],
					'tempat_lahir' => $this->request->getPost('tempat_lahir')[$key],
					'tanggal_lahir' => $this->request->getPost('tanggal_lahir')[$key],
					'umur' => $this->request->getPost('umur')[$key],
					'status_nikah' => $this->request->getPost('status_nikah')[$key],
					'agama' => $this->request->getPost('agama')[$key],
					'suku_bangsa' => $this->request->getPost('suku_bangsa')[$key],
					'warga_negara' => $this->request->getPost('warga_negara')[$key],
					'no_hp' => $this->request->getPost('no_hp')[$key],
					'no_wa' => $this->request->getPost('no_wa')[$key],
					'wajib_pajak' => $this->request->getPost('wajib_pajak')[$key],
					'besar_pajak' => $this->request->getPost('besar_pajak')[$key],
					'ket_pajak' => $this->request->getPost('ket_pajak')[$key],
					'email' => $this->request->getPost('email')[$key],
					'facebook' => $this->request->getPost('facebook')[$key],
					'twiteer' => $this->request->getPost('twiteer')[$key],
					'instagram' => $this->request->getPost('instagram')[$key],
				));
            }
            if ($this->individum->updateBatch($data,'id')) {
                $status['type'] = 'success';
                $status['text'] = 'Data Individu Telah Di Ubah';
            }else{
                $status['type'] = 'error';
                $status['text'] = $this->individum->errors();
            }
            echo json_encode($status);
            break;
        case 'delete':
            if($this->individum->delete($this->request->getPost('id'))){
                $status['type'] = 'success';
                $status['text'] = '<strong>Deleted..!</strong>Berhasil dihapus';
            }else{
                $status['type'] = 'error';
                $status['text'] = '<strong>Oh snap!</strong> Proses hapus data gagal.';
            }
            echo json_encode($status);
            break;
        }       
    }
}

/* End of file Individu.php */
/* Location: ./app/controllers/Individu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-07 14:04:24 */
/* http://harviacode.com */