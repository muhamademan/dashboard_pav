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


$sheet->setCellValue('A1', 'REPORT DASHBOARD PAV')->mergeCells("A1:C1");
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

$sheet->setCellValue('B5', 'NOMOR SPSM');
$sheet->getStyle('B5')->getFont()->setBold(true);
$sheet->getStyle('B5')->getFont()->setSize(12);

$sheet->setCellValue('C5', 'TANGGAL PERMINTAAN');
$sheet->getStyle('C5')->getFont()->setBold(true);
$sheet->getStyle('C5')->getFont()->setSize(12);

$sheet->setCellValue('D5', 'TANGGAL KIRIM');
$sheet->getStyle('D5')->getFont()->setBold(true);
$sheet->getStyle('D5')->getFont()->setSize(12);

$sheet->setCellValue('E5', 'PIC PAV');
$sheet->getStyle('E5')->getFont()->setBold(true);
$sheet->getStyle('E5')->getFont()->setSize(12);

$sheet->setCellValue('F5', 'KODE BARANG');
$sheet->getStyle('F5')->getFont()->setBold(true);
$sheet->getStyle('F5')->getFont()->setSize(12);

$sheet->setCellValue('G5', 'NAMA MERCHANDISE');
$sheet->getStyle('G5')->getFont()->setBold(true);
$sheet->getStyle('G5')->getFont()->setSize(12);

$sheet->setCellValue('H5', 'BRANCH');
$sheet->getStyle('H5')->getFont()->setBold(true);
$sheet->getStyle('H5')->getFont()->setSize(12);

$sheet->setCellValue('I5', 'REGIONAL');
$sheet->getStyle('I5')->getFont()->setBold(true);
$sheet->getStyle('I5')->getFont()->setSize(12);

$sheet->setCellValue('J5', 'DESTINASI');
$sheet->getStyle('J5')->getFont()->setBold(true);
$sheet->getStyle('J5')->getFont()->setSize(12);

$sheet->setCellValue('K5', 'PIC CABANG');
$sheet->getStyle('K5')->getFont()->setBold(true);
$sheet->getStyle('K5')->getFont()->setSize(12);

$sheet->setCellValue('L5', 'EVENT / ACARA');
$sheet->getStyle('L5')->getFont()->setBold(true);
$sheet->getStyle('L5')->getFont()->setSize(12);

$sheet->setCellValue('M5', 'JUMLAH');
$sheet->getStyle('M5')->getFont()->setBold(true);
$sheet->getStyle('M5')->getFont()->setSize(12);

$sheet->setCellValue('N5', 'HARGA');
$sheet->getStyle('N5')->getFont()->setBold(true);
$sheet->getStyle('N5')->getFont()->setSize(12);

// if (!empty($dataVehicle)) {
$no = 1;
$baris = 6;
foreach ($dt_report as $data) {
    $sheet->setCellValue('A' . $baris, $no++);
    $sheet->setCellValue('B' . $baris, $data['SPSM']);
    $sheet->setCellValue('C' . $baris, $data['TGLPERMINTAAN']);
    $sheet->setCellValue('D' . $baris, $data['TGLKIRIM']);
    $sheet->setCellValue('E' . $baris, $data['NAMAPAV']);
    $sheet->setCellValue('F' . $baris, $data['KODEBARANG']);
    $sheet->setCellValue('G' . $baris, $data['NAMABARANG']);
    $sheet->setCellValue('H' . $baris, $data['KODE_CABANG']);
    $sheet->setCellValue('I' . $baris, $data['CABANG']);
    $sheet->setCellValue('J' . $baris, $data['REGIONAL']);
    $sheet->setCellValue('K' . $baris, $data['PIC']);
    $sheet->setCellValue('L' . $baris, $data['KETERANGAN']);
    $sheet->setCellValue('M' . $baris, $data['QTY']);
    $sheet->setCellValue('N' . $baris, $data['HARGA']);

    $baris++;
}
// }
$writer = new Xlsx($spreadsheet);
$filename = "Data Report";
// ob_end_clean();

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit;