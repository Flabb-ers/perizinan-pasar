<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_op');
	 	$this->load->model('M_baru');

	 	if ($this->session->userdata('level')!=='Kdinas') {
 		redirect('auth');
	 	}
	 }

	public function index()
	{
		$dataop= $this->M_op->tampilJoin2()->result();
		$data = [ 
			'judul'=>'Data Op',
			'subjudul'=>'Data Op',
			'dataop'=>$dataop,
		];
		
		$this->template->load('pages/index','Kdinas/v_baru/read', $data); 
	}
	

 	public function generate($id)
	{		
		if (isset($_POST['simpan'])) {
			$this->load->library('ciqrcode'); //pemanggilan library QR CODE
	 
	        $config['cacheable']    = true; //boolean, the default is true
	        $config['cachedir']     = './assets/'; //string, the default is application/cache/
	        $config['errorlog']     = './assets/'; //string, the default is application/logs/
	        $config['imagedir']     = '/assets/images/'; //direktori penyimpanan qr code
	        $config['quality']      = true; //boolean, the default is true
	        $config['size']         = '1024'; //interger, the default is 1024
	        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
	        $config['white']        = array(70,130,180); // array, default is array(0,0,0)

	        $nama =$this->input->post('nama');
	        $npwrd =$this->input->post('npwrd');
	        $nama_pasar =$this->input->post('nama_pasar');
	        $tanggal =$this->input->post('tgl_daftar');

	        $data = "$nama, $npwrd, $nama_pasar, $tanggal";
	        $this->ciqrcode->initialize($config);

	 		$image_name=$this->input->post('nama').'.png';
	 
	        $params['data'] = $data; //data yang akan di jadikan QR CODE
	        $params['level'] = 'H'; //H=High
	        $params['size'] = 10;
	        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
	        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

	        $data = [
	        	'id_pengajuan'=> $this->input->post('id_pengajuan'),
	 			'npwrd'=> $this->input->post('npwrd'),
	 			'nama'=> $this->input->post('nama'),
	 			'alamat'=> $this->input->post('alamat'),
	 			'nama_pasar'=> $this->input->post('nama_pasar'),
	 			'nama_blok'=> $this->input->post('nama_blok'),
	 			'no_blok'=> $this->input->post('no_blok'),
	 			'tgl_daftar'=> $this->input->post('tgl_daftar'),
	 			'batas_berlaku'=> $this->input->post('batas_berlaku'),
	 			'qrcode'=> $image_name,
	 		];

	 		$data_pengajuan = array(
            'status' => 'Selesai',
        	);

	 		$id_pengajuan = $this->input->post('id_pengajuan');
	        
	        $this->M_baru->editData($id_pengajuan, $data_pengajuan);

	 		$this->M_op->editData($id, $data);
	 		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Diubah</div>');
	 		redirect('Kdinas/Pengajuan/index');
	 	}

		$data = [ 
			'judul'=>'Data Op',
			'subjudul'=>'Edit Data Op',
			'dataop'=>$this->M_op->tampilData2($id)->row(),
			'datapasar'=>$this->M_op->tampilJoin()->result(),
		];
		
		$this->template->load('pages/index','Kdinas/v_baru/proses', $data); 
	}
}




