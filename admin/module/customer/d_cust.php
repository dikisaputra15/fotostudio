 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Customer Fotostudio</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped" id="datatables">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Email</th>
                  <th>No Telp</th>
                  <th>Username</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$no=1;
				$query = mysqli_query($koneksi, "select * from user where level='customer'");
				while($data = mysqli_fetch_array($query)){
				?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $data['nama_lengkap']; ?></td>
						<td><?php echo $data['alamat']; ?></td>
						<td><?php echo $data['email']; ?></td>
						<td><?php echo $data['no_telp']; ?></td>
						<td><?php echo $data['username']; ?></td>
						<td><?php echo $data['status']; ?></td>
						<td>
						<ul style="list-style:none;">
							<li>
								<a href="?page=module/customer/edt_cust&id=<?php echo $data['user_id']; ?>" title="Edit"><i class="fa fa-edit"></i></a>
								<a onclick="return confirm('yakin ingin menghapus data ?')"  href="?page=module/customer/hps_cust&id=<?php echo $data['user_id']; ?>" title="Delete"><i class="fa fa-trash-o"></i></a>
							</li>
						</ul>
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