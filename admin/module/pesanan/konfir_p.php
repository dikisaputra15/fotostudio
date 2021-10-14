<?php	

	$id = $_GET['id'];
	
	mysqli_query($koneksi, "update tb_pesan set status=3 where id_pesan='$id'");
	?>
		<script type="text/javascript"> alert("Konfirmasi Berhasil");
			window.location.href="index.php?page=module/pesanan/d_pesan";
		</script> 
	<?php
?>