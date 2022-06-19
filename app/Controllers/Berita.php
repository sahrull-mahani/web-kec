<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\GaleriModel;

class Berita extends BaseController
{
    protected $beritam;
    function __construct()
    {
        $this->beritam = new BeritaModel();
        $this->galerim = new GaleriModel();
    }
    public function index()
    {
        $this->data = array('title' => 'Berita | Admin', 'breadcome' => 'Berita', 'url' => 'berita/', 'm_open' => 'menu-open', 'mm_berita' => 'active', 'm_berita' => 'active', 'session' => $this->session);

        echo view('App\Views\berita\berita_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->beritam->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['judul'] = $rows->judul;
            $row['gambar'] = '<img width="250" alt="Berita Image" src="' . site_url("Berita/img_thumb/" . $rows->sumber) . '" class="mb-3 img-responsive" />';
            $row['body'] = strip_tags(substr($rows->isi_berita, 0, 100)) . '...';
            $row['penulis'] = $rows->nama_user;
            $row['status'] = $rows->status == 0 ? '<b class="text-warning">Belum Tayang</b>' : ($rows->status == 1 ? '<b class="text-info">Sudah Tayang</b>' : "<b class='text-danger'>Di Tolak</b> $rows->pesan");
            $data[] = $row;
        }
        $output = array(
            "total" => $this->beritam->total(),
            "totalNotFiltered" => $this->beritam->countAllResults(),
            "rows" => $data,
        );
        echo json_encode($output);
    }

    public function Post()
    {
        $this->data = array('title' => 'Post Berita | Admin', 'breadcome' => 'Post Berita', 'url' => 'berita/', 'm_open' => 'menu-open', 'mm_berita' => 'active', 'm_post' => 'active', 'session' => $this->session);

        echo view('App\Views\berita\post-berita', $this->data);
    }

    public function create()
    {
        $this->data = array('action' => 'insert', 'btn' => '<i class="fas fa-save"></i> Save');
        $num_of_row = $this->request->getPost('num_of_row');
        for ($x = 1; $x <= $num_of_row; $x++) {
            $data['nama'] = 'Data ' . $x;
            $this->data['form_input'][] = view('App\Views\berita\form_input', $data);
        }
        $status['html']         = view('App\Views\berita\form_modal', $this->data);
        $status['modal_title']  = 'Tambah Data Berita';
        $status['modal_size']   = 'modal-xl';
        echo json_encode($status);
    }
    public function edit()
    {
        $get = $this->beritam->find($this->request->getPost('id'));
        $this->data = array('get' => $get, 'action' => 'update', 'btn' => '<i class="fas fa-edit"></i> Edit');
        $status['html']         = view('App\Views\berita\form_input', $this->data);
        $status['modal_title']  = '<b>Update Berita : </b>' . $get->judul;
        $status['modal_size']   = 'modal-xl';
        echo json_encode($status);
    }
    public function save()
    {
        switch ($this->request->getPost('action')) {
            case 'insert':
                $files = $this->request->getFileMultiple('userfile');
                $galeri = [];

                $judul = $this->request->getPost('judul');
                $data =  array(
                    'level' => 3,
                    'judul' => $judul,
                    'slug' => str_replace(' ', '-', strtolower($judul)),
                    'isi_berita' => $this->request->getPost('isi'),
                    'id_user' => session('user_id'),
                );
                if ($this->beritam->insert($data)) {
                    foreach ($files as $pic) {
                        $file_name = 'berita_' . $pic->getRandomName();
                        if ($this->upload_img($file_name, $pic)) {
                            array_push($galeri, [
                                'id_sumber' => $this->beritam->getInsertID(),
                                'sumber'    => $file_name,
                                'id_user'   => session('user_id')
                            ]);
                        }
                    }
                    $this->galerim->insertBatch($galeri);
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Berita Baru Telah Di Tambahkan';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->beritam->errors();
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                $files = $this->request->getFileMultiple('userfile');
                $galeri = [];
                $judul = $this->request->getPost('judul');
                $data =  array(
                    'level' => 3,
                    'judul' => $judul,
                    'slug' => str_replace(' ', '-', strtolower($judul)),
                    'isi_berita' => $this->request->getPost('isi'),
                    'id_user' => session('user_id'),
                );
                if ($this->beritam->update($id, $data)) {
                    if ($files[0]->getError() !== 4) {
                        $get = $this->galerim->where('id_sumber', $id)->findAll();
                        foreach ($get as $pic) {
                            unlink(WRITEPATH . "uploads/img/$pic->sumber"); // delete terlebih dahulu
                            unlink(WRITEPATH . "uploads/thumbs/$pic->sumber"); // delete terlebih dahulu
                        }
                        $this->galerim->where('id_sumber', $id)->delete(); // delete dari database
                        foreach ($files as $pic) { // masukan gambar baru
                            $file_name = 'berita_' . $pic->getRandomName();
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
                    $status['text'] = 'Berita Telah Di Ubah';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->beritam->errors();
                }
                echo json_encode($status);
                break;
            case 'publish':
                $id = $this->request->getPost('id');
                if ($this->beritam->update($id, ['status'=>1])) {
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Data Berita Telah Di Tayangkan';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->beritam->errors();
                }
                echo json_encode($status);
                break;
            case 'tolak':
                $id = $this->request->getPost('id');
                $data =  array(
                    'pesan' => $this->request->getPost('pesan'),
                    'status' => '2',
                );
                if ($this->beritam->update($id, $data)) {
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Posting Artikel Berhasil DiTolak';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->beritam->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                $id = $this->request->getPost('id');
                $get = $this->galerim->where('id_sumber', $id)->findAll();
                foreach ($get as $pic) {
                    unlink(WRITEPATH . "uploads/img/$pic->sumber"); // delete terlebih dahulu
                    unlink(WRITEPATH . "uploads/thumbs/$pic->sumber"); // delete terlebih dahulu
                }
                if ($this->galerim->where('id_sumber', $id)->delete()) { // delete dari database
                    if ($this->beritam->delete($id)) {
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
    public function img_thumb($file_name)
    {
        $filepath = WRITEPATH . 'uploads/thumbs/' . $file_name;
        $this->response->setContentType('image/jpg,image/jpeg,image/png');
        header('Content-Disposition: inline; filename=' . $file_name);
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        readfile($filepath);
    }
    public function img_medium($file_name)
    {
        $filepath = WRITEPATH . 'uploads/img/' . $file_name;
        $this->response->setContentType('image/jpg,image/jpeg,image/png');
        header('Content-Disposition: inline; filename=' . $file_name);
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        readfile($filepath);
    }
}

/* End of file Berita.php */
/* Location: ./app/controllers/Berita.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-05-31 04:44:35 */
/* http://harviacode.com */