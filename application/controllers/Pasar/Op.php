<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Op extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_op');
	 	$this->load->model('M_baru');

	 	if ($this->session->userdata('level')!=='Pasar') {
 		redirect('auth');
	 	}
	 }

	public function index()
	{	
		$nama_pasar = $this->session->userdata('nama_pasar');
		$dataop= $this->M_op->tampilWherePasar($nama_pasar)->result();

		
		$data = [ 
			'judul'=>'Data Op',
			'subjudul'=>'Data Op',
			'dataop'=>$dataop,
		];
		
		$this->template->load('pages/index','pasar/v_op/read', $data); 
	}
}
