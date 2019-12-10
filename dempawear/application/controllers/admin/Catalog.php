<?php

defined('BASEPATH') OR exit('No direct  script access allowed');

class Catalog extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('catalog_model');
		$this->load->library('form_validation');

	}

	public function index(){
		$data['catalog']=$this->catalog_model->getAll();
		$data['folder']='catalog';
		$data['aktif']='View';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view("admin/catalog/list",$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
	}

	public function add(){
		$catalog=$this->catalog_model;
		$validation=$this->form_validation;
		$validation->set_rules($catalog->rules());

		if ($validation->run()){
			$catalog->save();
			$this->session->set_flashdata('succcess','Berhasil Disimpan');
		//	return $this->index();
		redirect(site_url('admin/catalog'));
			
		}else{
		$data['folder']='catalog';
		$data['aktif']='Add';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view('admin/catalog/new_form');
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
		}
	}

	public function edit($id=null){
		if (!isset($id)) redirect('admin/catalog');

		$catalog=$this->catalog_model;
		$validation=$this->form_validation;
		$validation->set_rules($catalog->rules());
		if ($validation->run()==true){
			$catalog->update();
			$this->session->set_flashdata('success', 'berhasil di update');
			redirect(site_url('admin/catalog'));
		
		}else{

		$data['catalog']=$catalog->getById($id);
		if (!$data['catalog']) show_404();

		$data['folder']='catalog';
		$data['aktif']='Edit';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view("admin/catalog/edit_form",$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');	
		$this->session->set_flashdata('success', 'berhasil di update');
		}

	}

	public function delete($id=null){
		if (!isset($id)) show_404();

		if($this->catalog_model->delete($id)){
			redirect(site_url('admin/catalog'));
		}
	}
}
