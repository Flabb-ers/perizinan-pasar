<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Baru extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_baru');
		$this->load->model('M_op');

		if ($this->session->userdata('level') !== 'Pasar') {
			redirect('auth');
		}
	}

	public function index()
	{
		$nama_pasar = $this->session->userdata('nama_pasar');
		$databaru = $this->M_baru->tampilLevelPasar($nama_pasar)->result();
		$dataop = $this->M_op->tampilWherePasar($nama_pasar)->result();

		$data = [
			'judul' => 'Data Baru',
			'subjudul' => 'Data Baru',
			'databaru' => $databaru,
			'dataop' => $dataop,
		];

		$this->template->load('pages/index', 'pasar/v_baru/read', $data);
	}

	public function getPengajuan()
	{
		$id_pengajuan = $this->input->post('id_pengajuan');

		$pengajuan = $this->M_baru->getPengajuan2($id_pengajuan)->result();


		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($pengajuan));
	}

	public function edit($id)
	{

		$nama_pasar = $this->session->userdata('nama_pasar');
		$dataop = $this->M_op->tampilWherePasar($nama_pasar)->result();

		$data = [

			'datakios' => $this->M_baru->tampilJoin()->result(),
			'databaru' => $this->M_baru->print($id)->row(),
			'dataop' => $dataop,
		];
		$this->template->load('pages/index', 'pasar/v_baru/edit', $data);
	}


	public function update($id)
	{
		$allowed_types = ['image/jpeg', 'image/jpg', 'image/png'];

		$files = [
			'sp_kepala',
			'sp_pemilik',
			'surat_pernyataan',
			'ktp_pemilik',
			'pas_foto'
		];

		$uploadedFiles = [];

		foreach ($files as $file) {
			if (!empty($_FILES[$file]['tmp_name'])) {
				if (!in_array($_FILES[$file]['type'], $allowed_types)) {
					echo "<script>alert('Format yang digunakan jpeg|jpg|png');</script>";
					redirect($this->redirect, 'refresh');
					exit;
				}
				$uploadedFiles[$file] = UploadImg($_FILES[$file], './template/img/syarat/', $file, 500);
				unlink(FCPATH . 'template/img/syarat/' . $this->input->post($file . '_lama'));
			}
		}

		$data = [
			'id_kios' => $this->input->post('id_kios'),
			'nama' => $this->input->post('nama'),
			'tanggal' => $this->input->post('tanggal'),
			'alamat' => $this->input->post('alamat'),
			'nik' => $this->input->post('nik'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'no_telp' => $this->input->post('no_telp'),
			'email' => $this->input->post('email'),
			'npwrd' => $this->input->post('npwrd'),
		];

		$data = array_merge($data, $uploadedFiles);

		$tanggal = date('Y-m-d');
		$batas_berlaku = date('Y-m-d', strtotime('+2 years', strtotime($tanggal)));

		$this->M_baru->editData($id, $data);
		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	Data Berhasil Ditambahkan</div>');
		redirect('pasar/baru/index');
	}

	public function hapus($id)
	{

		$foto = $this->M_baru->tampilData($id)->row_array();

		$sp_kepala = $foto['sp_kepala'];
		$sp_pemilik = $foto['sp_pemilik'];
		$surat_pernyataan = $foto['surat_pernyataan'];
		$ktp_pemilik = $foto['ktp_pemilik'];
		$pas_foto = $foto['pas_foto'];

		unlink(FCPATH . ('template/img/syarat/' . $sp_kepala));
		unlink(FCPATH . ('template/img/syarat/' . $sp_pemilik));
		unlink(FCPATH . ('template/img/syarat/' . $surat_pernyataan));
		unlink(FCPATH . ('template/img/syarat/' . $ktp_pemilik));
		unlink(FCPATH . ('template/img/syarat/' . $pas_foto));


		$this->M_baru->hapusData($id);
		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Dihapus</div>');
		redirect('pasar/baru/index');
	}

	public function keterangan($id)
	{
		$id = $this->uri->segment(4);
		$data = array(
			'keterangan' => $this->uri->segment(5)
		);
		$this->M_baru->update($id, $data);
		redirect('pasar/baru');
	}

	public function print()
	{

		$data = [
			'judul' => 'Data Permohonan Baru',
			'subjudul' => 'Edit Data Permohonan Baru',
			'databaru' => $this->M_baru->tampilJoin()->result()
		];

		$this->load->view('pasar/v_baru/print', $data);
	}

	public function cetak_pdf()
	{
		$this->load->library('dompdf_gen');

		$data = [
			'judul' => 'Data Permohonan Baru',
			'subjudul' => 'Edit Data Permohonan Baru',
			'databaru' => $this->M_baru->tampilJoin()->result()
		];
		$this->load->view('pasar/v_baru/cetak_pdf', $data);

		$paper_size = 'A4';
		$orientation = 'potraid';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		//comfort ke pdf
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Data Permohonan Baru", array('Attachment' => 0));
	}

	public function excel()
	{
		$data['baru'] = $this->M_baru->tampilJoin('tbl_pengajuan')->result();

		require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();

		$object->getProperties()->setCreator("Fatin Amiroh");
		$object->getProperties()->setLastModifiedBy("Fatin Amiroh");
		$object->getProperties()->setTitle("DATA PERMOHONAN PERIZINAN");

		$object->setActiveSheetIndex(0);

		$object->getActiveSheet()->setCellValue('B1', 'DATA PERMOHONAN PERIZINAN ');
		$object->getActiveSheet()->setCellValue('A3', 'NO');
		$object->getActiveSheet()->setCellValue('B3', 'NAMA admin');
		$object->getActiveSheet()->setCellValue('C3', 'NAMA');
		$object->getActiveSheet()->setCellValue('D3', 'TANGGAL PENGAJUAN');

		$baris = 4;
		$no = 1;

		foreach ($data['baru'] as $key) {
			$object->getActiveSheet()->setCellValue('A' . $baris, $no++);
			$object->getActiveSheet()->setCellValue('B' . $baris, $key->nama_pasar);
			$object->getActiveSheet()->setCellValue('C' . $baris, $key->nama);
			$object->getActiveSheet()->setCellValue('D' . $baris, $key->tanggal);

			$baris++;
		}

		$filename = "DATA_PERMOHONAN_PERIZINAN" . '.xls';


		$object->getActiveSheet()->setTitle("Data PERMOHONAN PERIZINAN");
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache_Control: max-age=0');

		$writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		ob_end_clean();
		$writer->save('php://output');

		exit;
	}
}
