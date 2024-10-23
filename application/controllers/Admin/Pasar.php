<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasar extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_pasar');

	 	if ($this->session->userdata('level')!=='Admin') {
 		redirect('Auth/index');
	 	}
	 }

	public function index()
	{
		$data = [ 
			'judul'=>'Data Pasar',
			'subjudul'=>'Data Pasar',
			'datapasar'=>$this->M_pasar->read()
		];
		
		 //$this->load->view('pasar/v_read',$data);
		$this->template->load('pages/index','admin/v_pasar/read', $data); 
	}

	public function create()
	{

	 	if (isset($_POST['simpan'])) {
	 		$data = [
	 		'nama_pasar' => $this->input->post('nama_pasar'),
	 		'tipe_pasar' => $this->input->post('tipe_pasar'),
	 		
	 		];

	 		$this->M_pasar->addData($data);
	 		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Ditambahkan</div>');
	 		redirect('admin/pasar/index');
	 	}

 		$data = [
 		'judul'=>'Data Pasar',
		'subjudul'=>'Tambah Data Pasar',
 		];
 		
 		$this->template->load('pages/index','admin/v_pasar/create', $data); 
	}

 	public function edit ($id)
	{	

		if (isset($_POST['edit'])) {
	 		$data = [
	 		'nama_pasar' => $this->input->post('nama_pasar'),
	 		'tipe_pasar' => $this->input->post('tipe_pasar'),
	 		
	 		// 'jml_kios' => $this->input->post('jml_kios'),
	 		// 'jml_los' => $this->input->post('jml_los'),
	 		];

	 		$this->M_pasar->editData($id, $data);
	 		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Diubah</div>');
	 		redirect('admin/pasar/index');
	 	}

		$data = [ 
			'judul'=>'Data Pasar',
			'subjudul'=>'Edit Data Pasar',
			'datapasar'=>$this->M_pasar->tampilData($id)->row()
		];
		
		$this->template->load('pages/index','admin/v_pasar/edit', $data); 
	}

	public function hapus($id)
	{
		$this->M_pasar->hapusData($id);
		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Dihapus</div>');
	 		redirect('admin/pasar/index');
	}

	public function cari($id)
	{
	if (isset($_POST['cari'])) {
	 		$data = [
	 		'nama_pasar' => $this->input->post('nama_pasar'),
	 		'nama_blok' => $this->input->post('nama_blok'),
	 		'no_kl' => $this->input->post('no_kl')
	 		];

	 		$this->M_pasar->editData($id, $data);
	 		redirect('admin/pasar/index');
	 	}

		$data = [ 
			'judul'=>'Data Pasar',
			'subjudul'=>'Edit Data Pasar',
			'datapasar'=>$this->M_pasar->tampilDetail($id)->row()
		];
		
		$this->template->load('pages/index','admin/v_pasar/', $data); 
	}

	public function print()
	{

		$data = [ 
			'judul'=>'Data Pasar',
			'subjudul'=>'Edit Data Pasar',
			'datapasar'=>$this->M_pasar->read()
		];

	 		$this->load->view('admin/v_pasar/print', $data); 
	}

	public function cetak_pdf()
	{
		$this->load->library('dompdf_gen');

		$data = [ 
			'judul'=>'Data Pasar',
			'subjudul'=>'Edit Data Pasar',
			'datapasar'=>$this->M_pasar->read()
		];
		$this->load->view('admin/v_pasar/cetak_pdf', $data);

		$paper_size = 'A4';
		$orientation = 'potraid';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		//comfort ke pdf
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Data Pasar Kab Purworejo", array('Attachment'=>0));
		
	}

	public function excel()
	{
		$data['pasar'] = $this->M_pasar->read('tbl_pasar');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();

		$object->getProperties()->setCreator("Fatin Amiroh");
		$object->getProperties()->setLastModifiedBy("Fatin Amiroh");
		$object->getProperties()->setTitle("Data Pasar Kabupaten Purworejo");

		$object->setActiveSheetIndex(0);

		$object->getActiveSheet()->setCellValue('B1','DATA PASAR KABUPATEN PURWOREJO');
		$object->getActiveSheet()->setCellValue('A3', 'NO');
		$object->getActiveSheet()->setCellValue('B3', 'NAMA PASAR');
		$object->getActiveSheet()->setCellValue('C3', 'TIPE PASAR');

		$baris = 4;
		$no = 1;

		foreach ($data['pasar'] as $key) {
			$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
			$object->getActiveSheet()->setCellValue('B'.$baris, $key->nama_pasar);
			$object->getActiveSheet()->setCellValue('C'.$baris, $key->tipe_pasar);

			$baris++;
		}

		$filename = "Data_Pasar".'.xls';


		$object->getActiveSheet()->setTitle("Data Pasar");
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache_Control: max-age=0');

		$writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		ob_end_clean();
		$writer->save('php://output');

		exit;

	}

}
