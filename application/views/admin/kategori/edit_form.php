
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
						<a href="<?php echo site_url('admin/kategori/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/kategori/edit') ?>" method="post" enctype="multipart/form-data" >
						
						<input type="hidden" name="id" value="<?= $kategori->kode_kategori?>" />
							<div class="form-group">
								<label for="name">Kategori*</label>
								<input class="form-control <?php echo form_error('kategori') ? 'is-invalid':'' ?>"
								 type="text" name="nama" placeholder="Kategori" value="<?= $kategori->nama_kategori; ?>"  />
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

			
			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->
</section>

		<?php $this->load->view("templates/js.php") ?>
