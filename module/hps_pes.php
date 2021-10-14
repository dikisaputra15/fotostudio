<?php
$id = $_GET['id'];

$detail = mysqli_query($koneksi, "delete from tb_detail_pesan_reg where id_pesan='$id'");
if($detail){
mysqli_query("delete from tb_pesan where id_pesan='$id'");
?>
    <script type="text/javascript"> alert("Data Berhasil dihapus");
        window.location.href="?page=module/list_pes";
    </script> 
<?php
}
?>