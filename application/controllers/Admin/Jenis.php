<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_jenis');

	 	if ($this->session->userdata('level')!=='Admin') {
 		redirect('Auth/index');
	 	}
	 }

	public function index()
	{	

		$data = [ 
			'dataselasar'=>$this->M_jenis->read()->result(),
		];
		
		$this->template->load('pages/index','Admin/v_jenis/read', $data); 
	}

	public function create()
	{

	 	if (isset($_POST['simpan'])) {

	 		$data = [
            'jenis_dagangan' => $this->input->post('jenis_dagangan'),
	 		];


	 		$this->M_jenis->addData($data);
	 		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Ditambahkan</div>');
	 		redirect('Admin/Jenis/index');
	 	}

 		$data = [
		'judul'=>'Data Jenis Dagangan',
		'subjudul'=>'Tambah Data Jenis Dagangan',
 		];
 		
 		$this->template->load('pages/index','Admin/v_jenis/create', $data); 
	}

	public function edit ($id)
	{	

		if (isset($_POST['edit'])) {

	 		$data = [
            'jenis_dagangan' => $this->input->post('jenis_dagangan'),
	 		];

	 		$this->M_jenis->editData($id, $data);
	 		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Diubah</div>');
	 		redirect('Admin/Jenis/index');
	 	}

		$data = [ 
			'judul'=>'Data Jenis Dagangan',
			'subjudul'=>'Tambah Data Jenis Dagangan',
			'datajenis'=>$this->M_jenis->tampilData($id)->row(),
		];
		
		$this->template->load('pages/index','Admin/v_jenis/edit', $data); 
	}


	public function hapus($id) 
	{

		$this->M_jenis->hapusData($id);
		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Dihapus</div>');
	 		redirect('Admin/Jenis/index');
	}
	
}
