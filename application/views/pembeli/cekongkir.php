
<!--================Cart Area =================-->

<pre>
<?php //print_r($kota)?>
</pre>
<section class="cart_area">
		<div class="container">
			<div class="cart_inner">
				<div class="table-responsive">
				<table id="example" class="display" style="width:100%">
						<thead>
							<tr>
								<th scope="col">Kode</th>
								<th scope="col">Nama Kota</th>
								<th scope="col">Provinsi</th>
								</tr>
						</thead>
						<tbody>
							<?php $no=1;$total=0;?>
							<?php //echo var_dump($hasil->rajaongkir->results); 
							foreach ($kota->rajaongkir->results as $key => $k){ ?>
							<tr>

								<td><?= $k->city_id?></td>
								<td><?= $k->city_name?></td>
								<td><?= $k->province?></td>
							
							</tr>
							<?php }?>
							
							
						</tbody>
					</table>
				</div>
				
<div class="row">
<div class="col-lg-2 col-md-2"></div>

					<div class="col-lg-8">
						<h3 class="mb-30 title_color">Form Element</h3>
						<form action="<?=base_url('user/tampil');?>" method="post">
							<div class="mt-10">
								<input type="text" name="origin" placeholder="From, masukan kode, contoh: 22" onfocus="this.placeholder = 'From, masukan kode, contoh: 22'" onblur="this.placeholder = 'From, masukan kode, contoh: 22'" required="" class="single-input">
							</div>
							<div class="mt-10">
								<input type="text" name="destination" placeholder="To, masukan kode, contoh: 12" onfocus="this.placeholder = 'To, masukan kode, contoh: 12'" onblur="this.placeholder = 'To, masukan kode, contoh: 12'" required="" class="single-input">
							</div>
							<div class="mt-10">
								<input type="text" name="weight" placeholder="Berat Kg" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Berat Kg'" required="" class="single-input">
							</div>
							<div class="form-select" id="default-select2">
									<select style="display: none;" name="courier">
										<option value="pos" selected>Pos</option>
										<option value="jne">JNE</option>
										<option value="tiki">Tiki</option>
									</select><div class="nice-select" tabindex="0"><span class="current">Courier</span><ul class="list">
										<li data-value="pos" class="option selected focus">Pos</li>
										<li data-value="jne" class="option">JNE</li>
										<li data-value="tiki" class="option">Tiki</li></ul></div>
								</div>
								<button type="submit" class="genric-btn success large">Submit
							</button>
					</div>
							<div class="col-lg-2"></div>
						</form>
					</div>

					
</div>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Destinasi</th>
								<th scope="col">Tujuan</th>
								<th scope="col">Berat</th>
								<th scope="col">Kurir</th>
								<th scope="col">Jenis Paket</th>
								<th scope="col">Deskripsi</th>
								<th scope="col">Ongkir</th>
								<th scope="col">Lama Hari</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1;$total=0;?>
							<?php //echo var_dump($hasil->rajaongkir->results); 
							if (!empty($hasil->rajaongkir->results[0])){
							foreach ($hasil->rajaongkir->results[0]->costs as $key => $h){ ?>
							<tr>

								<td><?= $hasil->rajaongkir->origin_details->city_name ?></td>
								<td><?= $hasil->rajaongkir->destination_details->city_name ?></td>
								<td><?= $hasil->rajaongkir->query->weight ?></td>
								<td><?= $hasil->rajaongkir->results[0]->code ?></td>
								<td><?= $h->service ?></td>
								<td><?= $h->description ?></td>
								<td><?= $h->cost[0]->value ?></td>
								<td><?= $h->cost[0]->etd ?></td>
								<td><?= $h->cost[0]->note.'Hari'?></td>
							
							</tr>
							<?php }}?>
							
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!--================End Cart Area =================-->


<pre>
<?php// print_r($hasil)?>
</pre>
