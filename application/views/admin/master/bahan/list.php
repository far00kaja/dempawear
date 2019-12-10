
<?php $this->load->view('templates/css'); ?>


<section class="content">
				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
					<a href="<?php echo site_url('admin/bahan/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					<a class="btn btn-success float-right" href="<?php echo site_url('admin/bahan/history') ?>"><i class="fas fa-history"></i> History</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr align="center" valign="center">
										<th>#</th>
										<th>Nama</th>
										<th>Warna</th>
										<th>Harga</th>
										<th>Jumlah</th>
										<th><p align="center">Aksi</p></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($bahan as $b): ?>
									<tr align="center">
										<td>
											<?php echo $b->id_bahan ?>
										</td>
										<td>
											<?php echo $b->nama_bahan ?>
										</td>
										<td>
											<?php echo $b->warna ?>
										</td>
										<td>
											<?php echo $b->harga ?>
										</td>
										<td>
											<?php echo $b->jumlah ?>
										</td>
										<td>
										<a href="<?php echo site_url('admin/bahan/addDetail/'.$b->id_bahan) ?>"
											 class="btn btn-primary btn-small"><i class="fas fa-plus-square"></i> Add Stock</a>
											 <a href="<?php echo site_url('admin/bahan/edit/'.$b->id_bahan) ?>"
											 class="btn btn-warning btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/bahan/delete/'.$b->id_bahan) ?>')"
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
