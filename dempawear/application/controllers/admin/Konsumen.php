<?php

defined('BASEPATH') OR exit('No direct  script access allowed');

class Konsumen extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('konsumen_model');
		$this->load->library('form_validation');

	}

	public function index(){
		$data['konsumen']=$this->konsumen_model->getAll();
		$data['folder']='Konsumen';
		$data['aktif']='View';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view("admin/master/datakonsumen",$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
	}
	public function datakonsumen(){
		$data['konsumen']=$this->konsumen_model->getAll();
		$data['folder']='Konsumen';
		$data['aktif']='View';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view("admin/master/datakonsumen",$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
	}

	public function add(){
		$konsumen=$this->konsumen_model;
		$validation=$this->form_validation;
		$validation->set_rules($konsumen->rules());

		if ($validation->run()){
			$konsumen->save();
			$this->session->set_flashdata('succcess','Berhasil Disimpan');
			$this->index();
			
		}else{
		$data['folder']='Konsumen';
		$data['aktif']='Add';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view('admin/master/konsumen/new_form');
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
		}
	}

	public function edit($id=null){
		if (!isset($id)) redirect('admin/kategori');

		$konsumen=$this->konsumen_model;
		$validation=$this->form_validation;
		$validation->set_rules($konsumen->rules());
		if ($validation->run()==true){
			$konsumen->update();
			$this->session->set_flashdata('success', 'berhasil di update');
			return redirect(site_url('admin/konsumen/datakonsumen'));
		}else{

		$data['konsumen']=$konsumen->getById($id);
		if (!$data['konsumen']) show_404();

		$data['folder']='Konsumen';
		$data['aktif']='Edit';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view("admin/master/konsumen/edit_form",$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');	
		$this->session->set_flashdata('success', 'berhasil di update');
		}

	}

	public function delete($id=null){
		if (!isset($id)) show_404();

		if($this->konsumen_model->delete($id)){
			redirect(site_url('admin/konsumen/datakonsumen'));
		}
	}
}
