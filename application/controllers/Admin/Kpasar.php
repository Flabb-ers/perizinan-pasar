<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kpasar extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_Kpasar');

	 	if ($this->session->userdata('level')!=='Admin') {
 		redirect('Auth/index');
	 	}
	 }

	public function index()
	{
		$data = [ 
			'judul'=>'Data Kepala Pasar',
			'subjudul'=>'Data Kepala Pasar',
			'datakepala'=>$this->M_Kpasar->tampilJoin()->result()
		];
		
		$this->template->load('pages/index','admin/v_Kpasar/read', $data); 
	}

	public function create()
	{

	 	if (isset($_POST['simpan'])) {
	 		$data = [
	 			'id_pasar'=> $this->input->post('nama_pasar'),
				'nama_Kpasar'=> $this->input->post('nama_Kpasar'),
				'nip_Kpasar'=> $this->input->post('nip_Kpasar'),
				'status' => 'Nonaktif'

	 		];

	 		$this->M_Kpasar->addData($data);
	 		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Ditambahkan</div>');
	 		redirect('Admin/Kpasar/index');
	 	}

 		$data = [
 		'judul'=>'Data Kepala Pasar',
		'subjudul'=>'Tambah Data Kepala Pasar',
		'datapasar'=>$this->M_Kpasar->tampilPasar()->result(),
 		];
 		
 		$this->template->load('pages/index','admin/v_Kpasar/create', $data); 
	}

	public function edit ($id)
	{	

		if (isset($_POST['edit'])) {
	 		$data = [
	 			'id_pasar'=> $this->input->post('nama_pasar'),
				'nama_Kpasar'=> $this->input->post('nama_Kpasar'),
				'nip_Kpasar'=> $this->input->post('nip_Kpasar'),
				'status' => 'Nonaktif'
	 		];

	 		$this->M_Kpasar->editData($id, $data);
	 		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Diubah</div>');
	 		redirect('Admin/Kpasar/index');
	 	}

		$data = [ 
			'judul'=>'Data Kepala Pasar',
			'subjudul'=>'Edit Data Kepala Pasar',
			'datakepala'=>$this->M_Kpasar->tampilData($id)->row(),
			'datapasar'=>$this->M_Kpasar->tampilPasar()->result(),
		];
		
		$this->template->load('pages/index','admin/v_Kpasar/edit', $data); 
	}

	public function hapus($id)
	{
		$this->M_Kpasar->hapusData($id);
		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Dihapus</div>');
	 		redirect('Admin/Kpasar/index');
	}

	public function status()
    {
        $id = $this->uri->segment(4);
        $data = array(
            'status' => $this->uri->segment(5)
        );
        $this->M_Kpasar->editData($id, $data);
        redirect('Admin/Kpasar');
    }

}
