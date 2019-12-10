
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
						<a href="<?php echo site_url('admin/bahan/databahan') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
					<?php foreach($bhn as $bd){ ?>
					
						<form action="<?php base_url('admin/bahan/editDetail',) ?>" method="post" enctype="multipart/form-data" >
						<div class="form-group">
							<input type="hidden" name="id" value="<?= $bd->id_bd ?>">
								<label for="bahan">Bahan</label>
								<input class="form-control <?php echo form_error('bahan') ? 'is-invalid':'' ?>"
								 type="text" name="nama_bahan" placeholder="Nama Bahan" value="<?= $bd->nama_bahan ?>" readonly />
								 <input type="hidden" name="bahan" value="<?= $bd->id_bahan ?>"/>
								
								 <div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="warna">Supplier*</label>
								<input class="form-control <?php echo form_error('warna	') ? 'is-invalid':'' ?>"
								 type="text" name="nama_supp" placeholder="Warna"  value="<?= $bd->nama_supp ?>" readonly/>
								 <input type="hidden" name="supp" value="<?= $bd->id_supp ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>
							

							<div class="form-group">
								<label for="name">Harga*</label>
								<input class="form-control <?php echo form_error('harga') ? 'is-invalid':'' ?>"
								 type="number" name="harga" placeholder="Harga" value="<?= $bd->harga ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Jumlah*</label>
								<input class="form-control <?php echo form_error('jumlah') ? 'is-invalid':'' ?>"
								 type="number" name="jumlah" placeholder="Jumlah" value="<?= $bd->jumlah ?>" />
								<input class="form-control <?php echo form_error('jumlah') ? 'is-invalid':'' ?>"
								 type="hidden" name="kurang" value="<?= $bd->jumlah ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="name">Status*</label>
								<select class="form-control" name="status">
									<?php if ($bd->status=='order'){?>
									<option value="order" selected>order</option>
									<option value="bought">bought</option>
									<?php }else{ ?>
										<option value="order">order</option>
									<option value="bought" selected>bought</option>

									<?php } ?>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>
							

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>
						<?php } ?>

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
			
