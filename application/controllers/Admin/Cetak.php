<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_pengajuan');

	 	if ($this->session->userdata('level')!=='Admin') {
 		redirect('Auth/index');
	 	}
	 }

	public function index()
	{	
		$data = [ 
			'judul'=>'Data Pengajuan',
			'subjudul'=>'Data Pengajuan',
			'datapengajuan'=>$this->M_pengajuan->tampilDataCetak()->result()
		];
		
		$this->template->load('pages/index','admin/v_cetak/read', $data); 
	}


	public function print($id)
	{

		$data = [ 
			'datakios'=>$this->M_pengajuan->tampilKios()->row(),
			'datapengajuan'=>$this->M_pengajuan->tampilData($id)->row(),
			'datapasar'=>$this->M_pengajuan->tampilPasar()->result(),
			'print'=>$this->M_pengajuan->print($id)->result(),
			'datatarif'=>$this->M_pengajuan->tampiltarif()->result(),
			'datapimpinan'=>$this->M_pengajuan->tampilPimpinan()->result(),
			'datapegawai'=>$this->M_pengajuan->tampilPegawai($id)->result(),
		];

	 		$this->load->view('admin/v_cetak/print', $data); 
	}

	public function cetak_pdf($id)
	{

		$data = [ 
			'datakios'=>$this->M_pengajuan->tampilKios()->row(),
			'datapengajuan'=>$this->M_pengajuan->tampilData($id)->row(),
			'datapasar'=>$this->M_pengajuan->tampilPasar()->result(),
			'print'=>$this->M_pengajuan->print($id)->result(),
			'datatarif'=>$this->M_pengajuan->tampiltarif()->result(),
			'datapimpinan'=>$this->M_pengajuan->tampilPimpinan()->result(),
			'datapegawai'=>$this->M_pengajuan->tampilPegawai($id)->result(),
		];
		$this->load->view('admin/v_cetak/cetak_pdf', $data);
		$this->load->library('dompdf_gen');

		$paper_size = 'Legal';
		$orientation = 'potraid';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		//comfort ke pdf
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Cetak Surat Izin", array('Attachment'=>0));
		
	}

}
