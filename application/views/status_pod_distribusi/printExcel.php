<?php

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
require 'vendor/autoload.php';


// require_once 'path/to/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet as spreadsheet; // instead PHPExcel
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as xlsx; // Instead PHPExcel_Writer_Excel2007
// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing as drawing; // Instead PHPExcel_Worksheet_Drawing
use PhpOffice\PhpSpreadsheet\Style\Alignment as alignment; // Instead PHPExcel_Style_Alignment
use PhpOffice\PhpSpreadsheet\Style\Fill as fill; // Instead PHPExcel_Style_Fill
use PhpOffice\PhpSpreadsheet\Style\Color as color_; //Instead PHPExcel_Style_Color
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup as pagesetup; // Instead PHPExcel_Worksheet_PageSetup
use PhpOffice\PhpSpreadsheet\IOFactory as io_factory; // Instead PHPExcel_IOFactory

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'STATUS POD DISTRIBUSI');
$sheet->setCellValue('A2', $ket);
$sheet->setCellValue('A4', $tgl_cetak);
$sheet->setCellValue('A5', 'NO');
$sheet->setCellValue('B5', 'PIC PAV');
$sheet->setCellValue('C5', 'TANGGAL PERMINTAAN');
$sheet->setCellValue('D5', 'TANGGAL PENGGUNAAN');
$sheet->setCellValue('E5', 'PIC REQUEST');
$sheet->setCellValue('F5', 'DEPARTEMENT');
$sheet->setCellValue('G5', 'NOMOR SPSM');
$sheet->setCellValue('H5', 'REQUEST CABANG');
$sheet->setCellValue('I5', 'REGIONAL');
$sheet->setCellValue('J5', 'PENGGUNAAN ACARA / EVENT');
$sheet->setCellValue('K5', 'KODE BARANG');
$sheet->setCellValue('L5', 'MERCHANDISE');
$sheet->setCellValue('M5', 'QTY');
$sheet->setCellValue('N5', 'PRICE');
$sheet->setCellValue('O5', 'TOTAL AMMOUNT');
$sheet->setCellValue('P5', 'TANGGAL KIRIM');
$sheet->setCellValue('Q5', 'AWB');
$sheet->setCellValue('R5', 'TANGGAL TERIMA');
$sheet->setCellValue('S5', 'NAMA PENERIMA');
$sheet->setCellValue('T5', 'FOTO DOKUMENTASI');

// $dataVehicle   = $this->M_vehicle->view_all();

// if (!empty($dataVehicle)) {
$no = 1;
$baris = 6;
foreach ($dataVehicle as $data) {
    $sheet->setCellValue('A' . $baris, $no++);
    $sheet->setCellValue('B' . $baris, $data['NAMAPAV']);
    $sheet->setCellValue('C' . $baris, $data['TGLPERMINTAAN']);
    $sheet->setCellValue('D' . $baris, $data['TGLPENGGUNAAN']);
    $sheet->setCellValue('E' . $baris, $data['PIC']);
    $sheet->setCellValue('F' . $baris, $data['DEPARTEMENT']);
    $sheet->setCellValue('G' . $baris, $data['SPSM']);
    $sheet->setCellValue('H' . $baris, $data['CABANG']);
    $sheet->setCellValue('I' . $baris, $data['REGIONAL']);
    $sheet->setCellValue('J' . $baris, $data['KETERANGAN']);
    $sheet->setCellValue('K' . $baris, $data['KODEBARANG']);
    $sheet->setCellValue('L' . $baris, $data['NAMABARANG']);
    $sheet->setCellValue('M' . $baris, $data['QTY']);
    $sheet->setCellValue('N' . $baris, $data['HARGA']);
    $sheet->setCellValue('O' . $baris, $data['TOTAL_HARGA']);
    $sheet->setCellValue('P' . $baris, $data['TGLKIRIM']);
    $sheet->setCellValue('Q' . $baris, $data['AWB']);
    $sheet->setCellValue('R' . $baris, $data['TGLDITERIMA']);
    $sheet->setCellValue('S' . $baris, $data['NAMAPENERIMA']);

    // if (file_exists('http://localhost/jne-cbd/uploads/vehicle/' . $data['FOTO'])) {

    //     $objDrawing = new PHPExcel_Worksheet_Drawing();
    //     $objDrawing->setPath('http://localhost/jne-cbd/uploads/vehicle/' . $data['FOTO']);
    //     $objDrawing->setCoordinates('L' . $baris);
    //     $objDrawing->setWorksheet($this->excel->getActiveSheet());
    //     $sheet->getRowDimension($baris)->setRowHeight(120);
    // } else {
    //     $sheet->setCellValue('T' . $baris, 'http://localhost/jne-cbd/uploads/vehicle/' . $data['FOTO']);
    // }
    $sheet->setCellValue('T' . $baris, base_url('./upload/update_dokumentasi/') . $data['FOTOPENERIMA']);


    $baris++;
}
// }
$writer = new Xlsx($spreadsheet);
$filename = "All Data POD Distribusi";

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit;