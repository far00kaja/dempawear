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
	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
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
										<a href="<?= base_url()?>user/history" class="icons">
											<i class="fa fa-history" aria-hidden="true"></i>
										</a>
									</li>

									<hr>
									<li class="nav-item">
										<a href="<?= base_url()?>user/tampil" class="icons">
											<i class="fa fa-search" aria-hidden="true"></i>
										</a>
									</li>

									<hr>

								

									<li class="nav-item">
										<a href="<?= base_url() ?>user/checkout" class="icons">
											<i class="lnr lnr lnr-cart">
											<?php if(empty($listorder)){
											 echo '0'; }else{
												 echo $listorder;
											 } ?>
											</i>
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

	<!--================Home Banner Area =================-->
	<section class="home_banner_area">
		<div class="overlay">asd</div>
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content row">
					<div class="offset-lg-2 col-lg-8">
						<h3>Fashion untuk
							<br />Musim Dingin</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
							aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
						</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Hot Deals Area =================-->

	<!--================End Hot Deals Area =================-->

	<!--================Clients Logo Area =================-->
	<section class="clients_logo_area">
	
	</section>
	<!--================End Clients Logo Area =================-->

	<!--================Feature Product Area =================-->
	<section class="feature_product_area section_gap">
		<div class="main_box">
