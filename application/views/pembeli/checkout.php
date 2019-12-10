<!--================Cart Area =================-->
<section class="cart_area">
		<div class="container">
			<div class="cart_inner">
				<div class="table-responsive">
					<table class="table">
					<a class="gray_btn" href="<?= base_url()?>">Continue Shopping</a>
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Image</th>
								<th scope="col">Product</th>
								<th scope="col">Price</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
								<th scope="col">Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1;$total=0;?>
							<?php foreach($transaksi as $t){ ?>
							<tr>
								<td><?= $no++;?></td>
								<td>
									<div class="media">
										<div class="d-flex">
											<img height="120" width="120" src="<?= base_url('assets/images/barang/').$t->gambar?>" alt="">
										</div>
										
									</div>
								</td>
								<td><?php echo $t->nama ?></td>
								<td>
									<h5><?= rupiah($t->harga) ?></h5>
								</td>
								<td>
									<?= $t->jumlah ?>

								</td>
								<td>
									<?php $total=$total+(($t->harga*$t->jumlah));?>
									<h5><?= rupiah(($t->harga*$t->jumlah)); ?></h5>
								</td>
								<td><form action="<?= base_url()?>user/delete" method="POST">
        <input type="hidden" name="id" id="id" value="<?php echo $t->td_invoice ?>">
        <button class="btn btn-danger" name="archive" type="submit" onclick="deleteConfirm()">
            <i class="fa fa-trash"></i>
                Delete
        </button>
</form>
									</td>
							</tr>
							<?php } ?>
							
							<tr>
								<td>

								</td>
								<td>

								</td>
								<td></td>
								<td></td>
										<td>
											<h5>Subtotal</h5>
										</td>
										<td>
											<h5><?= rupiah($total)?></h5>
										</td>
								<td></td>
							</tr>
							<?php if (!empty($transaksi)){ ?>
							<form method="post" action="<?= base_url()?>user/checkout">
							<tr class="shipping_area" style="background-color:#f2f2f2;">
							
							<td colspan="3">
								</td>	<td><label>Nama Lengkap</label></td>
								<td><input type="text" name="nama" placeholder="Nama Lengkap"  required class="single-input">
								</td>
								<td></td>
								<td></td>

							</tr>
							<tr class="shipping_area" style="background-color:#f2f2f2;">
							<td colspan="3">
								</td>	<td><label>Alamat</label></td>
								<td><textarea name="alamat" class="single-textarea" placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required=""></textarea></td>
								<td></td>
								<td></td>
							</tr>
							<tr class="shipping_area" style="background-color:#f2f2f2;">
								
								<td></td>
								<td></td>
								<td></td>
								<td><label>Pembayaran Melalui</label></td>
								<td><input type="text" name="bayar" placeholder="Pembayaran"  required class="single-input">
								</td>
								<td></td>
								<td>
										<button type="submit" class="main_btn" >checkout</a>
								</td>
							</tr>
						</form>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!--================End Cart Area =================-->
