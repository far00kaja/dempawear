
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
						<a href="<?php echo site_url('admin/produksi/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/produksi/add') ?>" method="post" enctype="multipart/form-data" >
						<div class="form-group">
								<label for="name">Barang*</label>
								<input type="text" value="<?= $this->produksi_model->getById($prodetail->no_produksi)->nama_barang;?>" class="form-control" readonly>
								<input type="hidden" value="<?= $prodetail->no_produksi ?>" name="no_prod">
								<input type="hidden" value="<?= $prodetail->id_pd ?>" name="id">
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>

							
							<div class="form-group">
								<label for="name">Bahan yang digunakan*</label>
								<input class="form-control" type="text" name="bahand" value="<?php echo $this->bahan_model->getById($prodetail->id_bahan)->nama_bahan; ?> warna <?php echo $this->bahan_model->getById($prodetail->id_bahan)->warna; ?>
									" readonly>
									<input type="hidden" name="bahan" value="<?= $prodetail->id_bahan ?>"
								</select><div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div> 
					
						<div class="form-group">
								<label for="Total_bahan">Total Bahan yang digunakan*</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="number" name="total_bahan" value="<?= $prodetail->total_bahan?>" placeholder="Jumlah bahan yang digunakan sesuai jumlah produksi" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
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
			
