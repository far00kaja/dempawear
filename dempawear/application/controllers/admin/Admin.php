<?php

defined('BASEPATH') OR exit('No direct  script access allowed');

class Admin extends CI_Controller{


	public function index(){
		$data['title']='my profile';
		$data['folder']='Admin';
		$data['aktif']='Admin';
		$data['user']=$this->db->get_where('users',['email'=>
		$this->session->userdata('email')])->row_array();
		$this->load->view('templates/header');
		$this->load->view('templates/aside',$data);
		$this->load->view('templates/bread',$data);
		$this->load->view("templates/content",$data);
		$this->load->view('templates/modals');
		$this->load->view('templates/js');
		$this->load->view('templates/footer');
		;
	}

}
