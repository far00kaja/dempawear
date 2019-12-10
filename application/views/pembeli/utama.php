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
					
				</div>
			</div>
