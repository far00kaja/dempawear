
<?php $this->load->view('templates/css'); ?>


<section class="content">
				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
					<a href="<?php echo site_url('admin/supplier/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr align="center" valign="center">
										<th>#</th>
										<th>Nama</th>
										<th>Alamat</th>
										<th>No Telepon</th>
										<th><p align="center">Aksi</p></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($supplier as $s): ?>
									<tr align="center">
										<td>
											<?php echo $s->id_supp ?>
										</td>
										<td>
											<?php echo $s->nama_supp ?>
										</td>
										<td>
											<?php echo $s->alamat_supp ?>
										</td>
										
										<td>
											<?php echo $s->no_telp ?>
										</td>
										<td>
											 <a href="<?php echo site_url('admin/supplier/edit/'.$s->id_supp) ?>"
											 class="btn btn-warning btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/supplier/delete/'.$s->id_supp) ?>')"
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
