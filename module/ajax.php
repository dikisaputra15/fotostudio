<?php
include "../koneksi.php";
$paket = mysqli_fetch_array(mysqli_query($koneksi, "select * from tb_paket where id_paket='$_GET[id_paket]'"));
$data_paket = array('harga'      =>  $paket['harga'],
					'rincian'      =>  $paket['rincian'],
);
 echo json_encode($data_paket);
?>