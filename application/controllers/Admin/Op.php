<?php

use PhpOffice\PhpSpreadsheet\IOFactory;

defined('BASEPATH') or exit('No direct script access allowed');

class Op extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_op');
		$this->load->model('M_wp');
		$this->load->model('M_objek');
		$this->load->model('M_pasar');
		$this->load->model('M_baru');
		$this->load->model('M_kios');
		$this->load->model('M_jenis');

		if ($this->session->userdata('level') !== 'Admin') {
			redirect('Auth/index');
		}
	}

	public function index()
	{

		$dataop = $this->M_op->getActiveOP()->result();


		$data = [
			'judul' => 'Data Op',
			'subjudul' => 'Data Op',
			'dataop' => $dataop,
		];

		$this->template->load('pages/index', 'Admin/v_op/read', $data);
	}

	public function create($id)
	{

		$data = [
			'judul' => 'Data Op',
			'subjudul' => 'Tambah Data Op',
			'dataop' => $this->M_objek->tampilDetail2()->result(),
			'datapengajuan' => $this->M_op->tampilPengajuan()->result(),
			'dataobjek' => $this->M_objek->tampilObjek($id)->row(),
		];

		$this->template->load('pages/index', 'Admin/v_op/create', $data);
	}


	public function save()
	{
		$source_path = FCPATH . 'template/img/syarat/';
		$destination_path = FCPATH . 'template/img/gambarop/';

		$pas_foto = $this->input->post('pas_foto');
		copy($source_path . $pas_foto, $destination_path . $pas_foto);

		$tgl_daftar = $this->input->post('tgl_daftar');
		$batas_berlaku = date('Y-m-d', strtotime('+2 years', strtotime($tgl_daftar)));

		date_default_timezone_set('Asia/Jakarta');
		$data = [
			'id_pengajuan' => $this->input->post('id_pengajuan'),
			'id_jenis' => $this->input->post('id_jenis'),
			'id_objek' => $this->input->post('id_objek'),
			'npwrd' => $this->input->post('npwrd'),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'nama_pasar' => $this->input->post('nama_pasar'),
			'nama_blok' => $this->input->post('nama_blok'),
			'no_blok' => $this->input->post('no_blok'),
			'jenis' => $this->input->post('jenis'),
			'no_telp' => $this->input->post('no_telp'),
			'email' => $this->input->post('email'),
			'id_kios' => $this->input->post('id_kios'),
			'tgl_daftar' => $tgl_daftar,
			'batas_berlaku' => $batas_berlaku,
			'pas_foto' => $pas_foto,
			'updated_at' => date('Y-m-d H:i:s'),
		];

		$data_pengajuan = array(
			'status_op' => 'Sudah',
		);

		$id_pengajuan = $this->input->post('id_pengajuan');
		$this->M_baru->editData($id_pengajuan, $data_pengajuan);


		$npwrd = $this->input->post('npwrd');
		$getNPWRD = $this->M_op->getNPWRD($npwrd);

		if ($getNPWRD > 3) {
			$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Maaf NPWRD tersebut telah memiliki 3 kios </div>');
			redirect('Admin/Objek/');
		} else {
			$this->M_op->addData($data);
			$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Ditambahkan</div>');
			redirect('Admin/Objek/');
		}
	}


	public function update($id)
	{
		if (isset($_POST['edit'])) {

			$tgl_daftar = $this->input->post('tgl_daftar');
			$batas_berlaku = date('Y-m-d', strtotime('+2 years', strtotime($tgl_daftar)));

			$data = [
				'npwrd' => $this->input->post('npwrd'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'nama_pasar' => $this->input->post('nama_pasar'),
				'nama_blok' => $this->input->post('nama_blok'),
				'no_blok' => $this->input->post('no_blok'),
				'tgl_daftar' => $tgl_daftar,
				'batas_berlaku' => $batas_berlaku,
			];

			$id_objek = $this->M_op->getIdObjekFromWajibPajak($id);

			if ($id_objek) {
				$this->M_op->editData($id, $data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success"> 
                Data Berhasil Diubah</div>');
				redirect('Admin/Objek/detail/' . $id_objek);
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger"> 
                ID Objek tidak ditemukan</div>');
				redirect('Admin/Objek');
			}
		}
	}


	public function edit($id)
	{
		$data = [
			'judul' => 'Data Op',
			'subjudul' => 'Edit Data Op',
			'dataop' => $this->M_op->tampilData3($id),
			'datapasar' => $this->M_op->tampilJoin()->result(),
		];

		$this->template->load('pages/index', 'Admin/v_op/edit', $data);
	}


	public function proses($id)
	{

		if (isset($_POST['proses'])) {

			$source_path = FCPATH . 'template/img/syarat2/';
			$destination_path = FCPATH . 'template/img/gambarop/';

			$pas_foto = $this->input->post('pas_foto');
			copy($source_path . $pas_foto, $destination_path . $pas_foto);

			unlink(FCPATH . ('template/img/gambarop/' . $this->input->post('pas_foto_lama')));

			$tgl_daftar = $this->M_op->tampilData($id)->row('tgl_daftar');
			$tgl_baru = date('Y-m-d', strtotime('+2 years', strtotime($tgl_daftar)));
			$batas_berlaku = date('Y-m-d', strtotime('+2 years', strtotime($tgl_baru)));

			$data = [
				'id_pengajuan' => $this->input->post('id_pengajuan'),
				'tgl_daftar' => $tgl_baru,
				'batas_berlaku' => $batas_berlaku,
				'pas_foto' => $pas_foto,
			];

			$data_pengajuan = array(
				'status_op' => "Sudah",
			);

			$id_pengajuan = $this->input->post('id_pengajuan');
			$this->M_baru->editData($id_pengajuan, $data_pengajuan);

			$this->M_op->editData($id, $data);
			$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Diubah</div>');
			redirect('Admin/Objek/detail/' . $id);
		}

		$data = [
			'judul' => 'Data Op',
			'subjudul' => 'Edit Data Op',
			'dataop' => $this->M_op->tampilData($id)->row(),
			'datapasar' => $this->M_op->tampilJoin()->result(),
			'datapengajuan' => $this->M_op->tampilProsesPengajuan()->result(),
		];

		$this->template->load('pages/index', 'Admin/v_op/proses', $data);
	}


	public function hapus($id)
	{

		$this->M_op->hapusData($id);
		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Dihapus</div>');
		redirect('Admin/Objek/');
	}


	public function getPengajuan()
	{
		$id_pengajuan = $this->input->post('id_pengajuan');

		$pengajuan = $this->M_baru->getPengajuan($id_pengajuan)->result();


		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($pengajuan));
	}



	public function importWp()
	{
		$file = $_FILES['file_excel']['name'];
		$extension = pathinfo($file, PATHINFO_EXTENSION);

		if (!in_array($extension, ['xls', 'xlsx'])) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Format file tidak valid. Harap gunakan file Excel (.xls atau .xlsx).</div>');
			redirect('Admin/Objek');
			return;
		}

		$reader = $extension == 'xls' ? new \PhpOffice\PhpSpreadsheet\Reader\Xls() : new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		$spreadsheet = $reader->load($_FILES['file_excel']['tmp_name']);
		$sheetdata = $spreadsheet->getActiveSheet()->toArray();

		$data = [];
		$sukses = false;

		for ($i = 1; $i < count($sheetdata); $i++) {
			if (isset($sheetdata[$i][1]) && $sheetdata[$i][1] != '') {
				$data[] = ['id_wajib_pajak' => $sheetdata[$i][1]];
			}
		}

		if (!empty($data)) {
			$sukses = $this->M_op->addImportWp($data);
			$sukses = true;
		}

		if ($sukses == false) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data Gagal Di Import atau Tidak ada data valid.</div>');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">Data Berhasil Di Import</div>');
		}
		redirect('Admin/Objek');
	}




	public function download_template()
	{
		$templateFilePath = './assets/file/template/DetailObjekPajak.xlsx';

		$outputFileName = 'template_DetailObjekPajak.xlsx';

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $outputFileName . '"');
		header('Cache-Control: max-age=0');

		readfile($templateFilePath);
	}


	public function download_templateWP()
	{
		$templateFilePath = './assets/file/template/ObjekPajak.xlsx';
		$outputFileName = 'template_ObjekPajak.xlsx';

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $outputFileName . '"');
		header('Cache-Control: max-age=0');
		readfile($templateFilePath);
	}


	public function download_Kios()
	{
		$this->load->library('dompdf_gen');

		$data = [
			'judul' => 'Data Kios',
			'subjudul' => 'Edit Data Kios',
			'datakios' => $this->M_op->tampilJoinKioss()->result(),
		];
		$this->load->view('Admin/v_op/printKios', $data);

		$paper_size = 'A4';
		$orientation = 'potraid';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		//comfort ke pdf
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Data Kode Kios", array('Attachment' => 0));
	}

	public function download_Jenis()
	{
		$this->load->library('dompdf_gen');

		$data = [
			'judul' => 'Data Jenis',
			'subjudul' => 'Edit Data Jenis',
			'datajenis' => $this->M_jenis->read()->result()
		];
		$this->load->view('admin/v_op/printJenis', $data);

		$paper_size = 'A4';
		$orientation = 'potraid';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		//comfort ke pdf
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Data Kode Jenis", array('Attachment' => 0));
	}

	// public function download_OP()
	// {
	// 	$this->load->library('dompdf_gen');

	// 	$data = [
	// 		'judul' => 'Data Objek Pajak',
	// 		'subjudul' => 'Edit Data Objek Pajak',
	// 		'dataop' => $this->M_op->getActiveOP()->result()
	// 	];
	// 	$this->load->view('Admin/v_op/pintOP', $data);

	// 	$paper_size = 'A4';
	// 	$orientation = 'potraid';
	// 	$html = $this->output->get_output();
	// 	$this->dompdf->set_paper($paper_size, $orientation);

	// 	$this->dompdf->load_html($html);
	// 	$this->dompdf->render();
	// 	$this->dompdf->stream("Data Kode Objek Retribusi", array('Attachment' => 0));
	// }

	public function download_OP()
	{
		$this->load->library('dompdf_gen');

		$data = [
			'judul' => 'Data Objek Pajak',
			'subjudul' => 'Laporan Data Objek Pajak',
			'dataop' => $this->M_op->getObjekWithNamaWp()
		];

		$this->load->view('Admin/v_op/pintOP', $data);

		$paper_size = 'A4';
		$orientation = 'portrait';
		$html = $this->output->get_output();

		$this->dompdf->set_paper($paper_size, $orientation);
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Data_Obyek_Pajak.pdf", array('Attachment' => 0));
	}


	public function download_WP()
	{
		$this->load->library('dompdf_gen');

		$data = [
			'judul' => 'Data Objek Pajak',
			'subjudul' => 'Edit Data Objek Pajak',
			'datawp' => $this->M_wp->read()->result()
		];
		$this->load->view('admin/v_op/printWP', $data);

		$paper_size = 'A4';
		$orientation = 'potraid';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);


		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Data Kode Wajib Retribusi", array('Attachment' => 0));
	}
	public function importOp()
	{
		$file = $_FILES['excel_file']['tmp_name'];

		if ($file) {
		} else {
		}

		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
		$sheetData = $spreadsheet->getActiveSheet()->toArray();

		foreach ($sheetData as $key => $row) {
			if ($key === 0) {
				continue;
			}

			$id_objek = $row[1];
			$id_kios = $row[2];
			$id_jenis = $row[3];
			$jenis = $row[4];
			$tanggal_daftar = $row[5];
			$batas = $row[6];

			$objek = $this->M_objek->getById($id_objek);

			if ($objek) {
				$wp = $this->M_wp->getById($objek->id_wajib_pajak);
				$kios = $this->M_kios->getById($id_kios);

				if ($kios) {
					$pasar = $this->M_pasar->getById($kios->id_pasar);

					$data = [
						'id_objek'     => $id_objek,
						'id_kios'      => $id_kios,
						'id_jenis'     => $id_jenis,
						'jenis'        => $jenis,
						'tgl_daftar'   => $tanggal_daftar,
						'batas_berlaku' => $batas,
						'status_op'    => 'sudah',
						'nama'      => $wp ? $wp->nama : null,
						'alamat'    => $wp ? $wp->alamat : null,
						'npwrd'     => $wp ? $wp->npwrd : null,
						'no_telp'   => $wp ? $wp->no_telp : null,
						'email'     => $wp ? $wp->email : null,
						'nama_blok'    => $kios->nama_blok,
						'no_blok'      => $kios->no_blok,
						'nama_pasar'   => $pasar ? $pasar->nama_pasar : null,
					];

					$insertdata = $this->M_op->addDataImport($data);
				}
			}
		}

		if ($insertdata) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">Data Berhasil Di Import</div>');
			redirect('Admin/Objek/');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data Gagal Di Import, Tolong Ulangi</div>');
			redirect('Admin/Objek/');
		}
	}
}
