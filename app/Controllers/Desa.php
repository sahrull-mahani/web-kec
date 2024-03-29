<?php namespace App\Controllers;
use App\Models\DesaM;
class Desa extends BaseController{
    protected $desam;
    function __construct(){
        $this->desam = new DesaM();
    }
    public function index(){
		$this->data = array('title'=>'Desa | Admin','breadcome'=>'Desa','url'=>'desa/','m_desa'=>'active','session'=>$this->session);
        
        echo view('App\Views\desa\desa_list',$this->data);
    } 
    
    public function ajax_request() {
		$list = $this->desam->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
			$row['nama_desa'] = $rows->nama_desa;
			$row['kepala_desa'] = $rows->kepala_desa;
			$data[] = $row;
        }
        $output = array(
            "total" => $this->desam->total(),
            "totalNotFiltered" => $this->desam->countAllResults(),
            "rows" => $data,
        );
        echo json_encode($output);
    }
    public function create(){
		$this->data = array('action'=>'insert','btn'=>'<i class="fas fa-save"></i> Save');
        $num_of_row = $this->request->getPost('num_of_row');
        for ($x = 1; $x <= $num_of_row; $x++){
            $data['nama'] = 'Data '.$x;
            $this->data['form_input'][] = view('App\Views\desa\form_input',$data);
        }
        $status['html']         = view('App\Views\desa\form_modal',$this->data);
        $status['modal_title']  = 'Tambah Data Desa';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function edit(){
		$id = $this->request->getPost('id');
        $this->data = array('action'=>'update','btn'=>'<i class="fas fa-edit"></i> Edit');
        // foreach($id as $ids){
            $get = $this->desam->find($id);
            $data = array(
                'nama'=>'<b>'.$get->nama_desa.'</b>',
                'get'=>$get,
            );
            $this->data['form_input'][] = view('App\Views\desa\form_input',$data);
        // }
        $status['html']         = view('App\Views\desa\form_modal',$this->data);
        $status['modal_title']  = 'Update Data Desa';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function save(){
		switch ($this->request->getPost('action')) {
        case 'insert':
            $id = $this->request->getPost('id');
            $data = array();
            foreach($id as $key => $val){
                array_push($data, array(
					'nama_desa' => $this->request->getPost('nama_desa')[$key],
					'kepala_desa' => $this->request->getPost('kepala_desa')[$key],
				));
            }
            if ($this->desam->insertBatch($data)) {
                $status['type'] = 'success';
                $status['text'] = 'Data Desa Tersimpan';
            }else{
                $status['type'] = 'error';
                $status['text'] = $this->desam->errors();
            }
            echo json_encode($status);
            break;
        case 'update':
            $id = $this->request->getPost('id');
            $data = array();
            foreach($id as $key => $val){
                array_push($data, array(
                    'id'=> $val,
					'nama_desa' => $this->request->getPost('nama_desa')[$key],
					'kepala_desa' => $this->request->getPost('kepala_desa')[$key],
				));
            }
            if ($this->desam->updateBatch($data,'id')) {
                $status['type'] = 'success';
                $status['text'] = 'Data Desa Telah Di Ubah';
            }else{
                $status['type'] = 'error';
                $status['text'] = $this->desam->errors();
            }
            echo json_encode($status);
            break;
        case 'delete':
            if($this->desam->delete($this->request->getPost('id'))){
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

/* End of file Desa.php */
/* Location: ./app/controllers/Desa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-23 09:37:53 */
/* http://harviacode.com */