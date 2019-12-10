
<?php $this->load->view('templates/css'); ?>


<section class="content">
				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/produksi/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr align="center" valign="center">
										<th>#</th>
										<th>No_Produksi</th>
										<th>Barang Produksi</th>
										<th>Bahan</th>
										<th>Total Bahan yang digunakan</th>
										<th>Created At</th>
										<th>Updated At</th>
										<th><p align="center">Aksi</p></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($pd as $b): ?>
									<tr align="center">
										<td>
											<?php echo $b->id_pd ?>
										</td>
										<td>
											<?php echo $b->no_produksi ?>
										</td>
										<td>
											<?php echo $this->produksi_model->getById($b->no_produksi)->nama_barang; ?>
										</td>
										<td>
											<?php echo $this->bahan_model->getById($b->id_bahan)->nama_bahan; ?> warna <?php echo $this->bahan_model->getById($b->id_bahan)->warna; ?>
										</td>
										<td>
											<?php echo $b->total_bahan ?>
										</td>
										<td>
											<?php echo $b->created_at ?>
										</td>
										<td>
											<?php echo $b->updated_at ?>
										</td>
										
										<td>
											<a href="<?php echo site_url('admin/produksi/editDetail/'.$b->id_pd) ?>"
											 class="btn btn-warning btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/produksi/deleteDetail/'.$b->id_pd) ?>')"
											 href="#!" class="btn btn-small btn-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
						<div class="card-footer d-flex justify-content-center">
							<?php 
	echo $this->pagination->create_links();
	?>
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
