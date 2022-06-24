<?php

namespace App\Controllers;

use App\Models\BeritaModel;

class Home extends BaseController
{

    function __construct()
    {
        $this->beritam = new BeritaModel();
        $this->db = db_connect();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard | Kec. Kaidipang',
            'statistikJS' => true,
            'berita' => $this->beritam->findAll(),
            'm_home' => 'active'
        ];

        return view('App\Views\template_adminlte\home', $data);
    }

    public function api()
    {
        $id = $this->request->getPost('id');
        if ($id == null) {
            $desa = $this->statistikm->select('desa tahun')->groupBy('desa')->selectCount('desa', 'jumlah')->findAll();
        }else{
            $desa = $this->statistikm->select('desa tahun')->where('tahun', $id)->groupBy('desa')->selectCount('desa', 'jumlah')->findAll();
        }
        $data = [
            'statistik' => $this->statistikm->select('tahun, nik')->groupBy('tahun')->selectCount('nik', 'jumlah')->findAll(),
            'desa' => $desa
        ];

        return json_encode($data);
    }
}
