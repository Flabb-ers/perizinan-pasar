<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kios_takhuni extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_kios');
	 	$this->load->model('M_pasar');
	 	$this->load->model('M_tarif');

	 	if ($this->session->userdata('level')!=='Dinas') {
 		redirect('Auth/index');
	 	}
	 }

	public function index()
	{	
		$no_kioslos= $this->input->get('no_kioslos');
		$nama_pasar= $this->input->get('nama_pasar');

		$datakios= $this->M_kios->tampilJoinKiosTakHuni()->result();
		$pasar= $this->M_pasar->pasarAll();
		
		$data = [ 
			'judul'=>'Data Kios',
			'subjudul'=>'Data Kios',
			'datakios'=>$datakios,
			'allPasars'=>$pasar
		];
		
		$this->template->load('pages/index','dinas/v_kios_takhuni/read', $data); 
	}
	

}
