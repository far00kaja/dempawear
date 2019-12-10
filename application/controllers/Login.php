<?php

class Login extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index(){
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required');
		//ketika fungsi form validasi belum dijalankan

		if ($this->form_validation->run()==false){
			$data['title']='Login Page';
			$this->load->view('templates/auth_header');
			$this->load->view('login/login',$data);
			$this->load->view('templates/auth_footer');
		}else{
			//validasi sukses
			$this->login();
		}
	}
	public function register(){
		$this->form_validation->set_rules('name','Name','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[users.email]',[
			'is_unique'=>'Email has been registered']);
		$this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]',[
			'matches' => 'Password don`t matches!',
			'min_length'=> 'Password too short!']);
		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');
		if ($this->form_validation->run()==false){
			$data['title']= 'User Registration';
			$this->load->view('templates/auth_header');
			$this->load->view('login/register');
			$this->load->view('templates/auth_footer');
		}else{
//			echo 'berhasil ditambahkan';
			$data=[
			'name'			=> $this->input->post('name'),
			'email'			=> $this->input->post('email'),
			'image'			=> 'default.jpg',
			'password'		=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			'role_id'		=> 1,
			'is_active'		=> 1,
			'date_created'	=> time()
		];
		$this->db->insert('users',$data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Your account has been created, please login!</div>');
		redirect('login');

			
		}

	}
	private function login(){
		$email= $this->input->post('email');
		$password= $this->input->post('password');


		$user= $this->db->get_where('users',['email'=>$email])->row_array();

		//jika user ada
		if($user){

			//jika user aktif
			if ($user['is_active']==1){
				//cek password
				if (password_verify($password, $user['password'])){
						$data= [
							'email'=>$user['email'],
							'role_id'=>$user['role_id'],
							'id'=>$user['id'],
						];
						if ($user['role_id']==2){
						$this->session->set_userdata($data);
						redirect('admin/transaksi');
						}else{
							$this->session->set_userdata($data);
						redirect('/');
								
						}
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
					redirect('login');

				}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not activated!</div>');
				redirect('login ');
			}

		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
		echo'c';
		redirect('login');
		}

	}


	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">You have benn logout!</div>');
		redirect('login');
	}
}
