<?php
class Cetak_pdf {

    function __construct() {
        include_once APPPATH . '/third_party/fpdf/fpdf.php';
    }

    // function Footer()
	// {
	// 	//atur posisi 1.5 cm dari bawah
	// 	$this->SetY(-15);
	// 	//buat garis horizontal
	// 	$this->Line(10,$this->GetY(),200,$this->GetY());
	// 	//Arial italic 9
	// 	$this->SetFont('Arial','I',9);
	// 	//nomor halaman
	// 	$this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
	// }
}
?>