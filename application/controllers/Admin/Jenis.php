<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_jenis');

		if ($this->session->userdata('level') !== 'Admin') {
			redirect('Auth/index');
		}
	}

	public function index()
	{

		$data = [
			'dataselasar' => $this->M_jenis->read()->result(),
		];

		$this->template->load('pages/index', 'Admin/v_jenis/read', $data);
	}

	public function create()
	{

		if (isset($_POST['simpan'])) {

			$data = [
				'jenis_dagangan' => $this->input->post('jenis_dagangan'),
			];


			$this->M_jenis->addData($data);
			$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Ditambahkan</div>');
			redirect('Admin/Jenis/index');
		}

		$data = [
			'judul' => 'Data Jenis Dagangan',
			'subjudul' => 'Tambah Data Jenis Dagangan',
		];

		$this->template->load('pages/index', 'Admin/v_jenis/create', $data);
	}

	public function edit($id)
	{

		if (isset($_POST['edit'])) {

			$data = [
				'jenis_dagangan' => $this->input->post('jenis_dagangan'),
			];

			$this->M_jenis->editData($id, $data);
			$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Diubah</div>');
			redirect('Admin/Jenis/index');
		}

		$data = [
			'judul' => 'Data Jenis Dagangan',
			'subjudul' => 'Tambah Data Jenis Dagangan',
			'datajenis' => $this->M_jenis->tampilData($id)->row(),
		];

		$this->template->load('pages/index', 'Admin/v_jenis/edit', $data);
	}


	public function hapus($id)
	{

		$this->M_jenis->hapusData($id);
		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Dihapus</div>');
		redirect('Admin/Jenis/index');
	}



	public function download_template()
	{
		$templateFilePath = './assets/file/template/template_jenis.xlsx';

		$outputFileName = 'template_jenis.xlsx';

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $outputFileName . '"');
		header('Cache-Control: max-age=0');

		readfile($templateFilePath);
	}

	public function import()
{
    $file = $_FILES['file_excel']['name'];
    $extension = pathinfo($file, PATHINFO_EXTENSION);

    if ($extension == 'xls') {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
    } elseif ($extension == 'xlsx') {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    } else {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    }

    $spreadsheet = $reader->load($_FILES['file_excel']['tmp_name']);
    $sheetdata = $spreadsheet->getActiveSheet()->toArray();
    $sheetcount = count($sheetdata);

    if ($sheetcount > 1) {
        $data = array();
        for ($i = 1; $i < $sheetcount; $i++) {
            $data[] = array(
                'jenis_dagangan' => $sheetdata[$i][1], 
            );
        }
        if (!empty($data)) {
            $this->M_jenis->addDataBatch($data);
        }

        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data Berhasil Diimpor</div>');
        redirect('Admin/Jenis/index');
    }
}

}
