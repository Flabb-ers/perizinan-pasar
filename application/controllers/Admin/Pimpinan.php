<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pimpinan extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_pimpinan');

	 	if ($this->session->userdata('level')!=='Admin') {
 		redirect('Auth/index');
	 	}
	 }

	public function index()
	{
		$data = [ 
			'judul'=>'Data Pimpinan',
			'subjudul'=>'Data Pimpinan',
			'datapimpinan'=>$this->M_pimpinan->tampilJoin()->result()
		];
		
		$this->template->load('pages/index','admin/v_pimpinan/read', $data); 
	}

	public function create()
	{

	 	if (isset($_POST['simpan'])) {
	 		$data = [
	 			'id_pegawai'=> $this->input->post('nama_pegawai'),
				'nip'=> $this->input->post('nip'),
				'jabatan'=> $this->input->post('jabatan'),
				'golongan'=> $this->input->post('golongan'),
				'periode'=> $this->input->post('periode'),
				'status' => 'Nonaktif'

	 		];

	 		$this->M_pimpinan->addData($data);
	 		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Ditambahkan</div>');
	 		redirect('Admin/pimpinan/index');
	 	}

 		$data = [
 		'judul'=>'Data Pimpinan',
		'subjudul'=>'Tambah Data Pimpinan)',
		'datapegawai'=>$this->M_pimpinan->tampilPegawai()->result(),
 		];
 		
 		$this->template->load('pages/index','admin/v_pimpinan/create', $data); 
	}

	public function edit ($id)
	{	

		if (isset($_POST['edit'])) {
	 		$data = [
	 			'id_pegawai'=> $this->input->post('nama_pegawai'),
				'nip'=> $this->input->post('nip'),
				'jabatan'=> $this->input->post('jabatan'),
				'golongan'=> $this->input->post('golongan'),
				'periode'=> $this->input->post('periode'),
	 		];

	 		$this->M_pimpinan->editData($id, $data);
	 		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Diubah</div>');
	 		redirect('Admin/pimpinan/index');
	 	}

		$data = [ 
			'judul'=>'Data Pimpinan',
			'subjudul'=>'Edit Data Pimpinan',
			'datapimpinan'=>$this->M_pimpinan->tampilData($id)->row(),
			'datapegawai'=>$this->M_pimpinan->tampilPegawai()->result(),
		];
		
		$this->template->load('pages/index','admin/v_pimpinan/edit', $data); 
	}

	public function hapus($id)
	{
		$this->M_pimpinan->hapusData($id);
		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Dihapus</div>');
	 		redirect('Admin/pimpinan/index');
	}

	public function status()
    {
        $id = $this->uri->segment(4);
        $data = array(
            'status' => $this->uri->segment(5)
        );
        $this->M_pimpinan->editData($id, $data);
        redirect('Admin/Pimpinan');
    }

	public function print()
	{

		$data = [ 
			'judul'=>'Data Pimpinan',
			'subjudul'=>'Data Pimpinan',
			'datapimpinan'=>$this->M_pimpinan->tampilJoin()->result()
		];

	 		$this->load->view('admin/v_pimpinan/print', $data); 
	}

	public function cetak_pdf()
	{
		$this->load->library('dompdf_gen');

		$data = [ 
			'judul'=>'Data Pimpinan',
			'subjudul'=>'Data Pimpinan',
			'datapimpinan'=>$this->M_pimpinan->tampilJoin()->result()
		];
		$this->load->view('admin/v_pimpinan/cetak_pdf', $data);

		$paper_size = 'A4';
		$orientation = 'potraid';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		//comfort ke pdf
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Data Pimpinan", array('Attachment'=>0));
		
	}

	public function excel()
	{
		$data['pimpinan'] = $this->M_pimpinan->tampilJoin('tbl_pimpiman')->result();

		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();

		$object->getProperties()->setCreator("Fatin Amiroh");
		$object->getProperties()->setLastModifiedBy("Fatin Amiroh");
		$object->getProperties()->setTitle("Data Pimpinan");

		$object->setActiveSheetIndex(0);

		$object->getActiveSheet()->setCellValue('B1','DATA PIMPINAN');
		$object->getActiveSheet()->setCellValue('A3', 'NO');
		$object->getActiveSheet()->setCellValue('B3', 'NAMA');
		$object->getActiveSheet()->setCellValue('C3', 'NIP');
		$object->getActiveSheet()->setCellValue('D3', 'GOLONGAN');
		$object->getActiveSheet()->setCellValue('E3', 'PERIODE');

		$baris = 4;
		$no = 1;

		foreach ($data['pimpinan'] as $key) {
			$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
			$object->getActiveSheet()->setCellValue('B'.$baris, $key->nama_pegawai);
			$object->getActiveSheet()->setCellValue('C'.$baris, $key->nip);
			$object->getActiveSheet()->setCellValue('D'.$baris, $key->golongan);
			$object->getActiveSheet()->setCellValue('E'.$baris, $key->periode);

			$baris++;
		}

		$filename = "Data_Pimpinan".'.xls';


		$object->getActiveSheet()->setTitle("Data Pimpinan");
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache_Control: max-age=0');

		$writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		ob_end_clean();
		$writer->save('php://output');

		exit;

	}

}
