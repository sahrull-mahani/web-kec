<?php

namespace App\Controllers;

use App\Models\KeadaanPendudukM;
use CodeIgniter\I18n\Time;

class KeadaanPenduduk extends BaseController
{
    function __construct()
    {
        $this->keadaanpendudukm = new KeadaanPendudukM();
    }
    public function index()
    {
        $this->data = array('title' => 'Keadaan Penduduk | Admin', 'breadcome' => 'Keadaan Penduduk', 'url' => 'keadaanpenduduk/', 'm_open_keadaanpenduduk' => 'menu-open', 'mm_keadaanpenduduk' => 'active', 'm_keadaanpenduduk' => 'active', 'session' => $this->session);

        echo view('App\Views\keadaanpenduduk\keadaanpenduduk_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->keadaanpendudukm->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['dusun'] = $rows->dusun;
            $row['no_kk'] = $rows->no_kk;
            $row['nik'] = $rows->nik;
            $row['nama'] = $rows->nama;
            $row['pekerjaan'] = $rows->pekerjaan;
            $row['penyakit'] = ($rows->muntaber_diare == 'Ya' ? 'Muntaber/Diare, ' : '') .
                ($rows->hepatitis_e == 'Ya' ? 'Hepatitis E, ' : '') .
                ($rows->jantung == 'Ya' ? 'Jantung, ' : '') .
                ($rows->demam_berdarah == 'Ya' ? 'Demam Berdarah, ' : '') .
                ($rows->difteri == 'Ya' ? 'Difteri, ' : '') .
                ($rows->tbc_paru == 'Ya' ? 'TBC Paru Paru, ' : '') .
                ($rows->campak == 'Ya' ? 'Campak, ' : '') .
                ($rows->cikungunya == 'Ya' ? 'Cikungunya, ' : '') .
                ($rows->kanker == 'Ya' ? 'Kanker, ' : '') .
                ($rows->malaria == 'Ya' ? 'Malaria, ' : '') .
                ($rows->leptospirosis == 'Ya' ? 'Leptospirosis, ' : '') .
                ($rows->diabetes == 'Ya' ? 'Diabetes, ' : '') .
                ($rows->fluburung_sars == 'Ya' ? 'Flu Burung/SARS, ' : '') .
                ($rows->kolera == 'Ya' ? 'Kolera, ' : '') .
                ($rows->lumpuh == 'Ya' ? 'Lumpuh, ' : '') .
                ($rows->covid_19 == 'Ya' ? 'Covid 19, ' : '') .
                ($rows->gizi_buruk == 'Ya' ? 'Gizi Buruk, ' : '') .
                ($rows->hepatitis_b == 'Ya' ? 'Hepatitis B, ' : '') .
                ($rows->lainnya == 'Ya' ? 'Lainnya, ' : '');
            $data[] = $row;
        }
        $output = array(
            "total" => $this->keadaanpendudukm->total(),
            "totalNotFiltered" => $this->keadaanpendudukm->countAllResults(),
            "rows" => $data,
        );
        echo json_encode($output);
    }

