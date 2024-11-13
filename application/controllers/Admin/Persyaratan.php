<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persyaratan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_baru');
		$this->load->model('M_op');


		if ($this->session->userdata('level') !== 'Admin') {
			redirect('Auth/index');
		}
	}

	public function index()
	{
		$databaru = $this->M_baru->tampilLevelAdmin()->result();
		$datapasar = $this->M_op->tampilPasar()->result();

		$datakios = $this->M_baru->tampilKios()->result();
		$dataop = $this->M_baru->getActiveOP();

		$availeble_kios = $this->M_baru->get_available_kios($dataop);


		$data = [
			'databaru' => $databaru,
			'datakios' => $availeble_kios,
			'datapasar' => $datapasar,
			'datajenis' => $this->M_baru->tampilJenis()->result(),
		];
		$this->template->load('pages/index', 'Admin/v_persyaratan/read', $data);
	}

	public function create()
	{
		if (isset($_POST['simpan'])) {

			$tanggal = date('Y-m-d');
			$batas_berlaku = date('Y-m-d', strtotime('+2 years', strtotime($tanggal)));

			$data = [
				'id_kios' => $this->input->post('id_kios'),
				'nama' => $this->input->post('nama'),
				'nik' => $this->input->post('nik'),
				'alamat' => $this->input->post('alamat'),
				'pekerjaan' => 'Pedagang',
				'no_telp' => $this->input->post('no_telp'),
				'email' => $this->input->post('email'),
				'id_jenis' => $this->input->post('id_jenis'),
				'tanggal' => $tanggal,
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
			redirect('Admin/Persyaratan/index');
		}


		$datakios = $this->M_baru->tampilCreateAdmin()->result();
		$databaru = $this->M_baru->tampilLevelAdmin()->result();

		$data = [
			'judul' => 'Data Baru',
			'subjudul' => 'Tambah Data Baru',
			'datakios' => $datakios,
			'databaru' => $databaru,
		];
		$this->template->load('pages/index', 'Admin/v_persyaratan/read', $data);
	}

	public function edit($id)
	{

		$data = [

			'datakios' => $this->M_baru->tampilJoin()->result(),
			'databaru' => $this->M_baru->print($id)->row(),
			'datajenis' => $this->M_baru->tampilJenis()->result(),
		];
		$this->template->load('pages/index', 'Admin/v_persyaratan/edit', $data);
	}

	public function update($id)
	{

		$data = [

			'id_kios' => $this->input->post('id_kios'),
			'nama' => $this->input->post('nama'),
			'id_jenis' => $this->input->post('id_jenis'),
			'tanggal' => $this->input->post('tanggal'),
			'alamat' => $this->input->post('alamat'),
			'nik' => $this->input->post('nik'),
			'pekerjaan' => 'Pedagang',
			'no_telp' => $this->input->post('no_telp'),
			'email' => $this->input->post('email'),
			'npwrd' => $this->input->post('npwrd'),
		];


		$this->M_baru->editData($id, $data);
		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	Data Berhasil Ditambahkan</div>');
		redirect('Admin/Persyaratan/index');
	}

	public function hapus($id)
	{
		$this->M_baru->hapusData($id);
		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Dihapus</div>');
		redirect('Admin/Persyaratan/index');
	}

	public function sp_pemilik($id)
	{

		$nama_pasar = $this->M_baru->print($id)->row('nama_pasar');

		$data = [
			'databaru' => $this->M_baru->print($id)->row(),
			'datakios' => $this->M_baru->tampilJoin()->result(),
			'datakepala' => $this->M_baru->tampilKepala($nama_pasar)->row(),
		];

		// var_dump($data);
		// die;

		$this->load->view('Admin/v_persyaratan/sp_pemilik', $data);
	}

	public function surat_pernyataan($id)
	{

		// $this->db->get_where('tbl_kios', ['id'=>$id_kios])->row();

		$data = [
			'databaru' => $this->M_baru->print($id)->row(),
			'datakios' => $this->M_baru->tampilJoin()->result(),
		];

		$this->load->view('Admin/v_persyaratan/surat_pernyataan', $data);
	}

	public function sp_kepala($id)
	{

		$nama_pasar = $this->M_baru->print($id)->row()->nama_pasar;

		$data = [
			'databaru' => $this->M_baru->print($id)->row(),
			'datakios' => $this->M_baru->tampilJoin()->result(),
			'datakepala' => $this->M_baru->tampilKepala($nama_pasar)->row(),

		];

		$this->load->view('Admin/v_persyaratan/sp_kepala', $data);
	}
	public function ba_penunjukan($id)
	{

		$nama_pasar = $this->M_baru->print($id)->row()->nama_pasar;

		$data = [
			'databaru' => $this->M_baru->print($id)->row(),
			'datakios' => $this->M_baru->tampilJoin()->result(),
			'datakepala' => $this->M_baru->tampilKepala($nama_pasar)->row(),

		];
		$this->load->view('Pasar/v_persyaratan/ba_penunjukan', $data);
	}
}
