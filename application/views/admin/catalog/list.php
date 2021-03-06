
<?php $this->load->view('templates/css'); ?>


<section class="content">
				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/catalog/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr align="center" valign="center">
										<th>#</th>
										<th>Nama</th>
										<th><p align="center">Aksi</p></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($catalog as $b): ?>
									<tr align="center">
										<td>
											<?php echo $b->id_catalog ?>
										</td>
										<td>
											<?php echo $b->nama_catalog ?>
										</td>
										<td>
											<a href="<?php echo site_url('admin/catalog/edit/'.$b->id_catalog) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/catalog/delete/'.$b->id_catalog) ?>')"
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
