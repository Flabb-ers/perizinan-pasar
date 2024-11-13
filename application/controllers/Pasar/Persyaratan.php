<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persyaratan extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_baru');
	 	$this->load->model('M_op');

	 	
	 	if ($this->session->userdata('level')!=='Pasar') {
 		redirect('auth');
 		}
	 	
	 }

	public function index()
	{	
		$nama_pasar = $this->session->userdata('nama_pasar');
		$databaru = $this->M_baru->tampilJoinwhere3($nama_pasar)->result();
		$datakios= $this->M_baru->tampilKios2($nama_pasar)->result();
		$dataop= $this->M_op->tampilWherePasar($nama_pasar)->result();

		$dataOP= $this->M_baru->tampilObjekPajak2($nama_pasar);

		$availeble_kios = $this->M_baru->get_available_kios2($dataOP, $nama_pasar);

		$data = [ 
			'databaru'=>$databaru,
			'datakios'=>$availeble_kios,
			'dataop'=>$dataop,
			'datajenis'=>$this->M_baru->tampilJenis()->result(),

		];
		$this->template->load('pages/index','pasar/v_persyaratan/read', $data); 
	}

	public function create()
	{
	 	if (isset($_POST['simpan'])) {

	            $tanggal = date('Y-m-d');
		 		$batas_berlaku = date('Y-m-d', strtotime('+2 years',strtotime($tanggal)));

		 		$data = [
		 			'id_kios'=> $this->input->post('id_kios'),
		 			'id_jenis'=> $this->input->post('id_jenis'),
		 			'nama'=> $this->input->post('nama'),
		 			'nik'=> $this->input->post('nik'),
		 			'alamat'=> $this->input->post('alamat'),
		 			'pekerjaan'=>'Pedagang',
		 			'no_telp'=> $this->input->post('no_telp'),
		 			'email'=> $this->input->post('email'),
		 			'tanggal'=> $tanggal,
		 			'status_npwrd' => $this->input->post('status_npwrd'),
            		'npwrd' => $this->input->post('npwrd'),
            		'jenis_pengajuan' => 'Baru',
		 			'status_op' => 'Belum',
		 			'status' => 'Proses',
		 			'keterangan' => ''
		 		];
	 			$this->M_baru->addData($data);
	 			$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Ditambahkan</div>');
	 			redirect('Pasar/Persyaratan/index');
	 			
	 		
	 	} 	

	 	$nama_pasar = $this->session->userdata('nama_pasar');
		$datakios= $this->M_baru->tampilJoinwhere($nama_pasar)->result();
		$databaru= $this->M_baru->tampilJoinwhere3($nama_pasar)->result();


 		$data = [
 		'judul'=>'Data Baru',
		'subjudul'=>'Tambah Data Baru',
		'datakios'=>$datakios,
		'databaru'=>$databaru,
		'datajenis'=>$this->M_baru->tampilJenis()->result(),
 		];
 		$this->template->load('pages/index','pasar/v_persyaratan/read', $data); 
	}

	public function edit($id)
	{	

		$nama_pasar = $this->session->userdata('nama_pasar');
		$dataop= $this->M_op->tampilWherePasar($nama_pasar)->result();

		$data = [
		
		'datakios'=>$this->M_baru->tampilJoin()->result(),
		'databaru'=>$this->M_baru->tampilData($id)->row(),
		'datajenis'=>$this->M_baru->tampilJenis()->result(),
		'dataop'=>$dataop,
 		];
 		$this->template->load('pages/index','pasar/v_persyaratan/edit', $data); 
 	}

 	public function update($id)
	{

 		$data = [
 			'id_kios'=> $this->input->post('id_kios'),
 			'nama'=> $this->input->post('nama'),
		 	'id_jenis'=> $this->input->post('id_jenis'),
 			'tanggal'=> $this->input->post('tanggal'),
 			'alamat'=> $this->input->post('alamat'),
 			'nik'=> $this->input->post('nik'),
 			'pekerjaan'=>'Pedagang',
 			'no_telp'=> $this->input->post('no_telp'),
 			'email'=> $this->input->post('email'),
 			'npwrd'=> $this->input->post('npwrd'),
 			
 		];


 	$this->M_baru->editData($id,$data);
	$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	Data Berhasil Ditambahkan</div>');
	redirect('Pasar/Persyaratan/index');
	}


	public function hapus($id)
	{
		$this->M_baru->hapusData($id);
		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Dihapus</div>');
	 		redirect('Pasar/Persyaratan/index');
	}

	public function sp_pemilik($id)
	{

		$nama_pasar = $this->session->userdata('nama_pasar');;

		$data = [ 
			'databaru'=>$this->M_baru->print($id)->row(),
			'datakios'=>$this->M_baru->tampilJoin()->result(),
			'datakepala'=>$this->M_baru->tampilKepala($nama_pasar)->row(),
		];

	 		$this->load->view('Pasar/v_persyaratan/sp_pemilik', $data); 
	}

	public function surat_pernyataan($id)
	{

		$nama_pasar = $this->session->userdata('nama_pasar');;

		$data = [ 
			'databaru'=>$this->M_baru->print($id)->row(),
			'datakios'=>$this->M_baru->tampilJoin()->result(),
			'datakepala'=>$this->M_baru->tampilKepala($nama_pasar)->row(),
		];

	 		$this->load->view('Pasar/v_persyaratan/surat_pernyataan', $data); 
	}

	// public function sp_kepala($id)
	// {

	// 	$nama_pasar = $this->session->userdata('nama_pasar');
	
	 		
	// 	$data = [ 
	// 		'databaru'=>$this->M_baru->print($id)->row(),
	// 		'datakios'=>$this->M_baru->tampilJoin()->result(),
	// 		'datakepala'=>$this->M_baru->tampilKepala($nama_pasar)->row(),

	// 	];

	//  		$this->load->view('Pasar/v_persyaratan/sp_kepala', $data); 
	// }

	public function ba_penunjukan($id){
		
		$nama_pasar = $this->session->userdata('nama_pasar');

		$data = [ 
			'databaru'=>$this->M_baru->print($id)->row(),
			'datakios'=>$this->M_baru->tampilJoin()->result(),
			'datakepala'=>$this->M_baru->tampilKepala($nama_pasar)->row(),

		];
		$this->load->view('Pasar/v_persyaratan/ba_penunjukan', $data);

	}
}
