<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persyaratan2 extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_pengajuan');
	 	$this->load->model('M_baru');
	 	$this->load->model('M_op');

	 	
	 	if ($this->session->userdata('level')!=='Pasar') {
 		redirect('auth');
 		}
	 	
	 }

	public function index()
	{	
		$nama_pasar = $this->session->userdata('nama_pasar');
		// $datap= $this->M_pengajuan->tampilJoinwhere($nama_pasar)->result(); 
		$datapengajuan2= $this->M_pengajuan->tampilReadPersyaratan2($nama_pasar)->result();

		$dataop = $this->M_op->tampilWherePasar($nama_pasar)->result();

		
		$datawp= $this->M_pengajuan->tampilAdminWPlevelPasar($nama_pasar)->result();

		$data = [ 
			'judul'=>'Data Pengajuan',
			'subjudul'=>'Data Pengajuan',
			// 'datapengajuan'=>$datap,
			'dataP'=>$datapengajuan2,
			'dataop'=>$dataop,
			'datawp'=>$datawp,
		];
		$this->template->load('pages/index','pasar/v_persyaratan2/read', $data); 
	}

		public function create()
	{
	 	if (isset($_POST['simpan'])) {

	            $tanggal = date('Y-m-d');
		 		$batas_berlaku = date('Y-m-d', strtotime('+2 years',strtotime($tanggal)));

		 		$data = [
		 			
		 			'nama'=> $this->input->post('nama'),
		 			'nik'=> $this->input->post('nik'),
		 			'npwrd' => $this->input->post('npwrd'),
		 			'alamat'=> $this->input->post('alamat'),
		 			'pekerjaan'=>'Pedagang',
		 			'no_telp'=> $this->input->post('no_telp'),
		 			'email'=> $this->input->post('email'),
		 			'id_jenis'=> $this->input->post('id_jenis'),
		 			'tanggal'=> $tanggal,
		 			'status_npwrd' => 'Sudah',
            		'id_kios'=> $this->input->post('id_kios'),
            		'jenis_pengajuan' => 'Perpanjang',
		 			'status_op' => 'Belum',
		 			'status' => 'Proses',
		 			'keterangan' => ''

		 		];
	 			$this->M_pengajuan->addData($data);
	 			$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Ditambahkan</div>');
	 			redirect('Pasar/Persyaratan2/index');
	 			}
	 }

	 public function edit($id)
	{	

		$data = [
		
		'datakios'=>$this->M_pengajuan->tampilKios()->result(),
		'datapengajuan'=>$this->M_pengajuan->tampilData2($id)->row(),
		'datajenis'=>$this->M_pengajuan->tampilJenis()->result(),
 		];
 		$this->template->load('pages/index','pasar/v_persyaratan2/edit', $data); 
 	}

	public function update($id)
	{

 		$data = [
 			
 			'nama'=> $this->input->post('nama'),
 			'nik'=> $this->input->post('nik'),
 			'npwrd' => $this->input->post('npwrd'),
 			'alamat'=> $this->input->post('alamat'),
 			'pekerjaan'=>'Pedagang',
 			'no_telp'=> $this->input->post('no_telp'),
 			'email'=> $this->input->post('email'),
 			'tanggal'=> $this->input->post('tanggal'),
 			'status_npwrd' => 'Sudah',
    		'id_kios'=> $this->input->post('id_kios'),
    		'jenis_pengajuan' => 'Perpanjang',
 			'status_op' => 'Belum',
 			'status' => 'Proses',
 			'keterangan' => ''
 		];


 	$this->M_pengajuan->editData($id,$data);
	$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	Data Berhasil Ditambahkan</div>');
	redirect('Pasar/Persyaratan2/index');
	}

	public function hapus($id)
	{
		$this->M_pengajuan->hapusData($id);
		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Dihapus</div>');
	 		redirect('Pasar/Persyaratan/index');
	}

	public function sp_pemilik($id)
	{

		$nama_pasar = $this->session->userdata('nama_pasar');

		$data = [ 
			'datapengajuan'=>$this->M_pengajuan->printPasar($id)->row(),
			'datakios'=>$this->M_pengajuan->tampilJoin()->result(),
			'datakepala'=>$this->M_pengajuan->tampilKepala($nama_pasar)->row(),
		];

	 		$this->load->view('Pasar/v_persyaratan2/sp_pemilik', $data); 
	}

	public function surat_pernyataan($id)
	{

		$nama_pasar = $this->session->userdata('nama_pasar');

		$data = [ 
			'datapengajuan'=>$this->M_pengajuan->printPasar($id)->row(),
			'datakios'=>$this->M_pengajuan->tampilJoin()->result(),
			'datakepala'=>$this->M_pengajuan->tampilKepala($nama_pasar)->row(),
		];

	 		$this->load->view('Pasar/v_persyaratan2/surat_pernyataan', $data); 
	}

	public function sp_kepala($id)
	{

		$nama_pasar = $this->session->userdata('nama_pasar');
	
	 		
		$data = [ 
			'datapengajuan'=>$this->M_pengajuan->printPasar($id)->row(),
			'datakios'=>$this->M_pengajuan->tampilJoin()->result(),
			'datakepala'=>$this->M_pengajuan->tampilKepala($nama_pasar)->row(),

		];

	 		$this->load->view('Pasar/v_persyaratan2/sp_kepala', $data); 
	}



	public function getPengajuan(){
		$id_objek_pajak = $this->input->post('id_objek_pajak');

		$pengajuan = $this->M_pengajuan->getPengajuan2($id_objek_pajak)->result();


		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($pengajuan));
	}


}