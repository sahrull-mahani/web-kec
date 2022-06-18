<?php

namespace App\Controllers;

use App\Models\BeritaM;
use App\Models\PhotoM;
use App\Models\VideoM;
use App\Models\StatistikM;

class Home extends BaseController
{

    function __construct()
    {
        $this->beritam = new BeritaM();
        $this->videom = new VideoM();
        $this->photom = new PhotoM();
        $this->statistikm = new StatistikM();
        $this->db = db_connect();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard | Stunting',
            'statistikJS' => true,
            'berita' => $this->beritam->findAll(),
            'photo' => $this->photom->findAll(),
            'video' => $this->videom->findAll(),
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
