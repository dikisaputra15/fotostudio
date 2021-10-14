
<div class="container">
<?php
	
	$log = $_SESSION['user_id'];
    $pegawai = mysqli_query($koneksi, "SELECT * FROM user where user_id='$log'");
    $row = mysqli_fetch_array($pegawai);
	$alamat = $row['alamat'];
	
	if($user_id){
?>
<div class="row">				
			<div class="col-md-12">
<div class="row justify-content-center">
	<div class="col-md-8 pb-30 header-text">
		<h1>form pesan fotograper paket</h1>
							
	</div>
</div>
<div class="col-md-6">
<form action="" method="POST">
  <label class="control-label" ><b>Pilih Paket</b></label>
            <select onchange="paket()" id="id_paket" name="id_paket" class="form-control">
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
            <input name="harga" class="form-control" type="number" id="harga" readonly="readonly"><br>
			
			<label class="control-label" ><b>Rincian</b></label><br>
            <textarea class="form-control" style="height:300px;" id="rincian" readonly="readonly"></textarea><br>
			
			<input type="submit" name="pilih" value="pilih" class="btn btn-primary">
			
</form>
</div>
</div>
</div><br>

<?php
if(isset($_POST['pilih'])){
$idpak=$_POST['id_paket'];
if($idpak==2){?>

<div class="row">				
			<div class="col-md-6">

<h5>daftar jadwal yang sudah di pesan</h5><br>		
				<table class="table" id="datatables" >
					 <thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>status</th>
					</tr>
					</thead>
					<tbody>
						<?php
							$no=1;
							$que = mysqli_query($koneksi, "select tgl_main from tb_detail_pesan_reg");
							while($tquer=mysqli_fetch_array($que)){
						?>
								<tr style='background-color:red; color:white;'>
									<td><?php echo $no++; ?></td>
									<td><?php echo $tquer['tgl_main']; ?></td>
									<td><?php echo "sudah di booking"; ?></td>
								</tr>
						<?php
							}
						?>
					</tbody>
				</table>
				
			</div>
			
			 <div class="col-md-6" >
			 <form action="module/proses_wed_pak.php" method="POST">
			<legend><b>Form identitas penyewa fotograper kategori paket</b> </legend> <br>
			
			<input name="user_id" class="form-control" type="text" value="<?php echo $log; ?>" hidden>
			<input name="id_paket" class="form-control" type="text" value="<?php echo $_POST['id_paket']; ?>" hidden>
			<input name="harga" class="form-control" type="text" value="<?php echo $_POST['harga']; ?>" hidden>
			
			<label class="control-label" ><b>Tanggal prawedding</b></label>
            <input name="tgls" class="form-control" type="date" required>

			<label class="control-label" ><b>Tanggal wedding</b></label>
            <input name="tglz" class="form-control" type="date" required>
			
			<label class="control-label" ><b>Nama Pemesan</b></label>
            <input name="nama_p" class="form-control" type="text" value="<?php echo $row['nama_lengkap']; ?>" readonly="readonly">

            <label class="control-label" ><b>No Hp</b></label>
            <input name="no_hp" class="form-control" type="text" value="<?php echo $row['no_telp']; ?>" readonly="readonly">

            <label class="control-label" ><b>Alamat</b></label>
            <textarea name="alamat" class="form-control" type="text" required><?php echo $alamat ?></textarea> <br>
			
			<input type="submit" name="kirimwed" value="Kirim" class="btn btn-primary">
			</form>
			</div>
																
			</div>
<?php } else{ ?>

<div class="row">				
			<div class="col-md-6">

<h5>daftar jadwal yang sudah di pesan</h5><br>		
				<table class="table" id="datatables" >
					 <thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>status</th>
					</tr>
					</thead>
					<tbody>
						<?php
							$no=1;
							$que = mysqli_query($koneksi, "select tgl_main from tb_detail_pesan_reg");
							while($tquer=mysqli_fetch_array($que)){
						?>
								<tr style='background-color:red; color:white;'>
									<td><?php echo $no++; ?></td>
									<td><?php echo $tquer['tgl_main']; ?></td>
									<td><?php echo "sudah di booking"; ?></td>
								</tr>
						<?php
							}
						?>
					</tbody>
				</table>
				
			</div>
			
			 <div class="col-md-6" >
			 <form action="module/proses_pak.php" method="POST">
			<legend><b>Form identitas penyewa fotograper kategori paket</b> </legend> <br>
			
			<input name="user_id" class="form-control" type="text" value="<?php echo $log; ?>" hidden>
			<input name="id_paket" class="form-control" type="text" value="<?php echo $_POST['id_paket']; ?>" hidden>
			<input name="harga" class="form-control" type="text" value="<?php echo $_POST['harga']; ?>" hidden>
			
			<label class="control-label" ><b>Tanggal Booking</b></label>
            <input name="tglp" class="form-control" type="date" required>
			
			<label class="control-label" ><b>Nama Pemesan</b></label>
            <input name="nama_p" class="form-control" type="text" value="<?php echo $row['nama_lengkap']; ?>" readonly="readonly">

            <label class="control-label" ><b>No Hp</b></label>
            <input name="no_hp" class="form-control" type="text" value="<?php echo $row['no_telp']; ?>" readonly="readonly">

            <label class="control-label" ><b>Alamat</b></label>
            <textarea name="alamat" class="form-control" type="text" required><?php echo $alamat ?></textarea> <br>
			
			<input type="submit" name="kirimpak" value="Kirim" class="btn btn-primary">
			</form>
			</div>
			 													
			</div>
			
<?php } }?>
	</div>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script type="text/javascript">
    function paket(){
        var id_paket = $("#id_paket").val();
        $.ajax({
            url: 'module/ajax.php',
            data:"id_paket="+id_paket ,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#harga').val(obj.harga);
            $('#rincian').val(obj.rincian);
 
        });
    }
</script>
<?php }else{ ?>
	 <script type="text/javascript"> alert("Silahkan Login Terlebih Dahulu");
        window.location.href="?page=login";
    </script> 
<?php } ?>