<?php

namespace App\Controllers;

use App\Models\DesaM;
use App\Models\IndividuM;
use App\Models\KeadaanPendudukM;
use App\Models\KesehatanM;
use App\Models\PekerjaanM;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use CodeIgniter\I18n\Time;

class Keadaanpenduduk extends BaseController
{
    function __construct()
    {
        $this->keadaanpendudukm = new KeadaanPendudukM();
        $this->individum = new IndividuM();
        $this->pekerjaanm = new PekerjaanM();
        $this->kesehatanm = new KesehatanM();
        $this->desam = new DesaM();
    }
    public function index()
    {
        $this->data = array('title' => 'Keadaan Penduduk | Admin', 'breadcome' => 'Keadaan Penduduk', 'url' => 'keadaanpenduduk/', 'm_open_keadaanpenduduk' => 'menu-open', 'mm_keadaanpenduduk' => 'active', 'm_keadaanpenduduk' => 'active', 'session' => $this->session, "desa" => $this->desam->findAll());

        echo view('App\Views\keadaanpenduduk\keadaanpenduduk_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->keadaanpendudukm->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['nama_dusun'] = $rows->nama_dusun;
            $row['no_kk'] = $rows->no_kk;
            $row['nik'] = $rows->nik;
            $row['nama'] = ucwords($rows->nama);
            $row['pekerjaan'] = $rows->pekerjaan;
            $row['penyakit'] = ($rows->muntaber_diare == 'Ya' ? 'Muntaber/Diare, ' : '') .
                ($rows->hepatitis_e == 'Ya' ? 'Hepatitis E, ' : '') .
                ($rows->jantung == 'Ya' ? 'Jantung, ' : '') .
                ($rows->demam_berdarah == 'Ya' ? 'Demam Berdarah, ' : '') .
                ($rows->difteri == 'Ya' ? 'Difteri, ' : '') .
                ($rows->tbc_paru == 'Ya' ? 'TBC Paru Paru, ' : '') .
                ($rows->campak == 'Ya' ? 'Campak, ' : '') .
                ($rows->chikungunya == 'Ya' ? 'Cikungunya, ' : '') .
                ($rows->kanker == 'Ya' ? 'Kanker, ' : '') .
                ($rows->malaria == 'Ya' ? 'Malaria, ' : '') .
                ($rows->leptospirosis == 'Ya' ? 'Leptospirosis, ' : '') .
                ($rows->diabetes == 'Ya' ? 'Diabetes, ' : '') .
                ($rows->fluburung_sars == 'Ya' ? 'Flu Burung/SARS, ' : '') .
                ($rows->kolera == 'Ya' ? 'Kolera, ' : '') .
                ($rows->lumpuh == 'Ya' ? 'Lumpuh, ' : '') .
                ($rows->covid_19 == 'Ya' ? 'Covid 19, ' : '') .
                ($rows->gizi_buruk == 'Ya' ? 'Gizi Buruk, ' : '') .
                ($rows->hepatitis_b == 'Ya' ? 'Hepatitis B, ' : '') .
                ($rows->lainnya == 'Ya' ? 'Lainnya, ' : '');
            $data[] = $row;
        }
        $output = array(
            "total" => $this->keadaanpendudukm->total(),
            "totalNotFiltered" => $this->keadaanpendudukm->countAllResults(),
            "rows" => $data,
        );
        echo json_encode($output);
    }

    public function keadaan()
    {
        $id = $this->request->getPost('value');
        if ($this->individum->getJoinPajakKesPendPeng()->where('individu.id', $id)->countAllResults() > 0) {
            return json_encode(['data' => $this->individum->getJoinPajakKesPendPeng()->where('individu.id', $id)->first()]);
        }
        return '404';
    }

    public function single_edit($id)
    {
        $get = $this->keadaanpendudukm->find($id);
        $this->data = array(
            'title' => 'Post Keadaan Penduduk | Admin',
            'breadcome' => 'Post Keadaan Penduduk',
            'url' => 'keadaanpenduduk/',
            'm_open_keadaanpenduduk' => 'menu-open',
            'mm_keadaanpenduduk' => 'active',
            'm_post_keadaanpenduduk' => 'active',
            'session' => $this->session,
            'provinsi' => getApi('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json'), 'individu' => $this->individum->findall(),
            'get' => $get,
            'data' => $this->keadaanpendudukm->joinKeadaanPenduduk()->where('keadaanpenduduk.id', $id)->first()
        );

        return view('App\Views\keadaanpenduduk\post-keadaanpenduduk', $this->data);
    }

