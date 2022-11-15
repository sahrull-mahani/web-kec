<?php

namespace App\Controllers;

use App\Models\DataPajakM;
use App\Models\DesaM;
use App\Models\IndividuM;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\I18n\Time;
use PhpParser\Node\Expr\List_;

class DataPajak extends BaseController
{
    function __construct()
    {
        $this->datapajakm = new DataPajakM();
        $this->individum = new IndividuM();
        $this->desam = new DesaM();
        helper('number');
    }
    public function index()
    {
        $this->data = array('title' => 'Data Pajak | Admin', 'breadcome' => 'Data Pajak', 'url' => 'datapajak/', 'm_open_datapajak' => 'menu-open', 'mm_datapajak' => 'active', 'm_datapajak' => 'active', 'session' => $this->session, 'desa' => $this->desam->findAll());
        echo view('App\Views\datapajak\datapajak_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->datapajakm->get_datatables();
        // $list = $this->datapajakm->findAll();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            // print_r($rows);
            // die;
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['nama'] = ucwords($rows->nama);
            $row['pajak'] = $rows->wajib_pajak;
            $row['besaran'] = number_to_currency($rows->jumlah_pajak, 'IDR', 'en_US', 2);
            // $row['besaran'] = $rows->jumlah_pajak;
            $row['ket pajak'] = $rows->keterangan;
            $row['alamat'] = $rows->alamat;
            $data[] = $row;
        }
        $output = array(
            "total" => $this->datapajakm->total(),
            "totalNotFiltered" => $this->datapajakm->countAllResults(),
            "rows" => $data,
        );
        echo json_encode($output);
    }

    public function pajak()
    {
        $id = $this->request->getPost('value');
        if ($this->individum->where('id', $id)->countAllResults() > 0) {
            return json_encode(['data' => $this->individum->where('id', $id)->first()]);
        }
        return '404';
    }

    public function Post()
    {
        $this->data = array('title' => 'Post Data Pajak | Admin', 'breadcome' => 'Post Data Pajak', 'url' => 'datapajak/', 'm_open_datapajak' => 'menu-open', 'mm_datapajak' => 'active', 'm_post_datapajak' => 'active', 'individu' => $this->individum->findAll(), 'session' => $this->session);

        echo view('App\Views\datapajak\post-datapajak', $this->data);
    }

    public function single_edit($id)
    {
        // dd($id);
        $get = $this->datapajakm->find($id);
        $this->data = array(
            'title' => 'Post Data Pajak | Admin',
            'breadcome' => 'Post Data Pajak',
            'url' => 'datapajak/',
            'm_open_datapajak' => 'menu-open',
            'mm_datapajak' => 'active',
            'm_post_datapajak' => 'active',
            'session' => $this->session,
            'individu' => $this->individum->findall(),
            'get' => $get,
            // 'data1' => $this->datapajakm->select('datapajak.*, ind.*, k.*, pk.*, pd.*, k.id kesID, pk.id pekID, pd.id kpID')->join('individu ind', 'ind.id = datapajak.individu_id')->join('kesehatan k', 'k.individu_id = ind.id')->join('pekerjaan pk', 'pk.individu_id = ind.id')->join('pendidikan pd', 'pd.individu_id = ind.id')->where('datapajak.id', $id)->first(),
            'data' => $this->datapajakm->joinIndividuDesa()->where('datapajak.id', $id)->first()
        );

        return view('App\Views\datapajak\post-datapajak', $this->data);
    }

    public function save()
    {
        switch ($this->request->getPost('action')) {
            case 'insert':
                $data =  array(
                    'id_desa'          => session('id_desa'),
                    'jumlah_pajak'      => $this->request->getVar('jumlah_pajak'),
                    'no_kk'          => $this->request->getVar('no_kk'),
                    'nik'          => $this->request->getVar('nik'),
                    'alamat'          => $this->request->getVar('alamat'),
                );
                if ($this->datapajakm->insert($data)) {
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Data Pajak Baru Telah Di Tambahkan';
                    $status['redirect'] = 'datapajak';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->datapajakm->errors();
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                // $files = $this->request->getFileMultiple('userfile');
                $data =  array(
                    'id_desa'          => session('id_desa'),
                    'jumlah_pajak'      => $this->request->getVar('jumlah_pajak'),
                    'no_kk'          => $this->request->getVar('no_kk'),
                    'nik'          => $this->request->getVar('nik'),
                    'alamat'          => $this->request->getVar('alamat'),
                );
                if ($this->datapajakm->update($id, $data)) {
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Data Pajak Telah Di Ubah';
                    $status['redirect'] = 'datapajak';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->datapajakm->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                if ($this->datapajakm->delete($this->request->getPost('id'))) {
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
            $dataFilter = $this->datapajakm->joinIndividuDesa()->findAll();
        } else {
            $dataFilter = $this->datapajakm->joinIndividuDesa()->where('datapajak.created_at BETWEEN "' . date('Y-m-d', strtotime($start)) . '" and "' . date('Y-m-d', strtotime($end)) . '"')->where('id_desa', $filter_desa)->findAll();
        }

        $spreadsheet = new Spreadsheet();

        $spreadsheet->getActiveSheet()
            ->setCellValue('A1', "NAMA")
            ->setCellValue('B1', "PAJAK")
            ->setCellValue('C1', "BESARNYA")
            ->setCellValue('D1', "KET. PAJAK")
            ->setCellValue('E1', "ALAMAT");

        $col = 3;
        foreach ($dataFilter as $key => $data) {
            $spreadsheet->getActiveSheet()
                ->setCellValue("A" . $col, $data->nama)
                ->setCellValue("B" . $col, $data->wajib_pajak)
                ->setCellValue("c" . $col, $data->jumlah_pajak)
                ->setCellValue("d" . $col, $data->keterangan)
                ->setCellValue("e" . $col, $data->alamat);
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
        header('Content-Disposition: attachment;filename="Data Pajak.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }
}

/* End of file DataPajak.php */
/* Location: ./app/controllers/DataPajak.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-05-31 04:44:35 */
/* http://harviacode.com */