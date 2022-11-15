<?php

namespace App\Controllers;

use App\Models\DataKematianM;
use App\Models\DesaM;
use App\Models\IndividuM;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\I18n\Time;
use PhpOffice\PhpSpreadsheet\IOFactory;

class DataKematian extends BaseController
{
    function __construct()
    {
        $this->datakematianm = new DataKematianM();
        $this->individum = new IndividuM();
        $this->desam = new DesaM();
    }
    public function index()
    {
        $this->data = array('title' => 'Data Kematian | Admin', 'breadcome' => 'Data Kematian', 'url' => 'datakematian/', 'm_open_datakematian' => 'menu-open', 'mm_datakematian' => 'active', 'm_datakematian' => 'active', 'session' => $this->session, 'desa' => $this->desam->findAll());

        echo view('App\Views\datakematian\datakematian_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->datakematianm->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['nama'] = ucwords($rows->nama);
            $row['jk'] = $rows->jenis_kelamin;
            $row['tgl'] = $rows->tgl_kematian;
            $row['jam'] = $rows->jam_kematian;
            $row['tempat'] = ucwords($rows->tempat_kematian);
            $data[] = $row;
        }
        $output = array(
            "total" => $this->datakematianm->total(),
            "totalNotFiltered" => $this->datakematianm->countAllResults(),
            "rows" => $data,
        );
        echo json_encode($output);
    }

    public function kematian()
    {
        $id = $this->request->getPost('value');
        if ($this->individum->where('id', $id)->countAllResults() > 0) {
            return json_encode(['data' => $this->individum->where('id', $id)->first()]);
        }
        return '404';
    }

    public function single_edit($id)
    {
        $get = $this->datakematianm->find($id);
        $this->data = array(
            'title' => 'Post Data Kematian | Admin',
            'breadcome' => 'Post Data Kematian',
            'url' => 'datakematian/',
            'm_open_datakematian' => 'menu-open',
            'mm_datakematian' => 'active',
            'm_post_datakematian' => 'active',
            'session' => $this->session,
            'individu' => $this->individum->findall(),
            'get' => $get,
            'data' => $this->datakematianm->select('datakematian.*, ind.*, pd.*, pd.id kpID')->join('individu ind', 'ind.id = datakematian.individu_id')->join('pendidikan pd', 'pd.individu_id = ind.id')->where('datakematian.id', $id)->first()
        );

        return view('App\Views\datakematian\post-datakematian', $this->data);
    }

    public function Post()
    {
        $this->data = array('title' => 'Post Data Kematian | Admin', 'breadcome' => 'Post Data Kematian', 'url' => 'datakematian/', 'm_open_datakematian' => 'menu-open', 'mm_datakematian' => 'active', 'm_post_datakematian' => 'active', 'individu' => $this->individum->findAll(), 'session' => $this->session);

        echo view('App\Views\datakematian\post-datakematian', $this->data);
    }

    public function save()
    {
        switch ($this->request->getPost('action')) {
            case 'insert':
                // $files = $this->request->getFileMultiple('userfile');

                $data =  array(
                    'id_desa'          => session('id_desa'),
                    'individu_id'          => $this->request->getVar('individu_id'),
                    'tgl_kematian'    => $this->request->getVar('tgl_kematian'),
                    'jam_kematian'    => $this->request->getVar('jam_kematian'),
                    'tempat_kematian'    => $this->request->getVar('tempat_kematian'),
                    'tgl_kubur'    => $this->request->getVar('tgl_kubur'),
                    'jam_kubur'    => $this->request->getVar('jam_kubur'),
                    'tempat_kubur'    => $this->request->getVar('tempat_kubur'),
                    'alamat_kubur'    => $this->request->getVar('alamat_kubur'),
                );
                if ($this->datakematianm->insert($data)) {
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Data Kematian Baru Telah Di Tambahkan';
                    $status['redirect'] = 'datakematian';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->datakematianm->errors();
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                $data =  array(
                    'id_desa'          => session('id_desa'),
                    'individu_id'          => $this->request->getPost('individu_id'),
                    'tgl_kematian'    => $this->request->getPost('tgl_kematian'),
                    'jam_kematian'    => $this->request->getPost('jam_kematian'),
                    'tempat_kematian'    => $this->request->getPost('tempat_kematian'),
                    'tgl_kubur'    => $this->request->getPost('tgl_kubur'),
                    'jam_kubur'    => $this->request->getPost('jam_kubur'),
                    'tempat_kubur'    => $this->request->getPost('tempat_kubur'),
                    'alamat_kubur'    => $this->request->getPost('alamat_kubur'),
                );
                if ($this->datakematianm->update($id, $data)) {
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Data Kematian Telah Di Ubah';
                    $status['redirect'] = 'datakematian';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->datakematianm->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                if ($this->datakematianm->delete($this->request->getPost('id'))) {
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
            $dataFilter = $this->datakematianm->joinIndividu()->findAll();
        } else {
            $dataFilter = $this->datakematianm->joinIndividu()->where('datakematian.created_at BETWEEN "' . date('Y-m-d', strtotime($start)) . '" and "' . date('Y-m-d', strtotime($end)) . '"')->where('id_desa', $filter_desa)->findAll();
        }

        $spreadsheet = new Spreadsheet();

        $spreadsheet->getActiveSheet()
            ->setCellValue('A1', "NAMA")
            ->setCellValue('B1', "JENIS KELAMIN")
            ->setCellValue('C1', "TANGGAL KEMATIAN")
            ->setCellValue('D1', "JAM KEMATIAN")
            ->setCellValue('E1', "TEMPAT KEMATIAN");

        $col = 3;
        foreach ($dataFilter as $key => $data) {
            $spreadsheet->getActiveSheet()
                ->setCellValue("A" . $col, $data->nama)
                ->setCellValue("B" . $col, $data->jenis_kelamin)
                ->setCellValue("c" . $col, $data->tgl_kematian)
                ->setCellValue("d" . $col, $data->jam_kematian)
                ->setCellValue("e" . $col, $data->tempat_kematian);
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
        $spreadsheet->getActiveSheet()->getStyle('A1:F1')->getFont()->setSize(10)->setBold(true);
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
            ->setWidth(17);
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('D')
            ->setWidth(20);
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('E')
            ->setWidth(17);
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('F')
            ->setWidth(25);

        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Data Kematian.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }
}

/* End of file DataPindah.php */
/* Location: ./app/controllers/DataPindah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-05-31 04:44:35 */
/* http://harviacode.com */