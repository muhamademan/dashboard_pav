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


$sheet->setCellValue('A1', 'STATUS POD DISTRIBUSI')->mergeCells("A1:C1");
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

$sheet->setCellValue('B5', 'PIC PAV');
$sheet->getStyle('B5')->getFont()->setBold(true);
$sheet->getStyle('B5')->getFont()->setSize(12);

$sheet->setCellValue('C5', 'TANGGAL PERMINTAAN');
$sheet->getStyle('C5')->getFont()->setBold(true);
$sheet->getStyle('C5')->getFont()->setSize(12);

$sheet->setCellValue('D5', 'TANGGAL PENGGUNAAN');
$sheet->getStyle('D5')->getFont()->setBold(true);
$sheet->getStyle('D5')->getFont()->setSize(12);

$sheet->setCellValue('E5', 'PIC REQUEST');
$sheet->getStyle('E5')->getFont()->setBold(true);
$sheet->getStyle('E5')->getFont()->setSize(12);

$sheet->setCellValue('F5', 'DEPARTEMENT');
$sheet->getStyle('F5')->getFont()->setBold(true);
$sheet->getStyle('F5')->getFont()->setSize(12);

$sheet->setCellValue('G5', 'NOMOR SPSM');
$sheet->getStyle('G5')->getFont()->setBold(true);
$sheet->getStyle('G5')->getFont()->setSize(12);

$sheet->setCellValue('H5', 'REQUEST CABANG');
$sheet->getStyle('H5')->getFont()->setBold(true);
$sheet->getStyle('H5')->getFont()->setSize(12);

$sheet->setCellValue('I5', 'REGIONAL');
$sheet->getStyle('I5')->getFont()->setBold(true);
$sheet->getStyle('I5')->getFont()->setSize(12);

$sheet->setCellValue('J5', 'PENGGUNAAN ACARA / EVENT');
$sheet->getStyle('J5')->getFont()->setBold(true);
$sheet->getStyle('J5')->getFont()->setSize(12);

$sheet->setCellValue('K5', 'KODE BARANG');
$sheet->getStyle('K5')->getFont()->setBold(true);
$sheet->getStyle('K5')->getFont()->setSize(12);

$sheet->setCellValue('L5', 'MERCHANDISE');
$sheet->getStyle('L5')->getFont()->setBold(true);
$sheet->getStyle('L5')->getFont()->setSize(12);

$sheet->setCellValue('M5', 'QTY');
$sheet->getStyle('M5')->getFont()->setBold(true);
$sheet->getStyle('M5')->getFont()->setSize(12);

$sheet->setCellValue('N5', 'PRICE');
$sheet->getStyle('N5')->getFont()->setBold(true);
$sheet->getStyle('N5')->getFont()->setSize(12);

$sheet->setCellValue('O5', 'TOTAL AMMOUNT');
$sheet->getStyle('O5')->getFont()->setBold(true);
$sheet->getStyle('O5')->getFont()->setSize(12);

$sheet->setCellValue('P5', 'TANGGAL KIRIM');
$sheet->getStyle('P5')->getFont()->setBold(true);
$sheet->getStyle('P5')->getFont()->setSize(12);

$sheet->setCellValue('Q5', 'AWB');
$sheet->getStyle('Q5')->getFont()->setBold(true);
$sheet->getStyle('Q5')->getFont()->setSize(12);

$sheet->setCellValue('R5', 'TANGGAL TERIMA');
$sheet->getStyle('R5')->getFont()->setBold(true);
$sheet->getStyle('R5')->getFont()->setSize(12);

$sheet->setCellValue('S5', 'NAMA PENERIMA');
$sheet->getStyle('S5')->getFont()->setBold(true);
$sheet->getStyle('S5')->getFont()->setSize(12);

$sheet->setCellValue('T5', 'FOTO DOKUMENTASI');
$sheet->getStyle('T5')->getFont()->setBold(true);
$sheet->getStyle('T5')->getFont()->setSize(12);

// if (!empty($dataVehicle)) {
$no = 1;
$baris = 6;
foreach ($data_pod as $data) {
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

    if (file_exists('./uploads/update_dokumentasi/' . $data['FOTOPENERIMA'])) {
        $objDrawing = new drawing();
        $objDrawing->setPath('./uploads/update_dokumentasi/' . $data['FOTOPENERIMA']);
        $objDrawing->setCoordinates('T' . $baris);
        $objDrawing->setWorksheet($sheet);
        $sheet->getRowDimension($baris)->setRowHeight(120);
    } else {
        $sheet->setCellValue('T' . $baris, 'image not found');
    }

    // $sheet->setCellValue('T' . $baris, base_url('uploads/update_dokumentasi/') . $data['FOTOPENERIMA']);


    $baris++;
}
// }
$writer = new Xlsx($spreadsheet);
$filename = "Data POD Distribusi";

ob_end_clean();
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit;