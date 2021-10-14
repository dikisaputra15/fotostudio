<?php
 $query = mysqli_query($koneksi, "select * from tb_profil");
 $data = mysqli_fetch_array($query);
 
 ?>
 
 <section class="About-area section-gap" >
		<div class="container">
			<div class="row">	
					
						<div class="col-lg-6 about-left">
							<img class="img-fluid" src="./admin/image/<?php echo $data['photo']; ?>" alt="">
						</div>
						<div class="col-lg-6 about-right">
							<h1>
								HALLO, PERKENALKAN KAMI <?php echo $data['nama_brand']; ?>
							</h1>
							<p><?php echo $data['keterangan']; ?></p>
							
						</div>
					</div>
							</div>
							</div>
</section>
					
			