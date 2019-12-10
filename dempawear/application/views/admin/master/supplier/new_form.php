
<?php $this->load->view('templates/css'); ?>


<section class="content">
		<div id="content-wrapper">

		
		<div class="container-fluid">

			
				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/supplier/datasupplier') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/supplier/add') ?>" method="post" enctype="multipart/form-data" >
						<div class="form-group">
								<label for="name">Nama Supplier*</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama" placeholder="Nama Supplier" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="harga">No HP*</label>
								<input class="form-control <?php echo form_error('harga') ? 'is-invalid':'' ?>"
								 type="text" name="nohp" min="0" placeholder="No HP" />
								<div class="invalid-feedback">
									<?php echo form_error('harga') ?>
								</div>
							</div>
						
							

							<div class="form-group">
								<label for="alamat">Alamat Supplier*</label>
								<textarea class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
								 name="alamat" placeholder="Alamat Supplier..."></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('alamat') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
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
			
