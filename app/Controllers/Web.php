<?php

namespace App\Controllers;

use App\Models\AgendaM;
use App\Models\BeritaModel;
use App\Models\BeritaViewModel;
use App\Models\GaleriModel;
use App\Models\KulinerModel;
use App\Models\PariwisataModel;
use App\Models\PegawaiM;
use App\Models\PenginapanModel;
use App\Models\PotensiModel;
use App\Models\ProfilM;
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
        $this->agendaModel = new AgendaM();
        $this->programModel = new ProgramModel();
        $this->pariwisataModel = new PariwisataModel();
        $this->kulinerModel = new KulinerModel();
        $this->penginapanModel = new PenginapanModel();
        $this->galeriModel = new GaleriModel();
        $this->potensiModel = new PotensiModel();
        $this->statistikModel = new StatistikModel();
        $this->BVModel = new BeritaViewModel();
        $this->pegawaim = new PegawaiM();
        $this->profilm = new ProfilM();
        $this->db = db_connect();
        $this->agendaSidebar = $this->agendaModel->orderBy('id', 'desc')->findAll(5);
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

    public function index()
    {
        $data = [
            'beritaPopuler' => $this->BVModel->get_counter(),
            'title'     => "Home",
            'active'    => 'home',
            'berita'    => $this->beritaModel->joinGaleriThumbPublish()->orderBy('berita.id', 'DESC')->findAll(10),
            'pariwisata' => $this->pariwisataModel->joinGaleriGroupByIdSumber()->findAll(),
            'program'   => $this->programModel->joinGaleriGroupByIdSumber()->where(['program.published_at !=' => null])->findAll(),
            'agenda'    => $this->agendaSidebar
        ];

        return view("App\Views\web\home", $data);
    }

    public function tentang()
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->BVModel->get_counter(),
            'pariwisata' => $this->pariwisataModel->joinGaleriGroupByIdSumber()->findAll(),
            'title'     => "Sekilas Kaidipang",
            'active'    => 'tentang'
        ];
        return view("App\Views\web\web_tentang", $data);
    }

    public function obyek_wisata()
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->BVModel->get_counter(),
            'pariwisata' => $this->pariwisataModel->joinGaleriGroupByIdSumber()->findAll(),
            'title'     => "Daftar Obyek Wisata",
            'active'    => 'pariwisata'
        ];
        return view("App\Views\web\web_obyekWisata", $data);
    }

    public function kuliner()
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->BVModel->get_counter(),
            'kuliner'    => $this->kulinerModel->joinGaleriGroupByIdSumber()->findAll(),
            'title'     => "Daftar Kuliner",
            'active'    => 'home'
        ];
        return view("App\Views\web\web_kuliner", $data);
    }

    public function penginapan()
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->BVModel->get_counter(),
            'penginapan' => $this->penginapanModel->joinGaleriGroupByIdSumber()->findAll(),
            'title'     => "Daftar Penginapan",
            'active'    => 'home'
        ];
        return view("App\Views\web\web_penginapan", $data);
    }

    // PROFIL
    public function sejarah()
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->BVModel->get_counter(),
            'sejarah'   => $this->profilm->find(1),
            'title'     => "Sejarah",
            'active'    => "profil"
        ];
        return view("App\Views\web\profil\web_sejarah", $data);
    }

    public function geografis()
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->BVModel->get_counter(),
            'geografis' => $this->profilm->find(2),
            'title'     => "Letak Geografis",
            'active'    => "profil"
        ];
        return view("App\Views\web\profil\web_geografis", $data);
    }

    public function adat_budaya()
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->BVModel->get_counter(),
            'adat'   => $this->profilm->find(3),
            'title'     => "Adat & Budaya",
            'active'    => "profil"
        ];
        return view("App\Views\web\profil\web_adatBudaya", $data);
    }

    public function visi_misi()
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->BVModel->get_counter(),
            'visimisi'  => $this->profilm->find(4),
            'title'     => "Visi & Misi",
            'active'    => "profil"
        ];
        return view("App\Views\web\profil\web_visiMisi", $data);
    }

    public function prestasi()
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->BVModel->get_counter(),
            'title'     => "Prestasi Kecamatn Kaidipang",
            'active'    => "profil"
        ];
        return view("App\Views\web\profil\web_prestasi", $data);
    }

    public function struktur()
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->BVModel->get_counter(),
            'struktur'  => $this->pegawaim->findAll(),
            'title'     => 'Struktur Organisasi',
            'active'    => 'profil'
        ];
        return view("App\Views\web\profil\web_struktur", $data);
    }
    // END PROFIL==========================================================================>




    // PUBLIKASI
    public function berita_kecamatan()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword == null) {
            $data_berita = $this->beritaModel->joinGaleriThumbPublish()->paginate(3, 'berita');
        } else {
            $data_berita = $this->beritaModel->joinGaleriThumbPublish()->like('judul', $keyword)->paginate(3, 'berita');
        }
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->BVModel->get_counter(),
            'title'     => "Berita Kecamatan",
            'active'    => "publikasi",
            'keyword'   => $keyword,
            'berita'    => $data_berita,
            'pager'     => $this->beritaModel->pager
        ];
        return view("App\Views\web\publikasi\web_berita_kec", $data);
    }

    // public function berita_kabupaten()
    // {
    //     $keyword = $this->request->getVar('keyword');
    //     if ($keyword == null) {
    //         $data_berita = $this->beritaModel->where(['level' => 2, 'published_at !=' => null])->paginate(3, 'berita');
    //     } else {
    //         $data_berita = $this->beritaModel->where(['level' => 2, 'published_at !=' => null])->like('judul', $keyword)->paginate(3, 'berita');
    //     }
    //     $data = [
    //         'agenda'    => $this->agendaSidebar,
    //         'beritaPopuler' => $this->BVModel->get_counter(),
    //         'title'     => "Berita Kabupaten",
    //         'active'    => "publikasi",
    //         'berita'    => $data_berita,
    //         'keyword'   => $keyword,
    //         'pager'     => $this->beritaModel->pager
    //     ];
    //     return view("App\Views\web\publikasi\web_berita_kab", $data);
    // }

    // public function berita_provinsi()
    // {
    //     $keyword = $this->request->getVar('keyword');
    //     if ($keyword == null) {
    //         $data_berita = $this->beritaModel->where(['level' => 1, 'published_at !=' => null])->paginate(3, 'berita');
    //     } else {
    //         $data_berita = $this->beritaModel->where(['level' => 1, 'published_at !=' => null])->like('judul', $keyword)->paginate(3, 'berita');
    //     }
    //     $data = [
    //         'agenda'    => $this->agendaSidebar,
    //         'beritaPopuler' => $this->BVModel->get_counter(),
    //         'title'     => "Berita Provinsi",
    //         'active'    => "publikasi",
    //         'berita'    => $data_berita,
    //         'keyword'   => $keyword,
    //         'pager'     => $this->beritaModel->pager
    //     ];
    //     return view("App\Views\web\publikasi\web_berita_prov", $data);
    // }

    public function galeri()
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->BVModel->get_counter(),
            'berita'    => $this->beritaModel->where('status', 1)->findAll(),
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
            'beritaPopuler' => $this->BVModel->get_counter(),
            'agendaFull' => $this->agendaModel->findAll(),
            'title'     => "Agenda",
            'active'    => "publikasi"
        ];
        return view("App\Views\web\publikasi\web_agenda", $data);
    }

    public function program_kegiatan()
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->BVModel->get_counter(),
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
            'beritaPopuler' => $this->BVModel->get_counter(),
            'wisata'    => $this->pariwisataModel->joinGaleriGroupByIdSumber()->findAll(3),
            'kuliner'   => $this->kulinerModel->joinGaleriGroupByIdSumber()->findAll(3),
            'penginapan'   => $this->penginapanModel->joinGaleriGroupByIdSumber()->findAll(3),
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
        if ($bidang == null) {
            $data_potensi = $this->potensiModel->findAll();
        } else {
            $data_potensi = $this->potensiModel->where('level', $bidang)->findAll();
        }
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->BVModel->get_counter(),
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
        if ($bidang == null) {
            $data_statistik = $this->statistikModel->findAll();
        } else {
            $data_statistik = $this->statistikModel->where('level', $bidang)->findAll();
        }
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->BVModel->get_counter(),
            'title'     => "Statistik",
            'active'    => "statistik",
            'statistik'    => $data_statistik,
            'bidang'   => $bidang,
            'myChart'   => true,
        ];
        return view('App\Views\web\web_statistik', $data);
    }

    public function api()
    {
        $bidang = $this->request->getPost('bidang');
        if ($bidang == null || !isset($bidang)) {
            return redirect('/');
        }
        $statistik = $this->statistikModel->select('statistik')->selectCount('statistik', 'total')->where('bidang', $bidang)->where('tahun', date('Y'))->groupBy('statistik')->findAll();
        $data = [
            'statistikData' => $statistik,
            'bidang'    => $bidang
        ];
        return json_encode($data);
    }
    // END STATISTIK==========================================================================>




    // DETAIL
    public function detail_berita($slug)
    {
        $params = explode("_", $slug);
        $slug = $params[0];
        $id = $params[1];
        $this->BVModel->set_counter($id, get_client_ip(), $_SERVER['HTTP_USER_AGENT']);
        $berita = $this->beritaModel->select('berita.*, u.nama_user')->joinGaleriThumbPublish()->joinUser()->where('slug', $slug)->first();
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->BVModel->get_counter(),
            'title'     => str_replace("-", " ", $slug),
            'active'    => 'publikasi',
            'detail'    =>  "berita",
            'berita'    => $berita,
            // 'user'      => $this->db->table('users')->where('id', $berita['id_user'])->get()->getRow(),
            'beritaLain' => $this->beritaModel->joinGaleriThumbPublish()->where('slug !=', $slug)->orderBy('berita.id', "DESC")->findAll(2),
            'total'     => count($this->BVModel->where(['id_berita' => $id])->findAll())
        ];
        return view("App\Views\web\publikasi\web_berita_detail", $data);
    }

    public function detail_obwisata($id)
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->BVModel->get_counter(),
            'title'     => "Pariwisata",
            'active'    => 'publikasi',
            'detail'    => "Obyek Wisata",
            'gambar'    => $this->galeriModel->galeriLikeWhere('pariwisata_', $id)->findAll(),
            'pariwisata' => $this->pariwisataModel->joinGaleriGroupById()->where('pariwisata.id', $id)->first(),
            'pariwisataLain' => $this->pariwisataModel->joinGaleriGroupById()->where('pariwisata.id !=', $id)->findAll()
        ];
        return view("App\Views\web\publikasi\web_obwisata_detail", $data);
    }

    public function detail_kuliner($id)
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->BVModel->get_counter(),
            'title'     => "Daftar Kuliner",
            'active'    => 'home',
            'detail'    => "Kuliner",
            'gambar'    => $this->galeriModel->galeriLikeWhere('kuliner_', $id)->findAll(),
            'kuliner' => $this->kulinerModel->joinGaleriGroupById()->where('kuliner.id', $id)->first(),
            'kulinerLain' => $this->kulinerModel->joinGaleriGroupById()->where('kuliner.id !=', $id)->findAll()
        ];
        return view("App\Views\web\publikasi\web_kuliner_detail", $data);
    }

    public function detail_penginapan($id)
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->BVModel->get_counter(),
            'title'     => "Daftar Penginapan",
            'active'    => 'home',
            'detail'    => "Penginapan",
            'gambar'    => $this->galeriModel->galeriLikeWhere('penginapan_', $id)->findAll(),
            'penginapan' => $this->penginapanModel->joinGaleriGroupById()->where('penginapan.id', $id)->first(),
            'penginapanLain' => $this->penginapanModel->joinGaleriGroupById()->where('penginapan.id !=', $id)->findAll()
        ];
        return view("App\Views\web\publikasi\web_penginapan_detail", $data);
    }

    public function detail_agenda($slug)
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->BVModel->get_counter(),
            'title'     => "Detail Agenda",
            'active'    => "publikasi",
            'detail'    => "Agenda",
            'detailAgenda' => $this->agendaModel->where('slug', $slug)->first(),
        ];
        return view("App\Views\web\publikasi\web_agenda_detail", $data);
    }

    public function detail_program($id)
    {
        $data = [
            'agenda'    => $this->agendaSidebar,
            'beritaPopuler' => $this->BVModel->get_counter(),
            'title'     => "Detail Program",
            'active'    => 'publikasi',
            'detail'    => "Program",
            'gambar'    => $this->galeriModel->galeriLikeWhere('program_', $id)->findAll(),
            'program' => $this->programModel->joinGaleriGroupByIdSumber()->where('program.id', $id)->first(),
            'programLain' => $this->programModel->joinGaleriGroupByIdSumber()->where('program.id !=', $id)->findAll()
        ];
        return view("App\Views\web\publikasi\web_program_detail", $data);
    }
    // END DETAIL==========================================================================>
}
