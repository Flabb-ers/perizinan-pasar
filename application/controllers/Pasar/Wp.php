<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wp extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_wp');
	 	$this->load->model('M_baru');
	 	$this->load->model('M_op');

	 	if ($this->session->userdata('level')!=='Pasar') {
 		redirect('auth');
	 	}
	 }

	public function index()
	{	
		$nama_pasar = $this->session->userdata('nama_pasar');
		$datawp= $this->M_wp->tampilJoinwhere($nama_pasar)->result();
		$dataop= $this->M_op->tampilWherePasar($nama_pasar)->result();

		$data = [ 
			'judul'=>'Data Wajib Pajak',
			'subjudul'=>'Data Wajib Pajak',
			'datawp'=>$datawp,
			'dataop'=>$dataop,
		];
		
		$this->template->load('pages/index','pasar/v_wp/read', $data); 
	}
 
}
