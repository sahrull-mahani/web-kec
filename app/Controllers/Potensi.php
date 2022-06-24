<?php

namespace App\Controllers;

use App\Models\PotensiM;

class Potensi extends BaseController
{
    protected $potensim;
    function __construct()
    {
        $this->potensim = new PotensiM();
    }
    public function index()
    {
        $this->data = array('title' => 'Potensi | Admin', 'breadcome' => 'Potensi', 'url' => 'potensi/', 'm_potensi' => 'active', 'session' => $this->session);

        echo view('App\Views\potensi\potensi_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->potensim->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['bidang'] = $rows->bidang;
            $row['judul'] = $rows->judul;
            $row['isi_potensi'] = $rows->isi_potensi;
            $data[] = $row;
        }
        $output = array(
            "total" => $this->potensim->total(),
            "totalNotFiltered" => $this->potensim->countAllResults(),
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
            $this->data['form_input'][] = view('App\Views\potensi\form_input', $data);
        }
        $status['html']         = view('App\Views\potensi\form_modal', $this->data);
        $status['modal_title']  = 'Tambah Data Potensi';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function edit()
    {
        $id = $this->request->getPost('id');
        $this->data = array('action' => 'update', 'btn' => '<i class="fas fa-edit"></i> Edit');
        foreach ($id as $ids) {
            $get = $this->potensim->find($ids);
            $data = array(
                'nama' => '<b>' . $get->nama . '</b>',
                'get' => $get,
            );
            $this->data['form_input'][] = view('App\Views\potensi\form_input', $data);
        }
        $status['html']         = view('App\Views\potensi\form_modal', $this->data);
        $status['modal_title']  = 'Update Data Potensi';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function save()
    {
        switch ($this->request->getPost('action')) {
            case 'insert':
                $nama = $this->request->getPost('nama');
                $data = array();
                foreach ($nama as $key => $val) {
                    array_push($data, array(
                        'bidang' => $this->request->getPost('bidang')[$key],
                        'judul' => $this->request->getPost('judul')[$key],
                        'isi_potensi' => $this->request->getPost('isi_potensi')[$key],
                    ));
                }
                if ($this->potensim->insertBatch($data)) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Potensi Tersimpan';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->potensim->errors();
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                $data = array();
                foreach ($id as $key => $val) {
                    array_push($data, array(
                        'id' => $val,
                        'bidang' => $this->request->getPost('bidang')[$key],
                        'judul' => $this->request->getPost('judul')[$key],
                        'isi_potensi' => $this->request->getPost('isi_potensi')[$key],
                    ));
                }
                if ($this->potensim->updateBatch($data, 'id')) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Potensi Telah Di Ubah';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->potensim->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                if ($this->potensim->delete($this->request->getPost('id'))) {
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

/* End of file Potensi.php */
/* Location: ./app/controllers/Potensi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-24 04:45:25 */
/* http://harviacode.com */