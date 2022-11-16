<?php

namespace App\Controllers;

use App\Models\DataPajakM;
use App\Models\DesaM;
use App\Models\IndividuM;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Border;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\I18n\Time;
use PhpParser\Node\Expr\List_;

class Datapajak extends BaseController
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

        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['nama'] = $rows->individu_id == null ? ucwords($rows->nama) : ucwords($rows->individu_nama);
            $row['pajak'] = $rows->wajib_pajak;
            $row['besaran'] = number_to_currency($rows->jumlah_pajak, 'IDR', 'en_US', 2);
            $row['ket pajak'] = $rows->keterangan;
            $row['alamat'] = $rows->individu_id == null ? $rows->alamat : ucwords($rows->individu_alamat);
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
                    'nama'          => $this->request->getVar('nama'),
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
                    'nama'          => $this->request->getVar('nama'),
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
            ->setCellValue('A1', "Laporan Jumlah Penduduk")
            ->setCellValue('A2', "Desa")
            ->setCellValue('A3', "Dari Tanggal")
            ->setCellValue('A4', "Sampai Tanggal")
            ->setCellValue('B2', ":" . $dataFilter[0]->nama_desa)
            ->setCellValue('B3', ":$start")
            ->setCellValue('B4', ":$end");

        $col = 7;
        foreach ($dataFilter as $key => $data) {
            $key += 1;
            $spreadsheet->getActiveSheet()
                ->setCellValue("A" . $col, $key++)
                ->setCellValue("B" . $col, $data->nama)
                ->setCellValue("C" . $col, $data->wajib_pajak)
                ->setCellValue("D" . $col, $data->jumlah_pajak)
                ->setCellValue("E" . $col, $data->keterangan)
                ->setCellValue("F" . $col, $data->alamat);
            $col++;
            $spreadsheet->getActiveSheet()->getStyle('A' . ($col - 1) . ':F' . ($col - 1))
                ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
        }
        // $spreadsheet->getActiveSheet()
        //     ->setCellValue('A12', $col - 1);


        $cols = $col + 1;
        $spreadsheet->getActiveSheet()->mergeCells("A1:F1");
        $spreadsheet->getActiveSheet()->mergeCells("A$cols:B$cols");
        $spreadsheet->getActiveSheet()->mergeCells('A' . ($cols + 1) . ':B' . ($cols + 1));
        $spreadsheet->getActiveSheet()->mergeCells("f$cols:g$cols");
        $spreadsheet->getActiveSheet()->mergeCells('F' . ($cols + 1) . ':G' . ($cols + 1));
        $spreadsheet->getActiveSheet()->mergeCells('A' . ($cols + 5) . ':B' . ($cols + 5));
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A' . ($col - 1) . ':F' . ($col - 1))
            ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A6:F6')
            ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A' . $cols . ':A' . $cols + 1)
            ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F' . $cols)
            ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A' . $cols + 5)
            ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F' . $cols + 5)
            ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A' . ($col - 2) . ':F' . ($col - 2))
            ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
        $spreadsheet->getActiveSheet()
            ->setCellValue('A6', "NO")
            ->setCellValue('B6', "NAMA")
            ->setCellValue('C6', "PAJAK")
            ->setCellValue('D6', "BESARNYA")
            ->setCellValue('E6', "KET. PAJAK")
            ->setCellValue('F6', "ALAMAT")
            ->setCellValue('A' . $cols, "Mengetahui")
            ->setCellValue('A' . $cols + 1, "Sangadi")
            ->setCellValue('A' . $cols + 5, $dataFilter[0]->kepala_desa)
            ->setCellValue('F' . $cols, ".................")
            ->setCellValue('F' . $cols + 1, "Sekdes..............")
            ->setCellValue('F' . $cols + 5, $dataFilter[0]->sekdes);
        // set Formula

        // $spreadsheet->getActiveSheet()->setCellValue('D2', "=B2*C2");
        //freeze pane
        // $spreadsheet->getActiveSheet()->freezePane('A2');
        // set Zoom Scale
        $spreadsheet->getActiveSheet()->getSheetView()->setZoomScale(120);
        // alignment
        // $spreadsheet->getActiveSheet()->getStyle('A1:E1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        // font
        // $spreadsheet->getActiveSheet()->getStyle('A6:F6')->getFont()->setSize(10)->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(10)->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A' . ($cols + 5) . ':F' . ($cols + 5))->getFont()->setSize(10)->setBold(true);
        // fill
        // $spreadsheet->getActiveSheet()->getStyle('A1:E1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FF8C56');

        // LEBAR KOLOM
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('A')
            ->setWidth(10);
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