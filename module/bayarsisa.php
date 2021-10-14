 <?php
 $id = $_GET['id'];
 $query = mysqli_query($koneksi, "select * from tb_bayar where id_bayar='$id'");
 $data=mysqli_fetch_array($query);
 $idp = $data['id_pesan'];
 $totalb = $data['dp'];
 ?>
 <section class="About-area section-gap" >
<div class="container">
<div class="row">
 <div class="col-md-6">
<h3>Form Pelunasan sisa pembayaran</h3>
<form action="" method="POST" enctype="multipart/form-data">
			<label class="control-label" ><b>Sisa pembayaran</b></label>
            <input class="form-control" type="number" name="sisalama" value=<?php echo $data['sisa']; ?> readonly="readonly">

			<label class="control-label" ><b>Bayar Sisa</b></label>
            <input class="form-control" type="number"  name="bayarsisa" placeholder="Masukkan sisa pembayaran" required>
			
            <label class="control-label" ><b>upload bukti pembayaran</b></label>
            <input name="foto" class="form-control" type="file"><br>

            <input type="submit" name="bayar_dp" class="btn btn-primary">
</form>
</div>
</div>
</div>
</section>
<?php
if(isset($_POST['bayar_dp'])){
	$sisalama = $_POST['sisalama'];
	$bayarsisa = $_POST['bayarsisa'];
	$tgl = date('Y-m-d');
	$total = $totalb + $bayarsisa;
	
	$foto=$_FILES['foto']['name'];
	$path_foto=$_FILES['foto']['tmp_name'];
	$ukuran_foto = $_FILES['foto']['size'];
	$dir_foto="img/buktibayar/$foto";
	
	$kirimb = mysqli_query($koneksi, "update tb_bayar set tgl_konfir='$tgl', dp='$total', sisa=0, upload_Slip='$foto' where id_bayar='$id'");
		if($kirimb){
			move_uploaded_file($path_foto, $dir_foto);
			mysqli_query("update tb_pesan set status=2 where id_pesan='$idp'")
			?>
				<script type="text/javascript"> alert("Berhasil");
					window.location.href="index.php?page=module/list_pes";
				</script> 
			<?php
		}
}
?>