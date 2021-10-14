<?php
$jml = mysqli_query($koneksi, "select * from tb_pesan where status='2'");
$tjml = mysqli_num_rows($jml);

$jmldp = mysqli_query($koneksi, "select * from tb_pesan where status='1'");
$tjmldp = mysqli_num_rows($jmldp);
?>
 <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
			<?php 
              
				echo "<h3 style='color:white; position:absolute; margin-left:160px;'>$tjml</h3>";
              
			?>
              <p>Pesanan Masuk Dengan </p>
			  <p>Pembayaran Lunas</p>
            </div>
			<br>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="?page=module/pesanan/list_pes" class="small-box-footer">Lihat Semua<i class="fa fa-arrow-circle-right"></i></a>
          </div>
</div>
 <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
			<?php 
              
				echo "<h3 style='color:white; position:absolute; margin-left:160px;'>$tjmldp</h3>";
              
			?>
              <p>Pesanan Masuk Dengan </p>
			  <p>DP</p>
            </div>
			<br>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="?page=module/pesanan/list_pesdp" class="small-box-footer">Lihat Semua<i class="fa fa-arrow-circle-right"></i></a>
          </div>
</div>