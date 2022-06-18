<?php

namespace App\Controllers;

use App\Models\VideoM;

class Video extends BaseController
{
    protected $videom;
    function __construct()
    {
        $this->videom = new VideoM();
    }
    public function index()
    {
        $this->data = array('title' => 'Video | Admin', 'breadcome' => 'Video', 'url' => 'video/', 'm_video' => 'active', 'session' => $this->session);

        echo view('App\Views\video\video_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->videom->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['users_id'] = ucwords($rows->nama_user);
            $row['judul'] = $rows->judul;
            $row['deskripsi'] = substr(strip_tags($rows->deskripsi), 0, 100).'...';
            $row['status'] = $rows->status==1 ? '<div class="text-center"><i class="fa fa-check text-success"></i> Tayang</div>' : '<div class="text-center"><i class="fa fa-times text-danger"></i> Tidak Tayang</div>';
            $row['link'] = '<iframe width="300" height="170" src="https://www.youtube.com/embed/' . $rows->link . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
            $data[] = $row;
        }
        $output = array(
            "total" => $this->videom->total(),
            "totalNotFiltered" => $this->videom->countAllResults(),
            "rows" => $data,
        );
        echo json_encode($output);
    }
    public function create()
    {
        $this->data = array('action' => 'insert', 'btn' => '<i class="fas fa-save"></i> Save');
        $num_of_row = $this->request->getPost('num_of_row');
        for ($x = 1; $x <= $num_of_row; $x++) {
            $data['nama'] = 'Data ' . $x;
            $this->data['form_input'][] = view('App\Views\video\form_input', $data);
        }
        $status['html']         = view('App\Views\video\form_modal', $this->data);
        $status['modal_title']  = 'Tambah Data Video';
        $status['modal_size']   = 'modal-xl';
        echo json_encode($status);
    }
    public function edit()
    {
        $id = $this->request->getPost('id');
        $this->data = array('action' => 'update', 'btn' => '<i class="fas fa-edit"></i> Edit');
        foreach ($id as $ids) {
            $get = $this->videom->find($ids);
            $data = array(
                'nama' => "<b> $get->judul </b>",
                'get' => $get,
            );
            $this->data['form_input'][] = view('App\Views\video\form_input', $data);
        }
        $status['html']         = view('App\Views\video\form_modal', $this->data);
        $status['modal_title']  = 'Update Data Video';
        $status['modal_size']   = 'modal-xl';
        echo json_encode($status);
    }
    public function save()
    {
        switch ($this->request->getPost('action')) {
            case 'insert':
                $nama = $this->request->getPost('id');
                $data = array();
                foreach ($nama as $key => $val) {
                    $link = $this->request->getPost('link')[$key];
                    if (preg_match("/watch/i", $link)) {
                        $link = explode('?v=', $link);
                    }else if (preg_match("/youtu.be/i", $link)){
                        $link = explode('/', $link);
                    }else{
                        break;
                    }
                    array_push($data, array(
                        'users_id' => session('user_id'),
                        'judul' => $this->request->getPost('judul')[$key],
                        'deskripsi' => $this->request->getPost('deskripsi')[$key],
                        'status' => 0,
                        'link' => end($link),
                    ));
                }
                if ($data == null) {
                    $status['type'] = 'error';
                    $status['text'] = ['Link'=>'Pastikan anda memasukan link youtube yang benar'];
                }else {
                    if ($this->videom->insertBatch($data)) {
                        $status['type'] = 'success';
                        $status['text'] = 'Data Video Tersimpan';
                    } else {
                        $status['type'] = 'error';
                        $status['text'] = $this->videom->errors();
                    }
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                $data = array();
                foreach ($id as $key => $val) {
                    $link = explode('/', $this->request->getPost('link')[$key]);
                    array_push($data, array(
                        'id' => $val,
                        'judul' => $this->request->getPost('judul')[$key],
                        'deskripsi' => $this->request->getPost('deskripsi')[$key],
                        'link' => end($link),
                    ));
                }
                if ($this->videom->updateBatch($data, 'id')) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Video Telah Di Ubah';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->videom->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                if ($this->videom->delete($this->request->getPost('id'))) {
                    $status['type'] = 'success';
                    $status['text'] = '<strong>Deleted..!</strong>Berhasil dihapus';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = '<strong>Oh snap!</strong> Proses hapus data gagal.';
                }
                echo json_encode($status);
                break;
            case 'publish':
                $id = $this->request->getPost('id');
                $data = [];
                foreach ($id as $key => $val) {
                    $get = $this->videom->find($val);
                    $status = $get->status == 1 ? 0 : 1;
                    array_push($data, array(
                        'id' => $val,
                        'status' => $status
                    ));
                }
                if ($this->videom->updateBatch($data, 'id')) {
                    $status = [
                        'type' => 'success',
                        'text' => 'Data Video Telah Di Publish'
                    ];
                } else {
                    $status = [
                        'type' => 'error',
                        'text' => $this->videom->errors()
                    ];
                }
                echo json_encode($status);
                break;
        }
    }
}

/* End of file Video.php */
/* Location: ./app/controllers/Video.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-07 08:34:26 */
/* http://harviacode.com */