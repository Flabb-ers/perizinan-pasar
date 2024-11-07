<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_op'); 

	 	if ($this->session->userdata('level')!=='Pasar') {
 		redirect('auth');
	 	}
	 }

	public function print()
	{
		$nama_pasar = $this->session->userdata('nama_pasar');
		$dataop= $this->M_op->tampilWherePasar($nama_pasar)->result();

		$data = [ 
			'dataop'=>$dataop,
		];

	 		$this->load->view('Pasar/v_notifikasi/print', $data); 
	}

}
