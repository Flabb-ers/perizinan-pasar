<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpWord\TemplateProcessor;

class Cetak2 extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_cetak');
		$this->load->model('M_pimpinan');
		$this->load->model('M_pasar');
		$this->load->model('M_op');

		if ($this->session->userdata('level') !== 'Pasar') {
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

		$this->template->load('pages/index', 'pasar/v_cetakbaru/read', $data);
	}


	// public function print($id)
	// {

	// 	$data = [
	// 		'dataop' => $this->M_cetak->tampilData($id)->row(),
	// 		'datakios' => $this->M_cetak->tampilKios()->row(),
	// 		'datapasar' => $this->M_cetak->tampilPasar()->result(),
	// 		'datatarif' => $this->M_cetak->tampiltarif()->result(),
	// 		'datapimpinan' => $this->M_cetak->tampilPimpinan()->result(),
	// 		'datapegawai' => $this->M_cetak->tampilPegawai()->result(),
	// 		'print' => $this->M_cetak->tampilData($id)->result()
	// 	];

	// 	$this->load->view('Pasar/v_cetakbaru/print', $data);
	// }

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

		$templatePath = FCPATH . 'template/surat/surat_izin.docx';
		$templateProcessor = new TemplateProcessor($templatePath);

		$templateProcessor->setValue('nomor_kios', htmlspecialchars($data['datakios']->nomor ?? ''));


		$templateProcessor->setValue('jenis', htmlspecialchars(strtoupper($data['dataop']->jenis) ?? ''));
		$templateProcessor->setValue('pasar', htmlspecialchars($data['datapasar'][0]->nama ?? ''));

		$tahunIni = date('Y');
		$templateProcessor->setValue('tahun', $tahunIni);

		foreach ($data['datapimpinan'] as $index => $key) {
			$templateProcessor->setValue('pimpinan_' . ($index + 1), htmlspecialchars($key->nama_pegawai ?? ''));
			$templateProcessor->setValue('nip_' . ($index + 1), htmlspecialchars($key->nip ?? ''));
		}

		foreach ($data['print'] as $key) {

			$templateProcessor->setValue('nik', htmlspecialchars(strtoupper($key->nik) ?? ''));
			$templateProcessor->setValue('npwrd', htmlspecialchars($key->npwrd ?? ''));
			$templateProcessor->setValue('nama', htmlspecialchars(strtoupper($key->nama) ?? ''));
			$templateProcessor->setValue('alamat', htmlspecialchars(strtoupper($key->alamat) ?? ''));
		}


		$outputPath = FCPATH . 'documents/surat_izin_' . $id . '.docx';

		$templateProcessor->saveAs($outputPath);

		if (!file_exists($outputPath)) {
			die('File output tidak ada: ' . $outputPath);
		}

		header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
		header("Content-Disposition: attachment; filename=" . basename($outputPath));
		header("Content-Length: " . filesize($outputPath));

		readfile($outputPath);

		// Hapus file hasil setelah diunduh (opsional)
		unlink($outputPath);
	}
}
