<?php

defined('BASEPATH') OR exit('No direct  script access allowed');

class Kategori extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('kategori_model');
		$this->load->library('form_validation');

	}

	public function index(){
		$data['kategori']=$this->kategori_model->getAll();
		$data['folder']='Kategori';
		$data['aktif']='View';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view("admin/kategori/list",$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
	}

	public function add(){
		$kategori=$this->kategori_model;
		$validation=$this->form_validation;
		$validation->set_rules($kategori->rules());

		if ($validation->run()){
			$kategori->save();
			$this->session->set_flashdata('succcess','Berhasil Disimpan');
			$this->index();
			
		}else{
		$data['folder']='Kategori';
		$data['aktif']='Add';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view('admin/kategori/new_form');
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
		}
	}

	public function edit($id=null){
		if (!isset($id)) redirect('admin/kategori');

		$kategori=$this->kategori_model;
		$validation=$this->form_validation;
		$validation->set_rules($kategori->rules());
		if ($validation->run()==true){
			$kategori->update();
			$this->session->set_flashdata('success', 'berhasil di update');
			$this->index();
		}else{

		$data['kategori']=$kategori->getById($id);
		if (!$data['kategori']) show_404();

		$data['folder']='Kategori';
		$data['aktif']='Edit';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view("admin/kategori/edit_form",$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');	
		$this->session->set_flashdata('success', 'berhasil di update');
		}

	}

	public function delete($id=null){
		if (!isset($id)) show_404();

		if($this->kategori_model->delete($id)){
			redirect(site_url('admin/kategori'));
		}
	}
}
