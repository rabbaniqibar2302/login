<?php
// Sambungkan ke fpdf library
require '../library/fpdf.php';
include '../koneksi_db.php';

// instansiasi objek dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

// Buat Judulnya disini
$pdf->SetFont('Times', 'B', 13);
$pdf->Cell(200, 10, 'STRUK PEMESANAN', 0, 0, 'C');

// Buat Pengaturan tabel HEAD
$pdf->Cell(10, 15, '', 0, 1);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
$pdf->Cell(35, 7, 'RESI', 1, 0, 'C');
$pdf->Cell(50, 7, 'BARANG', 1, 0, 'C');
$pdf->Cell(35, 7, 'STATUS', 1, 0, 'C');

// Buat Pengaturan tabel ISI
$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Times', '', 10);
$no = 1;
// $data = mysqli_query($koneksi, "select * from orders");

// Sempurnakan perintah SQLNYA
// $data = mysqli_query($koneksi, "select * from ord where alamat like 'c%'");
// Searching Alamat yang mengandung huruf C

$resi = $_GET['id'];
$data = mysqli_query($koneksi, "select * from orders where id='$resi'");

while ($meledak = mysqli_fetch_array($data)) {
    $pdf->Cell(10, 7, $no++, 1, 0, 'C');
    $pdf->Cell(35, 7, $meledak['id'], 1, 0, 'C');
    $pdf->Cell(50, 7, $meledak['name'], 1, 0, 'C');
    $pdf->Cell(35, 7, $meledak['status'], 1, 1, 'C');
}

$pdf->Output();
