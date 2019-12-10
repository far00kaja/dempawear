
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
		</div></section>
			<!-- /.content-wrapper -->
	
		<!-- /#wrapper -->
			   <!-- /.content -->
			
