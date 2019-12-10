
<?php $this->load->view('templates/css'); ?>


<section class="content">
		<div id="content-wrapper">

		
		<div class="container-fluid">

			
				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>
				<?php if ($this->session->flashdata('danger')): ?>
				<div class="alert alert-danger" role="alert">
					<?php echo $this->session->flashdata('danger'); ?>
				</div>
				<?php endif; ?>
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/transaksi/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
					

						<form action="<?php base_url('admin/transaksi/add') ?>" method="post" enctype="multipart/form-data" >
						<div class="form-group " id="auto-widget">
							
								<label for="name">Nama Barang*</label>
								<select class="form-control js-example-basic-single p-y-12 <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="barang" placeholder="Nama barang" >
								 <option value="" selected disabled>Pilih Barang</option>
							<?php foreach($barang as $b){ ?>	 
								 <option value="<?= $b->id_barang?>"><?= $b->nama ?></option>
				<?php } ?>
								</select>
						
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="size">Size*</label>
								<input class="form-control <?php echo form_error('size') ? 'is-invalid':'' ?>"
								 type="text" name="size" min="0" placeholder="Size" />
								<div class="invalid-feedback">
									<?php echo form_error('harga') ?>
								</div>
							</div>
						

							<div class="form-group">
								<label for="harga">Jumlah*</label>
								<input class="form-control <?php echo form_error('jumlah') ? 'is-invalid':'' ?>"
								 type="number" name="jumlah" min="0" placeholder="Harga Barang Satuan" />
								<div class="invalid-feedback">
									<?php echo form_error('jumlah') ?>
								</div>
							</div>

							
							<div class="form-group">
								<label for="harga">Diskon*</label>
								<div class="row">
				 				 <div class="col-8">
				 					 <input class="form-control <?php echo form_error('jumlah') ? 'is-invalid':'' ?>"
										 type="number" name="diskon" min="0" placeholder="Harga Barang Satuan" />
								  </div>
								  <div class="col-4">
				 					 <select name="sdiskon" class="form-control">
										<option value="no">Tidak ada diskon</option>
										<option value="percent">Percent %</option>
										<option value="idr">IDR</option>
									</select>
								</div>
							</div>
							<div class="invalid-feedback">
												<?php echo form_error('jumlah') ?>
											</div>
							</div>
							<div class="form-group">
							<input class="btn btn-success" type="submit" name="tambah" value="Tambah" />
							<a href="<?= base_url()?>admin/transaksi/done"><input class="btn btn-primary" type="button" name="done" value="Selesai" />
							</a></div>
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
			
			</div>
		</div>
	<!-- DataTables -->
	<div class="card mb-3">
					<div class="card-header">
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
					<form action="<?= base_url()?>admin/transaksi/checkout" method="post">
						<div class="form-group">
							<!-- <div class="card-body float-right"> -->
							<label for="nama">Pembeli</label>	
								<input type="text" name="nama" class="form-control">
								<label for="status">Status</label>	
								<select name="status" class="form-control">
									<option value="reseller">Reseller</option>
									<option value="umum">umum</option>
								</select>
								<label for="nama">Pembayaran</label>	
								<input type="hidden" name="jenis_pembelian" value="store">
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
	</section>
			<!-- /.content-wrapper -->
	
		<!-- /#wrapper -->
			   <!-- /.content -->
			
