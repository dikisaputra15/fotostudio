<section class="banner-area relative" id="home">			
				<div class="slider"><div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				        <div class="carousel-inner" role="listbox">
				          <!-- Slide One - Set the background image for this slide in the line below -->
				          <div class="carousel-item active" style="background-image: url('img/slider4.jpg')">
				            <div class="carousel-caption d-md-block">
				              <h2 class="text-uppercase">Booking Photo studio</h2>
				              <p>
								Sewa Photografer untuk berbagai macam keperluan dengan cepat	
				              </p>
							  <div>
								<a href="?page=module/booking" class="btn btn-primary">Booking Sekarang</a>
							  </div>
				            </div>
				          </div>
				          <!-- Slide Two - Set the background image for this slide in the line below -->
				          <div class="carousel-item" style="background-image: url('img/slider2.jpg')">
				            <div class="carousel-caption d-md-block">
				              <h2 class="text-uppercase">Sewa Photografer</h2>
				              <p>
								Cepat dan Mudah	
				              </p>
							  <div>
								<a href="?page=module/booking" class="btn btn-primary">Booking Sekarang</a>
							  </div>
				            </div>
				          </div>
				          <!-- Slide Three - Set the background image for this slide in the line below -->
				          <div class="carousel-item" style="background-image: url('img/slider3.jpg')">
				            <div class="carousel-caption d-md-block">
				              <h2 class="text-uppercase">Booking Sekarang</h2>
				              <p>
								Kepuasan Pelanggan adalah tujuan kami	
				              </p>
							  <div>
								<a href="?page=module/booking" class="btn btn-primary">Booking Sekarang</a>
							  </div>
				            </div>
				          </div>
				        </div>
				        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				          <span class="sr-only">Previous</span>
				        </a>
				        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				          <span class="carousel-control-next-icon" aria-hidden="true"></span>
				          <span class="sr-only">Next</span>
				        </a>
				      </div>
				</div>
			</section>

			<!-- Start gallery Area -->
			<section class="gallery-area section-gap" id="gallery">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-8 pb-30 header-text">
							<h1 class="text-white">Hasil Foto</h1>
							<p>
								Berikut ini hasil jepretan dari foto studio kami
							</p>
						</div>
					</div>
					
					<div class="gal">
					<?php
						$qg = mysqli_query($koneksi, "select * from tb_foto limit 10");
						while($dg=mysqli_fetch_array($qg)){
					?>
					
						<a href="img/p1.jpg"><img src="admin/image/galery/<?php echo $dg['upload_foto']; ?>" alt=""></a>		
					
					<?php
					}
					?>
					</div>
				</div>
			</section>