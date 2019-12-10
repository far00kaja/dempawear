
<?php $this->load->view('templates/css'); ?>


<section class="content"><?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>
				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/barang/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr align="center" valign="center">
										<th>#</th>
										<th>Nama</th>
										<th>Catalog</th>
										<th>Kategori</th>
										<th>Artikel</th>
										<th>Size</th>
										<th>Harga</th>
										<th>Gambar 1</th>
										<th>Gambar 2</th>
										<th>Gambar 3</th>
										<th colspan="2"><p align="center">Aksi</p></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($barang as $b): ?>
									<tr>
										<td width="150">
											<?php echo $b->id_barang ?>
										</td>
										<td>
											<?php echo $b->nama ?>
										</td>
										<td>
											<?php echo $b->nama_catalog ?>
										</td>
										<td>
											<?php echo $b->nama_kategori ?>
										</td>
										<td class="small">
											<?php echo substr($b->artikel, 0, 120) ?>...</td>
										<td>
size										</td>
										<td>
											<?php echo $b->harga_satuan ?>
										</td>
										<td>
											<img src="<?php echo base_url('assets/images/barang/'.$b->gambar1) ?>" width="64" />
										</td>
										<td>
											<img src="<?php echo base_url('assets/images/barang/'.$b->gambar2) ?>" width="64" />
										</td>
										<td>
											<img src="<?php echo base_url('assets/images/barang/'.$b->gambar3) ?>" width="64" />
										</td>
										<td width="250">
											<a href="<?php echo site_url('admin/barang/edit/'.$b->id_barang) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/barang/delete/'.$b->id_barang) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->
	</section>
	<script>
	function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}</script>
			   <!-- /.content -->
