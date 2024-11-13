<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kios extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_kios');
	 	$this->load->model('M_pasar');

	 	if ($this->session->userdata('level')!=='Dinas') {
 		redirect('auth');
	 	}
	 }

	public function index()
	{	

		$datakios= $this->M_kios->tampilJoin()->result();
		$pasar= $this->M_pasar->pasarAll();
		
		$data = [ 
			'judul'=>'Data Kios',
			'subjudul'=>'Data Kios',
			'datakios'=>$datakios,
			'allPasars'=>$pasar
		];
		
		$this->template->load('pages/index','dinas/v_kios/read', $data); 
	}

}