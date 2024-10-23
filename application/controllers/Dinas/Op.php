<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Op extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_op');
	 	$this->load->model('M_objek');
	 	$this->load->model('M_baru');

	 	if ($this->session->userdata('level')!=='Dinas') {
 		redirect('auth');
	 	}
	 }

		public function index()
	{	

		$dataop= $this->M_op->getActiveOP()->result();

		
		$data = [ 
			'judul'=>'Data Op',
			'subjudul'=>'Data Op',
			'dataop'=>$dataop,
		];
		
		$this->template->load('pages/index','Dinas/v_op/read', $data); 
	}

	public function create($id)
	{
		$data = [
 		'judul'=>'Data Op',
		'subjudul'=>'Tambah Data Op',
		'dataop'=>$this->M_objek->tampilDetail2()->result(),
		'datapengajuan'=>$this->M_op->tampilPengajuan()->result(),
		'dataobjek'=>$this->M_objek->tampilObjek($id)->row(),
 		];
 		
 		$this->template->load('pages/index','Dinas/v_op/create', $data); 
	}



	public function save()
	{

	 		$source_path=FCPATH. 'template/img/syarat/'; //path lengkap ke direktori sumber
	 		$destination_path=FCPATH. 'template/img/gambarop/';

	 		$pas_foto=$this->input->post('pas_foto');
	 		copy($source_path.$pas_foto, $destination_path.$pas_foto);

	 		$tgl_daftar = $this->input->post('tgl_daftar');
	 		$batas_berlaku = date('Y-m-d', strtotime('+2 years',strtotime($tgl_daftar)));

			 		$data = [
			 			'id_pengajuan'=> $this->input->post('id_pengajuan'),
			 			'id_jenis'=> $this->input->post('id_jenis'),
			 			'id_objek'=> $this->input->post('id_objek'),
			 			'npwrd'=> $this->input->post('npwrd'),
			 			'nama'=> $this->input->post('nama'),
			 			'alamat'=> $this->input->post('alamat'),
			 			'nama_pasar'=> $this->input->post('nama_pasar'),
			 			'nama_blok'=> $this->input->post('nama_blok'),
			 			'no_blok'=> $this->input->post('no_blok'),
			 			'jenis'=> $this->input->post('jenis'),
			 			'no_telp'=> $this->input->post('no_telp'),
			 			'email'=> $this->input->post('email'),
			 			'id_kios'=> $this->input->post('id_kios'),
			 			'tgl_daftar'=> $tgl_daftar,
			 			'batas_berlaku'=> $batas_berlaku,
			 			'pas_foto'=> $pas_foto,
			 		];

	 		$data_pengajuan = array(
            'status_op' => 'Sudah',
        	);

	 		$id_pengajuan = $this->input->post('id_pengajuan');
	 		$this->M_baru->editData($id_pengajuan, $data_pengajuan);

        
	        $npwrd = $this->input->post('npwrd');
			$getNPWRD = $this->M_op->getNPWRD($npwrd);

 			if ($getNPWRD > 3){
 				$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Maaf NPWRD tersebut telah memiliki 3 kios </div>');
 				redirect('Dinas/Objek/');
 			}else{
	        $this->M_op->addData($data);
	 		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Ditambahkan</div>');
	 		redirect('Dinas/Objek/');
	 		}
			
	}


	public function edit ($id)
	{	

		if (isset($_POST['edit'])) {

			$tgl_daftar = $this->input->post('tgl_daftar');
	 		$batas_berlaku = date('Y-m-d', strtotime('+2 years',strtotime($tgl_daftar)));
	 		
	 		$data = [
	 			'npwrd'=> $this->input->post('npwrd'),
	 			'nama'=> $this->input->post('nama'),
	 			'alamat'=> $this->input->post('alamat'),
	 			'nama_pasar'=> $this->input->post('nama_pasar'),
			 	'nama_blok'=> $this->input->post('nama_blok'),
			 	'no_blok'=> $this->input->post('no_blok'),
	 			'tgl_daftar'=> $tgl_daftar,
	 			'batas_berlaku'=> $batas_berlaku,
	 		];

	 		$this->M_op->editData($id, $data);
	 		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Diubah</div>');
	 		redirect('Dinas/Objek/');
	 	}

		$data = [ 
			'judul'=>'Data Op',
			'subjudul'=>'Edit Data Op',
			'dataop'=>$this->M_op->tampilData2($id)->row(),
			'datapasar'=>$this->M_op->tampilJoin()->result(),
		];
		
		$this->template->load('pages/index','Dinas/v_op/edit', $data); 
	}

	public function proses ($id)
	{	

		if (isset($_POST['proses'])) {

			$source_path=FCPATH. 'template/img/syarat2/'; //path lengkap ke direktori sumber
	 		$destination_path=FCPATH. 'template/img/gambarop/';

	 		$pas_foto=$this->input->post('pas_foto');
	 		copy($source_path.$pas_foto, $destination_path.$pas_foto);

	 		unlink(FCPATH.('template/img/gambarop/'.$this->input->post('pas_foto_lama')));

			$tgl_daftar = $this->M_op->tampilData($id)->row('tgl_daftar');
			$tgl_baru = date('Y-m-d', strtotime('+2 years',strtotime($tgl_daftar)));
	 		$batas_berlaku = date('Y-m-d', strtotime('+2 years',strtotime($tgl_baru)));	
	 		
	 		$data = [
	 			'id_pengajuan'=> $this->input->post('id_pengajuan'),
	 			'tgl_daftar'=> $tgl_baru,
 				'batas_berlaku'=> $batas_berlaku,
 				'pas_foto'=> $pas_foto,
	 		];

	 		$data_pengajuan = array(
            'status_op' => "Sudah",
	        );

	        $id_pengajuan = $this->input->post('id_pengajuan');
	        $this->M_baru->editData($id_pengajuan, $data_pengajuan);

	 		$this->M_op->editData($id, $data);
	 		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Diubah</div>');
	 		redirect('Dinas/Objek/');
	 	}

		$data = [ 
			'judul'=>'Data Op',
			'subjudul'=>'Edit Data Op',
			'dataop'=>$this->M_op->tampilData($id)->row(),
			'datapasar'=>$this->M_op->tampilJoin()->result(),
			'datapengajuan'=>$this->M_op->tampilProsesPengajuan()->result(),
		];
		
		$this->template->load('pages/index','Dinas/v_op/proses', $data); 
	}


	public function hapus($id) 
	{

		$this->M_op->hapusData($id);
		$this->session->set_flashdata('pesan', '<div class= "alert alert-success"> 
	 			Data Berhasil Dihapus</div>');
	 		redirect('Dinas/Objek/');
	}


	public function getPengajuan(){
		$id_pengajuan = $this->input->post('id_pengajuan');

		$pengajuan = $this->M_baru->getPengajuan($id_pengajuan)->result();


		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($pengajuan));
	}
}
