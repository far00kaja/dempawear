
<?php $this->load->view('templates/css'); ?>


<section class="content">
				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
					<a href="<?php echo site_url('admin/bahan/add') ?>"><i class="fas fa-arrow-left"></i> Kembali Ke Bahan</a>
					<a  class="btn btn-success float-right "onclick="cetakConfirm('<?php echo site_url('admin/bahan/cetak') ?>')"
											 href="#!" ><i class="fas fa-print"></i> Cetak</a>
					

				</div>
					<div class="card-body">
					
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr align="center" valign="center">
										<th>#</th>
										<th>Nama Bahan</th>
										<th>Warna</th>
										<th>Nama Supplier</th>
										<th>Jumlah</th>
										<th>Harga</th>
										<th>Status</th>
										<th>Created At</th>
										<th>Updated At</th>
										<th><p align="center">Aksi</p></th>
									</tr>
								</thead>
								<tbody>
									
									<?php	$no = $this->uri->segment('4')+1; foreach ($bahandetail as $b): ?>
									<tr align="center">
									<td>
											<?php echo $b->id_bd ?>
										</td>
										<td>
											<?php echo $b->nama_bahan ?>
										</td>
										<td>
											<?php echo $b->warna ?>
										</td>
										<td>
											<?php echo $b->nama_supp ?>
										</td>
										<td>
											<?php echo $b->jumlah ?>
										</td>
										<td>
											<?php echo $b->harga ?>
										</td>
										<td>
										<b>	<?php echo $b->status ?> </b>
										</td>
										<td>
											<?php echo date("d M Y", strtotime($b->created_at)); ?>
										</td><td>
											<?php echo date("d M Y", strtotime($b->updated_at)); ?>
										</td>
										<td>
											 <a href="<?php echo site_url('admin/bahan/editDetail/'.$b->id_bd) ?>"
											 class="btn btn-warning btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/bahan/deleteDetail/'.$b->id_bd) ?>')"
											 href="#!" class="btn btn-danger btn-small "><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>
								

								</tbody>
								<tfoot>
							
								</tfoot>
							</table>
							<div class="card-footer d-flex justify-content-center">
							<?php 
	echo $this->pagination->create_links();
	?>
							</div>
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
