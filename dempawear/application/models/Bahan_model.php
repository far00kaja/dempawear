<?php defined('BASEPATH') OR exit('no direct script allowed');

class Bahan_model extends CI_Model{

	private $_table="bahan";

	public $id_bahan;
	public $nama_bahan;
	public $warna;
	public $harga;
	public $jumlah;

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
		return $this->db->get_where($this->_table, ["id_bahan"=>$id,])->row();
	}
	public function updateJumlah($bahan,$jumlah,$kurang){
	//	$post=$this->input->post;
		$this->db->where('id_bahan',$bahan);
		$this->db->set('jumlah', 'jumlah'.'-'.$kurang.'+'.$jumlah,FALSE);
		//$this->db->where('id_bahan', $post['bahan']);
		//$this->db->update('bahan');//->get();
//		$this->jumlah=$this-jumlah
		$this->db->update('bahan');//, $this, array('id_bahan' => $post['bahan']));
		
		//return $this->db->row();
	}

	public function save(){
//		$this->load->helper('date');
		$post= $this->input->post();
		$this->id_bahan='';
		$this->nama_bahan=$post['nama'];
		$this->warna=$post['warna'];
		$this->harga=$post['harga'];
		$this->jumlah=$post['jumlah'];
		$this->db->insert($this->_table,$this);
	}

	public function update(){
		//$this->load->helper('date');
		
		$post= $this->input->post();
		$this->id_bahan=$post['id'];
		$this->nama_bahan=$post['nama'];
		$this->warna=$post['warna'];
		$this->harga=$post['harga'];
		$this->jumlah=$post['jumlah'];
		$this->db->update($this->_table, $this, array('id_bahan' => $post['id']));
  
	}

	public function delete($id){
		if($this->db->delete($this->_table, array("id_bahan"=>$id))){
			return $this->db->error();
		};
	}

	public function penguranganBahan($id,$kurang){
	//	var_dump($kurang);
		$this->db->where('id_bahan',$id);
		$this->db->set('jumlah', 'jumlah'.'-'.$kurang, FALSE);//.'+'.$jumlah,FALSE);
		$this->db->update('bahan');//, $this, array('id_bahan' => $post['bahan']));
	}

}
