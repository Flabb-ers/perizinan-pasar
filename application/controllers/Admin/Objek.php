<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Objek extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_objek');

		if ($this->session->userdata('level') !== 'Admin') {
			redirect('Auth/index');
		}
	}

	public function index()
	{

		$dataObjek = $this->M_objek->read()->result();


		$data = [
			'judul' => 'Data Objek',
			'subjudul' => 'Data Objek',
			'dataop' => $dataObjek,
		];

		$this->template->load('pages/index', 'Admin/v_Objek/read', $data);
	}

	public function create()
	{

		// print_r($this->input);

		if (isset($_POST['simpan'])) {

			$data = [
				'id_wajib_pajak' => $this->input->post('id_wajib_pajak'),
			];

			$this->M_objek->addData($data);
			$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Ditambahkan</div>');
			redirect('Admin/Objek/index');
		}


		$data = [
			'judul' => 'Data Objek',
			'subjudul' => 'Tambah Data Objek',
			'datapengajuan' => $this->M_objek->tampilWP()->result(),
			// 'datawp'=>$tampil_wajib_pajak,
		];

		$this->template->load('pages/index', 'Admin/v_objek/create', $data);
	}

	public function hapus($id)
	{

		$this->M_objek->hapusData($id);
		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Dihapus</div>');
		redirect('Admin/Objek/index');
	}

	public function getPengajuan()
	{
		$id_wajib_pajak = $this->input->post('id_wajib_pajak');

		$pengajuan = $this->M_objek->getWP($id_wajib_pajak)->result();


		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($pengajuan));
	}

	public function detail($id)
	{

		$data = [
			'judul' => 'Data Objek',
			'subjudul' => 'Data Objek',
			'dataop' => $this->M_objek->tampilDetail($id)->result(),
			'dataobjek' => $this->M_objek->tampilObjek($id)->row(),


		];

		$this->template->load('pages/index', 'Admin/v_objek/detail', $data);
	}
}
