<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_op');
	 	$this->load->model('M_baru');
	 	$this->load->model('M_kios');
	 	$this->load->model('M_jenis');

	 	if ($this->session->userdata('level')!=='Pasar') {
 		redirect('Auth/index');
	 	}
	 }

	public function index()
	{	
		$nama_pasar = $this->session->userdata('nama_pasar');
		$dataop= $this->M_op->getNonActiveOPLevelPasar($nama_pasar)->result();

		
		$data = [ 
			'judul'=>'Data Riwayat OP',
			'subjudul'=>'Data Riwayat OP',
			'dataop'=>$dataop,
		];
		
		$this->template->load('pages/index','Pasar/v_riwayat/read', $data); 
	}


}
