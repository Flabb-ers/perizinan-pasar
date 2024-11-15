<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Objek extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_objek');

	 	if ($this->session->userdata('level')!=='Kdinas') {
 		redirect('Auth/index');
	 	}
	 }

	public function index()
	{	

		$dataObjek= $this->M_objek->read()->result();
		$data = [ 
			'judul'=>'Data Objek',
			'subjudul'=>'Data Objek',
			'dataop'=>$dataObjek,
		];
		
		$this->template->load('pages/index','Kdinas/v_Objek/read', $data); 
	}
    public function detail($id)
	{	

		$data = [ 
			'judul'=>'Data Objek',
			'subjudul'=>'Data Objek',
			'dataop'=>$this->M_objek->tampilDetail($id)->result(),
			'dataobjek'=>$this->M_objek->tampilObjek($id)->row(),
		];
		
		$this->template->load('pages/index','Kdinas/v_objek/detail', $data); 
	}
}