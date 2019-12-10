<?php defined('BASEPATH') OR exit('no direct script allowed');

class Supplier_model extends CI_Model{

	private $_table="supplier";

	public $id_supp;
	public $nama_supp;
	public $alamat_supp;
	public $no_telp;

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
		return $this->db->get_where($this->_table, ["id_supp"=>$id,])->row();
	}
	public function save(){
//		$this->load->helper('date');
		$post= $this->input->post();
		$this->id_supp='';
		$this->nama_supp=$post['nama'];
		$this->alamat_supp=$post['alamat'];
		$this->no_telp=$post['nohp'];
		//$this->jumlah=$post['jumlah'];
		$this->db->insert($this->_table,$this);
	}

	public function update(){
		//$this->load->helper('date');
		
		$post= $this->input->post();
		$this->id_supp=$post['id'];
		$this->nama_supp=$post['nama'];
		$this->alamat_supp=$post['alamat'];
		$this->no_telp=$post['nohp'];
		$this->db->update($this->_table, $this, array('id_supp' => $post['id']));
  
	}

	public function delete($id){
		if($this->db->delete($this->_table, array("id_supp"=>$id))){
			return $this->db->error();
		};
	}

}
