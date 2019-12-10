<?php defined('BASEPATH') OR exit('no direct script allowed');

class catalog_model extends CI_Model{

	private $_table="catalog";

	public $id_catalog;
	public $nama_catalog;

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
		return $this->db->get_where($this->_table, ["id_catalog"=>$id,])->row();
	}
	public function save(){
//		$this->load->helper('date');
		$post= $this->input->post();
		$this->id_catalog='';
		$this->nama_catalog=$post['nama'];
		$this->db->insert($this->_table,$this);
	}

	public function update(){
		//$this->load->helper('date');
		
		$post= $this->input->post();
		$this->id_catalog=$post['id'];
		$this->nama_catalog=$post['nama'];
		$this->db->update($this->_table, $this, array('id_catalog' => $post['id']));
  
	}

	public function delete($id){
		if($this->db->delete($this->_table, array("id_catalog"=>$id))){
			return $this->db->error();
		};
	}

}
