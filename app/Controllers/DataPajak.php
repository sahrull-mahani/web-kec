<?php

namespace App\Controllers;

use App\Models\DataPajakM;
use CodeIgniter\I18n\Time;

class DataPajak extends BaseController
{
    function __construct()
    {
        $this->datapajakm = new DataPajakM();
        helper('number');
    }
    public function index()
    {
        $this->data = array('title' => 'Data Pajak | Admin', 'breadcome' => 'Data Pajak', 'url' => 'datapajak/', 'm_open_datapajak' => 'menu-open', 'mm_datapajak' => 'active', 'm_datapajak' => 'active', 'session' => $this->session);

        echo view('App\Views\datapajak\datapajak_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->datapajakm->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['nama'] = $rows->nama;
            $row['pajak'] = $rows->wajib_pajak;
            $row['besaran'] = number_to_currency($rows->jumlah, 'IDR', 'en_US', 2);
            $row['ket pajak'] = $rows->keterangan;
            $row['alamat'] = $rows->alamat;
            $data[] = $row;
        }
        $output = array(
            "total" => $this->datapajakm->total(),
            "totalNotFiltered" => $this->datapajakm->countAllResults(),
            "rows" => $data,
        );
        echo json_encode($output);
    }

    public function Post()
    {
        $this->data = array('title' => 'Post Data Pajak | Admin', 'breadcome' => 'Post Data Pajak', 'url' => 'datapajak/', 'm_open_datapajak' => 'menu-open', 'mm_datapajak' => 'active', 'm_post_datapajak' => 'active', 'session' => $this->session);

        echo view('App\Views\datapajak\post-datapajak', $this->data);
    }
    public function edit()
    {
        $id = $this->request->getPost('id');
        $get = $this->datapajakm->find($id);
        $this->data = array('get' => $get);
        $status['html']         = view('App\Views\datapajak\form_input', $this->data);
        $status['modal_title']  = '<b>Update Data Pajak : </b>' . $get->nama;
        $status['modal_size']   = 'modal-xl';
        echo json_encode($status);
    }
    public function save()
    {
        switch ($this->request->getPost('action')) {
            case 'insert':
                // $files = $this->request->getFileMultiple('userfile');

                $data =  array(
                    'no_kk'          => $this->request->getVar('no_kk'),
                    'nik'    => $this->request->getVar('nik'),
                    'nama'    => $this->request->getVar('nama'),
                    'alamat'    => $this->request->getVar('alamat'),
                    'wajib_pajak'    => $this->request->getVar('wajib_pajak'),
                    'jumlah'    => $this->request->getVar('jumlah'),
                    'keterangan'    => $this->request->getVar('keterangan'),
                );
                if ($this->datapajakm->insert($data)) {
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Data Pajak Baru Telah Di Tambahkan';
                    $status['redirect'] = 'datapajak';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->datapajakm->errors();
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                // $files = $this->request->getFileMultiple('userfile');
                $data =  array(
                    'no_kk'          => $this->request->getPost('no_kk'),
                    'nik'    => $this->request->getPost('nik'),
                    'nama'    => $this->request->getPost('nama'),
                    'alamat'    => $this->request->getPost('alamat'),
                    'wajib_pajak'    => $this->request->getPost('wajib_pajak'),
                    'jumlah'    => $this->request->getPost('jumlah'),
                    'keterangan'    => $this->request->getPost('keterangan'),
                );
                if ($this->datapajakm->update($id, $data)) {
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Data Pajak Telah Di Ubah';
                    $status['redirect'] = 'datapajak';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->datapajakm->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                if ($this->datapajakm->delete($this->request->getPost('id'))) {
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

/* End of file DataPajak.php */
/* Location: ./app/controllers/DataPajak.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-05-31 04:44:35 */
/* http://harviacode.com */