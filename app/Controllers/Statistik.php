<?php

namespace App\Controllers;

use App\Models\StatistikModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Render;

class Statistik extends BaseController
{
    protected $statistikm, $db;
    function __construct()
    {
        $this->statistikm = new StatistikModel();
        $this->db = db_connect();
    }

    public function index()
    {
        $this->data = array('title' => 'Statistik | Admin', 'breadcome' => 'Statistik', 'url' => 'statistik/', 'm_statistik' => 'active', 'session' => $this->session, 'validation'=>\Config\Services::validation(), 'stanting'=>$this->statistikm->findAll());

        return view('App\Views\statistik\statistik_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->statistikm->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['nomor'] = $no++;
            $row['id'] = $rows->id;
            $row['bidang'] = $rows->bidang;
            $row['statistik'] = $rows->statistik;
            $row['usia'] = "$rows->usia Tahun";
            $row['jk'] = $rows->jk == 1 ? 'Laki - laki' : 'Perempuan';
            $row['tahun'] = date('Y', strtotime($rows->updated_at));
            $data[] = $row;
        }
        $output = array(
            "total" => $this->statistikm->total(),
            "totalNotFiltered" => $this->statistikm->countAllResults(),
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
            $this->data['form_input'][] = view('App\Views\statistik\form_input', $data);
        }
        $status['html']         = view('App\Views\statistik\form_modal', $this->data);
        $status['modal_title']  = 'Tambah Data Statistik';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function edit()
    {
        $id = $this->request->getPost('id');
        $this->data = array('action' => 'update', 'btn' => '<i class="fas fa-edit"></i> Edit');
        foreach ($id as $ids) {
            $get = $this->potensim->find($ids);
            $data = array(
                'nama' => '<b>' . $get->nama . '</b>',
                'get' => $get,
            );
            $this->data['form_input'][] = view('App\Views\potensi\form_input', $data);
        }
        $status['html']         = view('App\Views\potensi\form_modal', $this->data);
        $status['modal_title']  = 'Update Data Potensi';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function save()
    {
        switch ($this->request->getPost('action')) {
            case 'delete':
                $id = $this->request->getPost('id');
                foreach ($id as $val) {
                    $get = $this->statistikm->find($val);
                    $this->statistikm->where('tahun', $get->tahun)->delete();
                }
                $status = [
                    'type' => 'success',
                    'text' => 'Data telah dihapus'
                ];
                echo json_encode($status);
                break;
        }
    }

    public function import()
    {
        $fileUpload = $this->request->getFile('importexcel');

        $validation = [
            'importexcel' => [
                'rules' => 'uploaded[importexcel]|max_size[importexcel,2048]|ext_in[importexcel,csv,xls,xlsx]',
                'errors' => [
                    'uploaded'  => "Masukan terlebih dahulu file Excel",
                    'max_size'  => "Maksimal file excel 2MB",
                    'ext_in'    => "Extensi yang boleh csv,xls,xlsx"
                ]
            ]
        ];
        if (!$this->validate($validation)) {
            return redirect()->to('statistik')->withInput();
        }

        $ext = pathinfo($fileUpload, PATHINFO_EXTENSION);
        switch ($ext) {
            case "csv":
                $render = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                break;
            case "xls":
                $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                break;
            default:
                $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                break;
        }

        $spreadsheet = $render->load($fileUpload->getPathname());

        $sheetdata = $spreadsheet->getActiveSheet()->toArray();
        $dataSave = [];
        $err = 0;
        foreach ($sheetdata as $data => $row) {
            if ($data == 2) $tahun = (int)filter_var($row[1], FILTER_SANITIZE_NUMBER_INT); // get tahun di baris 3
            if ($data <= 4) continue;
            if (strlen($row[1]) > 18) break; // check nik
            if ($row[1] == null) break; // check baris akhir kosong
            if (count($this->statistikm->where(['nik'=>$row[1], 'tahun'=>$tahun])->find()) > 0) { //cek nik yang sama di tahun yang sama {jangan upload}
                $err++;
                continue;
            }

            array_push($dataSave, [
                'nik'   => $row[1],
                'desa'   => $row[6]==null ? $sheetdata[$data-1][6] : $row[6], // jika dari orang tua yang sama
                'jk'    => $row[3] == 'P' ? 0 : 1,
                'tahun' => $tahun
            ]);
        }

        $total = count($dataSave);
        if ($total == 0) {
            return redirect()->to('statistik')->with('error', "Data NIK Sama semua telah ada di database, periksa kembali tahun data stunting yang anda upload");
        }
        if ($this->statistikm->insertBatch($dataSave)) {
            return redirect()->to('statistik')->with('success', "Total upload $total data dan jumlah NIK yang sama $err");
        } else {
            return redirect()->to('statistik')->with('errors', $this->statistikm->errors());
        }
    }
}

/* End of file Statistik.php */
/* Location: ./app/controllers/Statistik.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-08 04:07:43 */
/* http://harviacode.com */