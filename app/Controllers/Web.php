<?php

namespace App\Controllers;

use App\Models\AgendaModel;
use App\Models\BeritaModel;
use App\Models\BeritaViewModel;
use App\Models\GaleriModel;
use App\Models\PariwisataModel;
use App\Models\PotensiModel;
use App\Models\ProgramModel;
use App\Models\StatistikModel;
use CodeIgniter\I18n\Time;

class Web extends BaseController
{
    protected $beritaModel, $agendaModel, $programModel, $pariwisataModel;
    public function __construct()
    {
        helper(['get_client_ip', 'hari_indo']);
        $this->beritaModel = new BeritaModel();
        $this->agendaModel = new AgendaModel();
        $this->programModel = new ProgramModel();
        $this->pariwisataModel = new PariwisataModel();
        $this->galeriModel = new GaleriModel();
        $this->potensiModel = new PotensiModel();
        $this->statistikModel = new StatistikModel();
        $this->BVModel = new BeritaViewModel();
        $this->db = db_connect();
        $this->agendaSidebar = $this->agendaModel->limit(5)->findAll();
    }

    public function index()
    {
        $data = [
            'beritaPopuler' => $this->beritaModel->get_counter(),
            'title'     => "Home",
            'active'    => 'home',
            'program'   => $this->programModel->joinGaleriGroupByIdSumber()->where(['program.published_at !='=>null])->findAll(),
            'berita'    => $this->beritaModel->where('published_at !=', null)->findAll(),
            'pariwisata'=> $this->pariwisataModel->joinGaleriGroupByIdSumber()->findAll(),
            'agenda'    => $this->agendaSidebar
        ];
        return view("App\Views\web\home", $data);
    }
    
