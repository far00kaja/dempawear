<?php defined('BASEPATH') OR exit('no direct script allowed');

class Kategori_model extends CI_Model{

	private $_table="kategori";

	public $kode_kategori;
	public $nama_kategori;

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
		return $this->db->get_where($this->_table, ["kode_kategori"=>$id,])->row();
	}
	public function save(){
//		$this->load->helper('date');
		$post= $this->input->post();
		$this->kode_kategori='';
		$this->nama_kategori=$post['nama'];
		$this->db->insert($this->_table,$this);
	}

	public function update(){
		//$this->load->helper('date');
		
		$post= $this->input->post();
		$this->kode_kategori=$post['id'];
		$this->nama_kategori=$post['nama'];
		$this->db->update($this->_table, $this, array('kode_kategori' => $post['id']));
  
	}

	public function delete($id){
		if($this->db->delete($this->_table, array("kode_kategori"=>$id))){
			return $this->db->error();
		};
	}

}
