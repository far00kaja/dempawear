
<?php $this->load->view('templates/css'); ?>


<section class="content">
				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
					<a href="<?php echo site_url('admin/konsumen/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr align="center" valign="center">
										<th>#</th>
										<th>Nama</th>
										<th>Alamat</th>
										<th>No HP</th>
										<th>Email</th>
										<th>Status</th>
										<th><p align="center">Aksi</p></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($konsumen as $k): ?>
									<tr align="center">
										<td>
											<?php echo $k->id_konsumen ?>
										</td>
										<td>
											<?php echo $k->nama_konsumen?>
										</td>
										<td>
											<?php echo $k->alamat_konsumen ?>
										</td>
										<td>
											<?php echo $k->no_hp ?>
										</td>
										<td>
											<?php echo $k->email ?>
										</td>
										<td>
											<?php echo $k->status ?>
										</td>
										<td>
											 <a href="<?php echo site_url('admin/konsumen/edit/'.$k->id_konsumen) ?>"
											 class="btn btn-warning btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/konsumen/delete/'.$k->id_konsumen) ?>')"
											 href="#!" class="btn btn-danger btn-small"><i class="fas fa-trash"></i> Hapus</a>
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
