<?php defined('BASEPATH') OR exit('no direct script allowed');

class Barang_model extends CI_Model{

	private $_table="barang";

	public $id_barang;
	public $id_catalog;
	public $kode_kategori;
	public $nama;
	public $artikel;
	//public $size;
	public $harga_satuan;
	public $gambar1;
	public $gambar2='produk2.jpg';
	public $gambar3='produk3.jpg';
	public $created;
	public $updated;

	public function rules(){
		return [
			[
				'field' => 'nama',
			'label'=>'Nama',
			'rules'=>'required'
			],
			[	'field' => 'harga',
			'label'=>'Harga', 
			'rules'=>'numeric',
			],
			
		];
	}

	public function getAll(){
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('catalog', 'catalog.id_catalog = barang.id_catalog');
		$this->db->join('kategori', 'kategori.kode_kategori = barang.kode_kategori');
		$this->db->order_by('id_barang','desc');
		$query = $this->db->get();
		return $query->result();
//		return $this->db->get($this->_table)->result();
	}
	public function getById($id){
		return $this->db->get_where($this->_table, ["id_barang"=>$id,])->row();
	}
	public function save(){
		$this->load->helper('date');
		$post= $this->input->post();
		$this->id_barang='';
		$this->id_catalog=$post['catalog'];
		$this->kode_kategori=$post['kategori'];
		$this->nama=$post['nama'];
		$this->gambar1=$this->_uploadImage('1');
		$this->gambar2=$this->_uploadImage('2');
		$this->gambar3=$this->_uploadImage('3');
		$this->artikel=$post['artikel'];
	//	$this->size=$post['size'];
		$this->harga_satuan=$post['harga'];
		$this->created=now();
		$this->updated='';
		$this->db->insert($this->_table,$this);
	}

	public function update(){
		$this->load->helper('date');
		
		$post= $this->input->post();
		$this->id_barang=$post['id'];
		$this->id_catalog=$post['catalog'];
		$this->kode_kategori=$post['kategori'];
		$this->nama=$post['nama'];
		$this->artikel=$post['artikel'];
	//	$this->size=$post['size'];
		$this->harga_satuan=$post['harga'];

		if(!EMPTY($_FILES['gambar1']['name'])){
			$this->gambar1=$this->_uploadImage(1);
		}else{
			$this->gambar1= $post['old_image1'];
		}
		
		if(!EMPTY($_FILES['gambar2']['name'])){
			$this->gambar2=$this->_uploadImage(2);
		}else{
			$this->gambar2= $post['old_image2'];
		}
		
		if(!EMPTY($_FILES['gambar3']['name'])){
			$this->gambar3=$this->_uploadImage(3);
		}else{
			$this->gambar3= $post['old_image3'];
		}
		
		$this->updated=now();
		$this->db->update($this->_table, $this, array('id_barang' => $post['id']));
  
	}

	public function delete($id){
		$this->_deleteImage($id);
		return $this->db->delete($this->_table, array("id_barang"=>$id));
	}

	private function _uploadImage($ind){
	//	$nama=
		$config['upload_path']='./assets/images/barang/';
		$config['allowed_types']='jpg|jpeg|png';
		$config['file_name']=$this->nama.(random_string('alnum',10));
		$config['overwrite']=true;
		$config['max_size']= 2048;

		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		if ($ind=='2'){
			if ($this->upload->do_upload('gambar1')){
				return $this->upload->data('file_name');
			}
		}elseif ($ind=='1'){
			if ($this->upload->do_upload('gambar2')){
				return $this->upload->data('file_name');
			}
		}else{
			if ($this->upload->do_upload('gambar3')){
				return $this->upload->data('file_name');
			}
		}
		return 'default.jpg';//$this->upload->data('gambar1');//"default.jpg";

	}
	private function _deleteImage($id)
{
    $barang = $this->getById($id);
	if (!empty($barang)){
    if ($barang->gambar3 != "default.jpg") {
		$filename3 = explode(".", $barang->gambar3)[0];
		$filename2 = explode(".", $barang->gambar2)[0];
		$filename1 = explode(".", $barang->gambar1)[0];
		array_map('unlink', glob(FCPATH."./assets/images/barang/$filename3.*"));
		array_map('unlink', glob(FCPATH."./assets/images/barang/$filename2.*"));
		array_map('unlink', glob(FCPATH."./assets/images/barang/$filename1.*"));
		//if(file_exists('assets/images/barang/'."$filename3.*") == TRUE){
		//}else{
		//	return true;
		}
	}
}

}
