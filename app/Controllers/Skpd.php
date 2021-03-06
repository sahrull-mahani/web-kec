<?php namespace App\Controllers;
use App\Models\SkpdM;
class Skpd extends BaseController{
    protected $skpdm;
    function __construct(){
        $this->skpdm = new SkpdM();
    }
    public function index(){
		$this->data = array('title'=>'Skpd | Admin','breadcome'=>'Skpd','url'=>'skpd/','m_skpd'=>'active','session'=>$this->session);
        
        echo view('App\Views\skpd\skpd_list',$this->data);
    } 
    
    public function ajax_request() {
		$list = $this->skpdm->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
			$row['kode'] = $rows->kode;
			$row['nama'] = $rows->nama;
			$row['alias'] = $rows->alias;
			$data[] = $row;
        }
        $output = array(
            "total" => $this->skpdm->total(),
            "totalNotFiltered" => $this->skpdm->countAllResults(),
            "rows" => $data,
        );
        echo json_encode($output);
    }
    public function create(){
		$this->data = array('action'=>'insert','btn'=>'<i class="fas fa-save"></i> Save');
        $num_of_row = $this->request->getPost('num_of_row');
        for ($x = 1; $x <= $num_of_row; $x++){
            $data['nama'] = 'Data '.$x;
            $this->data['form_input'][] = view('App\Views\skpd\form_input',$data);
        }
        $status['html']         = view('App\Views\skpd\form_modal',$this->data);
        $status['modal_title']  = 'Tambah Data Skpd';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function edit(){
		$id = $this->request->getPost('id');
        $this->data = array('action'=>'update','btn'=>'<i class="fas fa-edit"></i> Edit');
        foreach($id as $ids){
            $get = $this->skpdm->find($ids);
            $data = array(
                'nama'=>'<b>'.$get->nama.'</b>',
                'get'=>$get,
            );
            $this->data['form_input'][] = view('App\Views\skpd\form_input',$data);
        }
        $status['html']         = view('App\Views\skpd\form_modal',$this->data);
        $status['modal_title']  = 'Update Data Skpd';
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
					'kode' => $this->request->getPost('kode')[$key],
					'nama' => $this->request->getPost('nama')[$key],
					'alias' => $this->request->getPost('alias')[$key],
				));
            }
            if ($this->skpdm->insertBatch($data)) {
                $status['type'] = 'success';
                $status['text'] = 'Data Skpd Tersimpan';
            }else{
                $status['type'] = 'error';
                $status['text'] = $this->skpdm->errors();
            }
            echo json_encode($status);
            break;
        case 'update':
            $id = $this->request->getPost('id');
            $data = array();
            foreach($id as $key => $val){
                array_push($data, array(
                    'id'=> $val,
					'kode' => $this->request->getPost('kode')[$key],
					'nama' => $this->request->getPost('nama')[$key],
					'alias' => $this->request->getPost('alias')[$key],
				));
            }
            if ($this->skpdm->updateBatch($data,'id')) {
                $status['type'] = 'success';
                $status['text'] = 'Data Skpd Telah Di Ubah';
            }else{
                $status['type'] = 'error';
                $status['text'] = $this->skpdm->errors();
            }
            echo json_encode($status);
            break;
        case 'delete':
            if($this->skpdm->delete($this->request->getPost('id'))){
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

/* End of file Skpd.php */
/* Location: ./app/controllers/Skpd.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-05-30 08:08:50 */
/* http://harviacode.com */