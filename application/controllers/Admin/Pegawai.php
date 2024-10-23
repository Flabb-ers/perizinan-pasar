<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_pegawai');

	 	if ($this->session->userdata('level')!=='Admin') {
 		redirect('Auth/index');
	 	}
	 
	}

	public function index()
	{
		$data = [ 
			'judul'=>'Data Pegawai',
			'subjudul'=>'Data Pegawai',
			'datapegawai'=>$this->M_pegawai->tampilJoin()->result()
		];
		
		$this->template->load('pages/index','admin/v_pegawai/read', $data); 
	}

	public function create()
	{

	 	if (isset($_POST['simpan'])) {
	 		$data = [
				'nama_pegawai'=> $this->input->post('nama_pegawai'),
				'id_pasar'=> $this->input->post('nama_pasar'),
				'username'=> $this->input->post('username'),
				'pass'=> md5($this->input->post('pass')),
				'level'=> $this->input->post('level'),
				'is_active' => 1,
	 		];

	 		$this->M_pegawai->addData($data);
	 		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Ditambahkan</div>');
	 		redirect('Admin/pegawai/index');
	 	}

 		$data = [
 		'judul'=>'Data Pegawai',
		'subjudul'=>'Tambah Data Pegawai',
		'datapasar'=>$this->M_pegawai->tampilPasar()->result(),
 		];
 		
 		$this->template->load('pages/index','admin/v_pegawai/create', $data); 
	}

 	public function edit ($id)
	{	

		if (isset($_POST['edit'])) {
	 		$data = [
	 		'nama_pegawai'=> $this->input->post('nama_pegawai'),
			'id_pasar'=> $this->input->post('nama_pasar'),
			'username'=> $this->input->post('username'),
			'level'=> $this->input->post('level'),
	 		];

	 		$this->M_pegawai->editData($id, $data);
	 		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Diubah</div>');
	 		redirect('Admin/pegawai/index');
	 	}

		$data = [ 
			'judul'=>'Data Pegawai',
			'subjudul'=>'Edit Data Pegawai',
			'datapegawai'=>$this->M_pegawai->tampilData($id)->row(),
			'datapasar'=>$this->M_pegawai->tampilPasar()->result(),
		];
		
		$this->template->load('pages/index','admin/v_pegawai/edit', $data); 
	}

	public function ganti ($id)
	{	

		if (isset($_POST['ganti'])) {
	 		$data = [
	 		'pass'=> md5($this->input->post('pass')),
	 		];

	 		$this->M_pegawai->editData($id, $data);
	 		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Diubah</div>');
	 		redirect('Admin/pegawai/index');
	 	}

		$data = [ 
			'judul'=>'Data Pegawai',
			'subjudul'=>'Edit Data Pegawai',
			'datapegawai'=>$this->M_pegawai->tampilData($id)->row(),
		];
		
		$this->template->load('pages/index','admin/v_pegawai/ganti_pass', $data); 
	}

	

	public function hapus($id)
	{
		$this->M_pegawai->hapusData($id);
		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Dihapus</div>');
	 		redirect('Admin/pegawai/index');
	}

	public function print()
	{
		$tanggal=date('d-m-y');
		$data = [ 
			'judul'=>'Data Pagawai',
			'subjudul'=>'Edit Data Pagawai',
			'datapegawai'=>$this->M_pegawai->tampilJoin()->result(),
			'date'=>$tanggal
		];

	 		$this->load->view('admin/v_pegawai/print', $data); 
	}

	public function cetak_pdf()
	{
		$this->load->library('dompdf_gen');

		$data = [ 
			'judul'=>'Data Pagawai',
			'subjudul'=>'Edit Data Pagawai',
			'datapegawai'=>$this->M_pegawai->tampilJoin()->result(),
		];
		$this->load->view('admin/v_pegawai/cetak_pdf', $data);

		$paper_size = 'A4';
		$orientation = 'potraid';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		//comfort ke pdf
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Data Pagawai", array('Attachment'=>0));
		
	}

		public function excel()
	{
		$data['pegawai'] = $this->M_pegawai->tampilJoin('tbl_pegawai')->result();
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();

		$object->getProperties()->setCreator("Fatin Amiroh");
		$object->getProperties()->setLastModifiedBy("Fatin Amiroh");
		$object->getProperties()->setTitle("Data Pegawai");

		$object->setActiveSheetIndex(0);

		$object->getActiveSheet()->setCellValue('B1','DATA PEGAWAI');
		$object->getActiveSheet()->setCellValue('A3', 'NO');
		$object->getActiveSheet()->setCellValue('B3', 'NAMA PEGAWAI');
		$object->getActiveSheet()->setCellValue('C3', 'PENEMPATAN');
		$object->getActiveSheet()->setCellValue('D3', 'LEVEL');

		$baris = 4;
		$no = 1;

		foreach ($data['pegawai'] as $key) {
			$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
			$object->getActiveSheet()->setCellValue('B'.$baris, $key->nama_pegawai);
			$object->getActiveSheet()->setCellValue('C'.$baris, $key->nama_pasar);
			$object->getActiveSheet()->setCellValue('D'.$baris, $key->level);

			$baris++;
		}

		$filename = "Data_Pegawai".'.xls';


		$object->getActiveSheet()->setTitle("Data Pegawai");
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache_Control: max-age=0');

		$writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		ob_end_clean();
		$writer->save('php://output');

		exit;

	}

}
