<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pengajuan');
		$this->load->model('M_baru');
		$this->load->model('M_op');
		$this->load->model('M_wp');


		if ($this->session->userdata('level') !== 'Pasar') {
			redirect('auth');
		}
	}

	public function index()
	{
		$nama_pasar = $this->session->userdata('nama_pasar');
		$datapengajuan = $this->M_pengajuan->tampilDataCetakPasar($nama_pasar)->result();
		$dataop = $this->M_op->tampilWherePasar($nama_pasar)->result();

		$data = [
			'judul' => 'Data Pengajuan',
			'subjudul' => 'Data Pengajuan',
			'datapengajuan' => $datapengajuan,
			'dataop' => $dataop,
		];

		$this->template->load('pages/index', 'pasar/v_pengajuan/read', $data);
	}

	public function create()
	{
		if (isset($_POST['simpan'])) {
			//img1
			$name_images = $_FILES['sp_kepala']['name'];
			$type_images = $_FILES['sp_kepala']['type'];
			$tmp_images = $_FILES['sp_kepala']['tmp_name'];
			//img2
			$name_images = $_FILES['sp_pemilik']['name'];
			$type_images = $_FILES['sp_pemilik']['type'];
			$tmp_images = $_FILES['sp_pemilik']['tmp_name'];
			//img3
			$name_images = $_FILES['surat_pernyataan']['name'];
			$type_images = $_FILES['surat_pernyataan']['type'];
			$tmp_images = $_FILES['surat_pernyataan']['tmp_name'];
			//img4
			$name_images = $_FILES['ktp_pemilik']['name'];
			$type_images = $_FILES['ktp_pemilik']['type'];
			$tmp_images = $_FILES['ktp_pemilik']['tmp_name'];
			//img5
			$name_images = $_FILES['pas_foto']['name'];
			$type_images = $_FILES['pas_foto']['type'];
			$tmp_images = $_FILES['pas_foto']['tmp_name'];

			//upload img
			if (!empty($tmp_images)) {
				if (
					$type_images != "image/jpeg"
					and $type_images != "image/jpg"
					and $type_images != "image/png"
				) {
					echo "<script>alert('Format yang digunakan jpeg|jpg|png');</script>";
					redirect($this->redirect, 'refresh');
				} else {
					$sp_kepala =
						UploadImg($_FILES['sp_kepala'], './template/img/syarat2/', 'sp_kepala', 500);
					$sp_pemilik =
						UploadImg($_FILES['sp_pemilik'], './template/img/syarat2/', 'sp_pemilik', 500);
					$surat_pernyataan =
						UploadImg($_FILES['surat_pernyataan'], './template/img/syarat2/', 'surat_pernyataan', 500);
					$ktp_pemilik =
						UploadImg($_FILES['ktp_pemilik'], './template/img/syarat2/', 'ktp_pemilik', 500);
					$pas_foto =
						UploadImg($_FILES['pas_foto'], './template/img/syarat2/', 'pas_foto', 500);

					$data = [

						'nama' => $this->input->post('nama'),
						'nik' => $this->input->post('nik'),
						'npwrd' => $this->input->post('npwrd'),
						'alamat' => $this->input->post('alamat'),
						'pekerjaan' => $this->input->post('pekerjaan'),
						'no_telp' => $this->input->post('no_telp'),
						'email' => $this->input->post('email'),
						'id_jenis' => $this->input->post('id_jenis'),
						'tanggal' => $this->input->post('tanggal'),
						'sp_kepala' => $sp_kepala,
						'sp_pemilik' => $sp_pemilik,
						'surat_pernyataan' => $surat_pernyataan,
						'ktp_pemilik' => $ktp_pemilik,
						'pas_foto' => $pas_foto,
						'status_npwrd' => 'Sudah',
						'id_kios' => $this->input->post('id_kios'),
						'jenis_pengajuan' => 'Perpanjang',
						'status_op' => 'Belum',
						'status' => 'Proses',
						'keterangan' => ''

					];
					$this->M_pengajuan->addData($data);
					$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Ditambahkan</div>');
					redirect('pasar/pengajuan/index');
				}
			}
		}

		$nama_pasar = $this->session->userdata('nama_pasar');
		$datapengajuan = $this->M_pengajuan->tampilJoinwhere($nama_pasar)->result();

		$data = [
			'judul' => 'Data Baru',
			'subjudul' => 'Tambah Data Baru',
			'datapengajuan' => $datapengajuan,
			'datawp' => $this->M_pengajuan->tampilWp()->result(),
		];
		$this->template->load('pages/index', 'pasar/v_pengajuan/create', $data);
	}

	// public function menampilkan_tarif(){
	//        $id_kios = $_POST['id_kios'];
	//        $s = "SELECT id_tarif FROM tbl_kios WHERE id_kios='$id_kios'";
	//    $res = $this->db->query($s)->row_array();
	//    echo json_encode($res);
	//    }

	public function proses($id)
	{

		$data = [

			'judul' => 'Data Pengajuan',
			'subjudul' => 'Tambah Data Pengajuan',
			'datakios' => $this->M_pengajuan->tampilKios()->result(),
			'datapengajuan' => $this->M_pengajuan->tampilData2($id)->row()
		];
		$this->template->load('pages/index', 'pasar/v_pengajuan/proses', $data);
	}

	public function UpdateProses($id)
	{

		$data = [
			'status' => $this->input->post('status'),
			'keterangan' => $this->input->post('keterangan'),
		];

		// $dataOp = [
		// 'status'=> $this->input->post('status'),
		// ];
		// $id_objek_pajak = $this->input->post('id_objek_pajak');
		// $this->M_op->editData($id_objek_pajak, $dataOp);

		$this->M_pengajuan->editData($id, $data);
		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Diubah</div>');
		redirect('pasar/pengajuan/index');
	}

	public function edit($id)
	{
		$nama_pasar = $this->session->userdata('nama_pasar');
		$dataop = $this->M_op->tampilWherePasar($nama_pasar)->result();

		$data = [
			'judul' => 'Data Pengajuan',
			'subjudul' => 'Tambah Data Pengajuan',
			'datakios' => $this->M_pengajuan->tampilKios()->result(),
			'datapengajuan' => $this->M_pengajuan->tampilData2($id)->row(),
			'dataop' => $dataop,
		];
		$this->template->load('pages/index', 'pasar/v_pengajuan/edit', $data);
	}

	public function update($id)
	{

		$allowed_types = ['image/jpeg', 'image/jpg', 'image/png'];

		$files = [
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
				$uploadedFiles[$file] = UploadImg($_FILES[$file], './template/img/syarat2/', $file, 500);
				unlink(FCPATH . 'template/img/syarat2/' . $this->input->post($file . '_lama2'));
			}
		}

		$data = [
			'nik' => $this->input->post('nik'),
			'npwrd' => $this->input->post('npwrd'),
			'alamat' => $this->input->post('alamat'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'no_telp' => $this->input->post('no_telp'),
			'email' => $this->input->post('email'),
			'tanggal' => $this->input->post('tanggal'),
			'sp_kepala' => $this->input->post('sp_kepala') ? 1 : 0
		];

		$data = array_merge($data, $uploadedFiles);

		$this->M_pengajuan->editData($id, $data);
		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
				Data Berhasil Ditambahkan</div>');
		redirect('pasar/pengajuan/index');
	}

	public function hapus($id)
	{

		$foto = $this->M_pengajuan->tampilData($id)->row_array();

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


		$this->M_pengajuan->hapusData($id);
		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Dihapus</div>');
		redirect('pasar/pengajuan/index');
	}

	public function status($id)
	{
		$id = $this->uri->segment(4);
		$data = array(
			'status' => $this->uri->segment(5)
		);
		$this->M_pengajuan->update($id, $data);
		redirect('pasar/pengajuan');
	}


	public function print()
	{

		$data = [
			'judul' => 'Data Pengajuan',
			'subjudul' => 'Data Pengajuan',
			'datapengajuan' => $this->M_pengajuan->tampilJoin()->result()
		];

		$this->load->view('pasar/v_pengajuan/print', $data);
	}

	public function cetak_pdf()
	{
		$this->load->library('dompdf_gen');

		$data = [
			'judul' => 'Data Pengajuan',
			'subjudul' => 'Data Pengajuan',
			'datapengajuan' => $this->M_pengajuan->tampilJoin()->result()
		];
		$this->load->view('pasar/v_pengajuan/cetak_pdf', $data);

		$paper_size = 'A4';
		$orientation = 'potraid';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		//comfort ke pdf
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Data Perpanjangan Perizinan", array('Attachment' => 0));
	}

	public function excel()
	{
		$data['pengajuan'] = $this->M_pengajuan->tampilJoin('tbl_permohonan')->result();

		require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();

		$object->getProperties()->setCreator("Fatin Amiroh");
		$object->getProperties()->setLastModifiedBy("Fatin Amiroh");
		$object->getProperties()->setTitle("DATA PERPANJANGAN PERIZINAN");

		$object->setActiveSheetIndex(0);

		$object->getActiveSheet()->setCellValue('B1', 'DATA PERPANJANGAN PERIZINAN ');
		$object->getActiveSheet()->setCellValue('A3', 'NO');
		$object->getActiveSheet()->setCellValue('B3', 'NAMA PASAR');
		$object->getActiveSheet()->setCellValue('C3', 'NAMA');
		$object->getActiveSheet()->setCellValue('D3', 'TANGGAL PENGAJUAN');

		$baris = 4;
		$no = 1;

		foreach ($data['pengajuan'] as $key) {
			$object->getActiveSheet()->setCellValue('A' . $baris, $no++);
			$object->getActiveSheet()->setCellValue('B' . $baris, $key->nama_pasar);
			$object->getActiveSheet()->setCellValue('C' . $baris, $key->nama_wp);
			$object->getActiveSheet()->setCellValue('D' . $baris, $key->tanggal);

			$baris++;
		}

		$filename = "DATA_PERPANJANGAN_PERIZINAN" . '.xls';


		$object->getActiveSheet()->setTitle("Data PERPANJANGAN PERIZINAN");
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

		$pengajuan = $this->M_pengajuan->getPengajuan($id_pengajuan)->result();


		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($pengajuan));
	}
}
