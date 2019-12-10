<?php defined('BASEPATH') OR exit('no direct script allowed');

class Bahan_detail_model extends CI_Model{

	private $_table="bahan_detail";

	public $id_bd;
	public $id_bahan;
	public $id_supp;
	public $jumlah;
	public $harga;
	public $status;
	public $created_at;
	public $updated_at;

	public function rules(){
		return [
			[
				'field' => 'harga',
			'label'=>'numeric',
			'rules'=>'required'
			],
			
		];
	}

	public function getAll(){
		$this->db->select('bahan_detail.*, bahan.nama_bahan AS nama_bahan, bahan.warna AS warna, supplier.nama_supp as nama_supp');
		//$this->db->join('bahan', 'mailsystem.recipent = modtager.id AND mailsystem.sender = afsender.id', 'left');
		$this->db->join('bahan','bahan.id_bahan=bahan_detail.id_bahan','right');
		$this->db->join('supplier','supplier.id_supp=bahan_detail.id_supp','left');
		$this->db->order_by('id_bd', 'DESC');
		return $this->db->get('bahan_detail')->result();
		// $this->db->select('id_bd','supplier.nama_supp');
		// $this->db->from('bahan_detail');
		// $this->db->join('bahan','bahan.id_bahan=bahan_detail.id_bahan','right');
		// $this->db->join('supplier','supplier.id_supp=bahan_detail.id_supp','left');
		// $query= $this->db->get()->result();
		// return $query;
		// //return $this->db->get($this->_table)->result();
	}
	public function getById($id){
		$this->db->select('bahan_detail.*, bahan.nama_bahan AS nama_bahan, supplier.nama_supp as nama_supp');
		//$this->db->join('bahan', 'mailsystem.recipent = modtager.id AND mailsystem.sender = afsender.id', 'left');
		$this->db->join('bahan','bahan.id_bahan=bahan_detail.id_bahan','right');
		$this->db->join('supplier','supplier.id_supp=bahan_detail.id_supp','left');
		//$this->db->where('id_bd',$id);
		$this->db->order_by('id_bd', 'DESC');
		return $this->db->get_where('bahan_detail',['id_bd'=>$id,])->result();
	
	// 	$this->db->select('*');
	// 	$this->db->from('bahan_detail');
	// 	$this->db->join('bahan','bahan.id_bahan=bahan_detail.id_bahan');
	// 	$this->db->where('bahan_detail', $id);//->result();
	// 	$query = $this->db->get();
	// 	return $query;
	//  return $query->result();
	// return $this->db->get_where($this->_table, ["id_bd"=>$id,])->result();
	}
	public function save(){
		$this->load->helper('date');
		$post= $this->input->post();
		$this->id_bd='';
		$this->id_bahan=$post['bahan'];
	   $this->id_supp=$post['supp'];
		//$this->warna=$post['warna'];
		$this->harga=$post['harga'];
		$this->jumlah=$post['jumlah'];
		$this->status='order';
		$this->created_at=date('Y-m-d H:i:s');
		$this->updated_at=date('Y-m-d H:i:s');
		$this->db->insert($this->_table,$this);
		
	}
	
	public function update(){
		//$this->load->helper('date');
		
		$post= $this->input->post();
		$this->id_bd=$post['id'];
		$this->id_bahan=$post['bahan'];
	    $this->id_supp=$post['supp'];
		$this->status=$post['status'];
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
	public function cetakFilter($dari,$hingga){
		$this->db->select('bahan_detail.*, bahan.nama_bahan AS nama_bahan, bahan.warna AS warna, supplier.nama_supp as nama_supp');
		//$this->db->join('bahan', 'mailsystem.recipent = modtager.id AND mailsystem.sender = afsender.id', 'left');
		$this->db->join('bahan','bahan.id_bahan=bahan_detail.id_bahan','right');
		$this->db->join('supplier','supplier.id_supp=bahan_detail.id_supp','left');
		//$this->db->where('bahan_detail.created_at >=', '2019-03-03');
		//$this->db->where('bahan_detail.created_at <=', '2019-12-12');
		$this->db->order_by('id_bd', 'DESC');
		return $this->db->get('bahan_detail')->result();
	}

	public function getIdBahan($id){
		$price = $this->db->get_where('bahan_detail', array('id_bd' => $id))
				  ->row();
				  return $price;
	}
	function data($number,$offset){
		$this->db->select('bahan_detail.*, bahan.nama_bahan AS nama_bahan, bahan.warna AS warna, supplier.nama_supp as nama_supp');
		//$this->db->join('bahan', 'mailsystem.recipent = modtager.id AND mailsystem.sender = afsender.id', 'left');
		$this->db->join('bahan','bahan.id_bahan=bahan_detail.id_bahan','right');
		$this->db->join('supplier','supplier.id_supp=bahan_detail.id_supp','left');
		$this->db->order_by('id_bd', 'DESC');
		return $query = $this->db->get('bahan_detail',$number,$offset)->result();		
	}
	function  datapbb($number,$offset){
		$this->db->select('bahan_detail.*, bahan.nama_bahan AS nama_bahan, bahan.warna AS warna, supplier.nama_supp as nama_supp');
		//$this->db->join('bahan', 'mailsystem.recipent = modtager.id AND mailsystem.sender = afsender.id', 'left');
		$this->db->join('bahan','bahan.id_bahan=bahan_detail.id_bahan','right');
		$this->db->join('supplier','supplier.id_supp=bahan_detail.id_supp','left');
		$this->db->where('status','order');
		$this->db->order_by('id_bd', 'DESC');
		return $query = $this->db->get('bahan_detail',$number,$offset)->result();		
	}
	function  datapb($number,$offset){
		$this->db->select('bahan_detail.*, bahan.nama_bahan AS nama_bahan, bahan.warna AS warna, supplier.nama_supp as nama_supp');
		//$this->db->join('bahan', 'mailsystem.recipent = modtager.id AND mailsystem.sender = afsender.id', 'left');
		$this->db->join('bahan','bahan.id_bahan=bahan_detail.id_bahan','right');
		$this->db->join('supplier','supplier.id_supp=bahan_detail.id_supp','left');
		$this->db->where('status','bought');
		$this->db->order_by('id_bd', 'DESC');
		return $query = $this->db->get('bahan_detail',$number,$offset)->result();		
	}
 
	function jumlah_data(){
		return $this->db->get('bahan_detail')->num_rows();
	}
}
