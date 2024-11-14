<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_pengajuan');
	 	$this->load->model('M_baru');
	 	$this->load->model('M_op');
	 	$this->load->model('M_wp');

	 	
	 	if ($this->session->userdata('level')!=='Dinas') {
 		redirect('auth');
	 	}
	 	
	 }

	public function index()
	{
		$data = [ 
			'judul'=>'Data Pengajuan',
			'subjudul'=>'Data Pengajuan',
			'datapengajuan'=>$this->M_pengajuan->read()->result()
		];
		
		$this->template->load('pages/index','Dinas/v_pengajuan/read', $data); 
	}

	public function proses($id)
	{	
		$data = [
 		'judul'=>'Data Pengajuan',
		'subjudul'=>'Tambah Data Pengajuan',
		'datakios'=>$this->M_pengajuan->tampilKios()->result(),
		'datapengajuan'=>$this->M_pengajuan->tampilData2($id)->row(),
 		];
 		$this->template->load('pages/index','dinas/v_pengajuan/proses', $data); 
	}

	public function UpdateProses($id)
	{	

	 		$data = [
	 		'status'=> $this->input->post('status'),
	 		'keterangan'=> $this->input->post('keterangan'),
	 		];

	 		// $dataOp = [
	 		// 'status'=> $this->input->post('status'),
	 		// ];
	 		// $id_objek_pajak = $this->input->post('id_objek_pajak');
	 		// $this->M_op->editData($id_objek_pajak, $dataOp);

	 		$this->M_pengajuan->editData($id, $data);
	 		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Diubah</div>');
	 		redirect('dinas/pengajuan/index');
	}
	

	public function status($id)
    {
        $id = $this->uri->segment(4);
        $data = array(
            'status' => $this->uri->segment(5)
        );
        $this->M_pengajuan->update($id, $data);
        redirect('dinas/pengajuan');
    }

	public function getPengajuan(){
		$id_pengajuan = $this->input->post('id_pengajuan');

		$pengajuan = $this->M_pengajuan->getPengajuan($id_pengajuan)->result();


		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($pengajuan));
	}

}