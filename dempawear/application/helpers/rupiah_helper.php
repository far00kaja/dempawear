<?php 
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
 
function diskon($harga,$jml,$tipe){
	if ($tipe=='percent'){
		return ($harga-($harga*$jml/100));
	}elseif ($tipe=='idr'){
		return ($harga-$jml);
	}else{
		return $harga;
	}
	
}
