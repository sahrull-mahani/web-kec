<?php

namespace App\Controllers;

use App\Models\IndividuM;
use App\Models\KesehatanM;
// use App\Models\PekerjaanM;
use App\Models\PendidikanM;
use App\Models\PenghasilanM;
use App\Models\DataPajakM;
use CodeIgniter\I18n\Time;

class Individu extends BaseController
{
    function __construct()
    {
        $this->individum = new IndividuM();
        $this->kesehatanm = new KesehatanM();
        $this->penghasilanm = new PenghasilanM();
        $this->pendidikanm = new PendidikanM();
        $this->pajakm      = new DataPajakM();
        helper('number');
    }
    public function index()
    {
        $this->data = array(
            'title' => 'Kuisioner Individu | Admin',
             'breadcome' => 'Kuisioner Individu',
             'url' => 'individu/',
             'm_open_individu' => 'menu-open',
             'mm_individu' => 'active',
             'm_individu' => 'active',
             'session' => $this->session,
        );
        echo view('App\Views\individu\individu_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->individum->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['no kk'] = $rows->no_kk;
            $row['nik'] = $rows->nik;
            $row['nama'] = ucwords($rows->nama);
            $row['jenis kelamin'] = $rows->jenis_kelamin;
            $row['nomor hp'] = $rows->no_hp;
            $data[] = $row;
        }
        $output = array(
            "total" => $this->individum->total(),
            "totalNotFiltered" => $this->individum->countAllResults(),
            "rows" => $data,
        );
        echo json_encode($output);
    }

    public function Post()
    {
        $this->data = array('title' => 'Post Kuisioner Individu | Admin', 'breadcome' => 'Post Kuisioner Individu', 'url' => 'individu/', 'm_open_individu' => 'menu-open', 'mm_individu' => 'active', 'm_post_individu' => 'active', 'session' => $this->session, 'provinsi' => getApi('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json'));
        echo view('App\Views\individu\post-individu', $this->data);
    }

    public function single_detail($id)
    {
        $get = $this->individum->getJoinPajakKesPendPeng()->find($id);
        $this->data = array('title' => 'Post Kuisioner Individu | Admin', 'breadcome' => 'Post Kuisioner Individu', 'url' => 'individu/', 'm_open_individu' => 'menu-open', 'mm_individu' => 'active', 'm_post_individu' => 'active', 'session' => $this->session, 'provinsi' => getApi('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json'), 'get' => $get);
        return view('App\Views\individu\detail-individu', $this->data);
    }

    public function single_edit($id)
    {
        $get = $this->individum->getJoinPajakKesPendPeng()->find($id);
        $this->data = array('title' => 'Post Kuisioner Individu | Admin', 'breadcome' => 'Post Kuisioner Individu', 'url' => 'individu/', 'm_open_individu' => 'menu-open', 'mm_individu' => 'active', 'm_post_individu' => 'active', 'session' => $this->session, 'provinsi' => getApi('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json'), 'get' => $get, 'id'=> $id);

        return view('App\Views\individu\post-individu', $this->data);
    }

    public function getJobClone()
    {
        $id = $this->request->getVar('id');
        $penghasilan = $this->penghasilanm->where('individu_id', $id)->findAll();
        unset($penghasilan[0]);
        $data = [
            'total' => count($penghasilan),
            'hasil' => $penghasilan
        ];
        return json_encode($data);
    }

