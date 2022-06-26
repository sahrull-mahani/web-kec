<?php

namespace App\Controllers;

use App\Models\AgendaM;
use CodeIgniter\I18n\Time;

class Agenda extends BaseController
{
    protected $agendam;
    function __construct()
    {
        $this->agendam = new AgendaM();
    }
    public function index()
    {
        $this->data = array('title' => 'Agenda | Admin', 'breadcome' => 'Agenda', 'url' => 'agenda/', 'm_agenda' => 'active', 'session' => $this->session);

        echo view('App\Views\agenda\agenda_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->agendam->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['judul'] = $rows->judul;
            $row['isi_agenda'] = strip_tags(substr($rows->isi_agenda, 0, 50)).'...';
            $row['lokasi'] = $rows->lokasi;
            $row['id_user'] = $rows->nama_user;
            $row['published_at'] = $rows->published_at != null ? '<b class="text-info">Sudah Tayang</b>' : '<b class="text-dark">Belum Tayang</b>';
            $data[] = $row;
        }
        $output = array(
            "total" => $this->agendam->total(),
            "totalNotFiltered" => $this->agendam->countAllResults(),
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
            $this->data['form_input'][] = view('App\Views\agenda\form_input', $data);
        }
        $status['html']         = view('App\Views\agenda\form_modal', $this->data);
        $status['modal_title']  = 'Tambah Data Agenda';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function edit()
    {
        $id = $this->request->getPost('id');
        $detail = $this->request->getPost('detail');
        $this->data = array('action' => 'update', 'btn' => '<i class="fas fa-edit"></i> Edit', 'detail'=>$detail);
        foreach ($id as $ids) {
            $get = $this->agendam->find($ids);
            $data = array(
                'nama' => '<b>' . $get->judul . '</b>',
                'get' => $get,
            );
            $this->data['form_input'][] = view('App\Views\agenda\form_input', $data);
        }
        $status['html']         = view('App\Views\agenda\form_modal', $this->data);
        $status['modal_title']  = 'Update Data Agenda';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function detail()
    {
        $id = $this->request->getPost('id');
        $this->data = array('action' => 'publish', 'btn' => '<i class="fas fa-edit"></i> Publish');
        foreach ($id as $ids) {
            $get = $this->agendam->find($ids);
            $data = array(
                'nama' => '<b>' . $get->judul . '</b>',
                'get' => $get,
            );
            $this->data['form_input'][] = view('App\Views\agenda\detail-agenda', $data);
        }
        $status['html']         = view('App\Views\agenda\form_modal', $this->data);
        $status['modal_title']  = 'Details Agenda';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function save()
    {
        switch ($this->request->getPost('action')) {
            case 'insert':
                $nama = $this->request->getPost('id');
                $data = array();
                foreach ($nama as $key => $val) {
                    $judul = $this->request->getPost('judul')[$key];
                    array_push($data, array(
                        'judul' => $judul,
                        'slug' => strtolower(str_replace(' ', '-', $judul)),
                        'isi_agenda' => $this->request->getPost('isi_agenda')[$key],
                        'lokasi' => $this->request->getPost('lokasi')[$key],
                        'id_user' => session('user_id'),
                        'published_at' => null,
                    ));
                }
                if ($this->agendam->insertBatch($data)) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Agenda Tersimpan';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->agendam->errors();
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                $data = array();
                foreach ($id as $key => $val) {
                    $judul = $this->request->getPost('judul')[$key];
                    array_push($data, array(
                        'id' => $val,
                        'judul' => $judul,
                        'slug' => strtolower(str_replace(' ', '-', $judul)),
                        'isi_agenda' => $this->request->getPost('isi_agenda')[$key],
                        'lokasi' => $this->request->getPost('lokasi')[$key],
                    ));
                }
                if ($this->agendam->updateBatch($data, 'id')) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Agenda Telah Di Ubah';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->agendam->errors();
                }
                echo json_encode($status);
                break;
            case 'publish':
                $id = $this->request->getPost('id');
                $data = array();
                foreach ($id as $val) {
                    array_push($data, array(
                        'id' => $val,
                        'published_at' => Time::now()
                    ));
                }
                if ($this->agendam->updateBatch($data, 'id')) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Agenda Telah Di Publish';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->agendam->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                if ($this->agendam->delete($this->request->getPost('id'))) {
                    $status['type'] = 'success';
                    $status['text'] = '<strong>Deleted..!</strong>Berhasil dihapus';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = '<strong>Oh snap!</strong> Proses hapus data gagal.';
                }
                echo json_encode($status);
                break;
        }
    }
}

/* End of file Agenda.php */
/* Location: ./app/controllers/Agenda.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-26 05:12:23 */
/* http://harviacode.com */