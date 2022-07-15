<?php

namespace App\Controllers;

use App\Models\PegawaiM;

class Pegawai extends BaseController
{
    protected $pegawaim;
    function __construct()
    {
        $this->pegawaim = new PegawaiM();
    }
    public function index()
    {
        $this->data = array('title' => 'Pegawai | Admin', 'breadcome' => 'Pegawai', 'url' => 'pegawai/', 'm_pegawai' => 'active', 'session' => $this->session);

        echo view('App\Views\pegawai\pegawai_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->pegawaim->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['nama'] = $rows->nama;
            $row['nip'] = $rows->nip;
            $row['jk'] = $rows->jk;
            $row['tempat_lahir'] = $rows->tempat_lahir;
            $row['tgl_lahir'] = get_format_date($rows->tgl_lahir);
            $row['gelar_depan'] = $rows->gelar_depan;
            $row['gelar_belakang'] = $rows->gelar_belakang;
            $row['pangkat'] = $rows->pangkat;
            $row['alamat'] = $rows->alamat;
            $row['pendidikan'] = $rows->pendidikan;
            $row['lulusan'] = $rows->lulusan;
            $row['poto'] = '<img width="250" alt="Pariwisata Image" src="' . site_url("Berita/img_thumb/" . $rows->poto) . '" class="mb-3 img-responsive" />';
            $data[] = $row;
        }
        $output = array(
            "total" => $this->pegawaim->total(),
            "totalNotFiltered" => $this->pegawaim->countAllResults(),
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
            $this->data['form_input'][] = view('App\Views\pegawai\form_input', $data);
        }
        $status['html']         = view('App\Views\pegawai\form_modal', $this->data);
        $status['modal_title']  = 'Tambah Data Pegawai';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function edit()
    {
        $id = $this->request->getPost('id');
        $this->data = array('action' => 'update', 'btn' => '<i class="fas fa-edit"></i> Edit');
        foreach ($id as $ids) {
            $get = $this->pegawaim->find($ids);
            $data = array(
                'nama' => '<b>' . $get->nama . '</b>',
                'get' => $get,
            );
            $this->data['form_input'][] = view('App\Views\pegawai\form_input', $data);
        }
        $status['html']         = view('App\Views\pegawai\form_modal', $this->data);
        $status['modal_title']  = 'Update Data Pegawai';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function save()
    {
        switch ($this->request->getPost('action')) {
            case 'insert':
                $nama = $this->request->getPost('nama');
                $gambar = $this->request->getFileMultiple('poto');
                $data = array();
                foreach ($nama as $key => $val) {
                    $namaGambar = $gambar[$key]->getRandomName();
                    array_push($data, array(
                        'nama' => $this->request->getPost('nama')[$key],
                        'nip' => $this->request->getPost('nip')[$key],
                        'jk' => $this->request->getPost('jk')[$key],
                        'tempat_lahir' => $this->request->getPost('tempat_lahir')[$key],
                        'tgl_lahir' => get_format_date_sql($this->request->getPost('tgl_lahir')[$key]),
                        'gelar_depan' => $this->request->getPost('gelar_depan')[$key],
                        'gelar_belakang' => $this->request->getPost('gelar_belakang')[$key],
                        'pangkat' => $this->request->getPost('pangkat')[$key],
                        'alamat' => $this->request->getPost('alamat')[$key],
                        'pendidikan' => $this->request->getPost('pendidikan')[$key],
                        'lulusan' => $this->request->getPost('lulusan')[$key],
                        'poto' => $namaGambar,
                    ));
                }
                if ($this->pegawaim->insertBatch($data)) {
                    foreach ($data as $key => $val) {
                        $this->upload_img($data[$key]['poto'], $gambar[$key]);
                    }
                    $status['type'] = 'success';
                    $status['text'] = 'Data Pegawai Tersimpan';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->pegawaim->errors();
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                $gambar = $this->request->getFileMultiple('poto');
                $data = array();
                foreach ($id as $key => $val) {
                    $namaGambar = $this->request->getPost('old_img')[$key];
                    // d($gambar[$key]);
                    if ($gambar[$key]->getError() !== 4) {
                        unlink(WRITEPATH . "uploads/img/$namaGambar");
                        unlink(WRITEPATH . "uploads/thumbs/$namaGambar");
                        $namaGambar = $gambar[$key]->getRandomName();
                        $this->upload_img($namaGambar, $gambar[$key]);
                    }
                    array_push($data, array(
                        'id' => $val,
                        'nama' => $this->request->getPost('nama')[$key],
                        'nip' => $this->request->getPost('nip')[$key],
                        'jk' => $this->request->getPost('jk')[$key],
                        'tempat_lahir' => $this->request->getPost('tempat_lahir')[$key],
                        'tgl_lahir' => get_format_date_sql($this->request->getPost('tgl_lahir')[$key]),
                        'gelar_depan' => $this->request->getPost('gelar_depan')[$key],
                        'gelar_belakang' => $this->request->getPost('gelar_belakang')[$key],
                        'pangkat' => $this->request->getPost('pangkat')[$key],
                        'alamat' => $this->request->getPost('alamat')[$key],
                        'pendidikan' => $this->request->getPost('pendidikan')[$key],
                        'lulusan' => $this->request->getPost('lulusan')[$key],
                        'poto'  => $namaGambar
                    ));
                }
                if ($this->pegawaim->updateBatch($data, 'id')) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Pegawai Telah Di Ubah';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->pegawaim->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                $id = $this->request->getPost('id');
                $get = $this->pegawaim->find($id);
                foreach($get as $row) {
                    unlink(WRITEPATH . "uploads/img/$row->poto");
                    unlink(WRITEPATH . "uploads/thumbs/$row->poto");
                }
                if ($this->pegawaim->delete($id)) {
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

    private function upload_img($file_name, $img): bool
    {
        $validationRule = [
            'poto' => [
                'label' => 'IMG File',
                'rules' => 'uploaded[poto]'
                    . '|is_image[poto]'
                    . '|mime_in[poto,image/jpg,image/jpeg,image/png]'
                    . '|max_size[poto,3080]',
            ],
        ];
        if (!$this->validate($validationRule)) {
            $this->session->setFlashdata('error', $this->validator->getError('poto'));
            return false;
        }
        $filepath = WRITEPATH . 'uploads/';
        $file_old = $this->request->getPost('old_file');
        if (!empty($file_old)) {
            delete_files($filepath . 'img/', $file_old); //Hapus terlebih dahulu jika file ada
            delete_files($filepath . 'thumbs/', $file_old); //Hapus terlebih dahulu jika file ada
        }
        if ($img->isValid() && !$img->hasMoved()) {
            $image = \Config\Services::image('gd'); //Load Image Libray
            $image->withFile($img)->fit(1700, 2200)->save($filepath . 'img/' . $file_name);
            //thumbs
            $image->withFile($img)
                ->fit(100, 100, 'center')
                ->save($filepath . 'thumbs/' . $file_name);
            // $img->move($filepath, $file_name, true);
            return true;
        } else {
            $this->session->setFlashdata('error', $img->getErrorString() . '(' . $img->getError() . ')');
            return false;
        }
    }
}

/* End of file Pegawai.php */
/* Location: ./app/controllers/Pegawai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-15 03:45:19 */
/* http://harviacode.com */