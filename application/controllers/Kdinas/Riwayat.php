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

	 	if ($this->session->userdata('level')!=='Kdinas') {
 		redirect('Auth/index');
	 	}
	 }

	public function index()
	{	

		$dataop= $this->M_op->getNonActiveOP()->result();

		
		$data = [ 
			'judul'=>'Data Riwayat OP',
			'subjudul'=>'Data Riwayat OP',
			'dataop'=>$dataop,
		];
		
		$this->template->load('pages/index','Kdinas/v_riwayat/read', $data); 
	}


}
