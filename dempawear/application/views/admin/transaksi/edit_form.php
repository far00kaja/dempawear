
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
						<a href="<?php echo site_url('admin/transaksi/dtransaksipenjualan') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
					

						<form action="<?php base_url('admin/transaksi/edit/') ?>" method="post" enctype="multipart/form-data" >
						<div class="form-group " id="auto-widget">
							
								<label for="name">Nama*</label>
								<input type="text" name="nama" value="<?= $transaksi->nama ?>" class="form-control"> 
								<input type="hidden" name="id" value="<?= $transaksi->no_invoice ?>">
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="size">Tanggal Transaksi*</label>
								<input class="form-control <?php echo form_error('size') ? 'is-invalid':'' ?>"
								 type="text" name="tgl" min="0" placeholder="Tanggal"  value="<?= $transaksi->tgl_transaksi ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('tgl') ?>
								</div>
							</div>
						

							<div class="form-group">
								<label for="size">Status*</label>
								<select name="status" class="form-control">
								<?php if($transaksi->status=='lunas'){ ?>
									<option value="lunas" selected>Lunas</option>	
									<option value="belum lunas">Belum lunas</option>	
								<?php }else {?>
									<option value="lunas" >Lunas</option>	
									<option value="belum lunas" selected>Belum Lunas</option>	
								<?php } ?>
							</select><div class="invalid-feedback">
									<?php echo form_error('harga') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="size">Alamat*</label>
								<input class="form-control <?php echo form_error('size') ? 'is-invalid':'' ?>"
								 type="text" name="alamat" placeholder="Alamat"  value="<?= $transaksi->alamat ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('harga') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="size">No Telepon*</label>
								<input class="form-control <?php echo form_error('size') ? 'is-invalid':'' ?>"
								 type="text" name="notelp" min="0" placeholder="No Telepon"  value="<?= $transaksi->no_telp ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('harga') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="size">Resi*</label>
								<input class="form-control <?php echo form_error('size') ? 'is-invalid':'' ?>"
								 type="text" name="resi" placeholder="status"  value="<?= $transaksi->resi ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('harga') ?>
								</div>
							</div>
						

							<div class="form-group">
								<label for="harga">Pembayaran*</label>
								<input class="form-control <?php echo form_error('jumlah') ? 'is-invalid':'' ?>"
								 type="text" name="bayar" placeholder="Pembayaran" value="<?= $transaksi->pembayaran ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('jumlah') ?>
								</div>
							</div>

							
							<div class="form-group">
								<label for="harga">Bukti Transfer*</label> <?= $transaksi->bukti_transfer?>
								<img width="300" height="300" class="image-fluid" src="<?= base_url('assets/images/bukti/').$transaksi->bukti_transfer?>">
								<input type="hidden" name="bukti" value="<?= $transaksi->bukti_transfer ?>">
								<div class="invalid-feedback">
									<?php echo form_error('jumlah') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="harga">Jenis Pembelian*</label> <?= $transaksi->jenis_pembelian?>
								<select name="jenis_pembelian" class="form-control">
								<?php if($transaksi->jenis_pembelian=='online'){ ?>
									<option value="online" selected>Online</option>	
									<option value="store">Store</option>	
								<?php }else {?>
									<option value="online" >Online</option>	
									<option value="store" selected>Store</option>	
								<?php } ?>
							</select><div class="invalid-feedback">
									<?php echo form_error('jumlah') ?>
								</div>
							</div>
							<input type="hidden" name="handled" value="<?= $transaksi->handled?>">
							<div class="form-group">
								<label for="harga">Retur*</label> 
								<select name="retur" class="form-control">
								<?php if($transaksi->retur=='tidak'){ ?>
									<option value="tidak" selected>Tidak</option>	
									<option value="retur">Retur</option>	
								<?php }else {?>
									<option value="tidak" >Tidak</option>	
									<option value="retur" selected>Retur</option>	
								<?php } ?>
							</select><div class="invalid-feedback">
									<?php echo form_error('jumlah') ?>
								</div>
							
							

							
							<div class="invalid-feedback">
												<?php echo form_error('jumlah') ?>
											</div>
							</div>
							<div class="form-group">
							<input class="btn btn-success" type="submit" name="tambah" value="Tambah" />
							</div>
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
			
			</div>
		</div></section>
			<!-- /.content-wrapper -->
	
		<!-- /#wrapper -->
			   <!-- /.content -->
			
