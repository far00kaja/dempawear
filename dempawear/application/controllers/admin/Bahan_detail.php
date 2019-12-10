<?php

defined('BASEPATH') OR exit('No direct  script access allowed');

class Bahan_detail extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('bahan_model');
		$this->load->library('form_validation');

	}
	public function cetak(){
		$data['bahan']=$this->bahan_model->getAll();
		$data['folder']='Bahan';
		$data['aktif']='View';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view("admin/bahan/list",$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
	}
	public function index(){
		$data['bahan']=$this->bahan_model->getAll();
		$data['folder']='Bahan';
		$data['aktif']='View';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view("admin/bahan/list",$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
	}

	public function add($id=null){
		$bahan=$this->bahan_model;
		$validation=$this->form_validation;
		$validation->set_rules($bahan->rules());

		if ($validation->run()){
			$bahan->save();
			$this->session->set_flashdata('succcess','Berhasil Disimpan');
		//	return $this->index();
		redirect(site_url('admin/bahan'));
			
		}else{
		$data['folder']='Bahan';
		$data['aktif']='Add';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view('admin/bahan/new_form');
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
		}
	}

	public function edit($id=null){
		if (!isset($id)) redirect('admin/bahan');

		$bahan=$this->bahan_model;
		$validation=$this->form_validation;
		$validation->set_rules($bahan->rules());
		if ($validation->run()==true){
			$bahan->update();
			$this->session->set_flashdata('success', 'berhasil di update');
			redirect(site_url('admin/bahan'));
		
		}else{

		$data['bahan']=$bahan->getById($id);
		if (!$data['bahan']) show_404();

		$data['folder']='bahan';
		$data['aktif']='Edit';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view("admin/bahan/edit_form",$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');	
		$this->session->set_flashdata('success', 'berhasil di update');
		}

	}

	public function deleteDetail($id=null){
		if (!isset($id)) show_404();

		if($this->bahan_model->delete($id)){
			$this->session->set_flashdata('success', 'berhasil di delete');
			redirect(site_url('admin/bahan/history'));
		}
	}
}
