<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wp extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_wp');
	 	$this->load->model('M_baru');

	 	if ($this->session->userdata('level')!=='Dinas') {
 		redirect('auth');
	 	}
	 }

	public function index()
	{
		$data = [ 
			'judul'=>'Data Wajib Pajak',
			'subjudul'=>'Data Wajib Pajak',
			'datawp'=>$this->M_wp->read()->result()
		];
		
		$this->template->load('pages/index','dinas/v_wp/read', $data); 
	}

	public function create()
	{

	 	if (isset($_POST['simpan'])) {
	 		$data = [
	 			'npwrd' => $this->input->post('npwrd'),
	 			'id_pasar'=> $this->input->post('id_pasar'),
				'nama'=> $this->input->post('nama'),
				'alamat'=> $this->input->post('alamat'),
				'nama_pasar'=> $this->input->post('nama_pasar'),
				'nik'=> $this->input->post('nik'),
				'no_telp'=> $this->input->post('no_telp'),
				'email'=> $this->input->post('email'),
				
	 		];

	 		$data_pengajuan = array(
            'npwrd' => $this->input->post('npwrd'),
            'status_npwrd' => "Sudah",
	        );

	        $id_pengajuan = $this->input->post('id_pengajuan');

	        

	        $this->M_wp->addData($data);

	        $this->M_baru->editData($id_pengajuan, $data_pengajuan);

	 		
	 		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Ditambahkan</div>');
	 		redirect('Dinas/wp/index');
	 	}

 		$data = [
 		'judul'=>'Data Wajib Pajak',
		'subjudul'=>'Tambah Data Wajib Pajak)',
		'kode_wp' => $this->M_wp->get_kode(),
		'datapengajuan'=>$this->M_wp->tampilPengajuan()->result(),
 		];
 		
 		$this->template->load('pages/index','dinas/v_wp/create', $data); 
	}

	public function edit ($id)
	{	

		if (isset($_POST['edit'])) {
	 		$data = [
				'npwrd'=> $this->input->post('npwrd'),
				'nama'=> $this->input->post('nama'),
				'alamat'=> $this->input->post('alamat'),
				'nik'=> $this->input->post('nik'),
				'no_telp'=> $this->input->post('no_telp'),
				'email'=> $this->input->post('email'),
				
	 		];

	 		$this->M_wp->editData($id, $data);
	 		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Diubah</div>');
	 		redirect('Dinas/wp/index');
	 	}

		$data = [ 
			'judul'=>'Data Wajib Pajak',
			'subjudul'=>'Edit Data Wajib Pajak',
			'datawp'=>$this->M_wp->tampilData($id)->row(),
		];
		
		$this->template->load('pages/index','dinas/v_wp/edit', $data); 
	}

	public function hapus($id)
	{	

		$this->M_wp->hapusData($id);
		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Dihapus</div>');
	 		redirect('Dinas/wp/index');
	}

	public function getPengajuan(){
		$id_pengajuan = $this->input->post('id_pengajuan');

		$pengajuan = $this->M_baru->getPengajuan($id_pengajuan)->result();


		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($pengajuan));
	}

}