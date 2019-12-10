<?php

defined('BASEPATH') OR exit('No direct  script access allowed');

class Barang extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('barang_model');
		$this->load->model('kategori_model');
		$this->load->model('catalog_model');
		$this->load->library('form_validation');

		$this->load->helper('string');
	}

	public function index(){
		$data['barang']=$this->barang_model->getAll();
		$data['folder']='Barang';
		$data['aktif']='View';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view("admin/barang/list",$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');

	}
	public function databarang(){
		$data['barang']=$this->barang_model->getAll();
		$data['folder']='Barang';
		$data['aktif']='View';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view("admin/barang/list",$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
	}

	public function add(){
		$data['catalog']=$this->catalog_model->getAll();
		$data['kategori']=$this->kategori_model->getAll();
	
		$barang=$this->barang_model;
		$validation=$this->form_validation;
		$validation->set_rules($barang->rules());
		

		if ($validation->run()){
			
				$barang->save();

				$this->session->set_flashdata('success','Berhasil Disimpan');
				redirect(site_url('admin/barang/databarang'));
	
			
		//var_dump($barang);
		//var_dump($_FILES['gambar1']);
		//echo 'a';
		//return 'a';
		}else{
		$data['folder']='Barang';
		$data['aktif']='Add';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view('admin/master/barang/new_form');
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
		}
	}

	public function edit($id=null){
		$data['catalog']=$this->catalog_model->getAll();
		$data['kategori']=$this->kategori_model->getAll();
	
		if (!isset($id)) redirect('admin/barang');

		$barang=$this->barang_model;
		$validation=$this->form_validation;
		$validation->set_rules($barang->rules());
		if ($validation->run()){
			$barang->update();
			$this->session->set_flashdata('success', 'berhasil di update');
			redirect(site_url('admin/barang/databarang'));

		}

		$data['barang']=$barang->getById($id);
		if (!$data['barang']) show_404();

		$data['folder']='Barang';
		$data['aktif']='Edit';
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread',$data);
		$this->load->view("admin/barang/edit_form",$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');

	}

	public function delete($id=null){
		if (!isset($id)) show_404();

		if($this->barang_model->delete($id)){
			redirect(site_url('admin/barang/databarang'));
		}
	}
}
