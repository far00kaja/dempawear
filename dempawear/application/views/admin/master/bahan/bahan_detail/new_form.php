
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
						<a href="<?php echo site_url('admin/bahan/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/bahan/addDetail') ?>" method="post" enctype="multipart/form-data" >
						<div class="form-group">
								<label for="bahan">Bahan</label>
								<input class="form-control <?php echo form_error('bahan') ? 'is-invalid':'' ?>"
								 type="text" name="nama_bahan" placeholder="Nama Bahan" value="<?= $bd->nama_bahan ?>" readonly />
								 <input type="hidden" name="bahan" value="<?= $bd->id_bahan ?>"/>
								
								 <div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="warna">Warna*</label>
								<input class="form-control <?php echo form_error('warna	') ? 'is-invalid':'' ?>"
								 type="text" name="warna" placeholder="Warna"  value="<?= $bd->warna ?>" readonly/>
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="catalog">Katalog*</label>

								<select class="form-control <?php echo form_error('supp') ? 'is-invalid':'' ?>"
								  name="supp" required>
								 <option value="" selected disabled>--Pilih Supplier--</option>
								<?php foreach ($supp as $c){
									echo ' <option value="'.$c->id_supp.'" >'.$c->nama_supp.'</option>';
								}
								?>
								</select>
								 
								<div class="invalid-feedback">
									<?php echo form_error('catalog') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Harga*</label>
								<input class="form-control <?php echo form_error('harga') ? 'is-invalid':'' ?>"
								 type="number" name="harga" placeholder="Harga" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Jumlah*</label>
								<input class="form-control <?php echo form_error('jumlah') ? 'is-invalid':'' ?>"
								 type="number" name="jumlah" placeholder="Jumlah" />
								<input type="hidden" name="kurang" value="0" />
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
			
