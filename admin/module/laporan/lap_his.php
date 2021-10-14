 
  <div class="box box-default">
  <h1>
       Pilih Berdasarkan Tanggal
      </h1>
  <div class="box-body">
          <div class="row">
            <div class="col-md-12">
			<form class="form" method="POST" action="">
				 <div class="col-md-3">
				<div class="form-group">
					<label>Tanggal</label>
					<input type="date" class="form-control" name="tgl1" required>
				</div>	
				</div>	
				<div class="col-md-3">
				<div class="form-group">
					<br>
					<label>Sampai dengan</label>
				</div>	
				</div>	
				<div class="col-md-3">
				<div class="form-group">
					<label>Tanggal</label>
					<input type="date" class="form-control" name="tgl2" required>
				</div>	
				</div>	
				<div class="col-md-3">
					<br>
					<input type="submit" class="btn btn-primary" name="lihat" value="Lihat" required>
				
				</div>
			</form>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
</div>
</div>
<?php
				if(isset($_POST['lihat'])){?>
				
 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Histori Pemesan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pemesan</th>
				  <th>Tgl Pesan</th>
				  <th>Kategori Pesan</th>
				  <th>Harga</th>
                </tr>
                </thead>
                <tbody>
				<?php

				$no=1;
				$tgl1=$_POST['tgl1'];
				$tgl2=$_POST['tgl2'];
				$sql = mysqli_query($koneksi, "SELECT tb_detail_pesan_reg.*, tb_pesan.nama_penerima,tb_pesan.no_hp,tb_pesan.alamat, 
				tb_pesan.status, tb_paket.id_paket,tb_paket.nama_paket from tb_detail_pesan_reg join tb_pesan on 
				tb_detail_pesan_reg.id_pesan=tb_pesan.id_pesan join tb_paket on tb_detail_pesan_reg.id_paket=tb_paket.id_paket
				where tb_detail_pesan_reg.tgl_pesan between '$tgl1' and '$tgl2'");
				while($data = mysqli_fetch_array($sql)){?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $data['nama_penerima'];; ?></td>
						<td><?php echo $data['tgl_pesan'];; ?></td>
						<td><?php echo $data['nama_paket'];; ?></td>
						<td><?php echo $data['total'];; ?></td>
					</tr>
				<?php 
					}
				?>
				</tbody>
              </table><br><br>
			  
			  <form action="module/laporan/ctk_his.php" method="POST" class="form" target="_blank">
				<input type="text" name="tgl1" value="<?php echo $_POST['tgl1']; ?>" hidden>
				<input type="text" name="tgl2" value="<?php echo $_POST['tgl2']; ?>" hidden>
				
				<input type="submit" name="ctk" value="Cetak" class="btn btn-primary">
			  </form>
			  
            </div>
            <!-- /.box-body -->
          </div>
<?php
	}
?>
