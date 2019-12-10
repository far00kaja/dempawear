<?php

defined('BASEPATH') OR exit('No direct  script access allowed');

class Supplier extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('supplier_model');
		$this->load->library('form_validation');

	}

	public function index(){
		// $data['konsumen']=$this->supplier_model->getAll();
		// $data['folder']='Konsumen';
		// $data['aktif']='View';
		// $this->load->view('templates/header');
		// $this->load->view('templates/aside');
		// $this->load->view('templates/bread',$data);
		// $this->load->view("admin/master/datakonsumen",$data);
		// $this->load->view('templates/modals');
		// $this->load->view('templates/js');
		// $this->load->view('templates/footer');
	}
	public function datasupplier(){
		$data['supplier']=$this->supplier_model->getAll();
		$data['folder']='Supplier';
		$data['aktif']='View';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view("admin/master/datasupplier",$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
	}

	public function add(){
		$supplier=$this->supplier_model;
		$validation=$this->form_validation;
		$validation->set_rules($supplier->rules());

		if ($validation->run()){
			$supplier->save();
			$this->session->set_flashdata('succcess','Berhasil Disimpan');
			$this->datasupplier();
			
		}else{
		$data['folder']='Supplier';
		$data['aktif']='Add';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view('admin/master/supplier/new_form');
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
		}
	}

	public function edit($id=null){
		if (!isset($id)) redirect('admin/supplier/datasupplier');

		$supplier=$this->supplier_model;
		$validation=$this->form_validation;
		$validation->set_rules($supplier->rules());
		if ($validation->run()==true){
			$supplier->update();
			$this->session->set_flashdata('success', 'berhasil di update');
			$this->datasupplier();
		}else{

		$data['supplier']=$supplier->getById($id);
		if (!$data['supplier']) show_404();

		$data['folder']='Supplier';
		$data['aktif']='Edit';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view("admin/master/supplier/edit_form",$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');	
		$this->session->set_flashdata('success', 'berhasil di update');
		}

	}

	public function delete($id=null){
		if (!isset($id)) show_404();

		if($this->supplier_model->delete($id)){
			redirect(site_url('admin/supplier/datasupplier'));
		}
	}
}
