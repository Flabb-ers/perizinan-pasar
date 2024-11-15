<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_op');
		$this->load->model('M_baru');

		if ($this->session->userdata('level') !== 'Kdinas') {
			redirect('auth');
		}
	}

	public function index()
	{
		$dataop = $this->M_op->tampilJoin2()->result();
		$data = [
			'judul' => 'Data Op',
			'subjudul' => 'Data Op',
			'dataop' => $dataop,
		];

		$this->template->load('pages/index', 'Kdinas/v_baru/read', $data);
	}
	public function readPerpanjang()
	{
		$dataop = $this->M_op->tampilPerpanjang()->result();
		$data = [
			'judul' => 'Data Op',
			'subjudul' => 'Data Op',
			'dataop' => $dataop,
		];

		$this->template->load('pages/index', 'Kdinas/v_baru/readPerpanjang', $data);
	}


	public function generate($id)
	{
		if (isset($_POST['simpan'])) {
			$data = [
				'id_pengajuan' => $this->input->post('id_pengajuan'),
				'npwrd' => $this->input->post('npwrd'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'nama_pasar' => $this->input->post('nama_pasar'),
				'nama_blok' => $this->input->post('nama_blok'),
				'no_blok' => $this->input->post('no_blok'),
				'tgl_daftar' => $this->input->post('tgl_daftar'),
				'batas_berlaku' => $this->input->post('batas_berlaku'),
			];

			$data_pengajuan = array(
				'status' => 'Selesai',
			);

			$id_pengajuan = $this->input->post('id_pengajuan');

			$this->M_baru->editData($id_pengajuan, $data_pengajuan);

			$this->M_op->editData($id, $data);
			$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
				Data Berhasil Diubah</div>');
			redirect('Kdinas/Pengajuan/index');
		}

		$data = [
			'judul' => 'Data Op',
			'subjudul' => 'Edit Data Op',
			'dataop' => $this->M_op->tampilData2($id)->row(),
			'datapasar' => $this->M_op->tampilJoin()->result(),
		];

		$this->template->load('pages/index', 'Kdinas/v_baru/proses', $data);
	}
	public function generatePerpanjang($id)
	{
		if (isset($_POST['simpan'])) {
			$npwrd = $this->input->post('npwrd');

			$data_op = $this->M_op->getByNPWRD($npwrd)->row();
			$pas_foto_lama = $data_op ? $data_op->pas_foto : null;

			$pas_foto_baru = $this->input->post('pas_foto');
			$source_dir = FCPATH . 'template/img/syarat2/' . $pas_foto_baru;
			$destination_dir = FCPATH . 'template/img/gambarop/' . $pas_foto_baru;

			if ($pas_foto_lama) {
				$old_file_path = FCPATH . 'template/img/gambarop/' . $pas_foto_lama;
				if (file_exists($old_file_path)) {
					unlink($old_file_path);
				}
			}

			if (file_exists($source_dir)) {
				copy($source_dir, $destination_dir);
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Gambar baru tidak ditemukan.</div>');
			}
			date_default_timezone_set('Asia/Jakarta');
			$data = [
				'id_pengajuan' => $this->input->post('id_pengajuan'),
				'npwrd' => $npwrd,
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'nama_pasar' => $this->input->post('nama_pasar'),
				'nama_blok' => $this->input->post('nama_blok'),
				'no_blok' => $this->input->post('no_blok'),
				'tgl_daftar' => $this->input->post('tgl_daftar'),
				'batas_berlaku' => $this->input->post('batas_berlaku'),
				'pas_foto' => $pas_foto_baru,
				'updated_at' => date('Y-m-d H:i:s'),
			];

			$data_pengajuan = [
				'status' => 'Selesai',
				'status_op' => 'Sudah',
			];

			$id_pengajuan = $this->input->post('id_pengajuan');
			$this->M_baru->editData($id_pengajuan, $data_pengajuan);
			$this->M_op->editData($id, $data);

			$this->session->set_flashdata('pesan', '<div class="alert alert-success">Data Berhasil Diubah</div>');
			redirect('Kdinas/Pengajuan/index');
		}

		$data = [
			'judul' => 'Data Op',
			'subjudul' => 'Edit Data Op',
			'dataop' => $this->M_op->tampilDataByIdPengajuan($id)->row(),
			'datapasar' => $this->M_op->tampilJoin()->result(),
		];

		$this->template->load('pages/index', 'Kdinas/v_baru/perpanjang', $data);
	}
}
