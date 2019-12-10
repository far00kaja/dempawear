<!--================Cart Area =================-->
<section class="cart_area">
		<div class="container">
			<div class="cart_inner">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">No Invoice</th>
								<th scope="col">Nama</th>
								<th scope="col">Alamat</th>
								<th scope="col">Tanggal Transaksi</th>
								<th scope="col">Nama Pembeli</th>
								<th scope="col">Status</th>
								<th scope="col">Upload Bukti Transaksi</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1;$total=0;?>
							<?php foreach($transaksihead as $t){ ?>
							<tr>
								<td><?= $no++;?></td>
								<td>
									<?= $t->no_invoice?>	
								</td>
								<td><?php echo $t->nama ?></td>
								<td><?php echo $t->alamat ?></td>
								<td>
									<?= $t->tgl_transaksi ?>

								</td>
								<td>
									<?php //$total=$total+(($t->harga*$t->jumlah));?>
									<h5><?= $t->handled ?></h5>
								</td>
								<td <?php if ($t->status=='belum lunas') echo 'style="color:red";"'?>>
									<?php echo $t->status ?></td>
									<?php if (empty($t->bukti_transfer)){?>
									<form action="<?= base_url()?>user/uploadBukti" method="post" enctype="multipart/form-data">
								<td>
									<input type="file" name="bukti">
									<input type="hidden" name="id" value="<?= $t->no_invoice?>">
											
								</td>
								<td>	<button type="submit" class="main_btn" >Tambah</a></button>
								</td>
									</form>
									<?php }else{ echo '<td> Sudah diupload </td>';}?>
							</tr>
							<?php } ?>
							
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!--================End Cart Area =================-->
