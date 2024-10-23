<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persyaratan2 extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_pengajuan');
	 	$this->load->model('M_baru');
	 	$this->load->model('M_op');

	 	
	 	if ($this->session->userdata('level')!=='Admin') {
 		redirect('Auth/index');
 		}
	 	
	 }

	public function index()
	{	

		// $nama= $this->input->get('nama');

		// if ($nama) {
		// 	$datapengajuan2= $this->M_op->cariNPWRD($nama)->result();
		// }else{
		// 	$datapengajuan2= $this->M_op->tampilJoinActiveOP()->result();
		// }

		$datapengajuan2= $this->M_pengajuan->tampilAdminPerpanjang2()->result();
		// $dataop= $this->M_op->tampilAdminOP()->result();
		$datawp= $this->M_op->getActiveOP()->result();

		$data = [ 
			'judul'=>'Data Pengajuan',
			'subjudul'=>'Data Pengajuan',
			// 'datapengajuan'=>$datapengajuan,
			'dataP'=>$datapengajuan2,
			// 'dataop'=>$dataop,
			'datawp'=>$datawp,
		];
		$this->template->load('pages/index','Admin/v_persyaratan2/read', $data); 
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
	 			redirect('Admin/Persyaratan2/index');
	 			}
	 }

	 public function edit($id)
	{	

		$data = [
		
		'datakios'=>$this->M_pengajuan->tampilKios()->result(),
		'datapengajuan'=>$this->M_pengajuan->tampilData2($id)->row()
 		];
 		$this->template->load('pages/index','Admin/v_persyaratan2/edit', $data); 
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
	redirect('Admin/Persyaratan2/index');
	}

	public function hapus($id)
	{
		$this->M_pengajuan->hapusData($id);
		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Dihapus</div>');
	 		redirect('Admin/Persyaratan2/index');
	}

	public function sp_pemilik($id)
	{

		$nama_pasar = $this->M_baru->print($id)->row('nama_pasar');

		$data = [ 
			'datapengajuan'=>$this->M_pengajuan->printPasar($id)->row(),
			'datakios'=>$this->M_pengajuan->tampilJoin()->result(),
			'datakepala'=>$this->M_baru->tampilKepala($nama_pasar)->row(),
		];

	 		$this->load->view('Admin/v_persyaratan2/sp_pemilik', $data); 
	}

	public function surat_pernyataan($id)
	{

		// $this->db->get_where('tbl_kios', ['id'=>$id_kios])->row();

		$data = [ 
			'datapengajuan'=>$this->M_pengajuan->printPasar($id)->row(),
			'datakios'=>$this->M_pengajuan->tampilJoin()->result(),
		];

	 		$this->load->view('Admin/v_persyaratan2/surat_pernyataan', $data); 
	}

	public function sp_kepala($id)
	{

		$nama_pasar = $this->M_baru->print($id)->row('nama_pasar');
	
	 		
		$data = [ 
			'datapengajuan'=>$this->M_pengajuan->printPasar($id)->row(),
			'datakios'=>$this->M_pengajuan->tampilJoin()->result(),
			'datakepala'=>$this->M_baru->tampilKepala($nama_pasar)->row(),

		];

	 		$this->load->view('Admin/v_persyaratan2/sp_kepala', $data); 
	}

	public function getPengajuan2(){
		$id_objek_pajak = $this->input->post('id_objek_pajak');

		$pengajuan2 = $this->M_pengajuan->getPengajuanWP($id_objek_pajak)->result();


		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($pengajuan2));
	}

	public function getPengajuan(){
		$id_objek_pajak = $this->input->post('id_objek_pajak');

		$pengajuan = $this->M_pengajuan->getPengajuan2($id_objek_pajak)->result();


		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($pengajuan));
	}


}