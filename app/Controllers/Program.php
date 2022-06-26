<?php

namespace App\Controllers;

use App\Models\GaleriModel;
use App\Models\ProgramModel;
use CodeIgniter\I18n\Time;

class Program extends BaseController
{
    function __construct()
    {
        $this->program = new ProgramModel();
        $this->galerim = new GaleriModel();
    }
    public function index()
    {
        $this->data = array('title' => 'Program | Admin', 'breadcome' => 'Program', 'url' => 'program/', 'm_open_program' => 'menu-open', 'mm_program' => 'active', 'm_program' => 'active', 'session' => $this->session);

        echo view('App\Views\program\program_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->program->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['judul'] = $rows->judul;
            $row['gambar'] = '<img width="250" alt="Program Image" src="' . site_url("Berita/img_thumb/" . $rows->sumber) . '" class="mb-3 img-responsive" />';
            $row['body'] = strip_tags(substr($rows->isi_program, 0, 100)) . '...';
            $row['penulis'] = $rows->nama_user;
            $row['status'] = $rows->published_at == null ? '<b class="text-warning">Belum Tayang</b>' : '<b class="text-info">Sudah Tayang</b>';
            $data[] = $row;
        }
        $output = array(
            "total" => $this->program->total(),
            "totalNotFiltered" => $this->program->countAllResults(),
            "rows" => $data,
        );
        echo json_encode($output);
    }

    public function Post()
    {
        $this->data = array('title' => 'Post Program | Admin', 'breadcome' => 'Post Program', 'url' => 'program/', 'm_open_program' => 'menu-open', 'mm_program' => 'active', 'm_post_program' => 'active', 'session' => $this->session);

        echo view('App\Views\program\post-program', $this->data);
    }

    public function create()
    {
        $this->data = array('action' => 'insert', 'btn' => '<i class="fas fa-save"></i> Save');
        $num_of_row = $this->request->getPost('num_of_row');
        for ($x = 1; $x <= $num_of_row; $x++) {
            $data['nama'] = 'Data ' . $x;
            $this->data['form_input'][] = view('App\Views\program\form_input', $data);
        }
        $status['html']         = view('App\Views\program\form_modal', $this->data);
        $status['modal_title']  = 'Tambah Data Program';
        $status['modal_size']   = 'modal-xl';
        echo json_encode($status);
    }
    public function edit()
    {
        $id = $this->request->getPost('id');
        $get = $this->program->find($id);
        $galeri = $this->galerim->galeriLikeWhere('program_', $id)->findAll();
        $this->data = array('get' => $get, 'gambar' => $galeri, 'action' => 'update', 'status' => $this->request->getPost('status'));
        $status['html']         = view('App\Views\program\form_input', $this->data);
        $status['modal_title']  = '<b>Update Program : </b>' . $get->judul;
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
                    'judul' => $this->request->getPost('judul'),
                    'isi_program' => $this->request->getVar('isi'),
                    'published_at' => null,
                );
                if ($this->program->insert($data)) {
                    foreach ($files as $pic) {
                        $file_name = 'program_' . $pic->getRandomName();
                        if ($this->upload_img($file_name, $pic)) {
                            array_push($galeri, [
                                'id_sumber' => $this->program->getInsertID(),
                                'sumber'    => $file_name,
                                'id_user'   => session('user_id')
                            ]);
                        }
                    }
                    $this->galerim->insertBatch($galeri);
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Program Baru Telah Di Tambahkan';
                    $status['redirect'] = 'program';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->program->errors();
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                $files = $this->request->getFileMultiple('userfile');
                $galeri = [];
                $data =  array(
                    'judul' => $this->request->getPost('judul'),
                    'isi_program' => $this->request->getVar('isi'),
                );
                if ($this->program->update($id, $data)) {
                    if ($files[0]->getError() !== 4) {
                        $get = $this->galerim->where('id_sumber', $id)->findAll();
                        foreach ($get as $pic) {
                            unlink(WRITEPATH . "uploads/img/$pic->sumber"); // delete terlebih dahulu
                            unlink(WRITEPATH . "uploads/thumbs/$pic->sumber"); // delete terlebih dahulu
                        }
                        $this->galerim->where('id_sumber', $id)->delete(); // delete dari database
                        foreach ($files as $pic) { // masukan gambar baru
                            $file_name = 'program_' . $pic->getRandomName();
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
                    $status['text'] = 'Program Telah Di Ubah';
                    $status['redirect'] = 'program';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->program->errors();
                }
                echo json_encode($status);
                break;
            case 'publish':
                $id = $this->request->getPost('id');
                if ($this->program->update($id, ['published_at' => Time::now()])) {
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Data program Telah Di Tayangkan';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->program->errors();
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

/* End of file program.php */
/* Location: ./app/controllers/program.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-05-31 04:44:35 */
/* http://harviacode.com */