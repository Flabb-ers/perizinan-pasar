<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Op extends CI_Controller {

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

		$dataop= $this->M_op->getActiveOP()->result();

		
		$data = [ 
			'judul'=>'Data Op',
			'subjudul'=>'Data Op',
			'dataop'=>$dataop,
		];
		
		$this->template->load('pages/index','Kdinas/v_op/read', $data); 
	}

}
