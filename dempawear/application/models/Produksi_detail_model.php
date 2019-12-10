<?php defined('BASEPATH') OR exit('no direct script allowed');

class Produksi_detail_model extends CI_Model{

	private $_table="produksi_detail";
	public $id_pd;
	public $no_produksi;
	public $id_bahan;
	public $total_bahan;
	public $created_at;
	public $updated_at;

	public function rules(){
		return [
			[
				'field' => 'total_bahan',
			'label'=>'total_bahan',
			'rules'=>'required'
			],
			
		];
	} 

	public function getAll(){
		$this->db->select('produksi_detail.*, produksi.id_barang AS nama_barang, bahan.nama_bahan AS nama_bahan, bahan.warna AS warna');
		//$this->db->join('bahan', 'mailsystem.recipent = modtager.id AND mailsystem.sender = afsender.id', 'left');
		$this->db->join('produksi','produksi.no_produksi=produksi_detail.no_produksi','left');
		$this->db->join('bahan','bahan.id_bahan=produksi_detail.id_bahan','left');
		//$this->db->join('barang','barang.id_barang=produksi.id_barang','left');
		$this->db->order_by('id_pd', 'DESC');
		return $this->db->get('produksi_detail')->result();
		
		// $this->db->select('*');
		// $this->db->from('produksi');
		// $this->db->join('barang', 'barang.id_barang = produksi.id_barang');
		// $query = $this->db->get();
		// return $query->result();
//		$this->db->join('comments', 'comments.id = blogs.id');
		//return $this->db->get($this->_table)->result();
	}
	public function getById($id){
		$this->db->select('produksi_detail.*, produksi.id_barang AS nama_barang, bahan.nama_bahan AS nama_bahan, bahan.warna AS warna');
		//$this->db->join('bahan', 'mailsystem.recipent = modtager.id AND mailsystem.sender = afsender.id', 'left');
		$this->db->join('produksi','produksi.no_produksi=produksi_detail.no_produksi','left');
		$this->db->join('bahan','bahan.id_bahan=produksi_detail.id_bahan','left');
	//$this->db->where('id_bd',$id);
	$this->db->order_by('id_pd', 'DESC');
	return $this->db->get_where('produksi_detail',['id_pd'=>$id,])->row();
	
		// return $this->db->get_where($this->_table, ["id_pd"=>$id,])->row();
	}
	public function save(){
		$this->load->helper('date');
		$post= $this->input->post();
	//	var_dump($post);
		$this->id_pd='';
		$this->no_produksi=$post['no_prod'];
		$this->id_bahan=$post['bahan'];
		$this->total_bahan=$post['total_bahan'];
		$this->created_at=date('Y-m-d H:i:s');
		$this->updated_at=date('Y-m-d H:i:s');
		
		$this->db->insert($this->_table,$this);
	}

	public function update(){
		//$this->load->helper('date');
		
		$post= $this->input->post();
		$this->id_pd=$post['id'];
		$this->no_produksi=$post['no_prod'];
		$this->id_bahan=$post['bahan'];
		$this->total_bahan=$post['total_bahan'];
		$this->created_at=date('Y-m-d H:i:s');
		$this->updated_at=date('Y-m-d H:i:s');
		$this->db->update($this->_table, $this, array('id_pd' => $post['id']));
  
	}

	public function delete($id){
		if($this->db->delete($this->_table, array("id_pd"=>$id))){
			return $this->db->error();
		};
	}

	function data($number,$offset){
		$this->db->select('produksi_detail.*, produksi.id_barang AS nama_barang, bahan.nama_bahan AS nama_bahan, bahan.warna AS warna');
		//$this->db->join('bahan', 'mailsystem.recipent = modtager.id AND mailsystem.sender = afsender.id', 'left');
		$this->db->join('produksi','produksi.no_produksi=produksi_detail.no_produksi','left');
		$this->db->join('bahan','bahan.id_bahan=produksi_detail.id_bahan','left');
		//$this->db->join('barang','barang.id_barang=produksi.id_barang','left');
		$this->db->order_by('id_pd', 'DESC');
		return $query = $this->db->get('produksi_detail',$number,$offset)->result();		
	}
 
	function jumlah_data(){
		return $this->db->get('produksi_detail')->num_rows();
	}

}
