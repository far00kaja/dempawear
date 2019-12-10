<?php

class User extends CI_Controller{
private $api_key='86de407d5c81271d2d6195befd036719';
public function __construct(){
	parent::__construct();
	$this->load->model('barang_model');
	$this->load->model('kategori_model');
	$this->load->model('transaksi_root_model');
	$this->load->model('transaksi_head_model');
	$this->load->model('produksi_model');
		//$this->load->model('supplier_model');
	$this->load->helper('rupiah_helper');
	
	$this->load->library('form_validation');
	
	$this->load->helper('string');

}
	public function index(){
		$data['user']= $this->db->get_where('users',['email'=> $this->session->userdata('email')])->row_array();
		echo 'welcome '.$data['user']['name'];//['email'];
	}

	public function cart($id){
		$data['listorder']=$this->transaksi_root_model->getCountOrder($this->session->userdata('id'));
		$data['barang']=$this->barang_model->getById($id);
		$this->load->view('templates/depan/header',$data);
		return $this->load->view('pembeli/barang',$data);
		$this->load->view('templates/depan/footer');
	}

	public function checkout(){
		$data['listorder']=$this->transaksi_root_model->getCountOrder($this->session->userdata('id'));
	//	$data['barang']=$this->barang_model->getById($id);
		$data['transaksi']=$this->transaksi_root_model->getByUser($this->session->userdata('id'));
		$transaksi=$this->transaksi_head_model;
		$validation=$this->form_validation;
		$validation->set_rules($transaksi->rule2());
	//	var_dump($this->input->post());
		if ($validation->run()){
			$transaksi->saveUser();
			$last=$transaksi->getLast();
			$this->transaksi_root_model->updateInvoice($last);
			redirect(site_url(''));
		
			
		}
		$this->load->view('templates/depan/header',$data);
		$this->load->view('pembeli/checkout',$data);
		$this->load->view('templates/modals');
		return $this->load->view('templates/depan/footer');
	}

	public function add(){
		echo 'asdasd';
		$transaksi=$this->transaksi_root_model;
		$validation=$this->form_validation;
		$validation->set_rules($transaksi->rules());
		var_dump($this->input->post());
		if ($validation->run()){
		//	$transaksi->addChart();
		echo '<br>'.$this->input->post('barang').'<br>';
		echo '<br>'.$this->input->post('size').'<br>';
		$produksi=$this->produksi_model->cekBarang($this->input->post('barang'),$this->input->post('size'));
		if (empty($produksi)){
			echo '<br>ga ada stoknya<br>';
			
			echo $this->input->post('barang').'<br>';
			echo $this->input->post('size').'<br>';
			$this->session->set_flashdata('danger','Stok Barang Kosong');
			echo $produksi,'asd';
			var_dump($produksi);
			redirect(site_url(''));
		
		}else{
			echo '<br>  ada stoknya<br>';
			
			if($produksi->total_produksi==0){
				$this->session->set_flashdata('danger','Stok Habis');
				echo 'stok habis';
				//redirect(site_url('admin/transaksi/add'));
		
			}elseif ($produksi->total_produksi > $this->input->post('jumlah')){
				echo '<br>jumlah<br>';
				$barang=$this->input->post('barang');
				$size=$this->input->post('size');
				$kurang=$this->input->post('jumlah');
				$tambah=0;
				$transaksi->addChart();
				echo 'masuk';
				$pengurangproduksi=$this->produksi_model->updateJumlah($barang,$size,$tambah,$kurang);
				redirect(site_url(''));
		//		$transaksi->save();
					echo $this->input->post('add');
				
				//var_dump($this->input->post('done'));
			}else{
				if ($produksi->total_produksi < $this->input->post('jumlah')){
					$cek='true';
				}else{
					$cek='false';
				}
				$this->session->set_flashdata('danger',$cek.'->Stok Kurang, sisa stoknya :'.$produksi->total_produksi.'dan dipesan adalah :'.$this->input->post('jumlah'));
				redirect(site_url(''));
		
			}
		}
	}

		return '';
	}

	public function uploadBukti(){
		$upload=$this->transaksi_head_model;
		$upload->upBukti();
		echo var_dump($this->input->post());
		echo "<br>";
		echo var_dump($_FILES['bukti']);

	}
	public function history(){
		$data['transaksihead']=$this->transaksi_head_model->getHistory($this->session->userdata('id'));
		$this->load->view('templates/depan/header');
		$this->load->view('pembeli/history',$data);
		$this->load->view('templates/depan/footer');
	}
	public function delete(){
		//if (!isset($id)) show_404();
		
		$tid=$this->transaksi_root_model->getById($this->input->post('id'));
		echo $tid;
		$kurang=$tid->jumlah;
		$size=$tid->size;
		if($this->transaksi_root_model->delete($this->input->post('id'))){
			$this->produksi_model->updateJumlah($tid->id_barang,$size,$kurang,0);			
			redirect(site_url('user/checkout'));
		}
	}

	public function ongkir($data,$url,$req){
		$curl= curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING =>"",
			CURLOPT_MAXREDIRS =>10,
			CURLOPT_TIMEOUT =>30,
			CURLOPT_HTTP_VERSION =>CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => $req,
			CURLOPT_HTTPHEADER => array(
				"key: $this->api_key"),
			));
			if (!empty($data)){
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);	
			}
		$response=curl_exec($curl);
		$err=curl_error($curl);
		curl_close($curl);

		if($err){
			echo 'aacURL Error #:'.$err;
		}else{
			return json_decode($response);
		}
	}

	public function tampil(){
		$ket=array(
			'origin'=> $this->input->post('origin'),
			'destination'=>$this->input->post('destination'),
			'weight'=>$this->input->post('weight'),
			'courier'=>$this->input->post('courier'),
			// 'origin'=>'1',
			// 'destination'=>'2',
			// 'weight'=>'3',
			// 'courier'=>'jne',
		);
		$url="https://api.rajaongkir.com/starter/cost";
		$req="POST";
		$data['hasil']=$this->ongkir($ket,$url,$req);
		$data['kota']=$this->ongkir(null,"https://api.rajaongkir.com/starter/city","GET");
		$this->load->view('templates/depan/header');
		$this->load->view('pembeli/cekongkir',$data);
		$this->load->view('templates/depan/footer');
//		echo '<pre>';
//		print_r($this->ongkir($data));
//		echo '</pre>';
	}

	public function form(){
		$this->load->view('templates/depan/header');
		$this->load->view('pembeli/cekongkir');
		$this->load->view('templates/depan/footer');
	}
}
