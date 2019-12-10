<?php
class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('barang_model');
		$this->load->model('transaksi_root_model');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['listorder']=$this->transaksi_root_model->getCountOrder($this->session->userdata('id'));
		$data['barang']=$this->barang_model->getAll();
		$this->load->view('templates/depan/header',$data);
		$this->load->view('pembeli/utama',$data);
		$this->load->view('templates/depan/footer');
		// $this->load->view('templates/header');
		// $this->load->view('templates/aside');
		// $this->load->view('templates/content');
		// $this->load->view('templates/footer');

	}
	public function gallery(){
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/bread');
		$this->load->view('penjualan/listpenjualan');
		$this->load->view('templates/footer');

	}
	public function laporan_pdf(){
		$data = array(
			"dataku" => array(
				"nama" => "Petani Kode",
				"url" => "http://petanikode.com"
			)
		);
		// $pdf    = PDF::loadview('admin.laporan.laporan_account',compact('torder','dari','ke','corder'));
        // return $pdf->stream();  //('laporan-account-pdf-'.$dari.'/'.$ke.'.pdf');
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-petanikode.pdf";
		$this->pdf->load_view('laporan_pdf', $data);
		
	}

	public function generatepdf(){

        $this->load->helper('file');
        require_once(APPPATH.'third_party/dompdf/autoload.inc.php');

         $domdpf = new DOMPDF();
         $domdpf -> loadHtml('<h1>HELLO WORLD</h1>');
         $domdpf -> setPaper('A4','Landscape');
         $domdpf ->render();

         $domdpf->stream();


    }
}
