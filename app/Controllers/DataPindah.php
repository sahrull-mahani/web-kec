<?php

namespace App\Controllers;

use App\Models\DataPindahM;
use App\Models\IndividuM;
use CodeIgniter\I18n\Time;

class DataPindah extends BaseController
{
    function __construct()
    {
        $this->datapindahm = new DataPindahM();
        $this->individum = new IndividuM();
    }
    public function index()
    {
        $this->data = array('title' => 'Data Pindah | Admin', 'breadcome' => 'Data Pindah', 'url' => 'datapindah/', 'm_open_datapindah' => 'menu-open', 'mm_datapindah' => 'active', 'm_datapindah' => 'active', 'session' => $this->session);

        echo view('App\Views\datapindah\datapindah_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->datapindahm->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['nama'] = ucwords($rows->nama);
            $row['status'] = ucwords($rows->status);
            $row['jk'] = $rows->jenis_kelamin;
            $row['tanggal'] = $rows->tgl_pindah;
            $row['alamat'] = ucwords($rows->alamat_pindah);
            $data[] = $row;
        }
        $output = array(
            "total" => $this->datapindahm->total(),
            "totalNotFiltered" => $this->datapindahm->countAllResults(),
            "rows" => $data,
        );
        echo json_encode($output);
    }

    public function pindah()
    {
        $id = $this->request->getPost('value');
        if ($this->individum->where('id', $id)->countAllResults() > 0) {
            return json_encode(['data' => $this->individum->where('id', $id)->first()]);
        }
        return '404';
    }

    public function single_edit($id)
    {
        $get = $this->datapindahm->find($id);
        $this->data = array(
            'title' => 'Post Data Pindah | Admin',
            'breadcome' => 'Post Data Pindah',
            'url' => 'datapindah/',
            'm_open_datapindah' => 'menu-open',
            'mm_datapindah' => 'active',
            'm_post_datapindah' => 'active',
            'session' => $this->session,
            'individu' => $this->individum->findall(),
            'get' => $get,
            'data' => $this->datapindahm->select('datapindah.*, ind.*, k.*, pk.*, pd.*, k.id kesID, pk.id pekID, pd.id kpID')->join('individu ind', 'ind.id = datapindah.individu_id')->join('kesehatan k', 'k.individu_id = ind.id')->join('pekerjaan pk', 'pk.individu_id = ind.id')->join('pendidikan pd', 'pd.individu_id = ind.id')->where('datapindah.id', $id)->first()
        );

        return view('App\Views\datapindah\post-datapindah', $this->data);
    }

    public function Post()
    {
        $this->data = array(
            'title' => 'Post Data Pindah | Admin',
            'breadcome' => 'Post Data Pindah',
            'url' => 'datapindah/',
            'm_open_datapindah' => 'menu-open',
            'mm_datapindah' => 'active',
            'm_post_datapindah' => 'active',
            'session' => $this->session,
            'individu' => $this->individum->findAll(),
            'wilayah' => getApi('https://emsifa.github.io/api-wilayah-indonesia/static/api/provinces.json'),
        );

        echo view('App\Views\datapindah\post-datapindah', $this->data);
    }
    public function save()
    {
        switch ($this->request->getPost('action')) {
            case 'insert':

                $data =  array(
                    'user_id'          => session('user_id'),
                    'individu_id'          => $this->request->getVar('individu_id'),
                    'status'    => $this->request->getVar('status'),
                    'tgl_pindah'    => $this->request->getVar('tgl_pindah'),
                    'alamat_pindah'    => $this->request->getVar('alamat_pindah'),
                    'keterangan_pindah'    => $this->request->getVar('keterangan_pindah'),
                );
                if ($this->datapindahm->insert($data)) {
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Data Pindah Baru Telah Di Tambahkan';
                    $status['redirect'] = 'datapindah';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->datapindahm->errors();
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                // $files = $this->request->getFileMultiple('userfile');
                $data =  array(
                    'user_id'          => session('user_id'),
                    'individu_id'          => $this->request->getPost('individu_id'),
                    'status'    => $this->request->getPost('status'),
                    'tgl_pindah'    => $this->request->getPost('tgl_pindah'),
                    'alamat_pindah'    => $this->request->getPost('alamat_pindah'),
                    'keterangan'    => $this->request->getPost('keterangan'),
                );
                if ($this->datapindahm->update($id, $data)) {
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Data Pindah Telah Di Ubah';
                    $status['redirect'] = 'datapindah';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->datapindahm->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                if ($this->datapindahm->delete($this->request->getPost('id'))) {
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