<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak2 extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_cetak');
		$this->load->model('M_pimpinan');
		$this->load->model('M_pasar');
		$this->load->model('M_op');

		if ($this->session->userdata('level') !== 'Dinas') {
			redirect('auth');
		}
	}

	public function index()
	{

		$nama_pasar = $this->session->userdata('nama_pasar');
		$pengajuan = $this->M_cetak->readPasar($nama_pasar)->result();
		$dataop = $this->M_op->tampilWherePasar($nama_pasar)->result();

		$data = [
			'judul' => 'Data Pengajuan',
			'subjudul' => 'Data Pengajuan',
			'databaru' => $pengajuan,
			'dataop' => $dataop,

		];

		$this->template->load('pages/index', 'dinas/v_cetakbaru/read', $data);
	}


	public function print($id)
	{

		$data = [
			'dataop' => $this->M_cetak->tampilData($id)->row(),
			'datakios' => $this->M_cetak->tampilKios()->row(),
			'datapasar' => $this->M_cetak->tampilPasar()->result(),
			'datatarif' => $this->M_cetak->tampiltarif()->result(),
			'datapimpinan' => $this->M_cetak->tampilPimpinan()->result(),
			'datapegawai' => $this->M_cetak->tampilPegawai()->result(),
			'print' => $this->M_cetak->tampilData($id)->result()
		];

		$this->load->view('dinas/v_cetakbaru/print', $data);
	}
}