    public function edit()
    {
        $id = $this->request->getPost('id');
        $get = $this->individum->find($id);
        $this->data = array('get' => $get);
        $status['html']         = view('App\Views\individu\form_input', $this->data);
        $status['modal_title']  = '<b>Update Kuisioner Individu : </b>' . $get->nama;
        $status['modal_size']   = 'modal-xl';
        echo json_encode($status);
    }
    public function save()
    {

        switch ($this->request->getPost('action')) {
            case 'insert':
                $individu =  array(
                    'id_desa'          => session('id_desa'),
                    'no_kk'          => $this->request->getVar('no_kk'),
                    'nik'          => $this->request->getVar('nik'),
                    'nama'          => $this->request->getVar('nama'),
                    'provinsi'          => $this->request->getVar('provinsi'),
                    'kab_kota'          => $this->request->getVar('kab_kota'),
                    'kecamatan'          => $this->request->getVar('kecamatan'),
                    'kelurahan'          => $this->request->getVar('kelurahan'),
                    'dusun'          => $this->request->getVar('dusun'),
                    'alamat'          => $this->request->getVar('alamat'),
                    'jenis_kelamin'          => $this->request->getVar('jenis_kelamin'),
                    'tempat_lahir'          => $this->request->getVar('tempat_lahir'),
                    'tgl_lahir'          => $this->request->getVar('tgl_lahir'),
                    'umur'          => $this->request->getVar('umur'),
                    'status_nikah'          => $this->request->getVar('status_nikah'),
                    'agama'          => $this->request->getVar('agama'),
                    'suku'          => $this->request->getVar('suku'),
                    'kewarganegaraan'          => $this->request->getVar('kewarganegaraan'),
                    'no_hp'          => $this->request->getVar('no_hp'),
                    'no_wa'          => $this->request->getVar('no_wa'),
                    'email'          => $this->request->getVar('email'),
                    'facebook'          => $this->request->getVar('facebook'),
                    'twitter'          => $this->request->getVar('twitter'),
                    'instagram'          => $this->request->getVar('instagram'),
                    'kondisi_pekerjaan'   => $this->request->getVar('kondisi_pekerjaan'),
                    'pekerjaan'          => $this->request->getVar('pekerjaan'),
                    'jamsos'          => $this->request->getVar('jamsos'),
                );

                $kes =  array(
                    'bpjs_kes'          => $this->request->getVar('bpjs_kes'),
                    'muntaber_diare'          => $this->request->getVar('muntaber_diare'),
                    'hepatitis_e'          => $this->request->getVar('hepatitis_e'),
                    'jantung'          => $this->request->getVar('jantung'),
                    'demam_berdarah'          => $this->request->getVar('demam_berdarah'),
                    'difteri'          => $this->request->getVar('difteri'),
                    'tbc_paru'          => $this->request->getVar('tbc_paru'),
                    'campak'          => $this->request->getVar('campak'),
                    'chikungunya'          => $this->request->getVar('chikungunya'),
                    'kanker'          => $this->request->getVar('kanker'),
                    'malaria'          => $this->request->getVar('malaria'),
                    'leptospirosis'          => $this->request->getVar('leptospirosis'),
                    'diabetes'          => $this->request->getVar('diabetes'),
                    'fluburung_sars'          => $this->request->getVar('fluburung_sars'),
                    'kolera'          => $this->request->getVar('kolera'),
                    'lumpuh'          => $this->request->getVar('lumpuh'),
                    'covid_19'          => $this->request->getVar('covid_19'),
                    'gizi_buruk'          => $this->request->getVar('gizi_buruk'),
                    'hepatitis_b'          => $this->request->getVar('hepatitis_b'),
                    'lainnya'          => $this->request->getVar('lainnya'),
                    'rs'          => $this->request->getVar('rs'),
                    'praktik_bidan'          => $this->request->getVar('praktik_bidan'),
                    'rs_bersalin'          => $this->request->getVar('rs_bersalin'),
                    'poskesdes'          => $this->request->getVar('poskesdes'),
                    'puskesmas_inap'          => $this->request->getVar('puskesmas_inap'),
                    'apotik'          => $this->request->getVar('apotik'),
                    'polindes'          => $this->request->getVar('polindes'),
                    'praktik_dokter'          => $this->request->getVar('praktik_dokter'),
                    'puskesmas_tanpainap'          => $this->request->getVar('puskesmas_tanpainap'),
                    'pustu'          => $this->request->getVar('pustu'),
                    'toko_obat'          => $this->request->getVar('toko_obat'),
                    'poliklinik'          => $this->request->getVar('poliklinik'),
                    'posyandu'          => $this->request->getVar('posyandu'),
                    'posbindu'          => $this->request->getVar('posbindu'),
                    'rumah_bersalin'          => $this->request->getVar('rumah_bersalin'),
                    'praktik_dukun'          => $this->request->getVar('praktik_dukun'),
                    'tunanetra'          => $this->request->getVar('tunanetra'),
                    'tunarungu'          => $this->request->getVar('tunarungu'),
                    'tunawicara'          => $this->request->getVar('tunawicara'),
                    'tunarungu_wicara'          => $this->request->getVar('tunarungu_wicara'),
                    'tunadaksa'          => $this->request->getVar('tunadaksa'),
                    'tunagrahita'          => $this->request->getVar('tunagrahita'),
                    'tunalaras'          => $this->request->getVar('tunalaras'),
                    'eks_kusta'          => $this->request->getVar('eks_kusta'),
                    'cacat_ganda'          => $this->request->getVar('cacat_ganda'),
                    'pasung'          => $this->request->getVar('pasung'),
                );

                $penghasilans = [];
                // $penghasilan = array(
                //     'sumber_penghasilan' =>  $this->request->getVar('sumber_penghasilan'),
                //     // 'tahun'         => $this->request->getVar('tahun'),
                //     'jumlah'          =>  $this->request->getVar('jumlah'),
                //     'satuan'          => $this->request->getVar('satuan'),
                //     'penghasilan'      => $this->request->getVar('penghasilan'),
                //     'ekspor'          => $this->request->getVar('ekspor'),
                // );

                $pendidikan = array(
                    'pendidikan'          => $this->request->getVar('pendidikan'),
                    'bahasa_lokal'          => $this->request->getVar('bahasa_lokal'),
                    'bahasa_formal'          => $this->request->getVar('bahasa_formal'),
                    'kerja_bakti'          => $this->request->getVar('kerja_bakti'),
                    'siskamling'          => $this->request->getVar('siskamling'),
                    'pesta_rakyat'          => $this->request->getVar('pesta_rakyat'),
                    'pertolongan_kematian'          => $this->request->getVar('pertolongan_kematian'),
                    'pertolongan_sakit'          => $this->request->getVar('pertolongan_sakit'),
                    'pertolongan_kecelakaan'          => $this->request->getVar('pertolongan_kecelakaan'),
                );
                $pajak = array(
                    'wajib_pajak'          => $this->request->getVar('wajib_pajak'),
                    'jumlah_pajak'          => $this->request->getVar('jumlah_pajak'),
                    'keterangan'          => $this->request->getVar('keterangan'),
                );

                if ($this->kesehatanm->insert($kes)) {
                    $id_kesehatan = $this->kesehatanm->orderBy('id', 'DESC')->first()->id;
                    $individu['kesehatan_id'] = $id_kesehatan;
                    $this->individum->insert($individu);
                    $id_individu = $this->individum->getInsertID();
                    foreach ($this->request->getVar('jumlah') as $index => $val) {
                        array_push($penghasilans, [
                            'sumber_penghasilan'=> $this->request->getVar('sumber_penghasilan')[$index],
                            'jumlah'            => $val,
                            'satuan'            => $this->request->getVar('satuan')[$index],
                            'penghasilan'       => $this->request->getVar('penghasilan')[$index],
                            'ekspor'            => $this->request->getVar('ekspor')[$index],
                            'tahun'             => $this->request->getVar('tahun')[0],
                            'individu_id'       => $id_individu,
                        ]);
                    }
                    $pendidikan['id_individu'][0] = $id_individu;
                    $pajak['individu_id'][0] = $id_individu;
                    $pajak['id_desa'][0] = session('id_desa');
                    $this->penghasilanm->insertBatch($penghasilans);
                    $this->pendidikanm->insert($pendidikan);
                    $this->pajakm->insert($pajak);

                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Kuisioner Individu Baru Telah Di Tambahkan';
                    $status['redirect'] = 'individu';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->individum->errors();
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                $data =  array(
                    'user_id'          => session('user_id'),
                    'no_kk'          => $this->request->getPost('no_kk'),
                    'nik'          => $this->request->getPost('nik'),
                    'nama'          => $this->request->getPost('nama'),
                    'provinsi'          => $this->request->getPost('provinsi'),
                    'kab_kota'          => $this->request->getPost('kab_kota'),
                    'kecamatan'          => $this->request->getPost('kecamatan'),
                    'kelurahan'          => $this->request->getPost('kelurahan'),
                    'dusun'          => $this->request->getPost('dusun'),
                    'alamat'          => $this->request->getPost('alamat'),
                    'jenis_kelamin'          => $this->request->getPost('jenis_kelamin'),
                    'tempat_lahir'          => $this->request->getPost('tempat_lahir'),
                    'tgl_lahir'          => $this->request->getPost('tgl_lahir'),
                    'umur'          => $this->request->getPost('umur'),
                    'status_nikah'          => $this->request->getPost('status_nikah'),
                    'agama'          => $this->request->getPost('agama'),
                    'suku'          => $this->request->getPost('suku'),
                    'kewarganegaraan'          => $this->request->getPost('kewarganegaraan'),
                    'no_hp'          => $this->request->getPost('no_hp'),
                    'no_wa'          => $this->request->getPost('no_wa'),
                    'wajib_pajak'          => $this->request->getPost('wajib_pajak'),
                    'jumlah_pajak'          => $this->request->getPost('jumlah_pajak'),
                    'keterangan'          => $this->request->getPost('keterangan'),
                    'email'          => $this->request->getPost('email'),
                    'facebook'          => $this->request->getPost('facebook'),
                    'twitter'          => $this->request->getPost('twitter'),
                    'instagram'          => $this->request->getPost('instagram'),
                );

                $data2 =  array(
                    'bpjs_kes'          => $this->request->getPost('bpjs_kes'),
                    'muntaber_diare'          => $this->request->getPost('muntaber_diare'),
                    'hepatitis_e'          => $this->request->getPost('hepatitis_e'),
                    'jantung'          => $this->request->getPost('jantung'),
                    'demam_berdarah'          => $this->request->getPost('demam_berdarah'),
                    'difteri'          => $this->request->getPost('difteri'),
                    'tbc_paru'          => $this->request->getPost('tbc_paru'),
                    'campak'          => $this->request->getPost('campak'),
                    'chikungunya'          => $this->request->getPost('chikungunya'),
                    'kanker'          => $this->request->getPost('kanker'),
                    'malaria'          => $this->request->getPost('malaria'),
                    'leptospirosis'          => $this->request->getPost('leptospirosis'),
                    'diabetes'          => $this->request->getPost('diabetes'),
                    'fluburung_sars'          => $this->request->getPost('fluburung_sars'),
                    'kolera'          => $this->request->getPost('kolera'),
                    'lumpuh'          => $this->request->getPost('lumpuh'),
                    'covid_19'          => $this->request->getPost('covid_19'),
                    'gizi_buruk'          => $this->request->getPost('gizi_buruk'),
                    'hepatitis_b'          => $this->request->getPost('hepatitis_b'),
                    'lainnya'          => $this->request->getPost('lainnya'),
                    'rs'          => $this->request->getPost('rs'),
                    'praktik_bidan'          => $this->request->getPost('praktik_bidan'),
                    'rs_bersalin'          => $this->request->getPost('rs_bersalin'),
                    'poskesdes'          => $this->request->getPost('poskesdes'),
                    'puskesmas_inap'          => $this->request->getPost('puskesmas_inap'),
                    'apotik'          => $this->request->getPost('apotik'),
                    'polindes'          => $this->request->getPost('polindes'),
                    'praktik_dokter'          => $this->request->getPost('praktik_dokter'),
                    'puskesmas_tanpainap'          => $this->request->getPost('puskesmas_tanpainap'),
                    'pustu'          => $this->request->getPost('pustu'),
                    'toko_obat'          => $this->request->getPost('toko_obat'),
                    'poliklinik'          => $this->request->getPost('poliklinik'),
                    'posyandu'          => $this->request->getPost('posyandu'),
                    'posbindu'          => $this->request->getPost('posbindu'),
                    'rumah_bersalin'          => $this->request->getPost('rumah_bersalin'),
                    'praktik_dukun'          => $this->request->getPost('praktik_dukun'),
                    'tunanetra'          => $this->request->getPost('tunanetra'),
                    'tunarungu'          => $this->request->getPost('tunarungu'),
                    'tunawicara'          => $this->request->getPost('tunawicara'),
                    'tunarungu_wicara'          => $this->request->getPost('tunarungu_wicara'),
                    'tunadaksa'          => $this->request->getPost('tunadaksa'),
                    'tunagrahita'          => $this->request->getPost('tunagrahita'),
                    'tunalaras'          => $this->request->getPost('tunalaras'),
                    'eks_kusta'          => $this->request->getPost('eks_kusta'),
                    'cacat_ganda'          => $this->request->getPost('cacat_ganda'),
                    'pasung'          => $this->request->getPost('pasung'),
                );

                $data3 =  array(
                    'kondisi_pekerjaan'          => $this->request->getPost('kondisi_pekerjaan'),
                    'pekerjaan'          => $this->request->getPost('pekerjaan'),
                    'jamsos'          => $this->request->getPost('jamsos'),
                    'sumber_penghasilan' => implode('|', $this->request->getPost('sumber_penghasilan')),
                    'jumlah'          => implode('|', $this->request->getPost('jumlah')),
                    'satuan'          => implode('|', $this->request->getPost('satuan')),
                    'penghasilan'          => implode('|', $this->request->getPost('penghasilan')),
                    'ekspor'          => implode('|', $this->request->getPost('ekspor')),
                );

                $data4 =  array(
                    'pendidikan'          => $this->request->getPost('pendidikan'),
                    'bahasa_lokal'          => $this->request->getPost('bahasa_lokal'),
                    'bahasa_formal'          => $this->request->getPost('bahasa_formal'),
                    'kerja_bakti'          => $this->request->getPost('kerja_bakti'),
                    'siskamling'          => $this->request->getPost('siskamling'),
                    'pesta_rakyat'          => $this->request->getPost('pesta_rakyat'),
                    'pertolongan_kematian'          => $this->request->getPost('pertolongan_kematian'),
                    'pertolongan_sakit'          => $this->request->getPost('pertolongan_sakit'),
                    'pertolongan_kecelakaan'          => $this->request->getPost('pertolongan_kecelakaan'),
                );
                if ($this->individum->update($id, $data)) {
                    $this->kesehatanm->update($id, $data2);
                    $this->pekerjaanm->update($id, $data3);
                    $this->pendidikanm->update($id, $data4);
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Kuisioner Individu Telah Di Ubah';
                    $status['redirect'] = 'individu';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->individum->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                if ($this->individum->delete($this->request->getPost('id'))) {
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
            $output .= "<option value=" . $row['id'] . ">" . $row['name'] . "<option>";
        }
        echo json_encode($output);
    }

    function getKec()
    {
        $id_kabupaten = $this->request->getPost('id_kabupaten');
        $kecamatan = getApi("https://www.emsifa.com/api-wilayah-indonesia/api/districts/$id_kabupaten.json");
        $output = '<option value="">--Pilih Kecamatan--<option>';
        foreach ($kecamatan as $row) {
            $output .= "<option value=" . $row['id'] . ">" . $row['name'] . "<option>";
        }
        echo json_encode($output);
    }

    function getDesa()
    {
        $id_kecamatan = $this->request->getPost('id_kecamatan');
        $desa = getApi("https://www.emsifa.com/api-wilayah-indonesia/api/villages/$id_kecamatan.json");
        $output = '<option value="">--Pilih Desa--<option>';
        foreach ($desa as $row) {
            $output .= "<option value=" . $row['id'] . ">" . $row['name'] . "<option>";
        }
        echo json_encode($output);
        // echo json_encode($output);
    }
}

/* End of file Individu.php */
/* Location: ./app/controllers/Individu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-05-31 04:44:35 */
/* http://harviacode.com */