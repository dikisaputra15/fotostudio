	
<html>

	<body>
	<?php
	error_reporting(0);
	$log = $_SESSION['user_id'];

	$id = $_GET['id'];
	
?>
<section class="About-area section-gap" >
<div class="container">
<div class="row">	
	<div class="col-md-8 pb-30 header-text">
		<h1>List Pesanan Fotografer</h1>				
	</div>		
			<div class="col-md-12">
				<table class="table">
					 <thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Tanggal</th>
						<th>Jenis Paket</th>
						<th>status</th>
						<th>Sub Total</th>
					</tr>
					</thead>
					<tbody>
					<?php
						$no=1;
						$query = mysqli_query($koneksi, "select tb_detail_pesan_reg .*, tb_pesan.id_pesan,tb_pesan.nama_penerima,
						tb_pesan.no_hp,tb_pesan.alamat,tb_pesan.status, tb_paket.nama_paket,tb_paket.id_paket from tb_detail_pesan_reg join tb_pesan on
						tb_detail_pesan_reg.id_pesan=tb_pesan.id_pesan join tb_paket on tb_detail_pesan_reg.id_paket=tb_paket.id_paket where tb_detail_pesan_reg.id_pesan='$id'");
						while($dat = mysqli_fetch_array($query)){
						$status = $dat['status'];
						$paket = $dat['id_paket'];
						$harga=$dat['total'];
						$tgl_pesan=$dat['tgl_pesan'];
						$total+=$dat['total'];
						
						date_default_timezone_set('Asia/Jakarta');
						$waktusekarang = date('Y-m-d H:i:s');
						
						$selisih = ceil((strtotime($waktusekarang) - strtotime($tgl_pesan))/3600);
						
						if($status==1 && $selisih>25){
							mysqli_query($koneksi, "delete from tb_pesan where id_pesan='$id' and status=1");
							mysqli_query($koneksi, "delete from tb_detail_pesan_reg where id_pesan='$id' and status=1");
							?>
								<script type="text/javascript"> alert("Pesanan kadaluarsa dan tidak bisa melakukan pembayaran silahkan pesan ulang");
									window.location.href="?page=module/list-pes";
								</script> 
							<?php
						}
						
						if($status==0 && $selisih>25){
							mysqli_query($koneksi, "delete from tb_pesan where id_pesan='$id' and status=0");
							mysqli_query($koneksi, "delete from tb_detail_pesan_reg where id_pesan='$id' and status=0");
							?>
								<script type="text/javascript"> alert("Pesanan kadaluarsa dan tidak bisa melakukan pembayaran silahkan pesan ulang");
									window.location.href="?page=module/list-pes";
								</script> 
							<?php
						}
						
					?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $dat['nama_penerima']; ?></td>
							<td><?php echo $dat['tgl_pesan']; ?></td>
							<td><?php echo $dat['nama_paket']; ?></td>
							<td><?php echo $arraystatus[$status]; ?></td>
							<td><?php echo $harga; ?></td>
						</tr>
					<?php } ?>
					<tr>
						<td>Total</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><?php echo $total; ?></td>
					</tr>
					</tbody>
				</table>
				
			</div>
			
<div class="col-md-8 pb-30 header-text">
		<h1>Rekening Pembayaran</h1>				
	</div>		
			<div class="col-md-12">
				<table class="table">
					 <thead>
					<tr>
						<th>Bank</th>
						<th>Nama Bank</th>
						<th>Atas Nama</th>
						<th>No Rekening</th>
					</tr>
					</thead>
					<tbody>
					<?php
						$no=1;
						$queryr = mysqli_query($koneksi, "select * from tb_rekening where status='on'") or die(mysql_error());
						while($datr = mysqli_fetch_array($queryr)){
						
					?>
						<tr>
							<td><img src="admin/image/rekening/<?php echo $datr['gambar']; ?>" height="50px" width="50px"></td>
							<td><?php echo $datr['nama_bank']; ?></td>
							<td><?php echo $datr['atas_nama']; ?></td>
							<td><?php echo $datr['no_rek']; ?></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
				
			</div>
<?php if($status==1 or $status==2){ ?>
<div class="col-md-6">
<a href="module/cetaks.php?id=<?php echo $id; ?>" target="_blank" class="btn btn-primary">Cetak</a>
</div>
<?php } ?>

<?php if($status==1 or $status==4){ ?>
<div class="col-md-6">
<a href="?page=module/lunasidp" class="btn btn-primary">Lunasi</a>
</div>
<?php } ?>				
			</div>
	</div>
</section>


<?php if($status==0){ ?>
<section class="About-area section-gap" >
<div class="container">
<div class="row">	
	<div class="col-md-12">
		<h3>Pilih jenis pembayaran</h3>
		<input type="radio" name="rad" id="rad1" value="1" class="rad"/>DP
		<input type="radio" name="rad" id="rad2" value="2" class="rad"/> Lunas
	</div>
			<!-- form yang mau ditampilkan-->
			<div id="form1" style="display:none">
			<form action="" method="POST" enctype="multipart/form-data">
			 <div class="col-md-12">

			<label class="control-label" ><b>Jumlah DP</b></label>
            <input class="form-control" type="number" id="harga" name="dp" placeholder="Masukkan jumlah DP" required>

            <label class="control-label" ><b>upload bukti pembayaran</b></label>
            <input name="foto" class="form-control" type="file"><br>

            <input type="submit" name="kirim_dp" class="btn btn-primary">
			</div>
			</form>
				<?php
				if(isset($_POST['kirim_dp'])){
					$dp = $_POST['dp'];
					$tglk = date('Y-m-d');
					$sisa = $total-$dp;
					
					$foto=$_FILES['foto']['name'];
					$path_foto=$_FILES['foto']['tmp_name'];
					$ukuran_foto = $_FILES['foto']['size'];
					$dir_foto="img/buktibayar/$foto";
					
					$kirimb = mysqli_query($koneksi, "insert into tb_bayar values('','$id','$log','$paket','$tglk','$dp','$sisa','$foto')");
					if($kirimb){
						move_uploaded_file($path_foto, $dir_foto);
						mysqli_query($koneksi, "update tb_pesan set status=1 where id_pesan='$id'")
						?>
							<script type="text/javascript"> alert("Berhasil");
								window.location.href="index.php?page=module/list_pes";
							</script> 
						<?php
					}
					}
				?>
			</div>			
			
			<div id="form2" style="display:none">
				<form action="" method="POST" enctype="multipart/form-data">
			 <div class="col-md-12">

            <label class="control-label" ><b>upload bukti pembayaran</b></label>
            <input name="gambar" class="form-control" type="file">

            <input type="submit" name="bayar_l" class="btn btn-primary">
			</div>
			</form> 
			<?php
			if(isset($_POST['bayar_l'])){
				$tglk = date('Y-m-d');
				$gambar=$_FILES['gambar']['name'];
				$path_foto=$_FILES['gambar']['tmp_name'];
				$ukuran_foto = $_FILES['gambar']['size'];
				$dir_foto="img/buktibayar/$gambar";
				
				$lq = mysqli_query($koneksi, "insert into tb_bayar values('','$id','$log','$paket','$tglk','$total',0,'$gambar')");
				if($lq){
					move_uploaded_file($path_foto, $dir_foto);
					mysqli_query($koneksi, "update tb_pesan set status=2 where id_pesan='$id'")
						?>
							<script type="text/javascript"> alert("Berhasil");
								window.location.href="index.php?page=module/list_pes";
							</script> 
						<?php
				}
			}
			?>
			</div>
			</div>
			</div>
	</section>
<?php } ?>


		<!-- tambahkan jquery-->
		<script src="js/vendor/jquery-2.2.4.min.js"></script>
		<script type="text/javascript">
			$(function(){
				$(":radio.rad").click(function(){
					$("#form1, #form2").hide()
					if($(this).val() == "1"){
						$("#form1").show();
					}else{
						$("#form2").show();
					}
				});
			});
		</script>
	</body>
</html>