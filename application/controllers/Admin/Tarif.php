<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarif extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_tarif');

	 	if ($this->session->userdata('level')!=='Admin') {
 		redirect('Auth/index');
	 	}
	 }

	public function index()
	{
		$data = [ 
			'judul'=>'Data Ketentuan Tarif',
			'subjudul'=>'Data Ketentuan Tarif',
			'datatarif'=>$this->M_tarif->read()->result()
		];
		
		$this->template->load('pages/index','admin/v_tarif/read', $data); 
	}

	public function create()
	{

	 	if (isset($_POST['simpan'])) {
	 		$data = [
	 			'tipe_pasar'=> $this->input->post('tipe_pasar'),
	 			'jenis'=> $this->input->post('jenis'),
				'letak_kioslos'=> $this->input->post('letak_kioslos'),
				'tarif'=> $this->input->post('tarif')
	 		];

	 		$this->M_tarif->addData($data);
	 		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Ditambahkan</div>');
	 		redirect('Admin/tarif/index');
	 	}

 		$data = [
 		'judul'=>'Data Ketentuan Tarif',
		'subjudul'=>'Tambah Data Ketentuan tarif)',
 		];
 		
 		$this->template->load('pages/index','admin/v_tarif/create', $data); 
	}

	public function edit ($id)
	{	

		if (isset($_POST['edit'])) {
	 		$data = [
	 			'tipe_pasar'=> $this->input->post('tipe_pasar'),
	 			'jenis'=> $this->input->post('jenis'),
				'letak_kioslos'=> $this->input->post('letak_kioslos'),
				'tarif'=> $this->input->post('tarif')
	 		];

	 		$this->M_tarif->editData($id, $data);
	 		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Diubah</div>');
	 		redirect('Admin/tarif/index');
	 	}

		$data = [ 
			'judul'=>'Data Ketentuan Tarif',
			'subjudul'=>'Edit Data Ketentuan Tarif',
			'datatarif'=>$this->M_tarif->tampilData($id)->row(),
		];
		
		$this->template->load('pages/index','admin/v_tarif/edit', $data); 
	}

	public function hapus($id)
	{
		$this->M_tarif->hapusData($id);
		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Dihapus</div>');
	 		redirect('Admin/tarif/index');
	}

		public function print()
	{

		$data = [ 
			'judul'=>'Data Ketentuan Tarif',
			'subjudul'=>'Data Ketentuan Tarif',
			'datatarif'=>$this->M_tarif->read()->result()
		];

	 		$this->load->view('admin/v_tarif/print', $data); 
	}

	public function cetak_pdf()
	{
		$this->load->library('dompdf_gen');

		$data = [ 
			'judul'=>'Data Ketentuan Tarif',
			'subjudul'=>'Data Ketentuan Tarif',
			'datatarif'=>$this->M_tarif->read()->result()
		];
		$this->load->view('admin/v_tarif/cetak_pdf', $data);

		$paper_size = 'A4';
		$orientation = 'potraid';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		//comfort ke pdf
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Data Ketentuan Tarif", array('Attachment'=>0));
		
	}

	public function excel()
	{
		$data['tarif'] = $this->M_tarif->read('tbl_tarif')->result();

		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();

		$object->getProperties()->setCreator("Fatin Amiroh");
		$object->getProperties()->setLastModifiedBy("Fatin Amiroh");
		$object->getProperties()->setTitle("Data Ketentuan Tarif");

		$object->setActiveSheetIndex(0);

		$object->getActiveSheet()->setCellValue('B1','DATA KETENTUAN TARIF');
		$object->getActiveSheet()->setCellValue('A3', 'NO');
		$object->getActiveSheet()->setCellValue('B3', 'TIPE PASAR');
		$object->getActiveSheet()->setCellValue('C3', 'JENIS');
		$object->getActiveSheet()->setCellValue('D3', 'LETAK');
		$object->getActiveSheet()->setCellValue('E3', 'TARIF');

		$baris = 4;
		$no = 1;

		foreach ($data['tarif'] as $key) {
			$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
			$object->getActiveSheet()->setCellValue('B'.$baris, $key->tipe_pasar);
			$object->getActiveSheet()->setCellValue('C'.$baris, $key->jenis);
			$object->getActiveSheet()->setCellValue('D'.$baris, $key->letak_kioslos);
			$object->getActiveSheet()->setCellValue('E'.$baris, $key->tarif);

			$baris++;
		}

		$filename = "Data_Ketentuan_Tarif".'.xls';


		$object->getActiveSheet()->setTitle("Data Ketentuan Tarif");
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache_Control: max-age=0');

		$writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		ob_end_clean();
		$writer->save('php://output');

		exit;

	}

}
