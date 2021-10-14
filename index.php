<?php

session_start();
include "koneksi.php";
include "helper.php";
$page = isset($_GET['page']) ? $_GET['page'] : false;
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;

$sql_user=mysqli_query($koneksi, "select * from user where user_id='$user_id'");
$data_user=mysqli_fetch_array($sql_user);
				
?>	
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="CodePixar">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Photography</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel='stylesheet' href='css/simplelightbox.min.css' >
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/main.css">
			<link href="datatables/datatables.min.css" rel="stylesheet">
		</head>
		<body>
			<!-- Start Header Area -->
			<header class="default-header">
				<div class="container">
					<div class="header-wrap">
						<div class="header-top d-flex justify-content-between align-items-center">
							<div class="logo">
								<a href="index.php"><img src="img/logo1.png" width="80px" height="40px" alt=""></a>
							</div>
							<?php if($user_id){?>
							<div class="main-menubar d-flex align-items-center">
								<nav class="hide">
									<a href="index.php">Home</a>
									<a href="?page=module/profile">Profile</a>
									<a href="?page=module/booking">Booking Fotografer</a>
									<a href="?page=module/list_pes">List Pesanan</a>	
									<a href="logout.php">Logout</a>	
									<a href="?page=module/user">Welcome, <?php echo $data_user['nama_lengkap']; ?></a>						
								</nav>
								<div class="menu-bar"><span class="lnr lnr-menu"></span></div>
							</div>
							<?php }else{ ?>
							<div class="main-menubar d-flex align-items-center">
							<nav class="hide">
								<a href="?page=module/profile">Profile</a>
								<a href="?page=register">Register</a>							
								<a href="?page=login">Login</a>
							</nav>
								<div class="menu-bar"><span class="lnr lnr-menu"></span></div>
							</div>							
							<?php } ?>
						</div>
						
					</div>
				</div>
			</header>
			
			<!-- End banner Area -->	
	
			
						<?php
					
							$filename = "$page.php";
							if(file_exists($filename)){
								include_once($filename);
							}else{
								include "front.php";
							}
									
						?>
				
			
	
			<footer class="footer-area">
				<div class="container">
					<div class="row footer-bottom d-flex justify-content-between">
						<p class="col-lg-8 col-sm-12 footer-text m-0 text-white">Copyright © 2017 All rights reserved   |   This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">Colorlib modified by sigemboel</a></p>
						<div class="col-lg-4 col-sm-12 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</footer>
			<!-- End footer Area -->		

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.nice-select.min.js"></script>
			<script src="js/jquery.sticky.js"></script>
			<script src="js/parallax.min.js"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
			<script type="text/javascript" src="js/simple-lightbox.min.js"></script>
			<script src="js/main.js"></script>	
			<script src="datatables/datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#datatables').DataTable();
            
        } );
		
		$( '.table' ).each(function( i ) { 
			var worktable = $(this);
			var num_head_columns = worktable.find('thead tr th').length;
			var rows_to_validate = worktable.find('tbody tr');

			rows_to_validate.each( function (i) {

				var row_columns = $(this).find('td').length;
				for (i = $(this).find('td').length; i < num_head_columns; i++) {
					$(this).append('<td class="hidden"></td>');
				}

			});

		});
		
		
    </script>
		</body>
	</html>