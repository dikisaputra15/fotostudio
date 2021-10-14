<?php

				include "../koneksi.php";
				if(isset($_POST['kirimpak'])){
				$user_id = $_POST['user_id'];
				$idpaket = $_POST['id_paket'];
				$harga = $_POST['harga'];
				$tglb = $_POST['tglp'];
				$nama = $_POST['nama_p'];
				$no_hp = $_POST['no_hp'];
				$alamat = $_POST['alamat'];
				date_default_timezone_set('Asia/Jakarta');
				$tglp = date('Y-m-d H:i:s');
				
				$dd = mysqli_query($koneksi,"select * from tb_detail_pesan_reg where tgl_main='$tglb'");
				$hd = mysqli_fetch_array($dd);
				$thd = $hd['tgl_main'];
				//$thv = $hd['tgl_wed'];
				
				if($thd==$tglb){
					?>
						<script type="text/javascript"> alert("Tanggal Sudah dipesan silahkan cari tanggal lain");
							window.location.href="../index.php?page=module/form_paket";
						</script> 
					<?php
				}else{
				$mp = mysqli_query($koneksi, "insert into tb_pesan values('','$user_id','$nama','$no_hp','$alamat',0)");
				if($mp){
					
					$last_pesanan_id = mysqli_insert_id($koneksi);
					$md = mysqli_query($koneksi,"insert into tb_detail_pesan_reg values('$last_pesanan_id','$idpaket','$user_id','$tglp','$tglb','paket','$harga','0')");
					
					?>
						<script type="text/javascript"> alert("berhasil");
							window.location.href="../index.php?page=module/list_pes";
						</script> 
					<?php
					}
				}
				}
			?>