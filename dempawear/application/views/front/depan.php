<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>Fashiop</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?= base_url()?>assets/fashiop/css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url()?>assets/fashiop/vendors/linericon/style.css">
	<link rel="stylesheet" href="<?= base_url()?>assets/fashiop/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url()?>assets/fashiop/vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= base_url()?>assets/fashiop/vendors/lightbox/simpleLightbox.css">
	<link rel="stylesheet" href="<?= base_url()?>assets/fashiop/vendors/nice-select/css/nice-select.css">
	<link rel="stylesheet" href="<?= base_url()?>assets/fashiop/vendors/animate-css/animate.css">
	<link rel="stylesheet" href="<?= base_url()?>assets/fashiop/vendors/jquery-ui/jquery-ui.css">
	<!-- main css -->
	<link rel="stylesheet" href="<?= base_url()?>assets/fashiop/css/style.css">
	<link rel="stylesheet" href="<?= base_url()?>assets/fashiop/css/responsive.css">
</head>

<body>

	<!--================Header Menu Area =================-->
	<header class="header_area">

						<?= var_dump($this->session->all_userdata())?>
		<div class="top_menu row m0">
			<div class="container-fluid">
				<div class="float-left">
					<p>Call Us: 012 44 5698 7456 896</p>
				</div>
				<div class="float-right">
					<ul class="right_side">
						<?php $email=$this->session->userdata('email') ?>
						<?php  if (!isset($email)) {?>
						<li>
							<a href="<?= base_url()?>login">
								Login/Register
							</a>
						</li>
						<li>
							<a href="contact.html">
								Contact Us
							</a>
						</li>
					<?php }else{ ?>
						<li>
							<a href="contact.html">
								<?php echo $email ?>
							</a>
						</li>
						<li>
							<a href="<?= base_url()?>login/logout">
								<?php echo 'Logout'; } ?>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.html">
						<img src="img/logo.png" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					 aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<div class="row w-100">
							<div class="col-lg-7 pr-0">
								<ul class="nav navbar-nav center_nav pull-right">
									<li class="nav-item active">
										<a class="nav-link" href="index.html">Home</a>
									</li>
									<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="category.html">Shop Category</a>
												<li class="nav-item">
													<a class="nav-link" href="single-product.html">Product Details</a>
													<li class="nav-item">
														<a class="nav-link" href="checkout.html">Product Checkout</a>
														<li class="nav-item">
															<a class="nav-link" href="cart.html">Shopping Cart</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="confirmation.html">Confirmation</a>
														</li>
										</ul>
									</li>
									<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="blog.html">Blog</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="single-blog.html">Blog Details</a>
											</li>
										</ul>
									</li>
									<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="login.html">Login</a>
												<li class="nav-item">
													<a class="nav-link" href="tracking.html">Tracking</a>
													<li class="nav-item">
														<a class="nav-link" href="elements.html">Elements</a>
													</li>
										</ul>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="contact.html">Contact</a>
									</li>
								</ul>
							</div>

							<div class="col-lg-5">
								<ul class="nav navbar-nav navbar-right right_nav pull-right">
									<hr>
									<li class="nav-item">
										<a href="#" class="icons">
											<i class="fa fa-search" aria-hidden="true"></i>
										</a>
									</li>

									<hr>

									<li class="nav-item">
										<a href="#" class="icons">
											<i class="fa fa-user" aria-hidden="true"></i>
										</a>
									</li>

									<hr>

									<li class="nav-item">
										<a href="#" class="icons">
											<i class="fa fa-heart-o" aria-hidden="true"></i>
										</a>
									</li>

									<hr>

									<li class="nav-item">
										<a href="#" class="icons">
											<i class="lnr lnr lnr-cart"></i>
										</a>
									</li>

									<hr>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!--================Header Menu Area =================-->

	
	<!--================End Clients Logo Area =================-->

	<!--================Feature Product Area =================-->
	<section class="feature_product_area section_gap">
		<div class="main_box">
			<div class="container-fluid">
				<div class="row">
					<div class="main_title">
						<h2>Featured Products</h2>
						<p>Who are in extremely love with eco friendly system.</p>
					</div>
				</div>
				<div class="row">
					<?php foreach($barang as $b){ ?>
					<div class="col col1">
						<div class="f_p_item">
							<div class="f_p_img">
								<img class="img-fluid" src="<?= base_url()?>assets/images/barang/<?= $b->gambar1?>" alt="">
								<div class="p_icon">
									<!-- <a href="#"> -->
										<!-- <i class="lnr lnr-heart"></i> -->
									<!-- </a> -->
									<a href="<?= base_url('user/cart/'.$b->id_barang)?>" target="_blank">
										<i class="lnr lnr-cart"></i>
									</a>
								</div>
							</div>
							<a href="#">
								<h4><?= $b->nama ?></h4>
							</a>
							<h5><?= $b->harga_satuan ?></h5>
						</div>
					</div>

					<?php } ?>
					
				</div>

				<div class="row">
					<nav class="cat_page mx-auto" aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="#">
									<i class="fa fa-chevron-left" aria-hidden="true"></i>
								</a>
							</li>
							<li class="page-item active">
								<a class="page-link" href="#">01</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="#">02</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="#">03</a>
							</li>
							<li class="page-item blank">
								<a class="page-link" href="#">...</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="#">09</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="#">
									<i class="fa fa-chevron-right" aria-hidden="true"></i>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!--================End Feature Product Area =================-->

	<!--================ Subscription Area ================-->

	<!--================ End Subscription Area ================-->

	<!--================ start footer Area  =================-->
	<footer class="footer-area section_gap">
		
			<!-- <div class="row footer-bottom d-flex justify-content-between align-items-center"> -->
				<p class="col-lg-12 footer-text text-center"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		<!-- </div> -->
	</footer>
	<!--================ End footer Area  =================-->



	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="<?= base_url()?>assets/fashiop/js/jquery-3.2.1.min.js"></script>
	<script src="<?= base_url()?>assets/fashiop/js/popper.js"></script>
	<script src="<?= base_url()?>assets/fashiop/js/bootstrap.min.js"></script>
	<script src="<?= base_url()?>assets/fashiop/js/stellar.js"></script>
	<script src="<?= base_url()?>assets/fashiop/vendors/lightbox/simpleLightbox.min.js"></script>
	<script src="<?= base_url()?>assets/fashiop/vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="<?= base_url()?>assets/fashiop/vendors/isotope/imagesloaded.pkgd.min.js"></script>
	<script src="<?= base_url()?>assets/fashiop/vendors/isotope/isotope-min.js"></script>
	<script src="<?= base_url()?>assets/fashiop/vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="<?= base_url()?>assets/fashiop/js/jquery.ajaxchimp.min.js"></script>
	<script src="<?= base_url()?>assets/fashiop/vendors/counter-up/jquery.waypoints.min.js"></script>
	<script src="<?= base_url()?>assets/fashiop/vendors/flipclock/timer.js"></script>
	<script src="<?= base_url()?>assets/fashiop/vendors/counter-up/jquery.counterup.js"></script>
	<script src="<?= base_url()?>assets/fashiop/js/mail-script.js"></script>
	<script src="<?= base_url()?>assets/fashiop/js/theme.js"></script>
</body>

</html>
