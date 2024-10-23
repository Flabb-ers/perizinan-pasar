<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function __construct()
	{
 		parent::__construct();
	 	$this->load->model('M_auth');

	 	if ($this->session->userdata('level')!=='Kdinas') {
	 		redirect('auth');
	 	}
	}

	public function index()
	{
		$data = [ 
			'judul'=>'Dashboard',
			'subjudul'=>'Dashboard'
		];
		
		$this->template->load('pages/index','Kdinas/v_home', $data); 
	}


}
