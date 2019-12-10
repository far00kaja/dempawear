<?php defined('BASEPATH') OR exit('no direct script allowed');

class User_model extends CI_Model{

	private $_table="users";

	public $td_invoice;
	public $no_invoice;
	public $id_barang;
	public $size;
	public $jumlah;
	public $diskon;
	public $tipe_diskon;
	public $handled_by;

	public function rules(){
		return [
			[
				'field' => 'jumlah',
			'label'=>'numeric',
			'rules'=>'required'
			],
			
		];
	}

	public function getAll(){
	
		return $this->db->get($this->_table)->result();
	}
	public function getById($id){
		
		return $this->db->get_where($this->_table, ["id"=>$id,])->row();
	}
	

	
	public function update(){
		//$this->load->helper('date');
		
		$post= $this->input->post();
		$this->id_bd=$post['id'];
		$this->id_bahan=$post['bahan'];
	   $this->id_supp=$post['supp'];
		//$this->warna=$post['warna'];
		$this->harga=$post['harga'];
		$this->jumlah=$post['jumlah'];
		$this->updated_at=date('Y-m-d H:i:s');
	
		$this->db->update($this->_table, $this, array('id_bd' => $post['id']));
		
	}

	public function delete($id){
		if($this->db->delete($this->_table, array("id_bd"=>$id))){
			return $this->db->error();
		};
	}

	public function getIdBahan($id){
		$price = $this->db->get_where('bahan_detail', array('id_bd' => $id))
				  ->row();
				  return $price;
	}
}
