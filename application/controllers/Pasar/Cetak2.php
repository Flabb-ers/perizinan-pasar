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

	public function print($id)
	{
		$data = [
			'dataop' => $this->M_cetak->tampilData($id)->row(),
			'datakios' => $this->M_cetak->tampilKios($id)->row(),
			'datapasar' => $this->M_cetak->tampilPasar()->result(),
			'datatarif' => $this->M_cetak->tampiltarif()->result(),
			'datapimpinan' => $this->M_cetak->tampilPimpinan()->result(),
			'datapegawai' => $this->M_cetak->tampilPegawai()->result(),
			'print' => $this->M_cetak->tampilData($id)->result()
		];
	
		$tgl_mulai = date('d F Y', strtotime($data['dataop']->tgl_daftar));
		$tgl_akhir = date('d F Y', strtotime($data['dataop']->tgl_daftar . ' +2 years'));
	
		$data['tgl_mulai'] = $tgl_mulai;
		$data['tgl_akhir'] = $tgl_akhir;
	
		$this->load->view('Pasar/v_cetakbaru/print', $data);
	}
	

	
	// public function print($id)
	// {
	// 	$data = [
	// 		'dataop' => $this->M_cetak->tampilData($id)->row(),
	// 		'datakios' => $this->M_cetak->tampilKios($id)->row(),
	// 		'datapasar' => $this->M_cetak->tampilPasar()->result(),
	// 		'datatarif' => $this->M_cetak->tampiltarif()->result(),
	// 		'datapimpinan' => $this->M_cetak->tampilPimpinan()->row(),
	// 		'datapegawai' => $this->M_cetak->tampilPegawai()->result(),
	// 		'print' => $this->M_cetak->tampilData($id)->result()
	// 	];

	// 	$templatePath = FCPATH . 'template/surat/surat_izin.docx';
	// 	$templateProcessor = new TemplateProcessor($templatePath);

	// 	$templateProcessor->setValue('jenis', htmlspecialchars($data['dataop']->jenis ?? ''));
	// 	$templateProcessor->setValue('jenisHead', htmlspecialchars(strtoupper($data['dataop']->jenis) ?? ''));
	// 	$templateProcessor->setValue('pasar', htmlspecialchars($data['datapasar'][0]->nama ?? ''));

	// 	$tahunIni = date('Y');
	// 	$templateProcessor->setValue('tahun', $tahunIni);
	// 	$templateProcessor->setValue('namaBlok', htmlspecialchars($data['datakios']->nama_blok ?? ''));
	// 	$templateProcessor->setValue('nomor_kios', htmlspecialchars($data['datakios']->no_blok ?? ''));
	// 	$templateProcessor->setValue('panjang', htmlspecialchars($data['datakios']->panjang ?? ''));
	// 	$templateProcessor->setValue('lebar', htmlspecialchars($data['datakios']->lebar ?? ''));
	// 	$templateProcessor->setValue('dagangan', htmlspecialchars($data['dataop']->jenis_dagangan ?? ''));

	// 	foreach ($data['datapasar'] as $key) {
	// 		if ($key->id_pasar == $data['dataop']->id_pasar) {
	// 			$templateProcessor->setValue('komplek', htmlspecialchars($key->nama_pasar));
	// 			break;
	// 		}
	// 	}

	// 	$templateProcessor->setValue('pimpinan_', htmlspecialchars(strtoupper($data['datapimpinan']->nama_pegawai) ?? ''));
	// 	$templateProcessor->setValue('nip_', htmlspecialchars($data['datapimpinan']->nip ?? ''));

	// 	foreach ($data['print'] as $key) {
	// 		$templateProcessor->setValue('nik', htmlspecialchars(strtoupper($key->nik) ?? ''));
	// 		$templateProcessor->setValue('npwrd', htmlspecialchars($key->npwrd ?? ''));
	// 		$templateProcessor->setValue('nama', htmlspecialchars(strtoupper($key->nama) ?? ''));
	// 		$templateProcessor->setValue('alamat', htmlspecialchars(strtoupper($key->alamat) ?? ''));
	// 	}

	// 	$imagePath = FCPATH . 'template/img/gambarop/' . $data['dataop']->pas_foto;
	// 	if (file_exists($imagePath)) {
	// 		$templateProcessor->setImageValue('pas_foto', [
	// 			'path' => $imagePath,
	// 			'width' => 113,
	// 			'height' => 151,
	// 			'ratio' => false
	// 		]);
	// 	} else {
	// 		$templateProcessor->setValue('pas_foto', 'Tidak ada gambar');
	// 	}

	// 	$tgl_mulai = date('d F Y', strtotime($data["dataop"]->tgl_daftar));
	// 	$tgl_akhir = date('d F Y', strtotime($data["dataop"]->tgl_daftar . ' +2 years'));

	// 	$bulan = array(
	// 		'January' => 'Januari',
	// 		'February' => 'Februari',
	// 		'March' => 'Maret',
	// 		'April' => 'April',
	// 		'May' => 'Mei',
	// 		'June' => 'Juni',
	// 		'July' => 'Juli',
	// 		'August' => 'Agustus',
	// 		'September' => 'September',
	// 		'October' => 'Oktober',
	// 		'November' => 'November',
	// 		'December' => 'Desember'
	// 	);

	// 	$tgl_mulai = strtr($tgl_mulai, $bulan);
	// 	$tgl_akhir = strtr($tgl_akhir, $bulan);
	// 	$tgl_signature = strtr(date('d F Y'), $bulan);

	// 	$templateProcessor->setValue('tgl_mulai', htmlspecialchars($tgl_mulai ?? ''));
	// 	$templateProcessor->setValue('tgl_akhir', htmlspecialchars($tgl_akhir ?? ''));
	// 	$templateProcessor->setValue('tgl_signature', htmlspecialchars($tgl_signature ?? ''));

	// 	foreach ($data['datatarif'] as $key) {
	// 		if ($key->id_tarif == $data['datakios']->id_tarif) {
	// 			$tarifTotal = $key->tarif * $data['datakios']->panjang * $data['datakios']->lebar;
	// 			$retribusiKebersihan = $tarifTotal / 10;

	// 			$templateProcessor->setValue('tarif', number_format($tarifTotal, 0, ',', '.'));
	// 			$templateProcessor->setValue('retribusi', number_format($retribusiKebersihan, 0, ',', '.'));
	// 			break;
	// 		}
	// 	}

	// 	$outputPath = FCPATH . 'documents/surat_izin_' . $id . '.docx';
	// 	$templateProcessor->saveAs($outputPath);

	// 	if (!file_exists($outputPath)) {
	// 		die('File output tidak ada: ' . $outputPath);
	// 	}

	// 	header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
	// 	header("Content-Disposition: attachment; filename=" . basename($outputPath));
	// 	header("Content-Length: " . filesize($outputPath));

	// 	readfile($outputPath);
	// 	unlink($outputPath);
	// }
}
