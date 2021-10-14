<?php
				
				include "../koneksi.php";
				
				if(isset($_POST['kirimwed'])){
				$user_id = $_POST['user_id'];
				$idpaket = $_POST['id_paket'];
				$harga = $_POST['harga'];
				$tgls = $_POST['tgls'];
				$tglz = $_POST['tglz'];
				$nama = $_POST['nama_p'];
				$no_hp = $_POST['no_hp'];
				$alamat = $_POST['alamat'];
				date_default_timezone_set('Asia/Jakarta');
				$tgl_pesan = date('Y-m-d H:i:s'); 
				
				$dd = mysqli_query($koneksi, "select * from tb_detail_pesan where tgl_pesan='$tgls' or tgl_wed='$tgls'");
				$hd = mysqli_fetch_array($dd);
				$thd = $hd['tgl_pesan'];
				$thv = $hd['tgl_wed'];
				
				if($thd==$tgls or $thv==$tgls){
					?>
						<script type="text/javascript"> alert("Tanggal Sudah dipesan silahkan cari tanggal lain");
							window.location.href="../index.php?page=module/form_paket";
						</script> 
					<?php
				}else{
				$mp = mysqli_query($koneksi, "insert into tb_pesan values('','$user_id','$nama','$no_hp','$alamat',0)");
				if($mp){
					
					$last_pesanan_id = mysqli_insert_id($koneksi);
					mysqli_query($koneksi, "insert into tb_detail_pesan values('$last_pesanan_id','$idpaket','$tgl_pesan','$tgls','$tglz','$harga')");
					?>
						<script type="text/javascript"> alert("Berhasil");
							window.location.href="../index.php?page=module/list_pes";
						</script> 
					<?php
					}
				}
				}
			?>