    public function tentang()
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->beritaModel->get_counter(),
            'title'     => "Sekilas Kaidipang",
            'active'    => 'tentang'
        ];
        return view("App\Views\web\web_tentang", $data);
    }
    
    public function obyek_wisata()
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->beritaModel->get_counter(),
            'pariwisata'=> $this->pariwisataModel->joinGaleriGroupByIdSumber()->findAll(),
            'title'     => "Daftar Obyek Wisata",
            'active'    => 'pariwisata'
        ];
        return view("App\Views\web\web_obyekWisata", $data);
    }
    
    // PROFIL
    public function sejarah()
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->beritaModel->get_counter(),
            'title'     => "Sejarah",
            'active'    => "profil"
        ];
        return view("App\Views\web\profil\web_sejarah", $data);
    }

    public function geografis()
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->beritaModel->get_counter(),
            'title'     => "Letak Geografis",
            'active'    => "profil"
        ];
        return view("App\Views\web\profil\web_geografis", $data);
    }

    public function adat_budaya()
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->beritaModel->get_counter(),
            'title'     => "Adat & Budaya",
            'active'    => "profil"
        ];
        return view("App\Views\web\profil\web_adatBudaya", $data);
    }

    public function visi_misi()
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->beritaModel->get_counter(),
            'title'     => "Visi & Misi",
            'active'    => "profil"
        ];
        return view("App\Views\web\profil\web_visiMisi", $data);
    }

    public function prestasi()
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->beritaModel->get_counter(),
            'title'     => "Prestasi Kecamatn Kaidipang",
            'active'    => "profil"
        ];
        return view("App\Views\web\profil\web_prestasi", $data);
    }

    public function struktur()
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->beritaModel->get_counter(),
            'title'     => "Struktur Organisasi",
            'active'    => "profil"
        ];
        return view("App\Views\web\profil\web_struktur", $data);
    }
    // END PROFIL==========================================================================>




    // PUBLIKASI
    public function berita_kecamatan()
    {
        $keyword = $this->request->getVar('keyword');
        if($keyword == null) {
            $data_berita = $this->beritaModel->where(['level'=> 3, 'published_at !=' => null])->paginate(3, 'berita');
        }else {
            $data_berita = $this->beritaModel->where(['level'=> 3, 'published_at !=' => null])->like('judul', $keyword)->paginate(3, 'berita');
        }
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->beritaModel->get_counter(),
            'title'     => "Berita Kecamatan",
            'active'    => "publikasi",
            'keyword'   => $keyword,
            'berita'    => $data_berita,
            'pager'     => $this->beritaModel->pager
        ];
        return view("App\Views\web\publikasi\web_berita_kec", $data);
    }

    public function berita_kabupaten()
    {
        $keyword = $this->request->getVar('keyword');
        if($keyword == null) {
            $data_berita = $this->beritaModel->where(['level'=> 2, 'published_at !=' => null])->paginate(3, 'berita');
        }else {
            $data_berita = $this->beritaModel->where(['level'=> 2, 'published_at !=' => null])->like('judul', $keyword)->paginate(3, 'berita');
        }
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->beritaModel->get_counter(),
            'title'     => "Berita Kabupaten",
            'active'    => "publikasi",
            'berita'    => $data_berita,
            'keyword'   => $keyword,
            'pager'     => $this->beritaModel->pager
        ];
        return view("App\Views\web\publikasi\web_berita_kab", $data);
    }

    public function berita_provinsi()
    {
        $keyword = $this->request->getVar('keyword');
        if($keyword == null) {
            $data_berita = $this->beritaModel->where(['level'=> 1, 'published_at !=' => null])->paginate(3, 'berita');
        }else {
            $data_berita = $this->beritaModel->where(['level'=> 1, 'published_at !=' => null])->like('judul', $keyword)->paginate(3, 'berita');
        }
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->beritaModel->get_counter(),
            'title'     => "Berita Provinsi",
            'active'    => "publikasi",
            'berita'    => $data_berita,
            'keyword'   => $keyword,
            'pager'     => $this->beritaModel->pager
        ];
        return view("App\Views\web\publikasi\web_berita_prov", $data);
    }

    public function galeri()
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->beritaModel->get_counter(),
            'berita'    => $this->beritaModel->where('published_at !=', null)->findAll(),
            'program'   => $this->programModel->joinGaleriGroupByIdSumber()->findAll(),
            'gambar'    => $this->galeriModel->findAll(),
            'title'     => "Galeri",
            'active'    => "publikasi"
        ];
        return view("App\Views\web\publikasi\web_galeri", $data);
    }

    public function agenda()
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->beritaModel->get_counter(),
            'agendaFull'=> $this->agendaModel->findAll(),
            'title'     => "Agenda",
            'active'    => "publikasi"
        ];
        return view("App\Views\web\publikasi\web_agenda", $data);
    }

    public function program_kegiatan()
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->beritaModel->get_counter(),
            'program'   => $this->programModel->joinGaleriGroupByIdSumber()->where('program.published_at !=', null)->findAll(),
            'title'     => "Program Kegiatan",
            'active'    => "publikasi"
        ];
        return view("App\Views\web\publikasi\web_program", $data);
    }

    public function info_wisatawan()
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->beritaModel->get_counter(),
            'title'     => "Informasi Wisatawan",
            'active'    => "publikasi"
        ];
        return view("App\Views\web\publikasi\web_infoWisata", $data);
    }
    // END PUBLIKASI==========================================================================>




    // POTENSI
    public function potensi()
    {
        $bidang = $this->request->getVar('bidang');
        if($bidang == null) {
            $data_potensi = $this->potensiModel->findAll();
        }else {
            $data_potensi = $this->potensiModel->where('level', $bidang)->findAll();
        }
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->beritaModel->get_counter(),
            'title'     => "Potensi",
            'active'    => "potensi",
            'potensi'    => $data_potensi,
            'bidang'   => $bidang,
        ];
        return view('App\Views\web\web_potensi', $data);
    }
    // END POTENSI==========================================================================>




    // STATISTIK
    public function statistik()
    {
        $bidang = $this->request->getVar('bidang');
        if($bidang == null) {
            $data_statistik = $this->statistikModel->findAll();
        }else {
            $data_statistik = $this->statistikModel->where('level', $bidang)->findAll();
        }
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->beritaModel->get_counter(),
            'title'     => "Statistik",
            'active'    => "statistik",
            'statistik'    => $data_statistik,
            'bidang'   => $bidang,
        ];
        return view('App\Views\web\web_statistik', $data);
    }
    // END STATISTIK==========================================================================>




    // DETAIL
    public function detail_berita($slug)
    {
        $params = explode("_", $slug);
        $slug = $params[0];
        $id = $params[1];
        $this->beritaModel->set_counter($id, get_client_ip(), $_SERVER['HTTP_USER_AGENT']);
        $berita = $this->beritaModel->where('slug', $slug)->first();
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->beritaModel->get_counter(),
            'title'     => str_replace("-", " ", $slug),
            'active'    => 'publikasi',
            'detail'    =>  "berita",
            'berita'    => $berita,
            // 'user'      => $this->db->table('users')->where('id', $berita['id_user'])->get()->getRow(),
            'beritaLain' => $this->beritaModel->where('slug !=', $slug)->orderBy('id', "DESC")->findAll(2),
            'total'     => count($this->BVModel->where(['id_berita' => $id])->findAll())
        ];
        return view("App\Views\web\publikasi\web_berita_detail", $data);
    }

    public function detail_obwisata($id)
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->beritaModel->get_counter(),
            'title'     => "Pariwisata",
            'active'    => 'publikasi',
            'detail'    => "Obyek Wisata",
            'pariwisata' => $this->pariwisataModel->joinGaleriGroupById()->where('pariwisata.id', $id)->first(),
            'pariwisataLain'=> $this->pariwisataModel->where('pariwisata.id !=', $id)->findAll()
        ];
        return view("App\Views\web\publikasi\web_obwisata_detail", $data);
    }

    public function detail_kuliner($id)
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->beritaModel->get_counter(),
            'title'     => "Kuliner",
            'active'    => 'publikasi',
            'detail'    => "$id Kuliner",
        ];
        return view("App\Views\web\publikasi\web_obwisata_detail", $data);
    }

    public function detail_penginapan($id)
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->beritaModel->get_counter(),
            'title'     => "Penginapan",
            'active'    => 'publikasi',
            'detail'    => "$id Penginapan",
        ];
        return view("App\Views\web\publikasi\web_penginapan_detail", $data);
    }
    // END DETAIL==========================================================================>
}
