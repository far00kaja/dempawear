<?php defined('BASEPATH') OR exit('no direct script allowed');

class Konsumen_model extends CI_Model{

	private $_table="konsumen";

	public $id_konsumen;
	public $nama_konsumen;
	public $alamat_konsumen;
	public $no_hp;
	public $email;
	public $status;

	public function rules(){
		return [
			[
				'field' => 'nama',
			'label'=>'Nama',
			'rules'=>'required'
			],
			
		];
	}

	public function getAll(){
		return $this->db->get($this->_table)->result();
	}
	public function getById($id){
		return $this->db->get_where($this->_table, ["id_konsumen"=>$id,])->row();
	}
	public function save(){
//		$this->load->helper('date');
		$post= $this->input->post();
		$this->id_konsumen='';
		$this->nama_konsumen=$post['nama'];
		$this->alamat_konsumen=$post['alamat'];
		$this->no_hp=$post['nohp'];
		$this->email=$post['email'];
		$this->status=$post['status'];
		$this->db->insert($this->_table,$this);
	}

	public function update(){
		//$this->load->helper('date');
		
		$post= $this->input->post();
		$this->id_konsumen=$post['id'];
		$this->nama_konsumen=$post['nama'];
		$this->alamat_konsumen=$post['alamat'];
		$this->no_hp=$post['nohp'];
		$this->email=$post['email'];
		$this->status=$post['status'];
		$this->db->update($this->_table, $this, array('id_konsumen' => $post['id']));
  
	}

	public function delete($id){
		if($this->db->delete($this->_table, array("id_konsumen"=>$id))){
			return $this->db->error();
		};
	}

}
