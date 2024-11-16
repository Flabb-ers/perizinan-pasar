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

		if ($this->session->userdata('level') !== 'Dinas') {
			redirect('auth');
		}
	}

	public function index()
	{
		$pengajuan = $this->M_cetak->readAllPasar()->result();
		$dataop = $this->M_op->tampilAllPasar()->result();

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
			'datakios' => $this->M_cetak->tampilKios($id)->row(),
			'datapasar' => $this->M_cetak->tampilPasar()->result(),
			'datatarif' => $this->M_cetak->tampiltarif()->result(),
			'datapimpinan' => $this->M_cetak->tampilPimpinan()->result(),
			'datapegawai' => $this->M_cetak->tampilPegawai()->result(),
			'print' => $this->M_cetak->tampilData($id)->result()
		];

		$bulan = [
			1 => 'Januari',
			2 => 'Februari',
			3 => 'Maret',
			4 => 'April',
			5 => 'Mei',
			6 => 'Juni',
			7 => 'Juli',
			8 => 'Agustus',
			9 => 'September',
			10 => 'Oktober',
			11 => 'November',
			12 => 'Desember'
		];

		$bulanMulai = $bulan[date('n', strtotime($data['dataop']->tgl_daftar))];
		$bulanAkhir = $bulan[date('n', strtotime($data['dataop']->tgl_daftar . ' +2 years'))];

		$tgl_mulai = date('d', strtotime($data['dataop']->tgl_daftar)) . ' ' . $bulanMulai . ' ' . date('Y', strtotime($data['dataop']->tgl_daftar));
		$tgl_akhir = date('d', strtotime($data['dataop']->tgl_daftar . ' +2 years')) . ' ' . $bulanAkhir . ' ' . date('Y', strtotime($data['dataop']->tgl_daftar . ' +2 years'));

		$data['tgl_mulai'] = $tgl_mulai;
		$data['tgl_akhir'] = $tgl_akhir;

		$this->load->view('Pasar/v_cetakbaru/print', $data);
	}


	public function uploadPage($id_objek_pajak)
	{
		$objek_pajak = $this->M_op->getById($id_objek_pajak);

		$data = [
			'judul' => 'Upload Gambar',
			'subjudul' => 'Form Upload Gambar',
			'objek_pajak' => $objek_pajak
		];

		$this->template->load('pages/index', 'dinas/v_surat/upload', $data);
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
	// 	$templateProcessor->setValue('golongan', htmlspecialchars($data['datapimpinan']->golongan ?? ''));

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
	public function upload($id)
	{
		if (isset($_FILES['surat']) && $_FILES['surat']['error'] == 0) {
			$file_extension = pathinfo($_FILES['surat']['name'], PATHINFO_EXTENSION);

			if (strtolower($file_extension) == 'pdf') {
				$filename = 'surat_' . $id . '.pdf';
				$upload_path = FCPATH . 'template/surat/pdf/' . $filename;

				if (file_exists($upload_path)) {
					unlink($upload_path);
				}
				if (move_uploaded_file($_FILES['surat']['tmp_name'], $upload_path)) {
					date_default_timezone_set('Asia/Jakarta');
					$data = [
						'updated_at' => date('Y-m-d H:i:s'),
					];
					$this->M_op->editData($id, $data);

					$this->session->set_flashdata('pesan', 'PDF berhasil diupload');
				} else {
					$this->session->set_flashdata('pesan', 'Gagal upload PDF');
				}
			} else {
				$this->session->set_flashdata('pesan', 'Hanya file PDF yang diperbolehkan');
			}
		} else {
			$this->session->set_flashdata('pesan', 'Tidak ada file yang diupload');
		}

		redirect('Dinas/Cetak2/uploadPage/' . $id);
	}



	public function downloadSurat($id)
	{

		$extensions = ['pdf'];

		$file_found = false;
		foreach ($extensions as $ext) {

			$filename = 'surat_' . $id . '.' . $ext;
			$upload_path = FCPATH . 'template/surat/pdf/' . $filename;

			if (file_exists($upload_path)) {
				$file_found = true;
				break;
			}
		}

		if ($file_found) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/pdf');
			header('Content-Disposition: attachment; filename="' . basename($upload_path) . '"');
			header('Content-Length: ' . filesize($upload_path));
			header('Cache-Control: no-cache, no-store, must-revalidate');
			header('Pragma: no-cache');
			header('Expires: 0');

			readfile($upload_path);
			exit;
		} else {
			$this->session->set_flashdata('pesan', 'File PDF tidak ditemukan');
			redirect('Pasar/Cetak2');
		}
	}
}
