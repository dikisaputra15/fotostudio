<?php

session_start();

$page = isset($_GET['page']) ? $_GET['page'] : false;
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;

$sql_user=mysqli_query($koneksi, "select * from user where user_id='$user_id'");
$data_user=mysqli_fetch_array($sql_user);
				
?>

<form action="" method="POST">
<legend><b>Form Edit user</b> </legend> 
<label class="control-label" ><b>Nama Lengkap</b></label>
<input name="nama_l" class="form-control" type="text" value="<?php echo $data_user['nama_lengkap']; ?>">

<label class="control-label" ><b>Alamat</b></label>
<input name="alamat" class="form-control" type="text" value="<?php echo $data_user['alamat']; ?>">

<label class="control-label" ><b>email</b></label>
<input name="email" class="form-control" type="email" value="<?php echo $data_user['email']; ?>">

<label class="control-label" ><b>No Telepon</b></label>
<input name="no_telp" class="form-control" type="number" value="<?php echo $data_user['no_telp']; ?>">

<label class="control-label" ><b>Username</b></label>
<input name="user" class="form-control" type="text" value="<?php echo $data_user['username']; ?>">

<label class="control-label" ><b>Password</b></label>
<input name="pass" class="form-control" type="text"><br>

<input type="submit" name="kirim_u" value="Update" class="btn btn-primary">
</form>
<?php
if(isset($_POST['kirim_u'])){
	$nama = $_POST['nama_l'];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];
	$notelp = $_POST['no_telp'];
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	
	if($pass==""){
		mysqli_query($koneksi, "update user set nama_lengkap='$nama', alamat='$alamat', email='$email', no_telp='$notelp', username='$user' where user_id='$user_id'");
		?>
				<script type="text/javascript"> alert("update data berhasil");
					window.location.href="index.php?page=module/user";
				</script> 
		<?php
	}else{
		mysqli_query($koneksi, "update user set nama_lengkap='$nama', alamat='$alamat', email='$email', no_telp='$notelp', username='$user', password=md5('$pass') where user_id='$user_id'");
		?>
				<script type="text/javascript"> alert("update data berhasil");
					window.location.href="index.php?page=module/user";
				</script> 
		<?php
	}
}
?>
