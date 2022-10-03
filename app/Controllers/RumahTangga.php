<?php

namespace App\Controllers;

use App\Models\EnumeratorM;
use App\Models\IndividuM;
use App\Models\RumahTanggaM;
use CodeIgniter\I18n\Time;

class RumahTangga extends BaseController
{
    function __construct()
    {
        $this->rumahtanggam = new RumahTanggaM();
        $this->individum = new IndividuM();
        $this->enumeratorm = new EnumeratorM();
        helper('number');
    }
    public function index()
    {
        $this->data = array('title' => 'Kuisioner Rumah Tangga | Admin', 'breadcome' => 'Kuisioner Rumah Tangga', 'url' => 'rumahtangga/', 'm_open_rumahtangga' => 'menu-open', 'mm_rumahtangga' => 'active', 'm_rumahtangga' => 'active', 'session' => $this->session);

        echo view('App\Views\rumahtangga\rumahtangga_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->rumahtanggam->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['nama'] = ucwords($rows->nama);
            $row['alamat'] = ucwords($rows->alamat);
            $row['nomor telepon'] = $rows->no_hp;
            $data[] = $row;
        }
        $output = array(
            "total" => $this->rumahtanggam->total(),
            "totalNotFiltered" => $this->rumahtanggam->countAllResults(),
            "rows" => $data,
        );
        echo json_encode($output);
    }

    private function getApi($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);

