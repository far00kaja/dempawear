<?php

defined('BASEPATH') OR exit('No direct  script access allowed');

class Produksi extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('produksi_model');
		$this->load->model('produksi_detail_model');
		$this->load->model('barang_model');
		$this->load->model('bahan_model');
		$this->load->library('form_validation');

	}

	public function index(){
		$data['produksi']=$this->produksi_model->getAll();
		$data['folder']='produksi';
		$data['aktif']='View';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view("admin/produksi/list",$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
	}

	public function dproduksi(){
		$data['produksi']=$this->produksi_model->getAll();
		$data['folder']='produksi';
		$data['aktif']='View';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view("admin/produksi/dproduksi",$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
	}

	public function add(){
		$produksi=$this->produksi_model;
		$data['bahan']=$this->bahan_model->getAll();
		$data['barang']=$this->barang_model->getAll();
		$validation=$this->form_validation;
		$validation->set_rules($produksi->rules());
		if ($validation->run()){
			$produksi->save();
			$this->session->set_flashdata('succcess','Berhasil Disimpan');
		//	return $this->index();
		redirect(site_url('admin/produksi'));
			
		}else{
		$data['folder']='produksi';
		$data['aktif']='Add';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view('admin/produksi/new_form',$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
		}
	}

	public function fproduksi(){
		$produksi=$this->produksi_model;
		$data['bahan']=$this->bahan_model->getAll();
		$data['barang']=$this->barang_model->getAll();
		$validation=$this->form_validation;
		$validation->set_rules($produksi->rules());
		if ($validation->run()){
			$produksi->save();
			$this->bahan_model->penguranganBahan($this->input->post('bahan'),$this->input->post('total_bahan'));
			$this->session->set_flashdata('succcess','Berhasil Disimpan');
		//	return $this->index();
		redirect(site_url('admin/produksi/dproduksi'));
			
		}else{
		$data['folder']='produksi';
		$data['aktif']='Add';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view('admin/produksi/fproduksi',$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
		}
	}

	public function addDetail($id){
		$produksi=$this->produksi_model;
		$produksi_detail=$this->produksi_detail_model;
		$data['bahan']=$this->bahan_model->getAll();
		$data['barang']=$this->barang_model->getAll();
		$validation=$this->form_validation;
		$validation->set_rules($produksi_detail->rules());
		if ($validation->run()){
			$produksi_detail->save();
			//----pengurangan bahan----//
			$bahan=$this->bahan_model->penguranganBahan($this->input->post('bahan'),$this->input->post('total_bahan'));//mengambil data id bahan di model bahan
			
			$this->session->set_flashdata('succcess','Berhasil Disimpan');
		//	return $this->index();
		redirect(site_url('admin/produksi'));
			
		}else{
		$data['folder']='produksi';
		$data['aktif']='Add';
		$data['produksi']=$this->produksi_model->getById($id);
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view('admin/produksi/produksi_detail/new_form',$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
		}
	}

	public function history(){
			//	$data['pd']=$this->produksi_detail_model->getAll();
				$data['folder']='produksi';
				$data['aktif']='View';
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
				$data['aktif']='View';
			//	$this->load->database();
				$jumlah_data = $this->produksi_detail_model->jumlah_data();
				$this->load->library('pagination');
				$config['base_url'] = base_url().'admin/produksi/history/';
				$config['total_rows'] = $jumlah_data;
				$config['per_page'] = 5;
				$from = $this->uri->segment(4);
				$this->pagination->initialize($config);		
				$data['pd'] = $this->produksi_detail_model->data($config['per_page'],$from);
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view("admin/produksi/produksi_detail/list",$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
	}


	public function edit($id=null){
		if (!isset($id)) redirect('admin/produksi');

		$produksi=$this->produksi_model;
		$validation=$this->form_validation;
		$validation->set_rules($produksi->rules());
		if ($validation->run()==true){
			//rollback

			$produksi->update();
			$this->session->set_flashdata('success', 'berhasil di update');
			redirect(site_url('admin/produksi'));		
		}else{
			$data['produksi']=$produksi->getById($id);
			if (!$data['produksi']) show_404();

			$data['folder']='produksi'; 
			$data['aktif']='Edit';
			$data['bahan']=$this->bahan_model->getAll();
			$this->load->view('templates/header');
			$this->load->view('templates/aside');
			$this->load->view('templates/bread',$data);
			$this->load->view("admin/produksi/edit_form",$data);
			$this->load->view('templates/modals');
			$this->load->view('templates/js');
			$this->load->view('templates/footer');	
			$this->session->set_flashdata('success', 'berhasil di update');
		}


		

	}



	public function delete($id=null){
		if (!isset($id)) show_404();

		if($this->produksi_model->delete($id)){
			redirect(site_url('admin/produksi'));
		}
	}
	public function deleteDetail($id=null){
		if (!isset($id)) show_404();

		if($this->produksi_detail_model->delete($id)){
			redirect(site_url('admin/produksi'));
		}
	}

	public function editDetail($id=null){
		if (!isset($id)) redirect('admin/produksi');

		$prodetail=$this->produksi_detail_model;
		$validation=$this->form_validation;
		$validation->set_rules($prodetail->rules());
		if ($validation->run()==true){
			$prodetail->update();
			$this->session->set_flashdata('success', 'berhasil di update');
			redirect(site_url('admin/produksi'));		
		}else{
			$data['prodetail']=$prodetail->getById($id);
			if (!$data['prodetail']) show_404();

			$data['folder']='produksi'; 
			$data['aktif']='Edit';
			$data['bahan']=$this->bahan_model->getAll();
			$this->load->view('templates/header');
			$this->load->view('templates/aside');
			$this->load->view('templates/bread',$data);
			$this->load->view("admin/produksi/produksi_detail/edit_form",$data);
			$this->load->view('templates/modals');
			$this->load->view('templates/js');
			$this->load->view('templates/footer');	
			$this->session->set_flashdata('success', 'berhasil di update');
		}
	}
}
