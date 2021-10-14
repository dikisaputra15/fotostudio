<?php
$id = $_GET['id'];

mysqli_query($koneksi,"delete from user where user_id='$id'");
?>
    <script type="text/javascript"> alert("Data Berhasil dihapus");
        window.location.href="?page=module/customer/d_cust";
    </script> 
<?php

?>