    public function Post()
    {
        $this->data = array('title' => 'Post Keadaan Penduduk | Admin', 'breadcome' => 'Post Keadaan Penduduk', 'url' => 'keadaanpenduduk/', 'm_open_keadaanpenduduk' => 'menu-open', 'mm_keadaanpenduduk' => 'active', 'm_post_keadaanpenduduk' => 'active', 'session' => $this->session, 'individu' => $this->individum->findAll());

        echo view('App\Views\keadaanpenduduk\post-keadaanpenduduk', $this->data);
    }
    public function edit()
    {
        $id = $this->request->getPost('id');
        $get = $this->keadaanpendudukm->find($id);
        $this->data = array(
            'get' => $get,
            'individu' => $this->individum->findAll(),
            'data' => $this->individum->select('individu.*, k.*, pk.*, pd.*, k.id kesID, pk.id pekID, pd.id penID')->join('pekerjaan pk', 'pk.id = individu.pekerjaan_id')->join('kesehatan k', 'k.id = individu.kesehatan_id')->join('pendidikan pd', 'pd.id = individu.pendidikan_id')->where('individu.id', $id)->first()
        );
        $status['html']         = view('App\Views\keadaanpenduduk\form_input', $this->data);
        $status['modal_title']  = '<b>Update Keadaan Penduduk : </b>';
        $status['modal_size']   = 'modal-xl';
        echo json_encode($status);
    }
    public function save()
    {
        switch ($this->request->getPost('action')) {
            case 'insert':
                // $files = $this->request->getFileMultiple('userfile');
                $data =  array(
                    'id_dusun'          => $this->request->getVar('id_dusun'),
                    'individu_id'          => $this->request->getVar('individu_id'),
                );
                if ($this->keadaanpendudukm->insert($data)) {
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Keadaan Penduduk Baru Telah Di Tambahkan';
                    $status['redirect'] = 'keadaanpenduduk';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->keadaanpendudukm->errors();
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                $data =  array(
                    'id_desa'          => session('id_desa'),
                    'individu_id'          => $this->request->getPost('individu_id'),
                );
                if ($this->keadaanpendudukm->update($id, $data)) {
                    $status['title'] = 'success';
                    $status['type'] = 'success';
                    $status['text'] = 'Keadaan Penduduk Telah Di Ubah';
                    $status['redirect'] = 'keadaanpenduduk';
                } else {
                    $status['title'] = 'Warning';
                    $status['type'] = 'error';
                    $status['text'] = $this->keadaanpendudukm->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                if ($this->keadaanpendudukm->delete($this->request->getPost('id'))) {
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

        if ($filter_desa != "") {
            $dataFilter = $this->keadaanpendudukm->joinKeadaanPenduduk()->where('keadaanpenduduk.created_at BETWEEN "' . date('Y-m-d', strtotime($start)) . '" and "' . date('Y-m-d', strtotime($end)) . '"')->where('id_desa', $filter_desa)->findAll();
        } else {
            $dataFilter = $this->keadaanpendudukm->joinKeadaanPenduduk()->findAll();
        }

        $spreadsheet = new Spreadsheet();

        $spreadsheet->getActiveSheet()
            ->setCellValue('A1', "DUSUN")
            ->setCellValue('B1', "NKK")
            ->setCellValue('C1', "NIK")
            ->setCellValue('D1', "NAMA")
            ->setCellValue('E1', "PEKERJAAN")
            ->setCellValue('F1', "PENYAKIT");

        $col = 3;
        foreach ($dataFilter as $key => $data) {
            $penyakit = ($data->muntaber_diare == 'Ya' ? 'Muntaber/Diare,' : '') .
                ($data->hepatitis_e == 'Ya' ? 'Hepatitis E, ' : '') .
                ($data->jantung == 'Ya' ? 'Jantung, ' : '') .
                ($data->demam_berdarah == 'Ya' ? 'Demam Berdarah, ' : '') .
                ($data->difteri == 'Ya' ? 'Difteri, ' : '') .
                ($data->tbc_paru == 'Ya' ? 'TBC Paru Paru, ' : '') .
                ($data->campak == 'Ya' ? 'Campak, ' : '') .
                ($data->chikungunya == 'Ya' ? 'Cikungunya, ' : '') .
                ($data->kanker == 'Ya' ? 'Kanker, ' : '') .
                ($data->malaria == 'Ya' ? 'Malaria, ' : '') .
                ($data->leptospirosis == 'Ya' ? 'Leptospirosis, ' : '') .
                ($data->diabetes == 'Ya' ? 'Diabetes, ' : '') .
                ($data->fluburung_sars == 'Ya' ? 'Flu Burung/SARS, ' : '') .
                ($data->kolera == 'Ya' ? 'Kolera, ' : '') .
                ($data->lumpuh == 'Ya' ? 'Lumpuh, ' : '') .
                ($data->covid_19 == 'Ya' ? 'Covid 19, ' : '') .
                ($data->gizi_buruk == 'Ya' ? 'Gizi Buruk, ' : '') .
                ($data->hepatitis_b == 'Ya' ? 'Hepatitis B, ' : '') .
                ($data->lainnya == 'Ya' ? 'Lainnya, ' : '');
            $spreadsheet->getActiveSheet()
                ->setCellValue("A" . $col, $data->nama_dusun)
                ->setCellValue("B" . $col, $data->no_kk)
                ->setCellValue("c" . $col, $data->nik)
                ->setCellValue("d" . $col, $data->nama)
                ->setCellValue("e" . $col, $data->pekerjaan)
                ->setCellValue("f" . $col, $penyakit);

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
        header('Content-Disposition: attachment;filename="Keadaan Penduduk.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }
}

/* End of file KeadaanPenduduk.php */
/* Location: ./app/controllers/KeadaanPenduduk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-05-31 04:44:35 */
/* http://harviacode.com */