<?php

namespace App\Controllers;

use App\Models\GaleriModel;
use App\Models\PenginapanModel;
use CodeIgniter\I18n\Time;

class Penginapan extends BaseController
{
    function __construct()
    {
        $this->penginapanm = new PenginapanModel();
        $this->galerim = new GaleriModel();
    }
    public function index()
    {
        $this->data = array('title' => 'Penginapan | Admin', 'breadcome' => 'Penginapan', 'url' => 'penginapan/', 'm_open_penginapan' => 'menu-open', 'mm_penginapan' => 'active', 'm_penginapan' => 'active', 'session' => $this->session);

        echo view('App\Views\penginapan\penginapan_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->penginapanm->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['judul'] = $rows->nama;
            $row['gambar'] = '<img width="250" alt="Penginapan Image" src="' . site_url("Berita/img_thumb/" . $rows->sumber) . '" class="mb-3 img-responsive" />';
            $row['status'] = $rows->published_at == null ? '<b class="text-warning">Belum Tayang</b>' : '<b class="text-info">Sudah Tayang</b>';
            $data[] = $row;
        }
        $output = array(
            "total" => $this->penginapanm->total(),
            "totalNotFiltered" => $this->penginapanm->countAllResults(),
            "rows" => $data,
        );
        echo json_encode($output);
    }

    public function Post()
    {
        $this->data = array('title' => 'Post Penginapan | Admin', 'breadcome' => 'Post Penginapan', 'url' => 'penginapan/', 'm_open_penginapan' => 'menu-open', 'mm_penginapan' => 'active', 'm_post_penginapan' => 'active', 'session' => $this->session);

        echo view('App\Views\penginapan\post-penginapan', $this->data);
    }
    public function edit()
    {
        $id = $this->request->getPost('id');
        $get = $this->penginapanm->find($id);
        $galeri = $this->galerim->galeriLikeWhere('penginapan_', $id)->findAll();
        $this->data = array('get' => $get, 'gambar'=>$galeri, 'status' => $this->request->getPost('published_at'));
        $status['html']         = view('App\Views\penginapan\form_input', $this->data);
        $status['modal_title']  = '<b>Update Penginapan : </b>' . $get->nama;
        $status['modal_size']   = 'modal-xl';
        echo json_encode($status);
    }
    public function save()
    {
        switch ($this->request->getPost('action')) {
            case 'insert':
                $files = $this->request->getFileMultiple('userfile');
                $galeri = [];

                $data =  array(
                    'nama'          => $this->request->getVar('nama'),
                    'keterangan'    => $this->request->getVar('keterangan'),
                    'published_at'  => null
                );
                if ($this->penginapanm->insert($data)) {
                    foreach ($files as $pic) {
                        $file_name = 'penginapan_' . $pic->getRandomName();
                        if ($this->upload_img($file_name, $pic)) {
                            array_push($galeri, [
                                'id_sumber' => $this->penginapanm->getInsertID(),
                                'sumber'    => $file_name,
                                'id_user'   => session('user_id')
                            ]);
                        }
                    }
                    $this->galerim->insertBatch($galeri);
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Penginapan Baru Telah Di Tambahkan';
                    $status['redirect'] = 'penginapan';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->penginapanm->errors();
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                $files = $this->request->getFileMultiple('userfile');
                $galeri = [];
                $data =  array(
                    'nama'          => $this->request->getPost('nama'),
                    'keterangan'    => $this->request->getPost('keterangan'),
                );
                if ($this->penginapanm->update($id, $data)) {
                    if ($files[0]->getError() !== 4) {
                        $get = $this->galerim->where('id_sumber', $id)->findAll();
                        foreach ($get as $pic) {
                            unlink(WRITEPATH . "uploads/img/$pic->sumber"); // delete terlebih dahulu
                            unlink(WRITEPATH . "uploads/thumbs/$pic->sumber"); // delete terlebih dahulu
                        }
                        $this->galerim->where('id_sumber', $id)->delete(); // delete dari database
                        foreach ($files as $pic) { // masukan gambar baru
                            $file_name = 'penginapan_' . $pic->getRandomName();
                            if ($this->upload_img($file_name, $pic)) {
                                array_push($galeri, [
                                    'id_sumber' => $id,
                                    'sumber'    => $file_name,
                                    'id_user'   => session('user_id')
                                ]);
                            }
                        }
                        $this->galerim->insertBatch($galeri);
                    }
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Penginapan Telah Di Ubah';
                    $status['redirect'] = 'penginapan';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->penginapanm->errors();
                }
                echo json_encode($status);
                break;
            case 'publish':
                $id = $this->request->getPost('id');
                $data =  array(
                    'published_at' => Time::now()
                );
                if ($this->penginapanm->update($id, $data)) {
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Penginapan Telah Di Ubah';
                    $status['redirect'] = 'penginapan';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->penginapanm->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                $id = $this->request->getPost('id');
                if (is_array($id) == 1) {
                    foreach ($id as $aidi) {
                        $get = $this->galerim->where('id_sumber', $aidi)->findAll();
                        foreach ($get as $pic) {
                            unlink(WRITEPATH . "uploads/img/$pic->sumber"); // delete terlebih dahulu
                            unlink(WRITEPATH . "uploads/thumbs/$pic->sumber"); // delete terlebih dahulu
                        }
                        $ids[] = $aidi;
                    }
                }else{
                    $get = $this->galerim->where('id_sumber', $id)->findAll();
                    foreach ($get as $pic) {
                        unlink(WRITEPATH . "uploads/img/$pic->sumber"); // delete terlebih dahulu
                        unlink(WRITEPATH . "uploads/thumbs/$pic->sumber"); // delete terlebih dahulu
                    }
                    $ids = $id;
                }
                if ($this->galerim->whereIn('id_sumber', $ids)->delete()) { // delete dari database
                    if ($this->program->delete($id)) {
                        $status['type'] = 'success';
                        $status['text'] = '<strong>Deleted..!</strong> Berhasil dihapus';
                    } else {
                        $status['type'] = 'error';
                        $status['text'] = '<strong>Oh snap!</strong> Proses hapus data gagal.';
                    }
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
            'userfile' => [
                'label' => 'IMG File',
                'rules' => 'uploaded[userfile]'
                    . '|is_image[userfile]'
                    . '|mime_in[userfile,image/jpg,image/jpeg,image/png]'
                    . '|max_size[userfile,3080]',
            ],
        ];
        if (!$this->validate($validationRule)) {
            $this->session->setFlashdata('error', $this->validator->getError('userfile'));
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
            $image->withFile($img)->fit(1024, 768)->save($filepath . 'img/' . $file_name);
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

/* End of file Berita.php */
/* Location: ./app/controllers/Berita.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-05-31 04:44:35 */
/* http://harviacode.com */