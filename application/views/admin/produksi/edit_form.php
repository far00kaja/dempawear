
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

						<form action="<?php base_url('admin/produksi/edit') ?>" method="post" enctype="multipart/form-data" >
						<div class="form-group">
								<label for="name">Barang*</label>
								<input type="text" class="form-control" name="namabarang" value="<?= $produksi->nama_barang ?>" readonly>
								<input type="hidden" class="form-control" name="id" value="<?= $produksi->no_produksi ?>" >
								<input type="hidden" class="form-control" name="barang" value="<?= $produksi->id_barang ?>" >
						
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>

							
							<div class="form-group">
								<label for="name">Size*</label>
								<input type="text" class="form-control" name="size" value="<?= $produksi->size ?>" >

								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div> 
						<div class="form-group">
								<label for="name">Total Produksi*</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="number" value="<?= $produksi->total_produksi?>" name="total_produksi" placeholder="Jumlah dari produk baju yang dihasilkan berdasarkan size" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="name">Bahan yang digunakan*</label>
								<input type="hidden" name="bahanbefore" value="<?= $produksi->id_bahan?>">
								<input type="hidden" name="totalbefore" value="<?= $produksi->total_bahan?>">
								<select class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								  name="bahan" placeholder="Total">
							
								<option selected disabled>--Pilih Bahan--</option>
								<?php foreach($bahan as $b) {?>
									<?php if ($b->id_bahan == $produksi->id_bahan) {?> 
									<option value="<?= $b->id_bahan?>" selected><?= $b->nama_bahan.'&nbsp Warna'.$b->warna.' ' ?></option>
									
								<?php }else{ ?>
									<option value="<?= $b->id_bahan?>"><?= $b->nama_bahan.'&nbsp Warna'.$b->warna.' ' ?></option>
									
									<?php }} ?>
								</select><div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div> 
							
						<div class="form-group">
								<label for="Total_bahan">Total Bahan yang digunakan*</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="number" name="total_bahan" value="<?= $produksi->total_bahan?>" placeholder="Jumlah bahan yang digunakan sesuai jumlah produksi" />
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
			
