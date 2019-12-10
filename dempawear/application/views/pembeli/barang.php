
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
	</header> -->
	
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_product_img">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
							
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img class="d-block w-100" src="<?= base_url()?>assets/images/barang/<?= $barang->gambar1?>" alt="First slide">
								</div>
								<div class="carousel-item">
									<img class="d-block w-100" src="<?= base_url()?>assets/images/barang/<?= $barang->gambar2?>" alt="Second slide">
								</div>
								<div class="carousel-item">
									<img class="d-block w-100" src="<?= base_url()?>assets/images/barang/<?= $barang->gambar3?>" alt="Third slide">
								</div>
							</div>
						</div>
					</div>
				</div>

				<form action="<?= base_url('user/add')?>" method="post">
				<input type="hidden" name="barang" value="<?= $barang->id_barang?>">
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3><?= $barang->nama?></h3>
						<h2><?= rupiah($barang->harga_satuan)?></h2>
						<ul class="list">
							<li>
								<a class="active" href="#">
									<span>Category</span> : <?= $this->kategori_model->getById($barang->kode_kategori)->nama_kategori?></a>
							</li>
							<li>
								<a href="#">
									<?php $stok= $this->produksi_model->getAllSize($barang->id_barang) ?>
									<span>Availibility</span> : 
									<?php if(!$stok==null){ ?>
									<?php foreach($stok as $s){ ?>
									<input type="radio" name="size" value="<?= $s->size?>" required>
									<?php echo $s->size.'('.$s->total_produksi.')';$c='available' ?></radio>
								<?php
									}
								}else{
									$c='notavailable';
									echo '<h4 style="color:red">NOT AVAILABLE</h4>';
								}?>

								</a>
							</li>
						</ul>
						<p><?= $barang->artikel ?></p>
						<div class="product_count">
							<label for="qty">Quantity:</label>
							<input type="text" name="jumlah" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
							 class="increase items-count" type="button">
								<i class="lnr lnr-chevron-up"></i>
							</button>
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
							 class="reduced items-count" type="button">
								<i class="lnr lnr-chevron-down"></i>
							</button>
						</div>
						<div class="card_area">
							<?php if ($c=='available'){ ?>
							<button type="submit" name="add" class="main_btn" value="add" >Add</button>
						<?php }else{ ?>
							<a class="main_btn" href="<?= base_url() ?>">Back</a>
						
						<?php } ?>
							<a class="icon_btn" href="#">
								<i class="lnr lnr lnr-diamond"></i>
							</a>
							<a class="icon_btn" href="#">
								<i class="lnr lnr lnr-heart"></i>
							</a>
						</div>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	
	<!--================ End footer Area  =================-->




	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/stellar.js"></script>
	<script src="vendors/lightbox/simpleLightbox.min.js"></script>
	<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
	<script src="vendors/isotope/isotope-min.js"></script>
	<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/mail-script.js"></script>
	<script src="vendors/jquery-ui/jquery-ui.js"></script>
	<script src="vendors/counter-up/jquery.waypoints.min.js"></script>
	<script src="vendors/counter-up/jquery.counterup.js"></script>
	<script src="js/theme.js"></script>
</body>

</html>
