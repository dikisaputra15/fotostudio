<?php

include('../../../fpdf181/fpdf.php');
include('../../../koneksi.php');

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,8,'J.SIE MULTIMEDIA','0','1','C',false);
$pdf->Cell(0,8,'LAPORAN HISTORI PEMESANAN','0','1','C',false);
$pdf->SetFont('Arial','i',8);
$pdf->Cell(0,2,'RangkasBitung','0','1','C',false);
$pdf->Ln(8);
$pdf->Cell(265,0.6,'','0','1','C',true);
$pdf->Ln(5);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(8,6,'No',1,0,'c');
$pdf->Cell(50,6,'Nama Pemesan',1,0,'c');
$pdf->Cell(50,6,'Tanggal',1,0,'c');
$pdf->Cell(40,6,'Total',1,0,'c');
$pdf->Ln(2);

 $no=0;
 $tgl1=$_POST['tgl1'];
 $tgl2=$_POST['tgl2'];
$sql = mysqli_query($koneksi, "SELECT tb_detail_pesan_reg.*, tb_pesan.nama_penerima,tb_pesan.no_hp,tb_pesan.alamat, 
tb_pesan.status from tb_detail_pesan_reg join tb_pesan on tb_detail_pesan_reg.id_pesan=tb_pesan.id_pesan
where tb_detail_pesan_reg.tgl_pesan between '$tgl1' and '$tgl2'");
while($data = mysqli_fetch_array($sql)){

	//$total+=$data['total'];

	$no++;
	$pdf->Ln(4);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(8,4,$no.".",1,0,'L');
	$pdf->Cell(50,4,$data['nama_penerima'],1,0,'L');
	$pdf->Cell(50,4,$data['tgl_pesan'],1,0,'L');
	$pdf->Cell(40,4,$data['total'],1,0,'L');
	
}

$pdf->Ln(4);
$pdf->Output();

?>
	