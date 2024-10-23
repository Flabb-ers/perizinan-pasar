<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kios extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_kios');
	 	$this->load->model('M_op');

	 	if ($this->session->userdata('level')!=='Pasar') {
 		redirect('auth');
	 	}
	 }

	public function index()
	{	

		$nama_pasar = $this->session->userdata('nama_pasar');
		$datakios= $this->M_kios->tampilJoinwhere2($nama_pasar)->result();
		$dataop= $this->M_op->tampilWherePasar($nama_pasar)->result();

		$data = [ 
			'judul'=>'Data Kios',
			'subjudul'=>'Data Kios',
			'datakios'=>$datakios,
			'dataop'=>$dataop,
		];
		
		$this->template->load('pages/index','Pasar/v_kios/read', $data); 
	}

	
	
}
