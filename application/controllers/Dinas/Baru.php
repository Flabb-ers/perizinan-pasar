<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Baru extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_baru');

	 	if ($this->session->userdata('level')!=='Dinas') {
 		redirect('auth');
	 	}
	 }

	public function index()
	{
		$data = [ 
			'judul'=>'Data Baru',
			'subjudul'=>'Data Baru',
			'databaru'=>$this->M_baru->read()->result()
		];
		
		$this->template->load('pages/index','dinas/v_baru/read', $data); 
	}


	

 	public function proses($id)
	{	

		$data = [
		'datakios'=>$this->M_baru->tampilJoin()->result(),
		'databaru'=>$this->M_baru->print($id)->row()
 		];
 		$this->template->load('pages/index','dinas/v_baru/proses', $data); 
	}

	public function UpdateProses($id)
	{	

	 		$data = [
	 		'status'=> $this->input->post('status'),
	 		'keterangan'=> $this->input->post('keterangan'),
	 		];

	 		$this->M_baru->editData($id, $data);
	 		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Diubah</div>');
	 		redirect('dinas/baru/index');
	}

}




