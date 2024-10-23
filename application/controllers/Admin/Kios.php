<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kios extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_kios');
	 	$this->load->model('M_pasar');
	 	$this->load->model('M_tarif');

	 	if ($this->session->userdata('level')!=='Admin') {
 		redirect('Auth/index');
	 	}
	 }

	public function index()
	{	
		$no_kioslos= $this->input->get('no_kioslos');
		$nama_pasar= $this->input->get('nama_pasar');

		$datakios= $this->M_kios->tampilJoin()->result();
		
		$data = [ 
			'judul'=>'Data Kios',
			'subjudul'=>'Data Kios',
			'datakios'=>$datakios,
		];
		
		$this->template->load('pages/index','admin/v_kios/read', $data); 
	}

	public function create()
	{

	 	if (isset($_POST['simpan'])) {

	 		// $datapimpinan = $this->M_kios->tampilJoin('tahun_ajar', ['status' => 'aktif']);
	 		// 'tahun_ajar' => $this->db->get_where('tahun_ajar', ['status' => 'aktif']),
	 		//$datapimpinan=$this->M_kios->tampilPimpinan()->result();
	 		//$tgl_daftar = $this->M_kios->tampilJoin($id)->row('tgl_daftar');
	 		$tgl_daftar = $this->input->post('tgl_daftar');
	 		$batas_berlaku = date('Y-m-d', strtotime('+2 years',strtotime($tgl_daftar)));


	 		$data = [
	 		'id_pasar' => $this->input->post('id_pasar'),
            'id_tarif' => $this->input->post('id_tarif'),
            'nama_blok' => $this->input->post('nama_blok'),
            'no_blok' => $this->input->post('no_blok'),
            'panjang' => $this->input->post('panjang'),
            'lebar' => $this->input->post('lebar'),

	 		];


	 		$this->M_kios->addData($data);
	 		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Ditambahkan</div>');
	 		redirect('admin/kios/index');
	 	}

 		$data = [
 		'judul'=>'Data Kios',
		'subjudul'=>'Tambah Data Kios',
		//'datakios'=>$this->M_kios->tampilData()->result(),
		'datapasar'=>$this->M_kios->tampilPasar()->result(),
		'datawp'=>$this->M_kios->tampilWp()->result(),
		'datatarif'=>$this->M_kios->tampilTarif()->result(),
 		];
 		
 		$this->template->load('pages/index','admin/v_kios/create', $data); 
	}

	public function edit ($id)
	{	

		if (isset($_POST['edit'])) {

			$tgl_daftar = $this->input->post('tgl_daftar');
	 		$batas_berlaku = date('Y-m-d', strtotime('+2 years',strtotime($tgl_daftar)));
	 		
	 		$data = [
	 		'id_pasar' => $this->input->post('id_pasar'),
            'id_tarif' => $this->input->post('id_tarif'),
            'nama_blok' => $this->input->post('nama_blok'),
            'no_blok' => $this->input->post('no_blok'),
            'panjang' => $this->input->post('panjang'),
            'lebar' => $this->input->post('lebar'),
	 		];

	 		$this->M_kios->editData($id, $data);
	 		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Diubah</div>');
	 		redirect('admin/kios/index');
	 	}

		$data = [ 
			'judul'=>'Data Kios',
			'subjudul'=>'Edit Data Kios',
			'datakios'=>$this->M_kios->tampilData($id)->row(),
			'datapasar'=>$this->M_kios->tampilPasar()->result(),
			'datawp'=>$this->M_kios->tampilWp()->result(),
			'datatarif'=>$this->M_kios->tampilTarif()->result(),
		];
		
		$this->template->load('pages/index','admin/v_kios/edit', $data); 
	}


	public function hapus($id) 
	{

		$this->M_kios->hapusData($id);
		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Dihapus</div>');
	 		redirect('admin/kios/index');
	}

	public function perbarui_tgl($id)
	{

        $tgl_daftar = $this->M_kios->tampilJoin($id)->row('tgl_daftar');
		$tgl_baru = date('Y-m-d', strtotime('+2 years',strtotime($tgl_daftar)));
 		$batas_berlaku = date('Y-m-d', strtotime('+2 years',strtotime($tgl_baru)));	


 		$data = [
 			'tgl_daftar'=> $tgl_baru,
 			'batas_berlaku'=> $batas_berlaku,
 		];

 		$this->M_kios->editData($id, $data);
 		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
 			Data Berhasil Diubah</div>');
	 	redirect('admin/kios/index');
 		

	}
	
	public function print()
	{
			$datakios= $this->M_kios->tampilJoin()->result();

		
		$data = [ 
			'judul'=>'Data Kios',
			'subjudul'=>'Data Kios',
			'datakios'=>$datakios,
		];

	 		$this->load->view('admin/v_kios/print', $data); 
	}

	public function importWp(){
 	
 	$file = $_FILES['file_excel']['name'];
	 	$extension = pathinfo($file,PATHINFO_EXTENSION);

	 	if($extension=='xls'){
	 		$read = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
	 	} else if($extension=='xlsx'){
	 		$read = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
	 	} else {
	 		$read = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
	 	}

	 	$spreadsheet = $read->load($_FILES['file_excel']['tmp_name']);
	 	$sheetdata = $spreadsheet->getActiveSheet()->toArray();

		$sheetcount = count ($sheetdata);

		if ($sheetcount >1)
		{	
			$data = array();
			for ($i=1; $i < $sheetcount; $i++){
				$id_pasar = $sheetdata[$i][1];
				$id_tarif = $sheetdata[$i][2];
				$nama_blok = $sheetdata[$i][3];
				$no_blok = $sheetdata[$i][4];
				$panjang = $sheetdata[$i][5];
				$lebar = $sheetdata[$i][6];

				$data[] = array(
					'id_pasar'=>$id_pasar,
					'id_tarif'=>$id_tarif,
					'nama_blok'=>$nama_blok,
					'no_blok'=>$no_blok,
					'panjang'=>$panjang,
					'lebar'=>$lebar,
				);
			}
			$insertdata = $this->M_kios->addDataImport($data);

			if($insertdata){
				$this->session->set_flashdata('message', '<div class= "alert alert-success"> 
	 			Data Berhasil Di Import</div>');
	 		redirect('Admin/Kios/index');
			}else{
				$this->session->set_flashdata('message', '<div class= "alert alert-danger"> 
	 			Data Gagal Di Import, Tolong Ulangi</div>');
	 		redirect('Admin/Kios/index');
			}
		}

 	}

    public function download_template() {
        // Lokasi template file XLSX
        $templateFilePath = './assets/file/template/Kios.xlsx';

        // Nama file yang akan ditampilkan kepada pengguna
        $outputFileName = 'template_Kios.xlsx';

        // Set header untuk download file
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$outputFileName.'"');
        header('Cache-Control: max-age=0');

        // Mengirimkan file template untuk di-download
        readfile($templateFilePath);
    }

    public function download_Kpasar() {
		$this->load->library('dompdf_gen');

		$data = [ 
			'judul'=>'Data Pasar',
			'subjudul'=>'Edit Data Pasar',
			'datapasar'=>$this->M_pasar->read()
		];
		$this->load->view('admin/v_kios/printPasar', $data);

		$paper_size = 'A4';
		$orientation = 'potraid';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		//comfort ke pdf
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Data Kode Pasar", array('Attachment'=>0));
	}

	public function download_Ktarif() {
		$this->load->library('dompdf_gen');

		$data = [ 
			'judul'=>'Data Tarif',
			'subjudul'=>'Edit Data Tarif',
			'datatarif'=>$this->M_tarif->read()->result()
		];
		$this->load->view('admin/v_kios/printTarif', $data);

		$paper_size = 'A4';
		$orientation = 'potraid';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		//comfort ke pdf
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Data Kode Pasar", array('Attachment'=>0));
	}

	public function cetak_pdf()
	{
		$this->load->library('dompdf_gen');

			$datakios= $this->M_kios->tampilJoin()->result();
		
		$data = [ 
			'judul'=>'Data Kios',
			'subjudul'=>'Data Kios',
			'datakios'=>$datakios,
		];
		$this->load->view('admin/v_kios/cetak_pdf', $data);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		//comfort ke pdf
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Data Kios", array('Attachment'=>0));
		
	}

	public function excel()
		{
			$data['kios'] = $this->M_kios->tampilJoin('tbl_kios')->result();

			require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
			require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

			$object = new PHPExcel();

			$object->getProperties()->setCreator("Fatin Amiroh");
			$object->getProperties()->setLastModifiedBy("Fatin Amiroh");
			$object->getProperties()->setTitle("DATA OBJEK PAJAK");

			$object->setActiveSheetIndex(0);

			$object->getActiveSheet()->setCellValue('B1','DATA OBJEK PAJAK ');
			$object->getActiveSheet()->setCellValue('A3', 'NO');
			$object->getActiveSheet()->setCellValue('B3', 'NAMA PASAR');
			$object->getActiveSheet()->setCellValue('C3', 'NAMA');
			$object->getActiveSheet()->setCellValue('D3', 'JENIS');
			$object->getActiveSheet()->setCellValue('E3', 'JENIS DAGANGAN');
			$object->getActiveSheet()->setCellValue('F3', 'LETAK');
			$object->getActiveSheet()->setCellValue('G3', 'NAMA BLOK');
			$object->getActiveSheet()->setCellValue('H3', 'NO BLOK');
			$object->getActiveSheet()->setCellValue('I3', 'LUAS');
			$object->getActiveSheet()->setCellValue('J3', 'TARIF');
			$object->getActiveSheet()->setCellValue('K3', 'TOTAL TARIF');
			$object->getActiveSheet()->setCellValue('L3', 'TANGGAL PERPANJANG');
			$object->getActiveSheet()->setCellValue('M3', 'BATAS BERLAKU');

			$baris = 4;
			$no = 1;

			foreach ($data['kios'] as $key) {
				$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
				$object->getActiveSheet()->setCellValue('B'.$baris, $key->nama_pasar);
				$object->getActiveSheet()->setCellValue('C'.$baris, $key->nama_wp);
				$object->getActiveSheet()->setCellValue('D'.$baris, $key->jenis);
				$object->getActiveSheet()->setCellValue('E'.$baris, $key->jenis_dagangan);
				$object->getActiveSheet()->setCellValue('F'.$baris, $key->letak_kioslos);
				$object->getActiveSheet()->setCellValue('G'.$baris, $key->nama_blokpasar);
				$object->getActiveSheet()->setCellValue('H'.$baris, $key->no_kioslos);
				$object->getActiveSheet()->setCellValue('I'.$baris, $key->luas);
				$object->getActiveSheet()->setCellValue('J'.$baris, $key->tarif);
				$object->getActiveSheet()->setCellValue('K'.$baris, $key->total);
				$object->getActiveSheet()->setCellValue('L'.$baris, $key->tgl_daftar);
				$object->getActiveSheet()->setCellValue('M'.$baris, $key->batas_berlaku);

				$baris++;
			}

			$filename = "DATA_OP".'.xls';


			$object->getActiveSheet()->setTitle("Data OBJEK PAJAK");
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'.$filename.'"');
			header('Cache_Control: max-age=0');

			$writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
			ob_end_clean();
			$writer->save('php://output');

			exit;

		}
}
