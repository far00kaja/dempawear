
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
						<a href="<?php echo site_url('admin/barang/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/barang/edit') ?>" method="post" enctype="multipart/form-data" >
						
						<input type="hidden" name="id" value="<?= $barang->id_barang?>" />

						<div class="form-group">
								<label for="name">Nama*</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama" placeholder="Nama barang" value="<?= $barang->nama; ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>

						
							<div class="form-group">
								<label for="catalog">Katalog*</label>

								<select class="form-control <?php echo form_error('catalog') ? 'is-invalid':'' ?>"
								  name="catalog" placeholder="Catalog" required>
								 <option value="" disabled>--Pilih Catalog--</option>
								<?php foreach ($catalog as $c){
									if ($c->id_catalog==$barang->id_catalog){
										echo ' <option value="'.$c->id_catalog.'" selected>'.$c->nama_catalog.'</option>';
						
									}else{
									echo ' <option value="'.$c->id_catalog.'" >'.$c->nama_catalog.'</option>';
									}
								}
								?>
								</select>
								 
								<div class="invalid-feedback">
									<?php echo form_error('catalog') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Kategori*</label>
								<select class="form-control <?php echo form_error('catalog') ? 'is-invalid':'' ?>"
								  name="kategori" placeholder="Catalog" required>
								 <option value="" selected disabled>--Pilih Kategori--</option>
								<?php foreach ($kategori as $c){
									if ($c->kode_kategori==$barang->kode_kategori){
										echo ' <option value="'.$c->kode_kategori.'" selected>'.$c->nama_kategori.'</option>';
						
									}else{echo ' <option value="'.$c->kode_kategori.'" >'.$c->nama_kategori.'</option>';
									}
								}
								?>
								</select><div class="invalid-feedback">
									<?php echo form_error('kategori') ?>
								</div>
							</div>
							

							<div class="form-group">
								<label for="harga">Harga*</label>
								<input class="form-control <?php echo form_error('harga') ? 'is-invalid':'' ?>"
								 type="number" name="harga" min="0" placeholder="Harga Barang Satuan" value="<?= $barang->harga_satuan; ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('harga') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="name">Gambar1</label>
								<input class="form-control-file <?php echo form_error('gambar1') ? 'is-invalid':'' ?>"
								 type="file" name="gambar1" />
								<input type="hidden" name="old_image1" value="<?php echo $barang->gambar1; ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Gambar2</label>
								<input class="form-control-file <?php echo form_error('gambar1') ? 'is-invalid':'' ?>"
								 type="file" name="gambar2" />
								<input type="hidden" name="old_image2" value="<?php echo $barang->gambar2; ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('gambar2') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Gambar3</label>
								<input class="form-control-file <?php echo form_error('gambar1') ? 'is-invalid':'' ?>"
								 type="file" name="gambar1" />
								<input type="hidden" name="old_image3" value="<?php echo $barang->gambar3; ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('gambar3') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Artikel*</label>
								<textarea class="form-control <?php echo form_error('artikel') ? 'is-invalid':'' ?>"
								 name="artikel" placeholder="Deskripsi Barang..."><?= $barang->artikel ?></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('artikel') ?>
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
