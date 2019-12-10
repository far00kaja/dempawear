<?php defined('BASEPATH') OR exit('no direct script allowed');

class Transaksi_root_model extends CI_Model{

	private $_table="transaksi_root";

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
				'field' => 'barang',
			'label'=>'Barang',
			'rules'=>'required'
			],
			
		];
	}

		public function addChart(){
		//$this->load->helper('date');
		$post= $this->input->post();
		$this->td_invoice='';
		$this->no_invoice=0;
		$this->id_barang=$post['barang'];
	   $this->size=$post['size'];
		//$this->warna=$post['warna'];
		$this->jumlah=$post['jumlah'];
		$this->diskon='';//$post['diskon'];
		$this->tipe_diskon='';//$post['tipe_diskon'];
		$this->handled_by=$this->session->userdata()['id'];
		$this->db->insert($this->_table,$this);
	}
	public function getAll(){
		$this->db->select('transaksi_root.*, barang.nama AS nama, barang.harga_satuan AS harga');
		//$this->db->join('bahan', 'mailsystem.recipent = modtager.id AND mailsystem.sender = afsender.id', 'left');
		$this->db->join('barang','barang.id_barang=transaksi_root.id_barang','left');
		// $this->db->join('supplier','supplier.id_supp=bahan_detail.id_supp','left');
		$this->db->order_by('td_invoice', 'DESC');
		return $this->db->get('transaksi_root')->result();
		//return $this->db->get($this->_table)->result();
	}
	public function getById($id){
		return $this->db->get_where($this->_table, ["td_invoice"=>$id,])->row();
	}
	

	public function save(){
//		$this->load->helper('date');
		$post= $this->input->post();
		$this->td_invoice='';
		$this->no_invoice='';
		$this->id_barang=$post['barang'];
		$this->size=$post['size'];
		$this->jumlah=$post['jumlah']; 
		$this->diskon=$post['diskon'];
		$this->tipe_diskon=$post['sdiskon'];
		$this->handled_by=$this->session->userdata()['id'];
		$this->db->insert($this->_table,$this);
	}

	// public function update(){
	// 	//$this->load->helper('date');
		
	// 	$post= $this->input->post();
	// 	$this->id_bahan=$post['id'];
	// 	$this->nama_bahan=$post['nama'];
	// 	$this->warna=$post['warna'];
	// 	$this->harga=$post['harga'];
	// 	$this->jumlah=$post['jumlah'];
	// 	$this->db->update($this->_table, $this, array('id_bahan' => $post['id']));
  
	// }

	public function delete($id){
		if($this->db->delete($this->_table, array("td_invoice"=>$id))){
			return $this->db->error();
		};
	}

	public function penguranganBahan($id,$kurang){
	//	var_dump($kurang);
		$this->db->where('id_bahan',$id);
		$this->db->set('jumlah', 'jumlah'.'-'.$kurang, FALSE);//.'+'.$jumlah,FALSE);
		$this->db->update('bahan');//, $this, array('id_bahan' => $post['bahan']));
	}
	public function getByUser($id){
		$this->db->select('transaksi_root.*, barang.nama AS nama, barang.gambar1 as gambar, barang.harga_satuan AS harga, users.name As handle');
		$this->db->join('barang','barang.id_barang=transaksi_root.id_barang','left');
		$this->db->join('users','users.id=transaksi_root.handled_by','left');
		$this->db->order_by('td_invoice', 'DESC');		
		$query= $this->db->get_where($this->_table, ["handled_by"=>$id,"no_invoice"=>0])->result();//->get();
		return $query;
	}
	public function getCountOrder($id){
		//function jumlah_data(){
			return $this->db->get_where('transaksi_root',["handled_by"=>$id,"no_invoice"=>0])->num_rows();
		//}
	}

	public function updateInvoice($last){
		
	//	var_dump($last);
		//echo "<br>wow=".$last->no_invoice;
	//	$this->db->where('handled',$this->session->userdata()['id']);
		$this->db->set('no_invoice',$last->no_invoice);
		$this->db->where('handled_by',$last->handled);
		$this->db->where('no_invoice','0');
		$this->db->update('transaksi_root');//($this->_table, $this, ['handled_by' => $last->handled,'no_invoice'=>'0']);
  
	}

	

	
}
