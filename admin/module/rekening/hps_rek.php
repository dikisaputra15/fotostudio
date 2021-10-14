<?php
$id = $_GET['id'];

mysqli_query($koneksi, "delete from tb_rekening where id_rek='$id'");
?>
    <script type="text/javascript"> alert("Data Berhasil dihapus");
        window.location.href="?page=module/rekening/list_rek";
    </script> 
<?php

?>