<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Wp extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_wp');
		$this->load->model('M_baru');
		$this->load->model('M_pasar');

		if ($this->session->userdata('level') !== 'Admin') {
			redirect('Auth/index');
		}
	}

	public function index()
	{
		$data = [
			'judul' => 'Data Wajib Pajak',
			'subjudul' => 'Data Wajib Pajak',
			'datawp' => $this->M_wp->read()->result(),
			'datapasar' => $this->M_wp->tampilPasar()->result()
		];

		$this->template->load('pages/index', 'admin/v_wp/read', $data);
	}

	public function create()
	{
		$this->load->library('form_validation');

		if (isset($_POST['simpan'])) {
			$this->form_validation->set_rules('npwrd', 'NPWRD', 'exact_length[14]|is_unique[tbl_wp.npwrd]', [
				'exact_length' => 'NPWRD harus terdiri dari 14 karakter.',
				'is_unique' => 'NPWRD ini sudah terdaftar.'
			]);

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Ada beberapa kesalahan dalam input data.</div>');
			} else {
				$data = [
					'npwrd' => $this->input->post('npwrd'),
					'id_pasar' => $this->input->post('id_pasar'),
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					'nama_pasar' => $this->input->post('nama_pasar'),
					'nik' => $this->input->post('nik'),
					'no_telp' => $this->input->post('no_telp'),
					'email' => $this->input->post('email'),
				];

				$data_pengajuan = array(
					'npwrd' => $this->input->post('npwrd'),
					'status_npwrd' => "Sudah",
				);

				$id_pengajuan = $this->input->post('id_pengajuan');

				$this->M_wp->addData($data);

				$this->M_baru->editData($id_pengajuan, $data_pengajuan);

				$this->session->set_flashdata('pesan', '<div class="alert alert-success">Data Berhasil Ditambahkan</div>');
				redirect('Admin/wp/index');
			}
		}

		$data = [
			'judul' => 'Data Wajib Pajak',
			'subjudul' => 'Tambah Data Wajib Pajak',
			'kode_wp' => $this->M_wp->get_kode(),
			'datapengajuan' => $this->M_wp->tampilPengajuan()->result(),
		];

		$this->template->load('pages/index', 'admin/v_wp/create', $data);
	}

	public function edit($id)
	{
		$this->load->library('form_validation');

		$datawp = $this->M_wp->tampilData($id)->row();
		$current_npwrd = $datawp->npwrd;

		if (isset($_POST['edit'])) {
			$this->form_validation->set_rules('npwrd', 'NPWRD', 'exact_length[14]|is_unique[tbl_wp.npwrd]', [
				'exact_length' => 'NPWRD harus terdiri dari 14 karakter.',
				'is_unique' => 'NPWRD ini sudah terdaftar.'
			]);

			if ($this->input->post('npwrd') == $current_npwrd) {
				$this->form_validation->set_rules('npwrd', 'NPWRD', 'exact_length[14]');
			}

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Ada beberapa kesalahan dalam input data.</div>');
			} else {
				$data = [
					'npwrd' => $this->input->post('npwrd') ?: $current_npwrd,
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					'nik' => $this->input->post('nik'),
					'no_telp' => $this->input->post('no_telp'),
					'email' => $this->input->post('email'),
				];

				$this->M_wp->editData($id, $data);

				$this->session->set_flashdata('pesan', '<div class="alert alert-success">Data Berhasil Diubah</div>');
				redirect('Admin/wp/index');
			}
		}

		$data = [
			'judul' => 'Data Wajib Pajak',
			'subjudul' => 'Edit Data Wajib Pajak',
			'datawp' => $datawp,
		];

		$this->template->load('pages/index', 'admin/v_wp/edit', $data);
	}


	public function hapus($id)
	{
		$this->M_wp->hapusData($id);
		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Dihapus</div>');
		redirect('Admin/wp/index');
	}

	public function print()
	{

		$data = [
			'judul' => 'Data Wajib Pajak',
			'subjudul' => 'Data Wajib Pajak',
			'datawp' => $this->M_wp->tampilJoin()->result()
		];

		$this->load->view('admin/v_wp/print', $data);
	}

	public function cetak_pdf()
	{
		$this->load->library('dompdf_gen');

		$data = [
			'judul' => 'Data Wajib Pajak',
			'subjudul' => 'Data Wajib Pajak',
			'datawp' => $this->M_wp->tampilJoin()->result()
		];
		$this->load->view('admin/v_wp/cetak_pdf', $data);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		//comfort ke pdf
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Data Wajib Pajak", array('Attachment' => 0));
	}

	public function importWp()
	{

		$new_code = $this->M_wp->get_kode();

		$file = $_FILES['file_excel']['name'];
		$extension = pathinfo($file, PATHINFO_EXTENSION);

		if ($extension == 'xls') {
			$read = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		} else if ($extension == 'xlsx') {
			$read = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		} else {
			$read = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		}

		$spreadsheet = $read->load($_FILES['file_excel']['tmp_name']);
		$sheetdata = $spreadsheet->getActiveSheet()->toArray();

		$sheetcount = count($sheetdata);

		if ($sheetcount > 1) {
			$data = array();
			for ($i = 1; $i < $sheetcount; $i++) {
				$id_pasar = $sheetdata[$i][1];
				$nama_pasar = $sheetdata[$i][2];
				$npwrd = $sheetdata[$i][3];
				$nama = $sheetdata[$i][4];
				$nik = $sheetdata[$i][5];
				$alamat = $sheetdata[$i][6];
				$no_telp = $sheetdata[$i][7];
				$email = $sheetdata[$i][8];

				$data[] = array(
					'id_pasar' => $id_pasar,
					'kode_wp' => $new_code,
					'nama_pasar' => $nama_pasar,
					'npwrd' => $npwrd,
					'nama' => $nama,
					'nik' => $nik,
					'alamat' => $alamat,
					'no_telp' => $no_telp,
					'email' => $email,
				);
			}
			$insertdata = $this->M_wp->addDataImport($data);

			if ($insertdata) {
				$this->session->set_flashdata('message', '<div class= "alert alert-success"> 
	 			Data Berhasil Di Import</div>');
				redirect('Admin/wp/index');
			} else {
				$this->session->set_flashdata('message', '<div class= "alert alert-danger"> 
	 			Data Gagal Di Import, Tolong Ulangi</div>');
				redirect('Admin/wp/index');
			}
		}
	}

	public function download_template()
	{
		// Lokasi template file XLSX
		$templateFilePath = './assets/file/template/WajibPajak.xlsx';

		// Nama file yang akan ditampilkan kepada pengguna
		$outputFileName = 'template_wajib_Pajak.xlsx';

		// Set header untuk download file
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $outputFileName . '"');
		header('Cache-Control: max-age=0');

		// Mengirimkan file template untuk di-download
		readfile($templateFilePath);
	}

	public function download_Kpasar()
	{
		$this->load->library('dompdf_gen');

		$data = [
			'judul' => 'Data Pasar',
			'datapasar' => $this->M_pasar->read()
		];

		$this->load->view('admin/v_wp/printKode', $data);
		$html = $this->output->get_output();

		$this->dompdf->set_paper('A4', 'portrait');

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Data_Kode_Pasar.pdf", array('Attachment' => 0));
	}





	public function excel()
	{
		$data['wp'] = $this->M_wp->tampilJoin('tbl_wp')->result();

		require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();

		$object->getProperties()->setCreator("Fatin Amiroh");
		$object->getProperties()->setLastModifiedBy("Fatin Amiroh");
		$object->getProperties()->setTitle("Data WAJIB PAJAK");

		$object->setActiveSheetIndex(0);

		$object->getActiveSheet()->setCellValue('B1', 'DATA WAJIB PAJAK ');
		$object->getActiveSheet()->setCellValue('A3', 'NO');
		$object->getActiveSheet()->setCellValue('B3', 'NAMA');
		$object->getActiveSheet()->setCellValue('C3', 'NPWPD');
		$object->getActiveSheet()->setCellValue('D3', 'NAMA PASAR');
		$object->getActiveSheet()->setCellValue('E3', 'ALAMAT');
		$object->getActiveSheet()->setCellValue('F3', 'NIK');
		$object->getActiveSheet()->setCellValue('G3', 'NO TELP');
		$object->getActiveSheet()->setCellValue('H3', 'EMAIL');

		$baris = 4;
		$no = 1;

		foreach ($data['wp'] as $key) {
			$object->getActiveSheet()->setCellValue('A' . $baris, $no++);
			$object->getActiveSheet()->setCellValue('B' . $baris, $key->nama_wp);
			$object->getActiveSheet()->setCellValue('C' . $baris, $key->npwpd);
			$object->getActiveSheet()->setCellValue('D' . $baris, $key->nama_pasar);
			$object->getActiveSheet()->setCellValue('E' . $baris, $key->alamat_wp);
			$object->getActiveSheet()->setCellValue('F' . $baris, $key->nik);
			$object->getActiveSheet()->setCellValue('G' . $baris, $key->no_telp);
			$object->getActiveSheet()->setCellValue('H' . $baris, $key->email);

			$baris++;
		}

		$filename = "Data_WP" . '.xls';


		$object->getActiveSheet()->setTitle("Data WAJIB PAJAK");
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache_Control: max-age=0');

		$writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		ob_end_clean();
		$writer->save('php://output');

		exit;
	}

	public function getPengajuan()
	{
		$id_pengajuan = $this->input->post('id_pengajuan');

		$pengajuan = $this->M_baru->getPengajuan($id_pengajuan)->result();


		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($pengajuan));
	}
}
