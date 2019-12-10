<?php

defined('BASEPATH') OR exit('No direct  script access allowed');

class Bahan extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('bahan_model');
		$this->load->model('supplier_model');
		$this->load->model('bahan_detail_model');
		$this->load->library('form_validation');
		$this->load->library('pdf');

	}

	public function index(){
		// $data['bahan']=$this->bahan_model->getAll();
		// $data['folder']='Bahan';
		// $data['aktif']='View';
		// $this->load->view('templates/header');
		// $this->load->view('templates/aside');
		// $this->load->view('templates/bread',$data);
		// $this->load->view("admin/bahan/list",$data);
		// $this->load->view('templates/modals');
		// $this->load->view('templates/js');
		// $this->load->view('templates/footer');
	}
	public function databahan(){
		$data['bahan']=$this->bahan_model->getAll();
		$data['folder']='Bahan';
		$data['aktif']='View';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view("admin/master/databahan",$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
	}
	public function pemesananbahanbaku(){
		//	$data['bahandetail']=$this->bahan_detail_model->getAll();
			$config['full_tag_open'] = '<ul class="pagination">&nbsp;';
			$config['full_tag_close'] = '&nbsp;</ul>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li class="page-item">&nbsp;';
			$config['first_tag_close'] = '&nbsp;</li>';
			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] = '<li class="page-item prev">&nbsp;';
			$config['prev_tag_close'] = '&nbsp;</li>';
			$config['next_link'] = '&raquo';
			$config['next_tag_open'] = '<li class="page-item">&nbsp;';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li class="page-item">&nbsp;';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li class="page-item">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			$config['num_tag_close'] = '</li>&nbsp;';
			$data['folder']='Bahan Detail';
			$data['aktif']='View';
		//	$this->load->database();
			$jumlah_data = $this->bahan_detail_model->jumlah_data();
			$this->load->library('pagination');
			$config['base_url'] = base_url().'admin/bahan/pemesananbahanbaku/';
			$config['total_rows'] = $jumlah_data;
			$config['per_page'] = 5;
			$from = $this->uri->segment(4);
			$this->pagination->initialize($config);		
			$data['bahandetail'] = $this->bahan_detail_model->datapbb($config['per_page'],$from);
			//$this->load->view('v_data',$data);
			$this->load->view('templates/header');
			$this->load->view('templates/aside');
			$this->load->view('templates/bread',$data);
			$this->load->view('admin/pembelian/pbb',$data);
			$this->load->view('templates/modals');
			$this->load->view('templates/footer');
			$this->load->view('templates/js');
		}
	
	public function pembelianbarang(){
		//	$data['bahandetail']=$this->bahan_detail_model->getAll();
			$config['full_tag_open'] = '<ul class="pagination">&nbsp;';
			$config['full_tag_close'] = '&nbsp;</ul>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li class="page-item">&nbsp;';
			$config['first_tag_close'] = '&nbsp;</li>';
			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] = '<li class="page-item prev">&nbsp;';
			$config['prev_tag_close'] = '&nbsp;</li>';
			$config['next_link'] = '&raquo';
			$config['next_tag_open'] = '<li class="page-item">&nbsp;';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li class="page-item">&nbsp;';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li class="page-item">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			$config['num_tag_close'] = '</li>&nbsp;';
			$data['folder']='Bahan Detail';
			$data['aktif']='View';
		//	$this->load->database();
			$jumlah_data = $this->bahan_detail_model->jumlah_data();
			$this->load->library('pagination');
			$config['base_url'] = base_url().'admin/bahan/pemesananbahanbaku/';
			$config['total_rows'] = $jumlah_data;
			$config['per_page'] = 5;
			$from = $this->uri->segment(4);
			$this->pagination->initialize($config);		
			$data['bahandetail'] = $this->bahan_detail_model->datapb($config['per_page'],$from);
			//$this->load->view('v_data',$data);
			$this->load->view('templates/header');
			$this->load->view('templates/aside');
			$this->load->view('templates/bread',$data);
			$this->load->view('admin/pembelian/pb',$data);
			$this->load->view('templates/modals');
			$this->load->view('templates/footer');
			$this->load->view('templates/js');
		}
	
		public function laporanpembelian(){
			//	$data['bahandetail']=$this->bahan_detail_model->getAll();
				$config['full_tag_open'] = '<ul class="pagination">&nbsp;';
				$config['full_tag_close'] = '&nbsp;</ul>';
				$config['first_link'] = false;
				$config['last_link'] = false;
				$config['first_tag_open'] = '<li class="page-item">&nbsp;';
				$config['first_tag_close'] = '&nbsp;</li>';
				$config['prev_link'] = '&laquo';
				$config['prev_tag_open'] = '<li class="page-item prev">&nbsp;';
				$config['prev_tag_close'] = '&nbsp;</li>';
				$config['next_link'] = '&raquo';
				$config['next_tag_open'] = '<li class="page-item">&nbsp;';
				$config['next_tag_close'] = '</li>';
				$config['last_tag_open'] = '<li class="page-item">&nbsp;';
				$config['last_tag_close'] = '</li>';
				$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
				$config['cur_tag_close'] = '</a></li>';
				$config['num_tag_open'] = '<li class="page-item">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				$config['num_tag_close'] = '</li>&nbsp;';
				$data['folder']='Bahan Detail';
				$data['aktif']='View';
			//	$this->load->database();
				$jumlah_data = $this->bahan_detail_model->jumlah_data();
				$this->load->library('pagination');
				$config['base_url'] = base_url().'admin/bahan/laporanpembelian/';
				$config['total_rows'] = $jumlah_data;
				$config['per_page'] = 5;
				$from = $this->uri->segment(4);
				$this->pagination->initialize($config);		
				$data['bahandetail'] = $this->bahan_detail_model->data($config['per_page'],$from);
				//$this->load->view('v_data',$data);
				$this->load->view('templates/header');
				$this->load->view('templates/aside');
				$this->load->view('templates/bread',$data);
				$this->load->view('admin/pembelian/lb',$data);
				$this->load->view('templates/modals');
				$this->load->view('templates/footer');
				$this->load->view('templates/js');
			}
	
	public function add(){
		$bahan=$this->bahan_model;
		$validation=$this->form_validation;
		$validation->set_rules($bahan->rules());

		if ($validation->run()){
			$bahan->save();
			$this->session->set_flashdata('succcess','Berhasil Disimpan');
		//	return $this->index();
		redirect(site_url('admin/bahan/databahan'));
			
		}else{
		$data['folder']='Bahan';
		$data['aktif']='Add';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view('admin/master/bahan/new_form');
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
		}
	}

	public function edit($id=null){
		if (!isset($id)) redirect('admin/bahan/databahan');

		$bahan=$this->bahan_model;
		$validation=$this->form_validation;
		$validation->set_rules($bahan->rules());
		if ($validation->run()==true){
			$bahan->update();
			$this->session->set_flashdata('success', 'berhasil di update');
			redirect(site_url('admin/bahan/databahan'));
		
		}else{

		$data['bahan']=$bahan->getById($id);
		if (!$data['bahan']) show_404();

		$data['folder']='bahan';
		$data['aktif']='Edit';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view("admin/master/bahan/edit_form",$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');	
		$this->session->set_flashdata('success', 'berhasil di update');
		}

	}
	public function editDetail($id=null){
		if (!isset($id)) redirect('admin/bahan/databahan');

		$bahan=$this->bahan_detail_model;
		$validation=$this->form_validation;
		$validation->set_rules($bahan->rules());
		if ($validation->run()==true){
			echo 'masuk<br>';
			$bahan->update();
			$kurang=$this->input->post('kurang');
			if ($kurang=='0'){
				$kurang=0;
				echo 'if<br>';
			}else{
				$kurang=(int)$kurang;
				echo 'else<br>';
			}
			echo $this->input->post('bahan').'bahan<br>';
			echo $this->input->post('jumlah').'jumlah<br>';
			echo $kurang."kurang<br>";
			if ($this->input->post('status')=='bought'){
				echo 'status jadi bought<br>';
			//	echo var_dump($this->bahan_model->getAll())."<br>";
					$this->bahan_model->updateJumlah($this->input->post('bahan'),$this->input->post('jumlah'),0);//->get();
					echo "ads<br>".var_dump($this->bahan_model->getAll())."ds<br>";
			}
			$this->session->set_flashdata('success', 'berhasil di update');
			redirect(site_url('admin/bahan/databahan'));
		
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
		$this->load->view('admin/master/bahan/bahan_detail/edit_form',$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');	
		$this->session->set_flashdata('success', 'berhasil di update');
		}

	}

	public function delete($id=null){
		if (!isset($id)) show_404();

		if($this->bahan_model->delete($id)){
			redirect(site_url('admin/bahan/databahan'));
		}
	}

	public function deleteDetail($id=null){
		if (!isset($id)) show_404();
		$bahan=$this->bahan_detail_model->getIdBahan($id);
		echo $bahan->id_bahan;
		$kurang=$bahan->jumlah;
		echo $kurang;
		 if($this->bahan_detail_model->delete($id)){
			$this->bahan_model->updateJumlah($bahan->id_bahan,0,$kurang);
			// 	//$kurang=$this->input->post('jumlah');
		// 	$this->bahan_model->updateJumlah($bahan->idbahan,0,$kurang);//->get();
		 	redirect(site_url('admin/bahan/databahan'));
		// //return $bahan->id_bahan;
		 }
	}
		
	
	public function history(){
	//	$data['bahandetail']=$this->bahan_detail_model->getAll();
	$config['full_tag_open'] = '<ul class="pagination">&nbsp;';
	$config['full_tag_close'] = '&nbsp;</ul>';
	$config['first_link'] = false;
	$config['last_link'] = false;
	$config['first_tag_open'] = '<li class="page-item">&nbsp;';
	$config['first_tag_close'] = '&nbsp;</li>';
	$config['prev_link'] = '&laquo';
	$config['prev_tag_open'] = '<li class="page-item prev">&nbsp;';
	$config['prev_tag_close'] = '&nbsp;</li>';
	$config['next_link'] = '&raquo';
	$config['next_tag_open'] = '<li class="page-item">&nbsp;';
	$config['next_tag_close'] = '</li>';
	$config['last_tag_open'] = '<li class="page-item">&nbsp;';
	$config['last_tag_close'] = '</li>';
	$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
	$config['cur_tag_close'] = '</a></li>';
	$config['num_tag_open'] = '<li class="page-item">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	$config['num_tag_close'] = '</li>&nbsp;';

		$data['folder']='Bahan Detail';
		$data['aktif']='View';
	//	$this->load->database();
		$jumlah_data = $this->bahan_detail_model->jumlah_data();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'admin/bahan/history/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 5;
		$from = $this->uri->segment(4);
		$this->pagination->initialize($config);		
		$data['bahandetail'] = $this->bahan_detail_model->data($config['per_page'],$from);
		//$this->load->view('v_data',$data);
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view('admin/master/bahan/bahan_detail/list',$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/footer');
		$this->load->view('templates/js');
	}

	public function cetak(){
		//echo 'asd'.$this->input->get('dari');
		//echo var_dump($this->input->post('ke'));
		//$data['bahandetail']=$this->bahan_detail_model->cetakFilter($this->input->get('dari'),$this->input->get('hingga'));
		$data['bahandetail']=$this->bahan_detail_model->getAll();//cetakFilter($this->input->get('dari'),$this->input->get('hingga'));
		//$this->load->view('templates/header');
		$data['folder']='Cetak';
		$data['aktif']='Cetak';
		//$this->load->view('templates/aside');
		//$this->load->view('templates/bread',$data);
		// $data=$this->load->view('admin/master/bahan/bahan_detail/cetak',$data);
		// $this->load->view('admin/master/bahan/bahan_detail/cetak',$data);
		//$this->load_html($html);
		// $pdf    = PDF::loadview('admin/master/bahan/bahan_detail/cetak',$data);
        // return $pdf->stream();  //('laporan-account-pdf-'.$dari.'/'.$ke.'.pdf');
		$dompdf=$this->load->library('pdf');
	//	$this->pdf->setPaper('A4', 'potrait');
//		$this->pdf->filename = "laporan.pdf";

		$data_bahan = array();
		$data_bahan['bahandetail'] = $this->bahan_detail_model->getAll();//$this->db->get('tbl_user')->result();
		$this->load->view('admin/master/bahan/bahan_detail/cetak',$data_bahan);
		// $html = $this->output->get_output();
		// $this->load->library('pdf');
		// $this->dompdf->loadHtml($html);
		// $this->dompdf->setPaper('A4', 'landscape');
		// $this->dompdf->render();
		// $this->dompdf->stream("bahan.pdf", array("Attachment"=>0));
	//	$this->pdf->load_view('admin/master/bahan/bahan_detail/cetak',$data);//'admin/master/bahan/bahan_detail/cetak');//, //$data);
		//$this->load->view('templates/modals');
	//	$this->load->view('templates/footer');
	//	$this->load->view('templates/js');

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
			//$bahan->updateJumlah($this->input->post('bahan'),$this->input->post('jumlah'),$this->input->post('kurang'));//->get();
			$this->session->set_flashdata('succcess','Berhasil Disimpan');
		//	return $this->index();
		redirect(site_url('admin/bahan/databahan'));
			
		}else{
		$data['folder']='Bahan';
		$data['aktif']='Add / addDetail';
		$data['bd']=$this->bahan_model->getById($id);
		$data['supp']=$this->supplier_model->getAll();
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view('admin/master/bahan/bahan_detail/new_form',$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
		}
	}

}
