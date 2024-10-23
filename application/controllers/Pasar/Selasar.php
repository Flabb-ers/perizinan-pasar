<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Selasar extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_selasar');
	 	$this->load->model('M_op');

	 	if ($this->session->userdata('level')!=='Pasar') {
 		redirect('auth');
	 	}
	 }

	public function index()
	{	

		$nama_pasar = $this->session->userdata('nama_pasar');
		$dataselasar= $this->M_selasar->read($nama_pasar)->result();
		$dataop= $this->M_op->tampilWherePasar($nama_pasar)->result();

		$data = [ 
			'dataselasar'=>$dataselasar,
			'dataop'=>$dataop,
		];
		
		$this->template->load('pages/index','Pasar/v_selasar/read', $data); 
	}

	public function create()
	{

	 	if (isset($_POST['simpan'])) {

	 		$data = [
	 		'id_pasar' => $this->input->post('id_pasar'),
            'id_tarif' => $this->input->post('id_tarif'),
            'id_jenis' => $this->input->post('id_jenis'),
            'nama' => $this->input->post('nama'),
            'nik' => $this->input->post('nik'),
            'alamat' => $this->input->post('alamat'),
            'panjang' => $this->input->post('panjang'),
            'lebar' => $this->input->post('lebar'),

	 		];


	 		$this->M_selasar->addData($data);
	 		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Ditambahkan</div>');
	 		redirect('Pasar/Selasar/index');
	 	}


	 	$nama_pasar = $this->session->userdata('nama_pasar');
		$datapasar = $this->M_selasar->tampilJoinwhere3($nama_pasar)->result();

 		$data = [
		'datapasar'=>$datapasar,
		'datatarif'=>$this->M_selasar->tampilTarif()->result(),
		'datajenis'=>$this->M_selasar->tampilJenis()->result(),
 		];
 		
 		$this->template->load('pages/index','Pasar/v_selasar/create', $data); 
	}

	public function edit ($id)
	{	

		if (isset($_POST['edit'])) {

	 		$data = [
	 		'id_pasar' => $this->input->post('id_pasar'),
            'id_tarif' => $this->input->post('id_tarif'),
            'id_jenis' => $this->input->post('id_jenis'),
            'nama' => $this->input->post('nama'),
            'nik' => $this->input->post('nik'),
            'alamat' => $this->input->post('alamat'),
            'panjang' => $this->input->post('panjang'),
            'lebar' => $this->input->post('lebar'),
	 		];

	 		$this->M_selasar->editData($id, $data);
	 		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Diubah</div>');
	 		redirect('Pasar/Selasar/index');
	 	}

	 	$nama_pasar = $this->session->userdata('nama_pasar');
		$datapasar = $this->M_selasar->tampilJoinwhere3($nama_pasar)->result();
		$dataop= $this->M_op->tampilWherePasar($nama_pasar)->result();

		$data = [ 
			'dataselasar'=>$this->M_selasar->tampilData($id)->row(),
			'datapasar'=>$datapasar,
			'datatarif'=>$this->M_selasar->tampilTarif()->result(),
			'datajenis'=>$this->M_selasar->tampilJenis()->result(),
			'dataop'=>$dataop,
		];
		
		$this->template->load('pages/index','Pasar/v_selasar/edit', $data); 
	}


	public function hapus($id) 
	{

		$this->M_selasar->hapusData($id);
		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Dihapus</div>');
	 		redirect('Pasar/Selasar/index');
	}
	
}
