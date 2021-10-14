<?php	
	error_reporting(0);
	$id = $_GET['id'];
?>
 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail pesanan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tgl Pesan</th>
                  <th>Nama Pemesan</th>
                  <th>status</th>
                  <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$no=1;
				$query = mysqli_query($koneksi, "select tb_detail_pesan_reg.*, tb_pesan.id_pesan,tb_pesan.nama_penerima,
						tb_pesan.no_hp,tb_pesan.alamat,tb_pesan.status from tb_detail_pesan_reg join tb_pesan on
						tb_detail_pesan_reg.id_pesan=tb_pesan.id_pesan where tb_detail_pesan_reg.id_pesan='$id'");
				while($data = mysqli_fetch_array($query)){
				$status = $data['status'];
				$harga=$data['total'];
				$total+=$data['total'];
				?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $data['tgl_pesan']; ?></td>
						<td><?php echo $data['nama_penerima']; ?></td>
						<td><?php echo $arraystatus[$status]; ?></td>
						<td><?php echo $harga; ?></td>
					</tr>
				<?php
					}
				?>
				<tr>
					<td>Total</td>
					<td></td>
					<td></td>
					<td></td>
					<td><?php echo $total; ?></td>
				</tr>
				</tbody>
              </table>
			
            </div>
            <!-- /.box-body -->
          </div>