        $result = json_decode($result, true);
        return $result;
    }

    public function rt()
    {
        $id = $this->request->getPost('value');
        if ($this->individum->where('id', $id)->countAllResults() > 0) {
            return json_encode(['data' => $this->individum->where('id', $id)->first()]);
        }
        return '404';
    }

    public function Post()
    {

        // $this->data = array('title' => 'Post Kuisioner Rumah Tangga | Admin', 'breadcome' => 'Post Kuisioner Rumah Tangga', 'url' => 'rumahtangga/', 'm_open_rumahtangga' => 'menu-open', 'mm_rumahtangga' => 'active', 'm_post_rumahtangga' => 'active', 'session' => $this->session);


        $this->data = array(
            'title' => 'Post Kuisioner Rumah Tangga | Admin',
            'breadcome' => 'Post Kuisioner Rumah Tangga',
            'url' => 'rumahtangga/',
            'm_open_rumahtangga' => 'menu-open',
            'mm_rumahtangga' => 'active',
            'm_post_rumahtangga' => 'active',
            'get' => $this->rumahtanggam->findAll(),
            'individu' => $this->individum->findAll(),
            'provinsi' => getApi('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json'),
            'session' => $this->session
        );

        echo view('App\Views\rumahtangga\post-rumahtangga', $this->data);
    }

    public function single_detail($id)
    {
        $get = $this->rumahtanggam->select('rumahtangga.*, ind.*, enum.*, ind.id indID, enum.id enumID')->join('individu ind', 'ind.id = rumahtangga.individu_id')->join('enumerator enum', 'enum.rumahtangga_id = rumahtangga.id')->where('rumahtangga.id', $id)->first();
        $this->data = array('title' => 'Detail Kuisioner Rumah Tangga | Admin', 'breadcome' => 'Detail Kuisioner Rumah Tangga', 'url' => 'rumahtangga/', 'm_open_rumahtangga' => 'menu-open', 'mm_rumahtangga' => 'active', 'm_post_rumahtangga' => 'active', 'session' => $this->session, 'provinsi' => getApi('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json'), 'get' => $get);
        // $id = $this->request->getPost('id');

        // $get = $this->individum->select('individu.*, k.*, pk.*, pd.*, k.id kesID, pk.id pekID, pd.id penID')->join('pekerjaan pk', 'pk.individu_id = individu.id')->join('kesehatan k', 'k.individu_id = individu.id')->join('pendidikan pd', 'pd.individu_id = individu.id')->where('individu.id', $id)->first();
        // $this->data = array(
        //     'provinsi' => getApi('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json'),
        //     'get' => $get
        // );
        // $status['html']         = view('App\Views\individu\detail-individu', $this->data);
        // $status['modal_title']  = '<b>Detail Kuisioner Individu : </b>' . $get->nama;
        // $status['modal_size']   = 'modal-xl';
        return view('App\Views\rumahtangga\detail-rumahtangga', $this->data);
    }

    public function single_edit($id)
    {
        $get = $this->rumahtanggam->select('rumahtangga.*, ind.*, enum.*, ind.id indID, enum.id enumID')->join('individu ind', 'ind.id = rumahtangga.individu_id')->join('enumerator enum', 'enum.id = rumahtangga.enumerator_id')->where('rumahtangga.id', $id)->find($id);
        $this->data = array('title' => 'Post Kuisioner Rumah Tangga | Admin', 'breadcome' => 'Post Kuisioner Rumah Tangga', 'url' => 'rumahtangga/', 'm_open_rumahtangga' => 'menu-open', 'mm_rumahtangga' => 'active', 'm_post_rumahtangga' => 'active', 'session' => $this->session, 'provinsi' => getApi('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json'), 'individu' => $this->individum->findAll(), 'get' => $get);

        return view('App\Views\rumahtangga\post-rumahtangga', $this->data);
    }

    public function edit()
    {
        $id = $this->request->getPost('id');
        $get = $this->rumahtanggam->find($id);
        $this->data = array(
            'get' => $get,
            'individu' => $this->individum->findAll()
        );
        $status['html']         = view('App\Views\rumahtangga\form_input', $this->data);
        $status['modal_title']  = '<b>Update Kuisioner Rumah Tangga : </b>' . $get->nama_enum;
        $status['modal_size']   = 'modal-xl';
        echo json_encode($status);
    }
    public function save()
    {
        switch ($this->request->getPost('action')) {
            case 'insert':
                // $files = $this->request->getFileMultiple('userfile');

                $data =  array(
                    'user_id'    => session('user_id'),
                    'individu_id'    => $this->request->getVar('individu_id'),
                    'rt_rw'    => $this->request->getVar('rt_rw'),
                    'no_telp'    => $this->request->getVar('no_telp'),
                    'tempat_tinggal'    => $this->request->getVar('tempat_tinggal'),
                    'status_lahan'    => $this->request->getVar('status_lahan'),
                    'luas_lantai'    => $this->request->getVar('luas_lantai'),
                    'luas_lahan'    => $this->request->getVar('luas_lahan'),
                    'jenis_lantai'    => $this->request->getVar('jenis_lantai'),
                    'dinding'    => $this->request->getVar('dinding'),
                    'jendela'    => $this->request->getVar('jendela'),
                    'atap'    => $this->request->getVar('atap'),
                    'penerangan'    => $this->request->getVar('penerangan'),
                    'energi'    => $this->request->getVar('energi'),
                    'sumber_kayubakar'    => $this->request->getVar('sumber_kayubakar'),
                    'tps'    => $this->request->getVar('tps'),
                    'mck'    => $this->request->getVar('mck'),
                    'sumber_airmandi'    => $this->request->getVar('sumber_airmandi'),
                    'fasilitas_bab'    => $this->request->getVar('fasilitas_bab'),
                    'sumber_airminum'    => $this->request->getVar('sumber_airminum'),
                    'tempat_plc'    => $this->request->getVar('tempat_plc'),
                    'tower'    => $this->request->getVar('tower'),
                    'rumah_sungai'    => $this->request->getVar('rumah_sungai'),
                    'rumah_bukit'    => $this->request->getVar('rumah_bukit'),
                    'kondisi_rumah'    => $this->request->getVar('kondisi_rumah'),
                    'akses_pendidikan'    => $this->request->getVar('akses_pendidikan'),
                    'jarak_pendidikan'    => $this->request->getVar('jarak_pendidikan'),
                    'waktu_pendidikan'    => $this->request->getVar('waktu_pendidikan'),
                    'kemudahan_pendidikan'    => $this->request->getVar('kemudahan_pendidikan'),
                    'akses_kesehatan'    => $this->request->getVar('akses_kesehatan'),
                    'jarak_kesehatan'    => $this->request->getVar('jarak_kesehatan'),
                    'waktu_kesehatan'    => $this->request->getVar('waktu_kesehatan'),
                    'kemudahan_kesehatan'    => $this->request->getVar('kemudahan_kesehatan'),
                    'akses_nakes'    => $this->request->getVar('akses_nakes'),
                    'jarak_nakes'    => $this->request->getVar('jarak_nakes'),
                    'waktu_nakes'    => $this->request->getVar('waktu_nakes'),
                    'kemudahan_nakes'    => $this->request->getVar('kemudahan_nakes'),
                    'akses_transportasi'    => $this->request->getVar('akses_transportasi'),
                    'jenis_transportasi'    => $this->request->getVar('jenis_transportasi'),
                    'penggunaan_transportasi'    => $this->request->getVar('penggunaan_transportasi'),
                    'waktu_tempuh'    => $this->request->getVar('waktu_tempuh'),
                    'biaya'    => $this->request->getVar('biaya'),
                    'kemudahan_transportasi'    => $this->request->getVar('kemudahan_transportasi'),
                    'blt'    => $this->request->getVar('blt'),
                    'pkh'    => $this->request->getVar('pkh'),
                    'banst'    => $this->request->getVar('banst'),
                    'banpres'    => $this->request->getVar('banpres'),
                    'banumkm'    => $this->request->getVar('banumkm'),
                    'buk'    => $this->request->getVar('buk'),
                    'bpa'    => $this->request->getVar('bpa'),
                    'lainnya'    => $this->request->getVar('lainnya'),
                );

                $data2 = array(
                    'nama_enum'          => $this->request->getVar('nama_enum'),
                    'notelp_enum'    => $this->request->getVar('notelp_enum'),
                    'alamat_enum'    => $this->request->getVar('alamat_enum'),
                );
                if ($this->enumeratorm->insert($data2)) {
                    $id_enumerator = $this->enumeratorm->orderBy('id', 'DESC')->first()->id;
                    $data['enumerator_id'] = $id_enumerator;
                    $this->rumahtanggam->insert($data);
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Kuisioner Rumah Tangga Baru Telah Di Tambahkan';
                    $status['redirect'] = 'rumahtangga';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->rumahtanggam->errors();
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                // $files = $this->request->getFileMultiple('userfile');
                $data =  array(
                    'user_id'    => session('user_id'),
                    'individu_id'    => $this->request->getPost('individu_id'),
                    'rt_rw'    => $this->request->getPost('rt_rw'),
                    'no_telp'    => $this->request->getPost('no_telp'),
                    'tempat_tinggal'    => $this->request->getPost('tempat_tinggal'),
                    'status_lahan'    => $this->request->getPost('status_lahan'),
                    'luas_lantai'    => $this->request->getPost('luas_lantai'),
                    'luas_lahan'    => $this->request->getPost('luas_lahan'),
                    'jenis_lantai'    => $this->request->getPost('jenis_lantai'),
                    'dinding'    => $this->request->getPost('dinding'),
                    'jendela'    => $this->request->getPost('jendela'),
                    'atap'    => $this->request->getPost('atap'),
                    'penerangan'    => $this->request->getPost('penerangan'),
                    'energi'    => $this->request->getPost('energi'),
                    'sumber_kayubakar'    => $this->request->getPost('sumber_kayubakar'),
                    'tps'    => $this->request->getPost('tps'),
                    'mck'    => $this->request->getPost('mck'),
                    'sumber_airmandi'    => $this->request->getPost('sumber_airmandi'),
                    'fasilitas_bab'    => $this->request->getPost('fasilitas_bab'),
                    'sumber_airminum'    => $this->request->getPost('sumber_airminum'),
                    'tempat_plc'    => $this->request->getPost('tempat_plc'),
                    'tower'    => $this->request->getPost('tower'),
                    'rumah_sungai'    => $this->request->getPost('rumah_sungai'),
                    'rumah_bukit'    => $this->request->getPost('rumah_bukit'),
                    'kondisi_rumah'    => $this->request->getPost('kondisi_rumah'),
                    'akses_pendidikan'    => $this->request->getPost('akses_pendidikan'),
                    'jarak_pendidikan'    => $this->request->getPost('jarak_pendidikan'),
                    'waktu_pendidikan'    => $this->request->getPost('waktu_pendidikan'),
                    'kemudahan_pendidikan'    => $this->request->getPost('kemudahan_pendidikan'),
                    'akses_kesehatan'    => $this->request->getPost('akses_kesehatan'),
                    'jarak_kesehatan'    => $this->request->getPost('jarak_kesehatan'),
                    'waktu_kesehatan'    => $this->request->getPost('waktu_kesehatan'),
                    'kemudahan_kesehatan'    => $this->request->getPost('kemudahan_kesehatan'),
                    'akses_nakes'    => $this->request->getPost('akses_nakes'),
                    'jarak_nakes'    => $this->request->getPost('jarak_nakes'),
                    'waktu_nakes'    => $this->request->getPost('waktu_nakes'),
                    'kemudahan_nakes'    => $this->request->getPost('kemudahan_nakes'),
                    'akses_transportasi'    => $this->request->getPost('akses_transportasi'),
                    'jenis_transportasi'    => $this->request->getPost('jenis_transportasi'),
                    'penggunaan_transportasi'    => $this->request->getPost('penggunaan_transportasi'),
                    'waktu_tempuh'    => $this->request->getPost('waktu_tempuh'),
                    'biaya'    => $this->request->getPost('biaya'),
                    'kemudahan_transportasi'    => $this->request->getPost('kemudahan_transportasi'),
                    'blt'    => $this->request->getPost('blt'),
                    'pkh'    => $this->request->getPost('pkh'),
                    'banst'    => $this->request->getPost('banst'),
                    'banpres'    => $this->request->getPost('banpres'),
                    'banumkm'    => $this->request->getPost('banumkm'),
                    'buk'    => $this->request->getPost('buk'),
                    'bpa'    => $this->request->getPost('bpa'),
                    'lainnya'    => $this->request->getPost('lainnya'),
                );

                $data2 = array(
                    'nama_enum'          => $this->request->getPost('nama_enum'),
                    'notelp_enum'    => $this->request->getPost('notelp_enum'),
                    'alamat_enum'    => $this->request->getPost('alamat_enum'),
                );
                if ($this->rumahtanggam->update($id, $data)) {
                    $this->enumeratorm->update($id, $data2);
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Kuisioner Rumah Tangga Telah Di Ubah';
                    $status['redirect'] = 'rumahtangga';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->rumahtanggam->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                if ($this->rumahtanggam->delete($this->request->getPost('id'))) {
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

    function getKab()
    {
        $id_provinsi = $this->request->getPost('id_provinsi');
        $kabupaten = getApi("https://www.emsifa.com/api-wilayah-indonesia/api/regencies/$id_provinsi.json");
        $output = '<option value="">--Pilih Kabupaten--<option>';
        foreach ($kabupaten as $row) {
            // $output .= "<option value=" . $row['id'] . ">" . $row['name'] . "<option>";
            $kab[] = $row['id'] . '|' . $row['name'];
        }
        echo json_encode($kab);
    }

    function getKec()
    {
        $id_kabupaten = $this->request->getPost('id_kabupaten');
        $kecamatan = getApi("https://www.emsifa.com/api-wilayah-indonesia/api/districts/$id_kabupaten.json");
        $output = '<option value="">--Pilih Kecamatan--<option>';
        foreach ($kecamatan as $row) {
            $output .= "<option value=" . $row['id'] . ">" . $row['name'] . "<option>";
            $kec[] = $row['id'] . '|' . $row['name'];
        }
        echo json_encode($kec);
    }

    function getDesa()
    {
        $id_kecamatan = $this->request->getPost('id_kecamatan');
        $desa = getApi("https://www.emsifa.com/api-wilayah-indonesia/api/villages/$id_kecamatan.json");
        $output = '<option value="">--Pilih Desa--<option>';
        foreach ($desa as $row) {
            // $output .= "<option value=" . $row['id'] . ">" . $row['name'] . "<option>";
            $desas[] = $row['id'] . '|' . $row['name'];
        }
        echo json_encode($desas);
    }
}



/* End of file RumahTangga.php */
/* Location: ./app/controllers/RumahTangga.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-05-31 04:44:35 */
/* http://harviacode.com */