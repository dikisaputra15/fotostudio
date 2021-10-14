<?php
	
	if(@$_SESSION['level'] == "customer"){
		header("location: index.php");
	}else{

?>

	<section class="About-area section-gap" >
		<div class="container">
			<div class="row">	
						<div class="col-lg-5 col-md-12 contact-left no-padding">
							<img class="img-fluid" src="img/contact-img.jpg" alt="">
						</div>
						<div class="col-lg-7 col-md-12 contact-right no-padding">
							<h1>Login Sistem</h1>
							
							<form class="booking-form" action="" method="POST">
								 	<div class="row">
								 		<div class="col-lg-12 d-flex flex-column">
							 				<input name="user" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" class="form-control mt-20" required="" type="text" required>
								 		</div>
										<div class="col-lg-12 d-flex flex-column">
							 				<input name="pass" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" class="form-control mt-20" required="" type="password" required>
								 		</div>								
										<div class="col-lg-12 d-flex justify-content-end send-btn">
											<button class="submit-btn primary-btn mt-20 text-uppercase" name="login">Login<span class="lnr lnr-arrow-right"></span></button>
										</div>	
									</div>
					  		</form>
								<?php
									if(isset($_POST['login'])){
									$user		= $_POST['user'];
									$pass	= md5($_POST['pass']);
									
										$query=mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user' and password='$pass' and status='on'");
										$jml = mysqli_num_rows($query);

										if($jml == 0){
											echo '<script language="javascript">alert("User tidak ada!"); document.location="index.php?page=login";</script>';
										}else{
											$row = mysqli_fetch_assoc($query);
											
							
											$_SESSION['user_id'] = $row['user_id'];
											$_SESSION['nama_lengkap'] = $row['nama_lengkap'];
											$_SESSION['level'] = $row['level'];
											$_SESSION['username'] = $row['username'];
											
										if($_SESSION['level']== "customer"){
											echo '<script language="javascript">alert("Anda berhasil Login!"); document.location="index.php";</script>';
										}else{
											echo '<script language="javascript">alert("Anda Tidak Punya Akses!"); document.location="index.php?page=login";</script>';
										}
											
										
									}
								}
							?>
							</div>
							</div>
							</div>
						</section>
<?php
	}
?>			