
<?php $this->load->view('templates/css'); ?>


<section class="content">
				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/transaksi/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr align="center" valign="center">
										<th>No Invoice</th>
										<th>Nama</th>
										<th>Tgl_transaksi</th>
										<th>handled By</th>
										<th>Pembayaran</th>
										<th>Created At</th>
										
										<th colspan="2"><p align="center">Aksi</p></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($transaksi as $t): ?>
									<tr>
										<td width="150">
											<?php echo $t->no_invoice ?>
										</td>
										<td>
											<?php echo $t->nama ?>
										</td>
										<td>
											<?php echo $t->tgl_transaksi ?>
										</td>
										<td>
											<?php echo $t->handled ?>
										</td>
										<td class="small">
											<?php echo $t->pembayaran ?>	
									    </td>
										<td>
											<?php echo $t->created_at ?>

										</td>
										
										<td width="250">
											<a href="<?php echo site_url('admin/transaksi/edit/'.$t->no_invoice) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/transaksi/delete/'.$t->no_invoice) ?>')"
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
