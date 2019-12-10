<?php

defined('BASEPATH') OR exit('No direct  script access allowed');

class Transaksi extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('rupiah');
		$this->load->model('user_model');
		$this->load->model('transaksi_head_model');
		$this->load->model('transaksi_root_model');
		$this->load->model('produksi_model');
		$this->load->model('bahan_model');
		$this->load->model('barang_model');
		$this->load->model('supplier_model');
		$this->load->model('bahan_detail_model');
		$this->load->library('form_validation'); 

	}

	public function index(){
		// $user= $this->db->get_where('users',['email'=>$email])->row_array();
		// $data= [
		// 	'email'=>$user['email'],
		// 	'role_id'=>$user['role_id']
		// ];
		// $this->session->set_userdata($data);		
		$data['transaksi']=$this->transaksi_head_model->getAll();
		$data['folder']='Transaksi';
		$data['aktif']='View';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view("admin/transaksi/list",$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
	}

	public function dtransaksipenjualan(){
		// $user= $this->db->get_where('users',['email'=>$email])->row_array();
		// $data= [
		// 	'email'=>$user['email'],
		// 	'role_id'=>$user['role_id']
		// ];
		// $this->session->set_userdata($data);		
		$data['transaksi']=$this->transaksi_head_model->getBelumLunas();
		$data['folder']='Transaksi';
		$data['aktif']='View';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view("admin/penjualan/dtransaksipenjualan",$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
	}
	public function dtransaksipembayaran(){
		// $user= $this->db->get_where('users',['email'=>$email])->row_array();
		// $data= [
		// 	'email'=>$user['email'],
		// 	'role_id'=>$user['role_id']
		// ];
		// $this->session->set_userdata($data);		
		$data['transaksi']=$this->transaksi_head_model->getLunas();
		$data['folder']='Transaksi';
		$data['aktif']='View';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view("admin/penjualan/dtransaksipembayaran",$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
	}
	
	public function laporanpenjualan(){
		// $user= $this->db->get_where('users',['email'=>$email])->row_array();
		// $data= [
		// 	'email'=>$user['email'],
		// 	'role_id'=>$user['role_id']
		// ];
		// $this->session->set_userdata($data);		
		$data['transaksi']=$this->transaksi_head_model->getAll();
		$data['folder']='Transaksi';
		$data['aktif']='View';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view("admin/penjualan/laporanpenjualan",$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
	}
	public function add(){
		$transaksi=$this->transaksi_root_model;
		$bahan=$this->bahan_model;
		$validation=$this->form_validation;
		$validation->set_rules($transaksi->rules());
		if (!$this->input->post('done')=='Selesai'){
		
			if ($validation->run()){
				//cek ketersediaan barang dan ukuran
				$produksi=$this->produksi_model->cekBarang($this->input->post('barang'),$this->input->post('size'));
				if (empty($produksi)){
					
					echo $this->input->post('barang').'<br>';
					echo $this->input->post('size').'<br>';
					$this->session->set_flashdata('danger','Stok Barang Kosong');
					echo $produksi,'asd';
					var_dump($produksi);
					redirect(site_url('admin/transaksi/add'));
				
				}else{
					if($produksi->total_produksi==0){
						$this->session->set_flashdata('danger','Stok Habis');
						redirect(site_url('admin/transaksi/add'));
				
					}elseif ($produksi->total_produksi > $this->input->post('jumlah')){
						$barang=$this->input->post('barang');
						$size=$this->input->post('size');
						$kurang=$this->input->post('jumlah');
						$tambah=0;
						$pengurangproduksi=$this->produksi_model->updateJumlah($barang,$size,$tambah,$kurang);

						$transaksi->save();
						if ($this->input->post('tambah')=='Tambah'){
							$this->session->set_flashdata('success','Berhasil Disimpan');
							redirect(site_url('admin/transaksi/add'));
						}else if($this->input->post('done')=='Selesai'){
							$this->session->set_flashdata('success','Berhasil Disimpan2');
							redirect(site_url('admin/transaksi/done'));
						}
						var_dump($this->input->post('done'));
					}else{
						if ($produksi->total_produksi < $this->input->post('jumlah')){
							$cek='true';
						}else{
							$cek='false';
						}
						$this->session->set_flashdata('danger',$cek.'->Stok Kurang, sisa stoknya :'.$produksi->total_produksi.'dan dipesan adalah :'.$this->input->post('jumlah'));
						redirect(site_url('admin/transaksi/add'));
				
					}
				
				}
			}
			// $this->session->set_flashdata('danger','masuk done');
			$data['folder']='Bahan';
			$data['aktif']='Add';
			$data['barang']=$this->barang_model->getAll();
			$data['stok']=$this->produksi_model->getAll();
			$this->load->view('templates/header');
			$this->load->view('templates/aside');
			$this->load->view('templates/bread',$data);
			$this->load->view('admin/transaksi/new_form',$data);
			$this->load->view('templates/modals');
			$this->load->view('templates/js');
			$this->load->view('templates/footer');
				
		}else{
			$this->session->set_flashdata('danger','masuk done');
			$data['folder']='Bahan';
			$data['aktif']='Add';
			$data['barang']=$this->barang_model->getAll();
			$data['stok']=$this->produksi_model->getAll();
			$this->load->view('templates/header');
			$this->load->view('templates/aside');
			$this->load->view('templates/bread',$data);
			$this->load->view('admin/transaksi/new_form',$data);
			$this->load->view('templates/modals');
			$this->load->view('templates/js');
			$this->load->view('templates/footer');
		}
	}
	

	public function ftransaksipenjualan(){
		$transaksi=$this->transaksi_root_model;
		$bahan=$this->bahan_model;
		$validation=$this->form_validation;
		$validation->set_rules($transaksi->rules());
		if (!$this->input->post('done')=='Selesai'){
		
			if ($validation->run()){
				//cek ketersediaan barang dan ukuran
				$produksi=$this->produksi_model->cekBarang($this->input->post('barang'),$this->input->post('size'));
				if (empty($produksi)){
					
					echo $this->input->post('barang').'<br>';
					echo $this->input->post('size').'<br>';
					$this->session->set_flashdata('danger','Stok Barang Kosong');
					echo $produksi,'asd';
					var_dump($produksi);
					redirect(site_url('admin/transaksi/ftransaksipenjualan'));
				
				}else{
					if($produksi->total_produksi==0){
						$this->session->set_flashdata('danger','Stok Habis');
						redirect(site_url('admin/transaksi/ftransaksipenjualan'));
				
					}elseif ($produksi->total_produksi > $this->input->post('jumlah')){
						$barang=$this->input->post('barang');
						$size=$this->input->post('size');
						$kurang=$this->input->post('jumlah');
						$tambah=0;
						$pengurangproduksi=$this->produksi_model->updateJumlah($barang,$size,$tambah,$kurang);

						$transaksi->save();
						if ($this->input->post('tambah')=='Tambah'){
							$this->session->set_flashdata('success','Berhasil Disimpan');
							redirect(site_url('admin/transaksi/ftransaksipenjualan'));
						}else if($this->input->post('done')=='Selesai'){
							$this->session->set_flashdata('success','Berhasil Disimpan2');
							redirect(site_url('admin/transaksi/done'));
						}
						var_dump($this->input->post('done'));
					}else{
						if ($produksi->total_produksi < $this->input->post('jumlah')){
							$cek='true';
						}else{
							$cek='false';
						}
						$this->session->set_flashdata('danger',$cek.'->Stok Kurang, sisa stoknya :'.$produksi->total_produksi.'dan dipesan adalah :'.$this->input->post('jumlah'));
						redirect(site_url('admin/transaksi/ftransaksipenjualan'));
				
					}
				
				}
			}
			// $this->session->set_flashdata('danger','masuk done');
			$data['folder']='Bahan';
			$data['aktif']='Add';
			$data['barang']=$this->barang_model->getAll();
			$data['stok']=$this->produksi_model->getAll();
			$data['transaksi_root']=$this->transaksi_root_model->getByUser($this->session->userdata()['id']);//();
			$this->load->view('templates/header');
			$this->load->view('templates/aside');
			$this->load->view('templates/bread',$data);
			$this->load->view('admin/penjualan/ftransaksipenjualan',$data);
			$this->load->view('templates/modals');
			$this->load->view('templates/js');
			$this->load->view('templates/footer');
				
		}else{
			$this->session->set_flashdata('danger','masuk done');
			$data['folder']='Bahan';
			$data['aktif']='Add';
			$data['barang']=$this->barang_model->getAll();
			$data['stok']=$this->produksi_model->getAll();
			$this->load->view('templates/header');
			$this->load->view('templates/aside');
			$this->load->view('templates/bread',$data);
			$this->load->view('admin/transaksi/new_form',$data);
			$this->load->view('templates/modals');
			$this->load->view('templates/js');
			$this->load->view('templates/footer');
		}
	}
	

	public function done(){
		$transaksi=$this->transaksi_root_model;
		$bahan=$this->bahan_model;
		$validation=$this->form_validation;
		if ($this->input->post('done'=='Selesai')){
			echo 'true';
		$validation->set_rules($transaksi->rules());

			if ($validation->run()){
				//cek ketersediaan barang dan ukuran
				$produksi=$this->produksi_model->cekBarang($this->input->post('barang'),$this->input->post('size'));
				if (empty($produksi)){
					
					echo $this->input->post('barang').'<br>';
					echo $this->input->post('size').'<br>';
					$this->session->set_flashdata('danger','Stok Barang Kosong');
					echo $produksi,'asd';
					var_dump($produksi);
					redirect(site_url('admin/transaksi/ftransaksipenjualan'));
				
				}else{
					if($produksi->total_produksi==0){
						$this->session->set_flashdata('danger','Stok Habis');
						redirect(site_url('admin/transaksi/ftransaksipenjualan'));
				
					}elseif ($produksi->total_produksi > $this->input->post('jumlah')){
						$barang=$this->input->post('barang');
						$size=$this->input->post('size');
						$kurang=$this->input->post('jumlah');
						$tambah=0;
						$pengurangproduksi=$this->produksi_model->updateJumlah($barang,$size,$tambah,$kurang);

						$transaksi->save();
						if ($this->input->post('tambah')=='Tambah'){
							$this->session->set_flashdata('success','Berhasil Disimpan');
							redirect(site_url('admin/transaksi/ftransaksipenjualan'));
						}else if($this->input->post('done')=='Selesai'){
							$this->session->set_flashdata('success','Berhasil Disimpan2');
							redirect(site_url('admin/transaksi/done'));
						}
						var_dump($this->input->post('done'));
					}else{
						if ($produksi->total_produksi < $this->input->post('jumlah')){
							$cek='true';
						}else{
							$cek='false';
						}
						$this->session->set_flashdata('danger',$cek.'->Stok Kurang, sisa stoknya :'.$produksi->total_produksi.'dan dipesan adalah :'.$this->input->post('jumlah'));
						redirect(site_url('admin/transaksi/add'));
				
					}
				}
				
			}
		}else{
		//	$this->session->set_flashdata('success','Done');//$cek.'->Stok Kurang, sisa stoknya :'.$produksi->total_produksi.'dan dipesan adalah :'.$this->input->post('jumlah'));
			$data['folder']='Bahan';
			$data['aktif']='Add';
			$data['transaksi_root']=$this->transaksi_root_model->getByUser($this->session->userdata()['id']);//();
			$data['barang']=$this->barang_model->getAll();
			$data['stok']=$this->produksi_model->getAll();
			$this->load->view('templates/header');
			$this->load->view('templates/aside');
			$this->load->view('templates/bread',$data);
			$this->load->view('admin/transaksi/done/list',$data);
			$this->load->view('templates/modals');
			$this->load->view('templates/js');
			$this->load->view('templates/footer');
		}
	}
	
	public function edit($id=null){
		if (!isset($id)) redirect('admin/transaksi/dtransaksipembayaran');

		$transaksi=$this->transaksi_head_model;
		$validation=$this->form_validation;
		$validation->set_rules($transaksi->rules());
		if ($validation->run()==true){
			$t=$transaksi->updateOffline();
			$this->session->set_flashdata('success', 'berhasil di update');
			redirect(site_url('admin/transaksi/dtransaksipenjualan'));
			// return '$t';
		}else{

		$data['transaksi']=$transaksi->getById($id);
		if (!$data['transaksi']) show_404();

		$data['folder']='Transaksi';
		$data['aktif']='Edit';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view("admin/transaksi/edit_form",$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');	
		//$this->session->set_flashdata('success', 'berhasil di update');
		}

	}
	public function editDetail($id=null){
		if (!isset($id)) redirect('admin/bahan');

		$bahan=$this->bahan_detail_model;
		$validation=$this->form_validation;
		$validation->set_rules($bahan->rules());
		if ($validation->run()==true){
			$bahan->update();
			$kurang=$this->input->post('kurang');
			if ($kurang=='0'){
				$kurang=0;
			}else{
				$kurang=(int)$kurang;
			}
			$this->bahan_model->updateJumlah($this->input->post('bahan'),$this->input->post('jumlah'),$kurang);//->get();
			$this->session->set_flashdata('success', 'berhasil di update');
			redirect(site_url('admin/bahan'));
		
		}else{

		$data['bhn']=$bahan->getById($id);
		if (!$data['bhn']) show_404();

//		$data['bhn']=$this->bahan_model->getById($data['bd']->id_bahan);
//		$data['supp']=$this->supplier_model->getAll();
		$data['folder']='bahan';
		$data['aktif']='Edit';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view('admin/bahan/bahan_detail/edit_form',$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');	
		$this->session->set_flashdata('success', 'berhasil di update');
		}

	}

	public function delete($id=null){
		if (!isset($id)) show_404();

		if($this->bahan_model->delete($id)){
			redirect(site_url('admin/bahan'));
		}
	}

	public function deleteDetail($id=null){
		if (!isset($id)) show_404();
		echo $id;
		$tid=$this->transaksi_root_model->getById($id);
		echo $id;
//		$produksi=$this->produksi_model->getById($id);
		//var_dump($tid);
		echo '<br>'.$tid->id_barang;
		$kurang=$tid->jumlah;
		$size=$tid->size;
		echo '<br>'.$size;
		echo '<br>'.$kurang;
		 if($this->transaksi_root_model->delete($id)){
			$this->produksi_model->updateJumlah($tid->id_barang,$size,$kurang,0);
		// 	// 	//$kurang=$this->input->post('jumlah');
		// // 	$this->bahan_model->updateJumlah($bahan->idbahan,0,$kurang);//->get();
		// 	return 'a';	 
		redirect(site_url('admin/transaksi/done'));
		// // //return $bahan->id_bahan;
		 }
		//  re	
	}
		
	
	public function addDetail($id=null){
		$bahandetail=$this->bahan_detail_model;
		$bahan=$this->bahan_model;
		//$supp=$this->supplier_model;
		$validation=$this->form_validation;
		$validation->set_rules($bahandetail->rules());

		if ($validation->run()){
			//$kurang=0;//$this->input->post('sebelum');
			$bahandetail->save();
			$bahan->updateJumlah($this->input->post('bahan'),$this->input->post('jumlah'),$this->input->post('kurang'));//->get();
			$this->session->set_flashdata('succcess','Berhasil Disimpan');
		//	return $this->index();
		redirect(site_url('admin/bahan'));
			
		}else{
		$data['folder']='Bahan';
		$data['aktif']='Add / addDetail';
		$data['bd']=$this->bahan_model->getById($id);
		$data['supp']=$this->supplier_model->getAll();
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view('admin/bahan/bahan_detail/new_form',$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
		}
	}

	public function checkout(){
		$th=$this->transaksi_head_model;
		//$bahan=$this->bahan_model;
		//$supp=$this->supplier_model;
		// $validation=$this->form_validation;
		// $validation->set_rules($th->rules());

		// if ($validation->run()){
			//$kurang=0;//$this->input->post('sebelum');
			$th->save();
			$last=$th->getLast();
			$this->transaksi_root_model->updateInvoice($last);
			$this->session->set_flashdata('succcess','Berhasil Disimpan');
		//	return $this->index();
		redirect(site_url('admin/transaksi/add'));
			
		// }else{
		// $data['folder']='Bahan';
		// $data['aktif']='Add / addDetail';
		// //$data['bd']=$this->bahan_model->getById($id);
		// $data['supp']=$this->supplier_model->getAll();
		// $this->load->view('templates/header');
		// $this->load->view('templates/aside');
		// $this->load->view('templates/bread',$data);
		// $this->load->view('admin/bahan/bahan_detail/new_form',$data);
		// $this->load->view('templates/modals');
		// $this->load->view('templates/js');
		// $this->load->view('templates/footer');
		// }
		
	}


}
