<?php
	//error_reporting(0);
	//session_start();
	$log = $_SESSION['user_id'];
    $pegawai = mysqli_query($koneksi, "SELECT * FROM user where user_id='$log'");
    $row = mysqli_fetch_array($pegawai);
	$alamat = $row['alamat'];
	
	if($user_id){
?>
 <div class="breadcumb-area bg-img bg-overlay2" style="background-image: url(img/bg-img/breadcumb4.jpg);">
  </div>
<div class="container">
<div class="row justify-content-center">
	<div class="col-md-8 pb-30 header-text">
		<h1>form pesan fotograper</h1>
							
	</div>
</div>

<div class="row">	
<div class="col-md-12">
	<p>silahkan pilih tanggal</p>
</div>
			
			<div class="col-md-6">
			<form action="" method="POST">
			
				<input type="date" name="tgl">
				<input type="submit" name="pilih" class="btn btn-primary" value="Pilih">
			
			</form>
			
			<form action="" method="POST">
				<?php
				if(isset($_POST['pilih'])){
				
			?>
			<div class="">
			
				<table class="table">
					<tr>
						<td>Jam</td>
						<td>Status</td>
						<td>Pilih</td>
					</tr>
					<?php
					$tgl=$_POST['tgl'];

						$jam_buka = 8;
						for($i=1; $i<=20; $i++){
							
							$jam_akhir = $jam_buka + 1;
							if($jam_akhir > 24){
								$jam_akhir = 1;
							}
							if($jam_buka > 24){
								$jam_buka = 1;
								$jam_akhir = $jam_buka + 1;
							}
							$query=mysqli_query($koneksi, "select tgl_main from tb_detail_pesan_reg where tgl_main='$tgl' and jam_main='$jam_buka - $jam_akhir'");
							$con=mysqli_num_rows($query);
							if($con>0){
								$status="booked";
								$disabled="disabled";
								echo"
								<tr style='background-color:red;'>
									<td>$jam_buka - $jam_akhir</td>
									<td>$status</td>
									<td><input type='checkbox' name='jam[]' value='$jam_buka - $jam_akhir' $disabled></td>

								</tr>
								";
							}else{
								$status="free";
								$disabled="";
								echo"
								<tr>
									<td>$jam_buka - $jam_akhir</td>
									<td>$status</td>
									<td><input type='checkbox' name='jam[]' value='$jam_buka - $jam_akhir' $disabled></td>

								</tr>
								";
							}
							
							$jam_buka++;
						}
					?>
				</table>
				<input type="hidden" name="tgl_main" value="<?=$_POST['tgl']?>">
			</div>
			<?php
			}
			?>
			 </div>
			 <div class="col-md-6" >
			<legend><b>Form identitas penyewa reguler</b> </legend> 

            <label class="control-label" ><b>Pilih Paket</b></label>
            <select onchange="reguler()" id="id_paket" name="id_paket" class="form-control" readonly="readonly">
            <option>-Pilih Paket-</option>
				<?php
				
				 $paket = mysqli_query($koneksi, "SELECT * FROM tb_paket");
					while ($dat = mysqli_fetch_array($paket)) {
						$idpaket=$dat['id_paket'];
						echo "<option value='$idpaket'>$dat[nama_paket]</option>";
					}
					
				?>
            </select><br>

			<label class="control-label" ><b>Harga</b></label>
            <input name="harga" class="form-control" type="number" id="harga" readonly="readonly">

            <label class="control-label" ><b>Nama Pemesan</b></label>
            <input name="nama_p" class="form-control" type="text" value="<?php echo $row['nama_lengkap']; ?>" readonly="readonly">

            <label class="control-label" ><b>No Hp</b></label>
            <input name="no_hp" class="form-control" type="text" value="<?php echo $row['no_telp']; ?>" readonly="readonly">

            <label class="control-label" ><b>Alamat</b></label>
            <textarea name="alamat" class="form-control" type="text" required><?php echo $alamat ?></textarea> <br>

            <input type="submit" name="kirim_n" class="btn btn-primary">
			</div>
			</form> 
			<?php
				
				if(isset($_POST['kirim_n'])){
				$harga = $_POST['harga'];
				$idpaket = $_POST['id_paket'];
				$nama = $_POST['nama_p'];
				$no_hp = $_POST['no_hp'];
				$alamat = $_POST['alamat'];
				$tgl_book = $_POST['tgl_main'];
				date_default_timezone_set('Asia/Jakarta');
				$tgl_pes= date('Y-m-d H:i:s');
				
				$mp = mysqli_query($koneksi, "insert into tb_pesan values('','$log','$nama','$no_hp','$alamat',0)");
				
				if($mp){
					$checkbox1 = $_POST['jam'];
					$last_pesanan_id = mysqli_insert_id($koneksi);
					for ($i = 0; $i <count($checkbox1);$i++){
						if(!empty($checkbox1)){
						mysqli_query($koneksi,"INSERT INTO tb_detail_pesan_reg VALUES ('$last_pesanan_id','$idpaket','$log','$tgl_pes','$tgl_book','".$checkbox1[$i]."','$harga','0')");
						}
					}
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
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script type="text/javascript">
    function reguler(){
        var id_paket = $("#id_paket").val();
        $.ajax({
            url: 'module/ajax.php',
            data:"id_paket="+id_paket ,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#harga').val(obj.harga);
 
        });
    }
</script>
<?php }else{ ?>
	<script type="text/javascript"> alert("silahkan login terlebih dahulu");
		window.location.href="index.php?page=login";
	</script> 
<?php } ?>