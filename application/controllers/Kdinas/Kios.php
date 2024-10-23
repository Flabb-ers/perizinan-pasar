<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kios extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_kios');
	 	$this->load->model('M_pasar');
	 	$this->load->model('M_tarif');

	 	if ($this->session->userdata('level')!=='Kdinas') {
 		redirect('Auth/index');
	 	}
	 }

	public function index()
	{	
		$no_kioslos= $this->input->get('no_kioslos');
		$nama_pasar= $this->input->get('nama_pasar');

		$datakios= $this->M_kios->tampilJoin()->result();
		
		$data = [ 
			'judul'=>'Data Kios',
			'subjudul'=>'Data Kios',
			'datakios'=>$datakios,
		];
		
		$this->template->load('pages/index','Kdinas/v_kios/read', $data); 
	}

}
