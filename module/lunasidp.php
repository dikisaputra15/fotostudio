<?php
	
	$log = $_SESSION['user_id'];
	
?>
<div class="container">
<div class="row justify-content-center">
	<div class="col-md-8 pb-30 header-text">
		<h1>List Pesanan photografer</h1>				
	</div>
</div>

<div class="row">	
			
			<div class="col-md-12">
				<table class="table" id="datatables">
					 <thead>
					<tr>
						<th>No</th>
						<th>Nama Pemesan</th>
						<th>Total Bayar</th>
						<th>Sisa</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
						$no=1;
						$query = mysqli_query($koneksi, "select tb_bayar .*, tb_detail_pesan_reg.id_pesan,tb_detail_pesan_reg.tgl_pesan,tb_detail_pesan_reg.total, user.user_id,user.nama_lengkap,user.alamat,user.no_telp
					from tb_bayar join tb_detail_pesan_reg on tb_bayar.id_pesan=tb_detail_pesan_reg.id_pesan join user on tb_bayar.user_id=
					user.user_id where tb_bayar.sisa > 0");
						while($dat = mysqli_fetch_array($query)){
						
					?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $dat['nama_lengkap']; ?></td>
							<td><?php echo $dat['dp']; ?></td>
							<td><?php echo $dat['sisa']; ?></td>
							<td><a class="btn btn-primary" href="?page=module/bayarsisa&id=<?php echo $dat['id_bayar']; ?>" >Bayar</a></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
				
			</div>
									
			</div>
	</div>

