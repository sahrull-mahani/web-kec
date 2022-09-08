<?php

namespace App\Controllers;

use App\Models\JumlahPendudukM;
use CodeIgniter\I18n\Time;

class JumlahPenduduk extends BaseController
{
    function __construct()
    {
        $this->jumlahpendudukm = new JumlahPendudukM();
    }
    public function index()
    {
        $this->data = array('title' => 'Jumlah Penduduk | Admin', 'breadcome' => 'Jumlah Penduduk', 'url' => 'jumlahpenduduk/', 'm_open_jumlahpenduduk' => 'menu-open', 'mm_jumlahpenduduk' => 'active', 'm_jumlahpenduduk' => 'active', 'session' => $this->session);

        echo view('App\Views\jumlahpenduduk\jumlahpenduduk_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->jumlahpendudukm->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['dusun'] = $rows->dusun;
            $row['jumlah_jiwa'] = $rows->jumlah_jiwa;
            $row['jumlah_kk'] = $rows->jumlah_kk;
            $row['keterangan'] = $rows->keterangan;
            $data[] = $row;
        }
        $output = array(
            "total" => $this->jumlahpendudukm->total(),
            "totalNotFiltered" => $this->jumlahpendudukm->countAllResults(),
            "rows" => $data,
        );
        echo json_encode($output);
    }

    public function Post()
    {
        $this->data = array('title' => 'Post Jumlah Penduduk | Admin', 'breadcome' => 'Post Jumlah Penduduk', 'url' => 'jumlahpenduduk/', 'm_open_jumlahpenduduk' => 'menu-open', 'mm_jumlahpenduduk' => 'active', 'm_post_jumlahpenduduk' => 'active', 'session' => $this->session);

        echo view('App\Views\jumlahpenduduk\post-jumlahpenduduk', $this->data);
    }
    public function edit()
    {
        $id = $this->request->getPost('id');
        $get = $this->jumlahpendudukm->find($id);
        $this->data = array('get' => $get);
        $status['html']         = view('App\Views\jumlahpenduduk\form_input', $this->data);
        $status['modal_title']  = '<b>Update Jumlah Penduduk : </b>' . $get->dusun;
        $status['modal_size']   = 'modal-xl';
        echo json_encode($status);
    }
    public function save()
    {
        switch ($this->request->getPost('action')) {
            case 'insert':
                // $files = $this->request->getFileMultiple('userfile');

                $data =  array(
                    'dusun'          => $this->request->getVar('dusun'),
                    'jumlah_jiwa'    => $this->request->getVar('jumlah_jiwa'),
                    'jumlah_kk'    => $this->request->getVar('jumlah_kk'),
                    'umur'    => $this->request->getVar('umur'),
                    'jumlah_pria'    => $this->request->getVar('jumlah_pria'),
                    'jumlah_wanita'    => $this->request->getVar('jumlah_wanita'),
                    'jumlah'    => $this->request->getVar('jumlah'),
                    'agama_islam'    => $this->request->getVar('agama_islam'),
                    'agama_kristen'    => $this->request->getVar('agama_kristen'),
                    'agama_katolik'    => $this->request->getVar('agama_katolik'),
                    'agama_hindu'    => $this->request->getVar('agama_hindu'),
                    'agama_budha'    => $this->request->getVar('agama_budha'),
                    'keterangan'    => $this->request->getVar('keterangan'),
                );
                if ($this->jumlahpendudukm->insert($data)) {
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Jumlah Penduduk Baru Telah Di Tambahkan';
                    $status['redirect'] = 'jumlahpenduduk';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->jumlahpendudukm->errors();
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                // $files = $this->request->getFileMultiple('userfile');
                $data =  array(
                    'dusun'          => $this->request->getPost('dusun'),
                    'jumlah_jiwa'    => $this->request->getPost('jumlah_jiwa'),
                    'jumlah_kk'    => $this->request->getPost('jumlah_kk'),
                    'umur'    => $this->request->getPost('umur'),
                    'jumlah_pria'    => $this->request->getPost('jumlah_pria'),
                    'jumlah_wanita'    => $this->request->getPost('jumlah_wanita'),
                    'jumlah'    => $this->request->getPost('jumlah'),
                    'agama_islam'    => $this->request->getPost('agama_islam'),
                    'agama_kristen'    => $this->request->getPost('agama_kristen'),
                    'agama_katolik'    => $this->request->getPost('agama_katolik'),
                    'agama_hindu'    => $this->request->getPost('agama_hindu'),
                    'agama_budha'    => $this->request->getPost('agama_budha'),
                    'keterangan'    => $this->request->getPost('keterangan'),
                );
                if ($this->jumlahpendudukm->update($id, $data)) {
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Jumlah Penduduk Telah Di Ubah';
                    $status['redirect'] = 'jumlahpenduduk';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->jumlahpendudukm->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                if ($this->jumlahpendudukm->delete($this->request->getPost('id'))) {
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

/* End of file Berita.php */
/* Location: ./app/controllers/Berita.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-05-31 04:44:35 */
/* http://harviacode.com */