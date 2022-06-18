<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GambarModel;


class Gambar extends BaseController
{

    protected $gambarM;
    function __construct()
    {
        $this->gambarM = new GambarModel();
    }

    public function index()
    {

        $data = [
            'title' => 'gambar | Admin',
            'breadcome' => 'Gambar',
            'url' => 'gambar/',
            'm_photo' => 'active',
            'session' => $this->session
        ];

        echo view('App\Views\gambar\gambar_list', $data);
    }
}
