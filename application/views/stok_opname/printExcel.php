<?php
// require_once 'path/to/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet as spreadsheet; // instead PHPExcel
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as xlsx; // Instead PHPExcel_Writer_Excel2007
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing as drawing; // Instead PHPExcel_Worksheet_Drawing
use PhpOffice\PhpSpreadsheet\Style\Alignment as alignment; // Instead PHPExcel_Style_Alignment
use PhpOffice\PhpSpreadsheet\Style\Fill as fill; // Instead PHPExcel_Style_Fill
use PhpOffice\PhpSpreadsheet\Style\Color as color_; //Instead PHPExcel_Style_Color
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup as pagesetup; // Instead PHPExcel_Worksheet_PageSetup
use PhpOffice\PhpSpreadsheet\IOFactory as io_factory; // Instead PHPExcel_IOFactory

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();


$sheet->setCellValue('A1', 'REPORT STOK OPNAME MERCHANDISE')->mergeCells("A1:E1");
$sheet->getStyle('A1')->getFont()->setBold(true);
$sheet->getStyle('A1')->getFont()->setSize(20);

$sheet->setCellValue('A2', $ket)->mergeCells("A2:N2");
$sheet->getStyle('A2')->getFont()->setBold(true);
$sheet->getStyle('A2')->getFont()->setSize(12);

$sheet->setCellValue('A4', $tgl_cetak)->mergeCells("A4:D4");
$sheet->getStyle('A4')->getFont()->setBold(true);
$sheet->getStyle('A4')->getFont()->setSize(12);

$sheet->setCellValue('A5', 'NO');
$sheet->getStyle('A5')->getFont()->setBold(true);
$sheet->getStyle('A5')->getFont()->setSize(12);

$sheet->setCellValue('B5', 'TANGGAL OPNAME');
$sheet->getStyle('B5')->getFont()->setBold(true);
$sheet->getStyle('B5')->getFont()->setSize(12);

$sheet->setCellValue('C5', 'TANGGAL BARANG MASUK');
$sheet->getStyle('C5')->getFont()->setBold(true);
$sheet->getStyle('C5')->getFont()->setSize(12);

$sheet->setCellValue('D5', 'KODE BARANG');
$sheet->getStyle('D5')->getFont()->setBold(true);
$sheet->getStyle('D5')->getFont()->setSize(12);

$sheet->setCellValue('E5', 'NAMA MERCHANDISE');
$sheet->getStyle('E5')->getFont()->setBold(true);
$sheet->getStyle('E5')->getFont()->setSize(12);

$sheet->setCellValue('F5', 'HARGA MERCHANDISE');
$sheet->getStyle('F5')->getFont()->setBold(true);
$sheet->getStyle('F5')->getFont()->setSize(12);

$sheet->setCellValue('G5', 'JUMLAH STOK');
$sheet->getStyle('G5')->getFont()->setBold(true);
$sheet->getStyle('G5')->getFont()->setSize(12);

$sheet->setCellValue('H5', 'JUMLAH STOK BARANG GUDANG 45');
$sheet->getStyle('H5')->getFont()->setBold(true);
$sheet->getStyle('H5')->getFont()->setSize(12);

$sheet->setCellValue('I5', 'JUMLAH STOK BARANG DUDANG 11');
$sheet->getStyle('I5')->getFont()->setBold(true);
$sheet->getStyle('I5')->getFont()->setSize(12);

$sheet->setCellValue('J5', 'PERHITUNGAN STOK');
$sheet->getStyle('J5')->getFont()->setBold(true);
$sheet->getStyle('J5')->getFont()->setSize(12);

$sheet->setCellValue('K5', 'PERHITUNGAN GUNDANG 45');
$sheet->getStyle('K5')->getFont()->setBold(true);
$sheet->getStyle('K5')->getFont()->setSize(12);

$sheet->setCellValue('L5', 'PERHITUNGAN GUDANG 11');
$sheet->getStyle('L5')->getFont()->setBold(true);
$sheet->getStyle('L5')->getFont()->setSize(12);

$sheet->setCellValue('M5', 'SELISIH QTY');
$sheet->getStyle('M5')->getFont()->setBold(true);
$sheet->getStyle('M5')->getFont()->setSize(12);

$sheet->setCellValue('N5', 'SELISIH QTY 45');
$sheet->getStyle('N5')->getFont()->setBold(true);
$sheet->getStyle('N5')->getFont()->setSize(12);
///////
$sheet->setCellValue('O5', 'SELISIH QTY 11');
$sheet->getStyle('O5')->getFont()->setBold(true);
$sheet->getStyle('O5')->getFont()->setSize(12);

$sheet->setCellValue('P5', 'SELISIH HARGA');
$sheet->getStyle('P5')->getFont()->setBold(true);
$sheet->getStyle('P5')->getFont()->setSize(12);

$sheet->setCellValue('Q5', 'SELISIH HARGA 45');
$sheet->getStyle('Q5')->getFont()->setBold(true);
$sheet->getStyle('Q5')->getFont()->setSize(12);

$sheet->setCellValue('R5', 'SELISIH HARGA 11');
$sheet->getStyle('R5')->getFont()->setBold(true);
$sheet->getStyle('R5')->getFont()->setSize(12);

// if (!empty($dataVehicle)) {
$no = 1;
$baris = 6;
foreach ($dt_report as $data) {
    $sheet->setCellValue('A' . $baris, $no++);
    $sheet->setCellValue('B' . $baris, $data['TGL_OPNAME']);
    $sheet->setCellValue('C' . $baris, $data['TGL_BRG']);
    $sheet->setCellValue('D' . $baris, $data['KODEBARANG']);
    $sheet->setCellValue('E' . $baris, $data['NAMABARANG']);
    $sheet->setCellValue('F' . $baris, $data['HARGA']);
    $sheet->setCellValue('G' . $baris, $data['TOTAL_JUMLAH']);
    $sheet->setCellValue('H' . $baris, $data['JUMLAH45']);
    $sheet->setCellValue('I' . $baris, $data['JUMLAH11']);
    $sheet->setCellValue('J' . $baris, $data['TOTAL_PERHITUNGAN']);
    $sheet->setCellValue('K' . $baris, $data['PERHITUNGAN_STOK45']);
    $sheet->setCellValue('L' . $baris, $data['PERHITUNGAN_STOK11']);
    $sheet->setCellValue('M' . $baris, $data['SELISIH_QTY']);
    $sheet->setCellValue('N' . $baris, $data['SELISIH_QTY45']);
    $sheet->setCellValue('O' . $baris, $data['SELISIH_QTY11']);
    $sheet->setCellValue('P' . $baris, $data['SELISIH_HARGA']);
    $sheet->setCellValue('Q' . $baris, $data['SELISIH_HARGA45']);
    $sheet->setCellValue('R' . $baris, $data['SELISIH_HARGA11']);

    $baris++;
}
// }
$writer = new Xlsx($spreadsheet);
$filename = "Report Stok Opname";
// ob_end_clean();

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit;