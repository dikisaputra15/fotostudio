<?php 
 
 $id = $_GET['id'];
 $query = mysqli_query($koneksi, "select * from tb_paket where id_paket='$id'");
 $data = mysqli_fetch_array($query);
 $rincian = $data['rincian'];
 $jenis = $data['jenis'];
 
 ?>
 
<script src="js/ckeditor/ckeditor.js"> </script>
<div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Edit Paket</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">Nama Paket</label><br>
				  <input type="text" name="nama" class="form-control" value="<?php echo $data['nama_paket']; ?>" required>
                </div>
              </div>
			  <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">Harga</label><br>
				  <input type="text" name="harga" class="form-control" value="<?php echo $data['harga']; ?>" required>
                </div>
              </div>
			   <div class="box-body">
                <div class="form-group">
					<label>Rincian</label>
					<span><textarea type="text" name="rincian" id="editor" ><?php echo $rincian; ?></textarea></span>
				</div>
              </div>
			  <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">Jenis</label><br>
				  <input type="radio" name="jenis" value="0" <?php if($jenis==0){ echo "checked"; } ?>>paket
				  <input type="radio" name="jenis" value="1" <?php if($jenis==1){ echo "checked"; } ?>>reguler
                </div>
              </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" value="Update" name="update">
              </div>
            </form>
			<?php
				if(isset($_POST['update'])){
				$nama = $_POST['nama'];
				$harga = $_POST['harga'];
				$rincian = strip_tags($_POST['rincian']);
				$jenis = $_POST['jenis'];
				
					mysqli_query($koneksi, "update tb_paket set nama_paket='$nama', harga='$harga', rincian='$rincian', jenis='$jenis' where id_paket='$id'");
					?>
						<script type="text/javascript"> alert("Data Berhasil diupdate");
							window.location.href="index.php?page=module/paket/list_paket";
						</script> 
					<?php
				
				}
			?>
          </div>
</div> 
<script>
	CKEDITOR.replace("editor");
</script>
