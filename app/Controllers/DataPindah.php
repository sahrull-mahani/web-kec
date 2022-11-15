<?php

namespace App\Controllers;

use App\Models\DataPindahM;
use App\Models\DesaM;
use App\Models\IndividuM;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\I18n\Time;
use PhpOffice\PhpSpreadsheet\IOFactory;

class DataPindah extends BaseController
{
    function __construct()
    {
        $this->datapindahm = new DataPindahM();
        $this->individum = new IndividuM();
        $this->desam = new DesaM();
    }
    public function index()
    {
        $this->data = array('title' => 'Data Pindah | Admin', 'breadcome' => 'Data Pindah', 'url' => 'datapindah/', 'm_open_datapindah' => 'menu-open', 'mm_datapindah' => 'active', 'm_datapindah' => 'active', 'session' => $this->session, 'desa' => $this->desam->findAll());

        echo view('App\Views\datapindah\datapindah_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->datapindahm->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['nama'] = ucwords($rows->nama);
            $row['status'] = ucwords($rows->status);
            $row['jk'] = $rows->jenis_kelamin;
            $row['tanggal'] = $rows->tgl_pindah;
            $row['alamat'] = ucwords($rows->alamat_pindah);
            $data[] = $row;
        }
        $output = array(
            "total" => $this->datapindahm->total(),
            "totalNotFiltered" => $this->datapindahm->countAllResults(),
            "rows" => $data,
        );
        echo json_encode($output);
    }

    public function pindah()
    {
        $id = $this->request->getPost('value');
        if ($this->individum->where('id', $id)->countAllResults() > 0) {
            return json_encode(['data' => $this->individum->where('id', $id)->first()]);
        }
        return '404';
    }

    public function single_edit($id)
    {
        $get = $this->datapindahm->find($id);
        $this->data = array(
            'title' => 'Post Data Pindah | Admin',
            'breadcome' => 'Post Data Pindah',
            'url' => 'datapindah/',
            'm_open_datapindah' => 'menu-open',
            'mm_datapindah' => 'active',
            'm_post_datapindah' => 'active',
            'session' => $this->session,
            'individu' => $this->individum->findall(),
            'get' => $get,
            'data' => $this->datapindahm->joinIndividu()->where('datapindah.id', $id)->first()
        );

        return view('App\Views\datapindah\post-datapindah', $this->data);
    }

    public function Post()
    {
        $this->data = array(
            'title' => 'Post Data Pindah | Admin',
            'breadcome' => 'Post Data Pindah',
            'url' => 'datapindah/',
            'm_open_datapindah' => 'menu-open',
            'mm_datapindah' => 'active',
            'm_post_datapindah' => 'active',
            'session' => $this->session,
            'individu' => $this->individum->findAll(),
            'wilayah' => getApi('https://emsifa.github.io/api-wilayah-indonesia/static/api/provinces.json'),
        );

        echo view('App\Views\datapindah\post-datapindah', $this->data);
    }
    public function save()
    {
        switch ($this->request->getPost('action')) {
            case 'insert':
                $data =  array(
                    'id_desa'          => session('id_desa'),
                    'individu_id'          => $this->request->getVar('individu_id'),
                    'status'    => $this->request->getVar('status'),
                    'tgl_pindah'    => $this->request->getVar('tgl_pindah'),
                    'alamat_pindah'    => $this->request->getVar('alamat_pindah'),
                    'keterangan_pindah'    => $this->request->getVar('keterangan_pindah'),
                );
                if ($this->datapindahm->insert($data)) {
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Data Pindah Baru Telah Di Tambahkan';
                    $status['redirect'] = 'datapindah';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->datapindahm->errors();
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                $data =  array(
                    'id_desa'          => session('id_desa'),
                    'individu_id'          => $this->request->getPost('individu_id'),
                    'status'    => $this->request->getPost('status'),
                    'tgl_pindah'    => $this->request->getPost('tgl_pindah'),
                    'alamat_pindah'    => $this->request->getPost('alamat_pindah'),
                    'keterangan'    => $this->request->getPost('keterangan'),
                );
                if ($this->datapindahm->update($id, $data)) {
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Data Pindah Telah Di Ubah';
                    $status['redirect'] = 'datapindah';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->datapindahm->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                if ($this->datapindahm->delete($this->request->getPost('id'))) {
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
            $dataFilter = $this->datapindahm->joinIndividu()->findAll();
        } else {
            $dataFilter = $this->datapindahm->joinIndividu()->where('datapindah.created_at BETWEEN "' . date('Y-m-d', strtotime($start)) . '" and "' . date('Y-m-d', strtotime($end)) . '"')->where('id_desa', $filter_desa)->findAll();
        }

        $spreadsheet = new Spreadsheet();

        $spreadsheet->getActiveSheet()
            ->setCellValue('A1', "NAMA")
            ->setCellValue('B1', "STATUS DALAM KK")
            ->setCellValue('C1', "TANGGAL PINDAH")
            ->setCellValue('D1', "ALAMAT PINDAH");

        $col = 3;
        foreach ($dataFilter as $key => $data) {
            $spreadsheet->getActiveSheet()
                ->setCellValue("A" . $col, $data->nama)
                ->setCellValue("B" . $col, $data->status)
                ->setCellValue("c" . $col, $data->tgl_pindah)
                ->setCellValue("d" . $col, $data->alamat_pindah);

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
            ->setWidth(15);
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
        header('Content-Disposition: attachment;filename="Data Pindah.xlsx"');
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