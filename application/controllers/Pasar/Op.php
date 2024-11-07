<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Op extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_op');
	 	$this->load->model('M_objek');
	 	$this->load->model('M_baru');

	 	if ($this->session->userdata('level')!=='Pasar') {
 		redirect('auth');
	 	}
	 }

	public function index()
	{	
		{	
			$id_pasar = $this->session->userdata('id_pasar');
			$dataop = $this->M_objek->readForPasar($id_pasar);
		
			$data = [ 
				'judul' => 'Data Op',
				'subjudul' => 'Data Op',
				'dataop' => $dataop->result(),
			];
		
			$this->template->load('pages/index', 'pasar/v_op/read', $data); 
		}
	}

	public function detail($id)
	{	

		$data = [ 
			'judul'=>'Data Objek',
			'subjudul'=>'Data Objek',
			'dataop'=>$this->M_objek->tampilDetail($id)->result(),
			// 'dataobjek'=>$this->M_objek->tampilObjek($id)->row(),
		];
		
		$this->template->load('pages/index','Pasar/v_objek/detail', $data); 
	}
}