    public function Post()
    {
        $this->data = array('title' => 'Post Keadaan Penduduk | Admin', 'breadcome' => 'Post Keadaan Penduduk', 'url' => 'keadaanpenduduk/', 'm_open_keadaanpenduduk' => 'menu-open', 'mm_keadaanpenduduk' => 'active', 'm_post_keadaanpenduduk' => 'active', 'session' => $this->session);

        echo view('App\Views\keadaanpenduduk\post-keadaanpenduduk', $this->data);
    }
    public function edit()
    {
        $id = $this->request->getPost('id');
        $get = $this->keadaanpendudukm->find($id);
        $this->data = array('get' => $get);
        $status['html']         = view('App\Views\keadaanpenduduk\form_input', $this->data);
        $status['modal_title']  = '<b>Update Keadaan Penduduk : </b>' . $get->dusun;
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
                    'no_kk'    => $this->request->getVar('no_kk'),
                    'nik'    => $this->request->getVar('nik'),
                    'nama'    => $this->request->getVar('nama'),
                    'pekerjaan'    => $this->request->getVar('pekerjaan'),
                    'muntaber_diare'    => $this->request->getVar('muntaber_diare'),
                    'hepatitis_e'    => $this->request->getVar('hepatitis_e'),
                    'jantung'    => $this->request->getVar('jantung'),
                    'demam_berdarah'    => $this->request->getVar('demam_berdarah'),
                    'difteri'    => $this->request->getVar('difteri'),
                    'tbc_paru'    => $this->request->getVar('tbc_paru'),
                    'campak'    => $this->request->getVar('campak'),
                    'cikungunya'    => $this->request->getVar('cikungunya'),
                    'kanker'    => $this->request->getVar('kanker'),
                    'malaria'    => $this->request->getVar('malaria'),
                    'leptospirosis'    => $this->request->getVar('leptospirosis'),
                    'diabetes'    => $this->request->getVar('diabetes'),
                    'fluburung_sars'    => $this->request->getVar('fluburung_sars'),
                    'kolera'    => $this->request->getVar('kolera'),
                    'lumpuh'    => $this->request->getVar('lumpuh'),
                    'covid_19'    => $this->request->getVar('covid_19'),
                    'gizi_buruk'    => $this->request->getVar('gizi_buruk'),
                    'hepatitis_b'    => $this->request->getVar('hepatitis_b'),
                    'lainnya'    => $this->request->getVar('lainnya'),
                );
                if ($this->keadaanpendudukm->insert($data)) {
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Keadaan Penduduk Baru Telah Di Tambahkan';
                    $status['redirect'] = 'keadaanpenduduk';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->keadaanpendudukm->errors();
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                // $files = $this->request->getFileMultiple('userfile');
                $data =  array(
                    'dusun'          => $this->request->getPost('dusun'),
                    'no_kk'    => $this->request->getPost('no_kk'),
                    'nik'    => $this->request->getPost('nik'),
                    'nama'    => $this->request->getPost('nama'),
                    'pekerjaan'    => $this->request->getPost('pekerjaan'),
                    'muntaber_diare'    => $this->request->getPost('muntaber_diare'),
                    'hepatitis_e'    => $this->request->getPost('hepatitis_e'),
                    'jantung'    => $this->request->getPost('jantung'),
                    'demam_berdarah'    => $this->request->getPost('demam_berdarah'),
                    'difteri'    => $this->request->getPost('difteri'),
                    'tbc_paru'    => $this->request->getPost('tbc_paru'),
                    'campak'    => $this->request->getPost('campak'),
                    'cikungunya'    => $this->request->getPost('cikungunya'),
                    'kanker'    => $this->request->getPost('kanker'),
                    'malaria'    => $this->request->getPost('malaria'),
                    'leptospirosis'    => $this->request->getPost('leptospirosis'),
                    'diabetes'    => $this->request->getPost('diabetes'),
                    'fluburung_sars'    => $this->request->getPost('fluburung_sars'),
                    'kolera'    => $this->request->getPost('kolera'),
                    'lumpuh'    => $this->request->getPost('lumpuh'),
                    'covid_19'    => $this->request->getPost('covid_19'),
                    'gizi_buruk'    => $this->request->getPost('gizi_buruk'),
                    'hepatitis_b'    => $this->request->getPost('hepatitis_b'),
                    'lainnya'    => $this->request->getPost('lainnya'),
                );
                if ($this->keadaanpendudukm->update($id, $data)) {
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Keadaan Penduduk Telah Di Ubah';
                    $status['redirect'] = 'keadaanpenduduk';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->keadaanpendudukm->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                if ($this->keadaanpendudukm->delete($this->request->getPost('id'))) {
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

/* End of file KeadaanPenduduk.php */
/* Location: ./app/controllers/KeadaanPenduduk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-05-31 04:44:35 */
/* http://harviacode.com */