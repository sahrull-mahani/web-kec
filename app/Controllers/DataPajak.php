<?php

namespace App\Controllers;

use App\Models\DataPajakM;
use App\Models\IndividuM;
use CodeIgniter\I18n\Time;

class DataPajak extends BaseController
{
    function __construct()
    {
        $this->datapajakm = new DataPajakM();
        $this->individum = new IndividuM();
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
            $row['nama'] = ucwords($rows->nama);
            $row['pajak'] = $rows->wajib_pajak;
            $row['besaran'] = number_to_currency($rows->jumlah_pajak, 'IDR', 'en_US', 2);
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

    public function pajak()
    {
        $id = $this->request->getPost('value');
        if ($this->individum->where('id', $id)->countAllResults() > 0) {
            return json_encode(['data' => $this->individum->where('id', $id)->first()]);
        }
        return '404';
    }

    public function Post()
    {
        $this->data = array('title' => 'Post Data Pajak | Admin', 'breadcome' => 'Post Data Pajak', 'url' => 'datapajak/', 'm_open_datapajak' => 'menu-open', 'mm_datapajak' => 'active', 'm_post_datapajak' => 'active', 'individu' => $this->individum->findAll(), 'session' => $this->session);

        echo view('App\Views\datapajak\post-datapajak', $this->data);
    }

    public function single_edit($id)
    {
        // dd($id);
        $get = $this->datapajakm->find($id);
        $this->data = array(
            'title' => 'Post Data Pajak | Admin',
            'breadcome' => 'Post Data Pajak',
            'url' => 'datapajak/',
            'm_open_datapajak' => 'menu-open',
            'mm_datapajak' => 'active',
            'm_post_datapajak' => 'active',
            'session' => $this->session,
            'individu' => $this->individum->findall(),
            'get' => $get,
            // 'data1' => $this->datapajakm->select('datapajak.*, ind.*, k.*, pk.*, pd.*, k.id kesID, pk.id pekID, pd.id kpID')->join('individu ind', 'ind.id = datapajak.individu_id')->join('kesehatan k', 'k.individu_id = ind.id')->join('pekerjaan pk', 'pk.individu_id = ind.id')->join('pendidikan pd', 'pd.individu_id = ind.id')->where('datapajak.id', $id)->first(),
            'data' => $this->datapajakm->getJoinDataPajak()->where('datapajak.id', $id)->first()
        );

        return view('App\Views\datapajak\post-datapajak', $this->data);
    }

    public function save()
    {
        switch ($this->request->getPost('action')) {
            case 'insert':
                $data =  array(
                    'user_id'          => session('user_id'),
                    'individu_id'          => $this->request->getVar('individu_id'),
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
                    'user_id'          => session('user_id'),
                    'individu_id'          => $this->request->getPost('individu_id'),
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