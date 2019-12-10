
<?php $this->load->view('templates/css'); ?>


<section class="content">
				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
					<a class="float-left" href="<?php echo site_url('admin/transaksi/add') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
					<a class="btn btn-success float-right" href="<?php echo site_url('admin/transaksi/add') ?>"><i class="fas fa-plus"></i> Tambah Barang</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0" align=>
								<thead>
									<tr align="center" valign="center">
										<th><p align="center">No.</p></th>
										<th><p align="center">ID</p></th>
										<th>Nama Barang</th>
										<th>Size</th>
										<th>Jumlah</th>
										<th>Diskon</th>
										<th>Tipe</th>
										<th>Harga</th>
										<th>Hasil Diskon</th>
										<th>Handled By</th>
										<th colspan="2"><p align="center">Aksi</p></th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1;$totald=0;$total=0; foreach ($transaksi_root as $t): ?>
									<tr align="center">
									<td  align="center" width="150">
											<?php echo $i++.'.' ?>
										</td><td  align="center" width="150">
											<?php echo $t->td_invoice ?>
										</td>
										<td>
										<?= $t->nama ?>
										</td>
										<td>
											<?php echo $t->size ?>

										</td>
										
										<td>
											<?php echo $t->jumlah?> 
										</td>
										
										<td>
											<?php echo $t->diskon ?>  
										</td>
										<td>
											<?= $t->tipe_diskon ?>
										</td>
										
										<td>
											<?php $total=$total+$t->harga; echo rupiah($t->harga) ?>
										</td>
										
										<td>
											<?php $totald=$totald+diskon($t->harga,$t->diskon,$t->tipe_diskon); echo rupiah(diskon($t->harga,$t->diskon,$t->tipe_diskon)) ?>
										</td>
										<td>
										<?php echo $t->handle?>
										</td>
										
										<td width="250">
											<a onclick="deleteConfirm('<?php echo site_url('admin/transaksi/deleteDetail/'.$t->td_invoice.'/'.$t->size) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>
									<tr>
									<td colspan="7" align="right">Total : </td>
									<th><?= rupiah($total)?></th>
										<th><?= rupiah($totald);?></th>
										<td></td>

								</tbody>
							</table>
						</div>
					</div>
					
					<div class="card-footer px-5" >
					<form action="checkout" method="post">
						<div class="form-group">
							<!-- <div class="card-body float-right"> -->
								<label for="nama">Pembeli</label>	
								<input type="text" name="nama" class="form-control">
								<label for="nama">Pembayaran</label>	
								<input type="text" name="bayar" class="form-control">

							</div>
								<button class="btn btn-primary pr-2 float-right">Check Out</button>&nbsp;
						</form>
						<br>
					</div>
					<br>
				
				</div>

			</div>
			<!-- /.container-fluid -->
	</section>
	<script>
	function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}</script>
			   <!-- /.content -->
