<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	
	public function __construct()
	{
 		parent::__construct();
	 	$this->load->model('M_auth');
	 	$this->load->model('M_pegawai');



 		if ($this->session->userdata('is_active')!==1) {
 		redirect('Auth/index');
	 	}
	}

		public function index()
	{
		$data = [ 
		'datapegawai'=>$this->db->get_where('tbl_pegawai',['username' => $this->session->userdata('username')])->row_array(),
		];
		
		$this->template->load('pages/index','v_profile', $data); 
	
	}

	public function editprofile ()
	{	
		$data = [ 
			'datapegawai'=>$this->db->get_where('tbl_pegawai', ['username' => $this->session->userdata('username')])->row_array(),
		];

		$this->template->load('pages/index','admin/v_pegawai/editprofile', $data); 
		
	}

	public function updateprofile()
	{

		$id = $this->input->post('username');
		$nama_pegawai = $this->input->post('nama_pegawai');
		// $pass = $this->input->post('pass');


		$this->M_pegawai->updateprofile($id, $nama_pegawai );
		redirect ('Admin/Profile/');
	}

}
