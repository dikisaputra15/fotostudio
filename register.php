<section class="About-area section-gap" >
		<div class="container">
			<div class="row">	
						<div class="col-lg-5 col-md-12 contact-left no-padding">
							<img class="img-fluid" src="img/contact-img.jpg" alt="">
						</div>
						<div class="col-lg-7 col-md-12 contact-right no-padding">
							<h1>Form Pendaftaran</h1>
							
							<form class="booking-form" action="" method="POST">
								 	<div class="row">
								 		<div class="col-lg-12 d-flex flex-column">
							 				<input name="nama" placeholder="Masukkan Nama" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Nama'" class="form-control mt-20" required="" type="text" required>
								 		</div>								
										<div class="col-lg-12 flex-column">
											<textarea class="form-control mt-20" name="alamat" placeholder="Masukkan Alamat" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Alamat'" required=""></textarea>
										</div>
										<div class="col-lg-12 d-flex flex-column">
							 				<input name="notelp" placeholder="Masukkan No Handphone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan No Handphone'" class="form-control mt-20" required="" type="number" required>
								 		</div>	
										<div class="col-lg-12 d-flex flex-column">
											<input name="email" placeholder="Masukkan Alamat Email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Alamat Email'" class="common-input mt-10" required="" type="email">
										</div>	
										<div class="col-lg-12 d-flex flex-column">
							 				<input name="user" placeholder="Masukkan Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Username'" class="form-control mt-20" required="" type="text" required>
								 		</div>	
										<div class="col-lg-12 d-flex flex-column">
							 				<input name="pass" placeholder="Masukkan Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Password'" class="form-control mt-20" required="" type="password" required>
								 		</div>	
										<div class="col-lg-12 d-flex justify-content-end send-btn">
											<button class="submit-btn primary-btn mt-20 text-uppercase" name="regis">Register<span class="lnr lnr-arrow-right"></span></button>
										</div>

										<div class="alert-msg"></div>		
									</div>
					  		</form>
							<?php
								if(isset($_POST['regis'])){
								$nama = $_POST['nama'];
								$alamat = $_POST['alamat'];
								$notelp = $_POST['notelp'];
								$email = $_POST['email'];
								$user = $_POST['user'];
								$pass = $_POST['pass'];
								
								$cek=mysqli_num_rows(mysqli_query($koneksi,"select * from user where username='$user'"));
								
								if($cek>0){
									?>
									<script type="text/javascript"> alert("username sudah ada silahkan buat ulang");
										window.location.href="?page=register";
									</script>
									<?php
								}else{
									mysqli_query($koneksi, "insert into user values('','$nama','$alamat','$email','$notelp','$user',md5('$pass'),'customer','on')");
										?>
											<script type="text/javascript"> alert("Registrasi Berhasil Silahkan Login");
												window.location.href="index.php";
											</script> 
										<?php
									}
								}
							?>
							</div>
							</div>
							</div>
							</div>
						</section>
						
			