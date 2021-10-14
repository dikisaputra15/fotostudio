 <script src="js/ckeditor/ckeditor.js"> </script>
<div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Paket Pemesanan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">Nama Paket</label><br>
				  <input type="text" name="nama" class="form-control" required>
                </div>
              </div>
			  <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">Harga</label><br>
				  <input type="text" name="harga" class="form-control" required>
                </div>
              </div>
			  <div class="box-body">
                <div class="form-group">
					<label>Rincian</label>
					<span><textarea type="text" name="rincian" id="editor" ></textarea></span>
				</div>
              </div>
			  <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">Jenis</label><br>
				  <input type="radio" name="jenis" value="0">paket
				  <input type="radio" name="jenis" value="1">reguler
                </div>
              </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" value="Tambah" name="tambah">
              </div>
            </form>
			<?php
				if(isset($_POST['tambah'])){
				$nama = $_POST['nama'];
				$harga = $_POST['harga'];
				$rincian = strip_tags($_POST['rincian']);
				$jenis = $_POST['jenis'];
				
					mysqli_query($koneksi, "insert into tb_paket values('','$nama','$harga','$rincian','$jenis')");
					?>
						<script type="text/javascript"> alert("Data Berhasil diTambah");
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

