<?php	
	@session_start();
	$log = $_SESSION['user_id'];
?>
 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Paket Pemesanan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped" id="datatables">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tgl Pesan</th>
                  <th>Tgl Booking</th>
                  <th>Nama Pemesan</th>
                  <th>No Handphone</th>
                  <th>Alamat</th>
                  <th>Jenis Paket</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$no=1;
				$query = mysqli_query($koneksi, "select tb_detail_pesan_reg .*, tb_pesan.id_pesan,tb_pesan.nama_penerima,
						tb_pesan.no_hp,tb_pesan.alamat,tb_pesan.status, tb_paket.nama_paket from tb_detail_pesan_reg join tb_pesan on
						tb_detail_pesan_reg.id_pesan=tb_pesan.id_pesan join tb_paket on tb_detail_pesan_reg.id_paket=tb_paket.id_paket");
				while($data = mysqli_fetch_array($query)){
				?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $data['tgl_pesan']; ?></td>
						<td><?php echo $data['tgl_main']; ?></td>
						<td><?php echo $data['nama_penerima']; ?></td>
						<td><?php echo $data['no_hp']; ?></td>
						<td><?php echo $data['alamat']; ?></td>
						<td><?php echo $data['nama_paket']; ?></td>
						<td>
							<a class="btn btn-primary" href="?page=module/pesanan/detail_p&id=<?php echo $data['id_pesan']; ?>" >Detail</a>
						</td>
					</tr>
				<?php
					}
				?>
				</tbody>
              </table>
			  
            </div>
            <!-- /.box-body -->
          </div>