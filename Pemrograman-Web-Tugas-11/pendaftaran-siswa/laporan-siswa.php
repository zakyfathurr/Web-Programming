<?php
// Start output buffering to prevent any accidental output
// ob_start();

// Include configuration file (ensure this file does not output anything)
include("config.php");

// Include the FPDF library
require('phpfpdf/fpdf.php');

// Create a new FPDF instance and set up the page
$pdf = new FPDF('L', 'mm', 'A5');
$pdf->AddPage();

// Set the font for the header
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 7, 'LAPORAN CALON SISWA SMK Teknologi Sepuluh Nopember', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 7, 'DAFTAR CALON SISWA TAHUN 2024', 0, 1, 'C');

// Add a space below the title
$pdf->Cell(10, 7, '', 0, 1);

// Set font for the table header
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 6, 'ID SISWA', 1, 0, 'C');
// $pdf->Cell(20, 6, 'FOTO SISWA', 1, 0, 'C');
$pdf->Cell(48, 6, 'NAMA SISWA', 1, 0, 'C');
$pdf->Cell(53, 6, 'ALAMAT SISWA', 1, 0, 'C');
$pdf->Cell(73, 6, 'SEKOLAH ASAL SISWA', 1, 1, 'C');

// Set font for the table data
$pdf->SetFont('Arial', '', 10);

// Query to fetch data from the database
$mahasiswa = mysqli_query($db, "SELECT * FROM calon_siswa");

// Loop through the data and add it to the PDF
while ($row = mysqli_fetch_array($mahasiswa)) {
    $pdf->Cell(20, 6, $row['id'], 1, 0, 'C');
    // $pdf->Cell(20, 6, "images/". $row['foto'], 1, 0, 'C');
    $pdf->Cell(48, 6, $row['nama'], 1, 0);
    $pdf->Cell(53, 6, $row['alamat'], 1, 0);
    $pdf->Cell(73, 6, $row['sekolah_asal'], 1, 1);
}



// Output the PDF
$pdf->Output();
?>