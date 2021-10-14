<?php
	
	$log = $_SESSION['user_id'];
	
	if($user_id){
?>
<div class="container">
<div class="row justify-content-center">
	<div class="col-md-8 pb-30 header-text">
		<h1>List Pesanan Fotografer</h1>				
	</div>
</div>

<div class="row">	
			
			<div class="col-md-12">
				<table class="table" id="datatables">
					 <thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Tanggal Booking</th>
						<th>status</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
						$no=1;
						$query = mysqli_query($koneksi, "select tb_pesan .*,tb_detail_pesan_reg.tgl_main from tb_pesan join tb_detail_pesan_reg on
						tb_pesan.id_pesan=tb_detail_pesan_reg.id_pesan where tb_pesan.user_id='$log'");
						while($dat = mysqli_fetch_array($query)){
						$status = $dat['status'];
						
					?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $dat['nama_penerima']; ?></td>
							<td><?php echo $dat['tgl_main']; ?></td>
							<td><?php echo $arraystatus[$status]; ?></td>
							<td>
								<a class="btn btn-primary" href="?page=module/detail&id=<?php echo $dat['id_pesan']; ?>" >Transaksi</a>
								<a class="btn btn-primary" onclick="return confirm('yakin ingin menghapus data ?')"  href="?page=module/hps_pes&id=<?php echo $dat['id_pesan']; ?>">Hapus</a>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
				
			</div>
									
			</div>
	</div>
	<script src="js/vendor/jquery-2.2.4.min.js"></script>

<?php }else{ ?>
	<script type="text/javascript"> alert("silahkan login terlebih dahulu");
		window.location.href="index.php?page=login";
	</script> 
<?php } ?>