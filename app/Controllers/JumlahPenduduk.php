<?php

namespace App\Controllers;

use App\Models\DesaM;
use App\Models\IndividuM;
use App\Models\JumlahPendudukM;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\I18n\Time;
use PhpOffice\PhpSpreadsheet\IOFactory;
// use PhpOffice\PhpSpreadsheet\Alignment;
// use PhpOffice\PhpSpreadsheet\Fill;

class Jumlahpenduduk extends BaseController
{
    function __construct()
    {
        $this->jumlahpendudukm = new JumlahPendudukM();
        $this->individum = new IndividuM();
        $this->desam = new DesaM();
    }
    public function index()
    {
        $this->data = array(
            'title' => 'Jumlah Penduduk | Admin',
            'breadcome' => 'Jumlah Penduduk',
            'url' => 'jumlahpenduduk/',
            'm_open_jumlahpenduduk' => 'menu-open',
            'mm_jumlahpenduduk' => 'active',
            'm_jumlahpenduduk' => 'active',
            'session' => $this->session,
            "desa" => $this->desam->findAll(),
        );
        echo view('App\Views\jumlahpenduduk\jumlahpenduduk_list', $this->data);
    }

    public function ajax_request()
    {
        // $start = $this->request->getPost('start');
        // $start = date('Y-m-d', strtotime($_GET['start']));
        // $end = date('Y-m-d', strtotime($_GET['end']));
        // $filter_desa = isset($_GET['filter_desa']) ? $_GET['filter_desa'] : 'all';

        // $list = $this->jumlahpendudukm->get_datatables($filter_desa, $start, $end);
        $list = $this->jumlahpendudukm->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->jp_id;
            $row['nomor'] = $no++;
            $row['dusun'] = $rows->nama_dusun;
            $row['jumlah_jiwa'] = $rows->jumlah_jiwa;
            $row['jumlah_kk'] = $rows->jumlah_kk;
            $row['keterangan'] = $rows->keterangan;
            $data[] = $row;
        }
        $output = array(
            "total" => $this->jumlahpendudukm->total(),
            // "total" => $this->jumlahpendudukm->total($filter_desa, $start, $end),
            "totalNotFiltered" => $this->jumlahpendudukm->countAllResults(),
            "rows" => $data,
        );
        echo json_encode($output);
    }

    public function umur()
    {
        $dusun = $this->request->getVar('id_dusun');
        $umur = $this->request->getPost('value');
        $pria = $this->individum->where('umur', $umur)->where('id_dusun', $dusun)->where('jenis_kelamin', 'Laki - Laki')->countAllResults();
        $wanita = $this->individum->where('umur', $umur)->where('id_dusun', $dusun)->where('jenis_kelamin', 'Perempuan')->countAllResults();
        return json_encode(['pria' => $pria, 'wanita' => $wanita]);
    }

    public function dusun()
    {
        // dd($this->request->getPost('id_dusun'));
        $dusun = $this->request->getPost('value');

        $nik = $this->individum->where('id_dusun', $dusun)->findAll();
        foreach ($nik as $row) {
            $niks[] = $row->nik;
        }
        $jumlahJiwa = $this->individum->where('id_dusun', $dusun)->whereIn('nik', $niks)->countAllResults();
        $jumlahKK = $this->individum->where('id_dusun', $dusun)->groupBy('no_kk')->countAllResults();
        $islam = $this->individum->where('id_dusun', $dusun)->where('agama', 'Islam')->countAllResults();
        $kristen = $this->individum->where('id_dusun', $dusun)->where('agama', 'Kristen')->countAllResults();
        $katolik = $this->individum->where('id_dusun', $dusun)->where('agama', 'Katolik')->countAllResults();
        $hindu = $this->individum->where('id_dusun', $dusun)->where('agama', 'Hindu')->countAllResults();
        $budha = $this->individum->where('id_dusun', $dusun)->where('agama', 'Budha')->countAllResults();
        // return json_encode(['nik' => $no_nik, 'wanita' => $wanita]);
        return json_encode(['agama_islam' => $islam, 'agama_kristen' => $kristen, 'agama_katolik' => $katolik, 'agama_hindu' => $hindu, 'agama_budha' => $budha, 'jumlahJiwa' => $jumlahJiwa, 'jumlahKK' => $jumlahKK]);
    }

    public function single_edit($id)
    {
        $get = $this->jumlahpendudukm->find($id);
        $this->data = array(
            'action' => 'update',
            'title' => 'Jumlah Penduduk | Admin',
            'breadcome' => 'Jumlah Penduduk',
            'url' => 'jumlahpenduduk/',
            'm_open_jumlahpenduduk' => 'menu-open',
            'mm_jumlahpenduduk' => 'active',
            'm_jumlahpenduduk' => 'active',
            'session' => $this->session,
            'individu' => $this->individum->getJoinPajakKesPendPeng()->findAll(),
            'get' => $get
        );

        return view('App\Views\jumlahpenduduk\post-jumlahpenduduk', $this->data);
    }

    public function Post()
    {
        // dd($this->individum->where('jenis_kelamin', 'Laki - Laki')->first()->jenis_kelamin);
        $this->data = array(
            'title' => 'Post Jumlah Penduduk | Admin',
            'breadcome' => 'Post Jumlah Penduduk',
            'url' => 'jumlahpenduduk/',
            'm_open_jumlahpenduduk' => 'menu-open',
            'mm_jumlahpenduduk' => 'active',
            'm_post_jumlahpenduduk' => 'active',
            'session' => $this->session,
            'data2' => count($this->individum->where('jenis_kelamin', 'Perempuan')->findall()),
            'individu' => $this->individum->getJoinPajakKesPendPeng()->findAll()
        );
        echo view('App\Views\jumlahpenduduk\post-jumlahpenduduk', $this->data);
    }
    public function edit()
    {
        $id = $this->request->getPost('id');
        $get = $this->jumlahpendudukm->find($id);
        $this->data = array(
            'get' => $get,
            'individu' => $this->individum->groupBy('id_dusun')->find($id)
        );
        $status['html']         = view('App\Views\jumlahpenduduk\form_input', $this->data);
        $status['modal_title']  = '<b>Update Jumlah Penduduk : </b>' . $get->nama_dusun;
        $status['modal_size']   = 'modal-xl';
        echo json_encode($status);
    }
    public function save()
    {
        // dd($this->request->getPost('action'));
        switch ($this->request->getPost('action')) {
            case 'insert':
                // dd($this->request->getVar('id_dusun'));
                $data =  array(
                    'id_dusun'          => $this->request->getVar('id_dusun'),
                    'jumlah_jiwa'    => $this->request->getVar('jumlah_jiwa'),
                    'jumlah_kk'    => $this->request->getVar('jumlah_kk'),
                    'umur'    => $this->request->getVar('umur'),
                    'jumlah_pria'    => $this->request->getVar('jumlah_pria'),
                    'jumlah_wanita'    => $this->request->getVar('jumlah_wanita'),
                    'jumlah'    => $this->request->getVar('jumlah'),
                    'agama_islam'    => $this->request->getVar('agama_islam'),
                    'agama_kristen'    => $this->request->getVar('agama_kristen'),
                    'agama_katolik'    => $this->request->getVar('agama_katolik'),
                    'agama_hindu'    => $this->request->getVar('agama_hindu'),
                    'agama_budha'    => $this->request->getVar('agama_budha'),
                    'keterangan'    => $this->request->getVar('keterangan'),
                );
                if ($this->jumlahpendudukm->insert($data)) {
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Jumlah Penduduk Baru Telah Di Tambahkan';
                    $status['redirect'] = 'jumlahpenduduk';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->jumlahpendudukm->errors();
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                $data =  array(
                    'id_dusun'          => $this->request->getPost('id_dusun'),
                    'jumlah_jiwa'    => $this->request->getPost('jumlah_jiwa'),
                    'jumlah_kk'    => $this->request->getPost('jumlah_kk'),
                    'umur'    => $this->request->getPost('umur'),
                    'jumlah_pria'    => $this->request->getPost('jumlah_pria'),
                    'jumlah_wanita'    => $this->request->getPost('jumlah_wanita'),
                    'jumlah'    => $this->request->getPost('jumlah'),
                    'agama_islam'    => $this->request->getPost('agama_islam'),
                    'agama_kristen'    => $this->request->getPost('agama_kristen'),
                    'agama_katolik'    => $this->request->getPost('agama_katolik'),
                    'agama_hindu'    => $this->request->getPost('agama_hindu'),
                    'agama_budha'    => $this->request->getPost('agama_budha'),
                    'keterangan'    => $this->request->getPost('keterangan'),
                );
                if ($this->jumlahpendudukm->update($id, $data)) {
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Jumlah Penduduk Telah Di Ubah';
                    $status['redirect'] = 'jumlahpenduduk';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->jumlahpendudukm->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                if ($this->jumlahpendudukm->delete($this->request->getPost('id'))) {
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
    public function export()
    {
        $filter_desa = $this->request->getPost('filter_desa');
        $dateRangeJP = $this->request->getPost('range-dateJP');
        $start = explode(' - ', $dateRangeJP)[0];
        $end = explode(' - ', $dateRangeJP)[1];

        if ($filter_desa == "") {
            $dataFilter = $this->jumlahpendudukm->findAll();
        } else {
            $dataFilter = $this->jumlahpendudukm->where('jumlahpenduduk.created_at BETWEEN "' . date('Y-m-d', strtotime($start)) . '" and "' . date('Y-m-d', strtotime($end)) . '"')->where('id_desa', $filter_desa)->join('dusun', 'dusun.id=jumlahpenduduk.id_dusun')->join('desa', 'desa.id=dusun.id_desa')->findAll();
        }

        $spreadsheet = new Spreadsheet();

        $spreadsheet->getActiveSheet()
            ->setCellValue('A1', "DUSUN")
            ->setCellValue('B1', "JUMLAH JIWA")
            ->setCellValue('C1', "JUMLAH KK")
            ->setCellValue('D1', "KETERANGAN");

        $col = 3;
        foreach ($dataFilter as $key => $d) {
            $spreadsheet->getActiveSheet()
                ->setCellValue("A" . $col, $d->umur)
                ->setCellValue("B" . $col, $d->jumlah_jiwa)
                ->setCellValue("c" . $col, $d->jumlah_kk)
                ->setCellValue("d" . $col, strip_tags($d->keterangan));

            $col++;
        }
        // set Formula
        // $spreadsheet->getActiveSheet()->setCellValue('D2', "=B2*C2");

        //freeze pane
        $spreadsheet->getActiveSheet()->freezePane('A3');

        // set Zoom Scale
        $spreadsheet->getActiveSheet()->getSheetView()->setZoomScale(120);

        // alignment
        // $spreadsheet->getActiveSheet()->getStyle('A1:E1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        // font
        $spreadsheet->getActiveSheet()->getStyle('A1:E1')->getFont()->setSize(10)->setBold(true);
        // fill
        // $spreadsheet->getActiveSheet()->getStyle('A1:E1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FF8C56');

        // LEBAR KOLOM
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('A')
            ->setWidth(15);
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('B')
            ->setWidth(15);
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('C')
            ->setWidth(15);
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('D')
            ->setWidth(20);
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('E')
            ->setWidth(17);

        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Jumlah Penduduk.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }
}

/* End of file Berita.php */
/* Location: ./app/controllers/Berita.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-05-31 04:44:35 */
/* http://harviacode.com */