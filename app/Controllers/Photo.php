<?php

namespace App\Controllers;

use App\Models\PhotoM;

class Photo extends BaseController
{
    protected $photom;
    function __construct()
    {
        $this->photom = new PhotoM();
    }
    public function index()
    {
        $this->data = array('title' => 'Photo | Admin', 'breadcome' => 'Photo', 'url' => 'photo/', 'm_photo' => 'active', 'session' => $this->session);

        echo view('App\Views\photo\photo_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->photom->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['judul'] = $rows->judul;
            $row['deskripsi'] = $rows->deskripsi;
            $row['status'] = $rows->status == 1 ? '<div class="text-center"><i class="fa fa-check text-success"></i> Tayang</div>' : '<div class="text-center"><i class="fa fa-times text-danger"></i> Tidak Tayang</div>';
            $row['users_id'] = ucwords($rows->nama_user);
            $row['sumber'] =
                '<img width="250" alt="Berita Image" src="' . site_url("Berita/img_medium/" . $rows->sumber) . '" class="mb-3 img-responsive" />';
            $data[] = $row;
        }
        $output = array(
            "total" => $this->photom->total(),
            "totalNotFiltered" => $this->photom->countAllResults(),
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
            $this->data['form_input'][] = view('App\Views\photo\form_input', $data);
        }
        $status['html']         = view('App\Views\photo\form_modal', $this->data);
        $status['modal_title']  = 'Tambah Data Photo';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function edit()
    {
        $id = $this->request->getPost('id');
        $this->data = array('action' => 'update', 'btn' => '<i class="fas fa-edit"></i> Edit');
        foreach ($id as $ids) {
            $get = $this->photom->find($ids);
            $data = array(
                'nama' => '<b>' . "et-nama" . '</b>',
                'get' => $get,
            );
            $this->data['form_input'][] = view('App\Views\photo\form_input', $data);
        }
        $status['html']         = view('App\Views\photo\form_modal', $this->data);
        $status['modal_title']  = 'Update Data Photo';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function save()
    {
        switch ($this->request->getPost('action')) {
            case 'insert':

                $nama = $this->request->getPost('id');
                $data = array();

                foreach ($nama as $key => $val) {
                    $sumber = $this->request->getFiles('sumber')['sumber'][$key];
                    $fileName = $sumber->getRandomName();
                    $img = $this->upload_img($fileName, $sumber);
                    array_push($data, array(
                        'judul' => $this->request->getPost('judul')[$key],
                        'deskripsi' => $this->request->getPost('deskripsi')[$key],
                        'users_id' => session('user_id'),
                        'sumber' => $fileName,
                    ));
                }
                if ($img) {

                    if ($this->photom->insertBatch($data)) {
                        $status['type'] = 'success';
                        $status['text'] = 'Data Photo Tersimpan';
                    } else {
                        $status['type'] = 'error';
                        $status['text'] = $this->photom->errors();
                    }
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->validator->getError('sumber');
                }
                echo json_encode($status);
                break;

            case 'update':
                $id = $this->request->getPost('id');
                $data = array();
                foreach ($id as $key => $val) {

                    $sumber = $this->request->getFiles('sumber')['sumber'][$key];
                    $fileName = $sumber->getRandomName();

                    if ($this->upload_img($fileName, $sumber)) {

                        array_push($data, array(
                            'id' => $val,
                            'judul' => $this->request->getPost('judul')[$key],
                            'deskripsi' => $this->request->getPost('deskripsi')[$key],
                            'status' => 0,
                            'users_id' => session('user_id'),
                            'sumber' => $fileName,
                        ));
                    }
                }



                if ($this->photom->updateBatch($data, 'id')) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Photo Telah Di Ubah';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->photom->errors();
                }



                echo json_encode($status);
                break;
            case 'delete':

                if ($this->photom->delete($id = $this->request->getPost('id'))) {

                    $status['type'] = 'success';
                    $status['text'] = '<strong>Deleted..!</strong>Berhasil dihapus';
                    if ($status['type'] == 'succes') {
                        foreach ($id as $key => $val) {
                            $result = $this->photom->find($val);
                            unlink(WRITEPATH . 'uploads/img/' . $result->sumber);
                            unlink(WRITEPATH . 'uploads/thumbs/' . $result->sumber);
                        }
                    }
                } else {
                    $status['type'] = 'error';
                    $status['text'] = '<strong>Oh snap!</strong> Proses hapus data gagal.';
                }
                echo json_encode($status);
                break;

            case 'publish':
                $id = $this->request->getPost('id');
                $data = [];

                foreach ($id as $key => $val) {
                    $get = $this->photom->find($val);
                    $status = $get->status == 1 ? 0 : 1;
                    array_push($data, array(
                        'id' => $val,
                        'status' => $status
                    ));
                }
                if ($this->photom->updateBatch($data, 'id')) {
                    $status = [
                        'type' => 'success',
                        'text' => 'Data Photo Telah Di Publish'
                    ];
                } else {
                    $status = [
                        'type' => 'Error',
                        'text' => $this->photom->errors()
                    ];
                }

                echo json_encode($status);
                break;
        }
    }

    // upload img

    private function upload_img($file_name, $img): bool
    {
        $validationRule = [
            'sumber[]' => [
                'label' => 'IMG File',
                'rules' => 'uploaded[sumber]'
                    . '|is_image[sumber]'
                    . '|mime_in[sumber,image/jpg,image/jpeg,image/png]'
                    . '|max_size[sumber,2048]'
                // . '|max_dims[sumber,1920,1080]',
            ],
        ];
        if (!$this->validate($validationRule)) {
            $this->session->setFlashdata('error', $this->validator->getError('sumber'));
            return false;
        }


        $filepath = WRITEPATH . 'uploads/';
        // $file_old = $this->request->getPost('old_file[]');

        if (!$img->hasMoved()) {

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

/* End of file Photo.php */
/* Location: ./app/controllers/Photo.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-07 06:11:55 */
/* http://harviacode.com */