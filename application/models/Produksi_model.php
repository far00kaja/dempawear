<?php defined('BASEPATH') OR exit('no direct script allowed');

class Produksi_model extends CI_Model{

	private $_table="produksi";
	public $no_produksi;
	public $total_produksi;
	public $size;
	public $id_barang;
	public $id_bahan;
	public $total_bahan;

	public function rules(){
		return [
			[
				'field' => 'size',
			'label'=>'Size',
			'rules'=>'required'
			],
			
		];
	} 

	public function getAllSize($barang){
		$this->db->select('produksi.*, barang.nama AS nama_barang');
		$this->db->join('barang','barang.id_barang=produksi.id_barang','left');
		//$this->db->join('supplier','supplier.id_supp=bahan_detail.id_supp','left');
		//$this->db->order_by('no_produksi', 'DESC');
		return $this->db->get_where('produksi',['produksi.id_barang'=>$barang,])->result();
		
	}
 
	public function getAll(){
		$this->db->select('*');
		$this->db->from('produksi');
		$this->db->join('barang', 'barang.id_barang = produksi.id_barang');
		$query = $this->db->get();
		return $query->result();
//		$this->db->join('comments', 'comments.id = blogs.id');
		//return $this->db->get($this->_table)->result();
	}
	public function getById($id){
		$this->db->select('produksi.*, barang.nama AS nama_barang');
		$this->db->join('barang','barang.id_barang=produksi.id_barang','left');
		//$this->db->join('supplier','supplier.id_supp=bahan_detail.id_supp','left');
		$this->db->order_by('no_produksi', 'DESC');
		return $this->db->get_where('produksi',['no_produksi'=>$id,])->row();
	
	//	return $this->db->get_where($this->_table, ["no_produksi"=>$id,])->row();
	}

	public function updateJumlah($barang,$size,$jumlah,$kurang){
			$this->db->where('id_barang',$barang);
			$this->db->where('size',$size);			
			$this->db->set('total_produksi', 'total_produksi'.'-'.$kurang.'+'.$jumlah,FALSE);
			$query=$this->db->update('produksi');
			return $query;
		}
	public function cekBarang($id,$ukuran){
		$this->db->select('*');
		$this->db->where('id_barang',$id);
		$this->db->where('size',$ukuran);
		$query=	$this->db->get('produksi');
	return $query->row();
		//$this->db->select('produksi.*, barang.nama AS nama_barang');
		//$this->db->join('barang','barang.id_barang=produksi.id_barang','left');
		//$this->db->join('supplier','supplier.id_supp=bahan_detail.id_supp','left');
	//	$this->db->order_by('no_produksi', 'DESC');
		//return $this->db->get_where('produksi',['no_produksi'=>$id,])->row();
	
	//	return $this->db->get_where($this->_table, ["no_produksi"=>$id,])->row();
	}


	public function save(){
//		$this->load->helper('date');
		$post= $this->input->post();
		$this->no_produksi='';
		$this->total_produksi=$post['total_produksi'];
		$this->size=$post['size'];
		$this->id_barang=$post['barang'];
		$this->id_bahan=$post['bahan'];
		$this->total_bahan=$post['total_bahan'];
		$this->db->insert($this->_table,$this);
	}

	public function update(){
		//$this->load->helper('date');
		
		$post= $this->input->post();
		$this->no_produksi=$post['id'];
		$this->total_produksi=$post['total_produksi'];
		$this->size=$post['size'];
		$this->id_barang=$post['barang'];
		$this->db->update($this->_table, $this, array('no_produksi' => $post['id']));
  
	}

	public function delete($id){
		if($this->db->delete($this->_table, array("no_produksi"=>$id))){
			return $this->db->error();
		};
	}

}
