 <?php 
 
 
 $query = mysqli_query($koneksi, "select * from tb_profil");
 $data = mysqli_fetch_array($query);
 $id = $data['id_profil'];
 $keterangan = $data['keterangan'];
 $nama = $data['nama_brand'];
 
 ?>
 <script src="js/ckeditor/ckeditor.js"> </script>
 <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update Profil</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="POST" enctype="multipart/form-data">
			  <div class="box-body">
				<div class="form-group">
					<label>Nama Brand</label><br>
					<input type="text" name="nama" value="<?php echo $nama; ?>" class="form-control">
				</div>
                <div class="form-group">
                  <label for="exampleInputFile">Photo / Logo</label><br>
				  <img src="image/<?php echo $data['photo']; ?>" width="500px" height="350px"><br><br>
                  <input type="file" name="foto" id="exampleInputFile">
                </div>
              </div>
              <div class="form-group">
                <label>Keterangan</label>
				<span><textarea type="text" name="ket" id="editor" ><?php echo $keterangan; ?></textarea></span>
              </div>

              <div class="box-footer">
                <input type="submit" class="btn btn-primary" value="Update Profil" name="update">
              </div>
            </form>
			<?php

				if(isset($_POST['update'])){
				$ket = $_POST['ket'];
				$nama = $_POST['nama'];

				$foto=$_FILES['foto']['name'];
				$path_foto=$_FILES['foto']['tmp_name'];
				$ukuran_foto = $_FILES['foto']['size'];
				$dir_foto="image/$foto";

					if($foto == ""){
						mysqli_query($koneksi, "update tb_profil set nama_brand='$nama', keterangan='$ket' where id_profil='$id'");
						 ?>
							<script type="text/javascript"> alert("Data Berhasil diupdate");
							  window.location.href="index.php?page=module/profile/u_profile";
							</script> 
						<?php
					}else{
						move_uploaded_file($path_foto, $dir_foto);
						mysqli_query($koneksi, "update tb_profil set nama_brand='$nama', photo='$foto', keterangan='$ket' where id_profil='$id'");
						?>
							<script type="text/javascript"> alert("Data Berhasil diupdate");
							  window.location.href="index.php?page=module/profile/u_profile";
							</script> 
						<?php
					}
				}

		?>
          </div>
</div>

<script>
	CKEDITOR.replace("editor");
</script>

<?php
 $quer = mysqli_query($koneksi, "select * from user where level='admin'");
 $dat = mysqli_fetch_array($quer);
 $id = $dat['user_id'];
 $nama = $dat['nama_lengkap'];
 $alamat = $dat['alamat'];
 $email = $dat['email'];
 $no_telp = $dat['no_telp'];
 $username = $dat['username'];

?>
<div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">Nama</label><br>
				  <input type="text" name="nama" value="<?php echo $nama; ?>" class="form-control" required>
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">Alamat</label><br>
				  <input type="text" name="alamat" value="<?php echo $alamat; ?>" class="form-control" required>
                </div>
              </div>
			  <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">Email</label><br>
				  <input type="text" name="email" value="<?php echo $email; ?>" class="form-control" required>
                </div>
              </div>
			  <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">No Telepon</label><br>
				  <input type="text" name="no_telp" value="<?php echo $no_telp; ?>" class="form-control" required>
                </div>
              </div>
			  <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">Username</label><br>
				  <input type="text" name="user" value="<?php echo $username; ?>" class="form-control" required>
                </div>
              </div>
			  <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">Password</label><br>
				  <input type="text" name="pass" class="form-control">
                </div>
              </div>

              <div class="box-footer">
                <input type="submit" class="btn btn-primary" value="Update User" name="updateu">
              </div>
            </form>
			<?php
				if(isset($_POST['updateu'])){
				$nama = $_POST['nama'];
				$alamat = $_POST['alamat'];
				$email = $_POST['email'];
				$no_telp = $_POST['no_telp'];
				$user = $_POST['user'];
				$pass = $_POST['pass'];

				if($pass==""){
						mysqli_query($koneksi, "update user set nama_lengkap='$nama', alamat='$alamat', email='$email', no_telp='$no_telp', username='$user' where user_id='$id'");
						?>
							<script type="text/javascript"> alert("Data Berhasil diupdate");
							  window.location.href="index.php?page=module/profile/u_profile";
							</script> 
						<?php
				}else{
						mysqli_query($koneksi, "update user set nama_lengkap='$nama', alamat='$alamat', email='$email', no_telp='$no_telp', username='$user', password=md5('$pass') where user_id='$id'");
						?>
							<script type="text/javascript"> alert("Data Berhasil diupdate");
							  window.location.href="index.php?page=module/profile/u_profile";
							</script> 
						<?php
					
					}
				}
			?>
          </div>
</div> 
