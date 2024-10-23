<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function __construct()
	{
 		parent::__construct();
	 	$this->load->model('M_auth');
	 	$this->load->model('M_pegawai');
	 	$this->load->model('M_kios');
	 	$this->load->model('M_op');

	 	if ($this->session->userdata('level')!=='Pasar') {
 		redirect('auth');
	 	}
	}

		public function index()
	{	
		
		$data = [ 
			'datapegawai'=>$this->M_pegawai->tampilJoin()->result(),
			'datakios'=>$this->M_kios->tampilJoin(),
			'dataop'=>$this->M_pegawai->ambilOp()->result(),

		];
		
		$this->template->load('pages/index','pasar/v_home', $data); 
	
	}

}
