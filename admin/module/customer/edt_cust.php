<?php 
 
 $id = $_GET['id'];
 $query = mysqli_query($koneksi, "select * from user where user_id='$id'");
 $data = mysqli_fetch_array($query);
 
 $status = $data['status'];
 
 ?>
 
<div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Edit Customer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">Nama Lengkap</label><br>
				  <input type="text" name="nama" class="form-control" value="<?php echo $data['nama_lengkap']; ?>" required>
                </div>
              </div>
			  <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">Alamat</label><br>
				  <input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>" required>
                </div>
              </div>
			  <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">Email</label><br>
				  <input type="text" name="email" class="form-control" value="<?php echo $data['email']; ?>" required>
                </div>
              </div>
			  <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">No Telp</label><br>
				  <input type="text" name="no_telp" class="form-control" value="<?php echo $data['no_telp']; ?>" required>
                </div>
              </div>
			  <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">Username</label><br>
				  <input type="text" name="user" class="form-control" value="<?php echo $data['username']; ?>" required>
                </div>
              </div>
			  <div class="box-body">
                <div class="form-group">
                    <label>Status</label><br>
					<input type="radio" value="on" name="status" <?php if($status == "on"){ echo "checked"; } ?> /> on
					<input type="radio" value="off" name="status" <?php if($status == "off"){ echo "checked"; } ?> /> off
                </div>
              </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" value="Update" name="update">
              </div>
            </form>
			<?php
				if(isset($_POST['update'])){
				$nama = $_POST['nama'];
				$alamat = $_POST['alamat'];
				$email = $_POST['email'];
				$no_telp = $_POST['no_telp'];
				$user = $_POST['user'];
				$status = $_POST['status'];
				
					mysqli_query($koneksi, "update user set nama_lengkap='$nama', alamat='$alamat', email='$email', no_telp='$no_telp', username='$user', status='$status' where user_id='$id'");
					?>
						<script type="text/javascript"> alert("Data Berhasil diupdate");
							window.location.href="index.php?page=module/customer/d_cust";
						</script> 
					<?php
				
				}
			?>
          </div>
</div> 
