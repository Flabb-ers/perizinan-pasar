<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kios_takhuni extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_kios');
	 	$this->load->model('M_pasar');
	 	$this->load->model('M_tarif');
	 	$this->load->model('M_op');

	 	if ($this->session->userdata('level')!=='Pasar') {
 		redirect('Auth/index');
	 	}
	 }

	public function index()
	{	
		$nama_pasar = $this->session->userdata('nama_pasar');
		$no_kioslos= $this->input->get('no_kioslos');

		$datakios= $this->M_kios->tampilJoinKiosTakHuniLevelPasar($nama_pasar)->result();
		$dataop= $this->M_op->tampilWherePasar($nama_pasar)->result();
		
		$data = [ 
			'judul'=>'Data Kios',
			'subjudul'=>'Data Kios',
			'datakios'=>$datakios,
			'dataop'=>$dataop,
		];
		
		$this->template->load('pages/index','Pasar/v_kios_takhuni/read', $data); 
	}
	

}
