<?php

namespace App\Controllers;

use App\Models\DataKematianM;
use App\Models\IndividuM;
use CodeIgniter\I18n\Time;

class DataKematian extends BaseController
{
    function __construct()
    {
        $this->datakematianm = new DataKematianM();
        $this->individum = new IndividuM();
    }
    public function index()
    {
        $this->data = array('title' => 'Data Kematian | Admin', 'breadcome' => 'Data Kematian', 'url' => 'datakematian/', 'm_open_datakematian' => 'menu-open', 'mm_datakematian' => 'active', 'm_datakematian' => 'active', 'session' => $this->session);

        echo view('App\Views\datakematian\datakematian_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->datakematianm->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['nama'] = ucwords($rows->nama);
            $row['jk'] = $rows->jenis_kelamin;
            $row['tgl'] = $rows->tgl_kematian;
            $row['jam'] = $rows->jam_kematian;
            $row['tempat'] = ucwords($rows->tempat_kematian);
            $data[] = $row;
        }
        $output = array(
            "total" => $this->datakematianm->total(),
            "totalNotFiltered" => $this->datakematianm->countAllResults(),
            "rows" => $data,
        );
        echo json_encode($output);
    }

    public function kematian()
    {
        $id = $this->request->getPost('value');
        if ($this->individum->where('id', $id)->countAllResults() > 0) {
            return json_encode(['data' => $this->individum->where('id', $id)->first()]);
        }
        return '404';
    }

    public function single_edit($id)
    {
        dd($id);
        $get = $this->datakematianm->find($id);
        $this->data = array(
            'title' => 'Post Data Kematian | Admin',
            'breadcome' => 'Post Data Kematian',
            'url' => 'datakematian/',
            'm_open_datakematian' => 'menu-open',
            'mm_datakematian' => 'active',
            'm_post_datakematian' => 'active',
            'session' => $this->session,
            'individu' => $this->individum->findall(),
            'get' => $get,
            'data' => $this->datakematianm->select('datakematian.*, ind.*, pd.*, pd.id kpID')->join('individu ind', 'ind.id = datakematian.individu_id')->join('pendidikan pd', 'pd.individu_id = ind.id')->where('datakematian.id', $id)->first()
        );

        return view('App\Views\datakematian\post-datakematian', $this->data);
    }

    public function Post()
    {
        $this->data = array('title' => 'Post Data Kematian | Admin', 'breadcome' => 'Post Data Kematian', 'url' => 'datakematian/', 'm_open_datakematian' => 'menu-open', 'mm_datakematian' => 'active', 'm_post_datakematian' => 'active', 'individu' => $this->individum->findAll(), 'session' => $this->session);

        echo view('App\Views\datakematian\post-datakematian', $this->data);
    }

    public function save()
    {
        switch ($this->request->getPost('action')) {
            case 'insert':
                // $files = $this->request->getFileMultiple('userfile');

                $data =  array(
                    'id_desa'          => session('id_desa'),
                    'individu_id'          => $this->request->getVar('individu_id'),
                    'tgl_kematian'    => $this->request->getVar('tgl_kematian'),
                    'jam_kematian'    => $this->request->getVar('jam_kematian'),
                    'tempat_kematian'    => $this->request->getVar('tempat_kematian'),
                    'tgl_kubur'    => $this->request->getVar('tgl_kubur'),
                    'jam_kubur'    => $this->request->getVar('jam_kubur'),
                    'tempat_kubur'    => $this->request->getVar('tempat_kubur'),
                    'alamat_kubur'    => $this->request->getVar('alamat_kubur'),
                );
                if ($this->datakematianm->insert($data)) {
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Data Kematian Baru Telah Di Tambahkan';
                    $status['redirect'] = 'datakematian';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->datakematianm->errors();
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                $data =  array(
                    'id_desa'          => session('id_desa'),
                    'individu_id'          => $this->request->getPost('individu_id'),
                    'tgl_kematian'    => $this->request->getPost('tgl_kematian'),
                    'jam_kematian'    => $this->request->getPost('jam_kematian'),
                    'tempat_kematian'    => $this->request->getPost('tempat_kematian'),
                    'tgl_kubur'    => $this->request->getPost('tgl_kubur'),
                    'jam_kubur'    => $this->request->getPost('jam_kubur'),
                    'tempat_kubur'    => $this->request->getPost('tempat_kubur'),
                    'alamat_kubur'    => $this->request->getPost('alamat_kubur'),
                );
                if ($this->datakematianm->update($id, $data)) {
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Data Kematian Telah Di Ubah';
                    $status['redirect'] = 'datakematian';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->datakematianm->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                if ($this->datakematianm->delete($this->request->getPost('id'))) {
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

/* End of file DataPindah.php */
/* Location: ./app/controllers/DataPindah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-05-31 04:44:35 */
/* http://harviacode.com */