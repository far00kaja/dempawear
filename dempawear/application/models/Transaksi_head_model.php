<?php defined('BASEPATH') OR exit('no direct script allowed');

class Transaksi_head_model extends CI_Model{

	private $_table="transaksi_head";

	public $no_invoice;
	public $nama;
	public $tgl_transaksi;
	public $handled;
	public $status;
	public $alamat;
	public $no_telp;
	public $resi;
	public $confirm_by;
	public $pembayaran;
	public $bukti_transfer;
	public $jenis_pembelian;
	public $retur;
	public $created_at;
	//public $user_id;

	public function rules(){
		return [
			[
				'field' => 'tgl',
			'label'=>'tanggal',
			'rules'=>'required'
			],
			
		];
	}

	public function rule2(){
		return [
			['field'=>'nama',
		'label'=>'Nama',
		'rules'=>'required'],
		];
	}
	public function ruleUpload(){
		return [
			['field'=>'bukti',
		'label'=>'Bukti',
		'rules'=>'required'],
		];
	}

	public function getAll(){
		return $this->db->get($this->_table)->result();
	}
	public function getById($id){
		return $this->db->get_where($this->_table, ["no_invoice"=>$id,])->row();
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
		$this->load->helper('date');
//		$this->load->helper('date');
		$post= $this->input->post();
		$this->no_invoice='';
		$this->nama=$post['nama'];
		$this->tgl_transaksi= date('d-m-Y');//$post['warna'];
		$this->handled=$this->session->userdata()['id'];//$post['harga'];
		$this->pembayaran=$post['bayar'];
		$this->status='lunas';
		$this->jenis_pembelian=$post['jenis_pembelian'];
		$this->confirm_by=$this->session->userdata()['id'];
		$this->retur='tidak';
		$this->db->insert($this->_table,$this);
	}
	public function saveUser(){
		$this->load->helper('date');
//		$this->load->helper('date');
		$post= $this->input->post();
		$this->no_invoice='';
		$this->nama=$post['nama'];
		$this->tgl_transaksi= date('d-m-Y');//$post['warna'];
		$this->handled=$this->session->userdata()['id'];//$post['harga'];
		$this->pembayaran=$post['bayar'];
		$this->status='belum lunas';
		$this->alamat=$post['alamat'];
		$this->retur='tidak';
		$this->jenis_pembelian='online';//$post['jenis_pembelian'];
		$this->confirm_by='';
		$this->db->insert($this->_table,$this);
	}
	public function getHistory($user){
		return $this->db->get_where($this->_table, ["handled"=>$user,])->result();
	
	}
	public function getBelumLunas(){
		return $this->db->get_where($this->_table, ["status"=>'belum lunas',])->result();
	
	}
	public function getLunas(){
		return $this->db->get_where($this->_table, ["status"=>'lunas',])->result();
	
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

	public function updateOffline(){
		//$this->load->helper('date');
		
		$post= $this->input->post();
		$this->no_invoice=$post['id'];
		$this->nama=$post['nama'];
		$this->tgl_transaksi=$post['tgl'];
		$this->handled=$post['handled'];//$this->session->userdata()['id'];//$post['harga'];
		$this->confirm_by=$this->session->userdata()['id'];//$post['harga'];
		$this->status=$post['status'];
		$this->alamat=$post['alamat'];
		$this->no_telp=$post['notelp'];
		$this->resi=$post['resi'];
		$this->pembayaran=$post['bayar'];
		$this->bukti_transfer=$post['bukti'];
		$this->jenis_pembelian=$post['jenis_pembelian'];
		$this->retur=$post['retur'];
		$this->db->update($this->_table, $this, array('no_invoice' => $post['id']));
  
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

	public function getLast(){
		$query = $this->db->query("SELECT * FROM transaksi_head ORDER BY created_at DESC LIMIT 1");
		$result = $query->row();//->count_diabetic;
		return $result;
	}

	public function upBukti(){
		$post=$this->input->post();
		$update_data=array("bukti_transfer"=>$this->_uploadImage());
		$condi=array("no_invoice"=>$post['id']);
		$this->db->where($condi);
		$this->db->update("transaksi_head",$update_data);
		
  
	}
	private function _uploadImage(){
		//$nama=
		$config['upload_path']='./assets/images/bukti/';
		$config['allowed_types']='jpg|jpeg|png';
		$config['file_name']=$this->nama.(random_string('alnum',10));
		$config['overwrite']=true;
		$config['max_size']= 2048;

		$this->load->library('upload',$config);
		$this->upload->initialize($config);
			if ($this->upload->do_upload('bukti')){
				return $this->upload->data('file_name');
			}
		return 'default.jpg';//$this->upload->data('gambar1');//"default.jpg";

	}
	private function _deleteImage($id)
	{
		$barang = $this->getById($id);
		if (!empty($barang)){
		if ($barang->gambar3 != "default.jpg") {
			$filename3 = explode(".", $barang->gambar3)[0];
			array_map('unlink', glob(FCPATH."./assets/images/barang/$filename3.*"));
			//if(file_exists('assets/images/barang/'."$filename3.*") == TRUE){
			//}else{
			//	return true;
			}
		}
	}

}
