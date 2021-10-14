<?php
error_reporting(0);
include('../fpdf181/fpdf.php');
include('../koneksi.php');
include('../helper.php');

$id = $_GET['id'];
$pr = mysqli_query($koneksi, "select tb_bayar .*, tb_detail_pesan_reg.id_pesan,
					tb_detail_pesan_reg.tgl_pesan,tb_detail_pesan_reg.total, user.user_id,user.nama_lengkap,user.alamat,user.no_telp
					from tb_bayar join tb_detail_pesan_reg on tb_bayar.id_pesan=tb_detail_pesan_reg.id_pesan join user on tb_bayar.user_id=
					user.user_id where tb_detail_pesan_reg.id_pesan='$id'");
$dat=mysqli_fetch_array($pr);

$pdf = new FPDF('L','mm','A5');
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,5,'FOTOSTUDIO','0','1','C',false);
$pdf->SetFont('Arial','i',8);
$pdf->Ln(1);
$pdf->Cell(0,2,'Banten','0','1','C',false);
$pdf->Ln(1);
$pdf->Cell(0,2,'Telp 0254(987)','0','1','C',false);
$pdf->Ln(8);
$pdf->Cell(265,0.6,'','0','1','C',true);
$pdf->Ln(5); 

$pdf->SetFont('Arial','B',13);
$pdf->Cell(60,5,'',0,0,''); 
$pdf->Cell(0,5,'Tanda Bukti Pembayaran',0,1,'L'); 
$pdf->SetLineWidth(0.4); 
$pdf->Rect(60,30,80,13);
$pdf->SetFont('Arial','',11);
$pdf->Ln(10); 
$pdf->Cell(45,5,'Tanggal Pesan :'.$dat['tgl_pesan'],0,0,'L');
$pdf->Ln(5);
$pdf->Cell(45,5,'Tanggal konfirmasi :'.$dat['tgl_konfir'],0,0,'L'); 
$pdf->Cell(120,5,'Noinvoice :'.$dat['id_pesan'],0,0,'R'); 
$pdf->Ln(5); 
$pdf->Cell(45,5,'Nama Pemesan :'.$dat['nama_lengkap'],0,0,'L');
$pdf->Cell(120,5,'No Telp :'.$dat['no_telp'],0,0,'R');
$pdf->Ln(10);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(15,6,'Id pesan',1,0,'c');
$pdf->Cell(30,6,'Tgl Pesan',1,0,'c'); 
$pdf->Cell(40,6,'Jenis Paket',1,0,'c');
$pdf->Cell(30,6,'Harga',1,0,'c');
$pdf->Ln(2); 

$pb = mysqli_query($koneksi, "select tb_bayar .*, tb_detail_pesan_reg.id_pesan,
					tb_detail_pesan_reg.tgl_pesan,tb_detail_pesan_reg.total, user.user_id,user.nama_lengkap,user.alamat,user.no_telp, tb_paket.nama_paket
					from tb_bayar join tb_detail_pesan_reg on tb_bayar.id_pesan=tb_detail_pesan_reg.id_pesan join user on tb_bayar.user_id=
					user.user_id join tb_paket on tb_bayar.id_paket=tb_paket.id_paket where tb_detail_pesan_reg.id_pesan='$id'");
while($data = mysqli_fetch_array($pb)){
$total=$data['dp'];
$sisa=$data['sisa'];
$pdf->Ln(4);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(15,4,$data['id_pesan'].".",1,0,'L');
	$pdf->Cell(30,4,$data['tgl_pesan'],1,0,'L');
	$pdf->Cell(40,4,$data['nama_paket'].".",1,0,'L');
	$pdf->Cell(30,4,$data['total'].".",1,0,'L');
}
$pdf->Ln(4);
$pdf->SetFont('Arial','',10);
$pdf->Cell(85,4,'Total',1,0,'c');
$pdf->Cell(30,4,"Rp.".$total,1,0,'c');

$pdf->Ln(4);
$pdf->SetFont('Arial','',10);
$pdf->Cell(85,4,'Sisa',1,0,'c');
$pdf->Cell(30,4,"Rp.".$sisa,1,0,'c');

$pdf->Ln(8);
$pdf->SetFont('Arial','',12); 
$pdf->Cell(170,5,'Hormat Kami',0,0,'R');
$pdf->Ln(15);
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(170,5,'Admin fotostudio',0,0,'R');
$pdf->Output();
?>