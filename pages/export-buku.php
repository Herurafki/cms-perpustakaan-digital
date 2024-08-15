<?php

require_once('../vendor/tecnickcom/tcpdf/tcpdf.php'); 
include '../config/database.php';


$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nama Anda');
$pdf->SetTitle('Daftar Buku');
$pdf->SetSubject('Daftar Buku Perpustakaan');
$pdf->SetKeywords('TCPDF, PDF, Buku, Perpustakaan');


$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Daftar Buku', 'Perpustakaan Digital');


$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));


$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);


$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


$pdf->AddPage();


$pdf->SetFont('helvetica', 'B', 12);


$pdf->Cell(60, 10, 'Judul Buku', 1, 0, 'C');
$pdf->Cell(60, 10, 'Kategori', 1, 0, 'C');
$pdf->Cell(30, 10, 'Jumlah', 1, 1, 'C');


$query = "SELECT bukus.judul_buku, kategoris.nama_kategori, bukus.jumlah FROM bukus JOIN kategoris ON bukus.id_kategori = kategoris.id";
$result = $conn->query($query);


$pdf->SetFont('helvetica', '', 10);


while ($row = $result->fetch_assoc()) {
    $pdf->Cell(60, 10, $row['judul_buku'], 1);
    $pdf->Cell(60, 10, $row['nama_kategori'], 1);
    $pdf->Cell(30, 10, $row['jumlah'], 1, 1, 'C');
}


$pdf->Output('daftar_buku.pdf', 'I');