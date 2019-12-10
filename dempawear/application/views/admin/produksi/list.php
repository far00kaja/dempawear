
<?php $this->load->view('templates/css'); ?>


<section class="content">
				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/produksi/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					
						<a class="btn btn-success float-right" href="<?php echo site_url('admin/produksi/history') ?>"><i class="fas fa-history"></i> History</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr align="center" valign="center">
										<th>#</th>
										<th>Barang</th>
										<th>Size</th>
										<th>Total Produksi</th>
										<th><p align="center">Aksi</p></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($produksi as $b): ?>
									<tr align="center">
										<td>
											<?php echo $b->no_produksi ?>
										</td>
										<td>
											<?php echo $b->nama ?>
										</td>
										<td>
											<?php echo $b->size ?>
										</td>
										<td>
											<?php echo $b->total_produksi ?>
										</td>
										<td>
										<a href="<?php echo site_url('admin/produksi/AddDetail/'.$b->no_produksi) ?>"
											 class="btn btn-primary btn-small"><i class="fas fa-edit"></i> Bahan yang digunakan</a>
											<a href="<?php echo site_url('admin/produksi/edit/'.$b->no_produksi) ?>"
											 class="btn btn-warning btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/produksi/delete/'.$b->no_produksi) ?>')"
											 href="#!" class="btn btn-small btn-danger"><i class="fas fa-trash"></i> Hapus</a>
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
