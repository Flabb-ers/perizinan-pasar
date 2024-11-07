<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	
	public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('M_auth');
	 }

	public function index()
	{
		$data = [ 
			'datapasar'=>$this->M_auth->tampilPasar()->result(),
		];

		$this->load->view('v_login', $data);

	}

	// public function pasar()
	// {
		
	// 	$data = [ 
	// 		'datapasar'=>$this->M_auth->tampilPasar()->result(),
	// 	];

	// 	$this->load->view('v_loginpasar', $data);
	// }

	public function prosesloginpasar()
	{	

		if (isset($_POST['login'])) {
		$username = $this->input->post('username');
		$level= $this->input->post('level');
		$pass = md5($this->input->post('pass'));

		if($level == 'Admin'){
			$cek = $this->M_auth->ceklogin($username, $pass, $level);
			$row = $cek->row();
			$total = $cek->num_rows();
		}elseif($level == 'Dinas'){
			$cek = $this->M_auth->ceklogin($username, $pass, $level);
			$row = $cek->row();
			$total = $cek->num_rows();
		}elseif($level == 'Kdinas'){
			$cek = $this->M_auth->ceklogin($username, $pass, $level);
			$row = $cek->row();
			$total = $cek->num_rows();
		}elseif($level == 'Pasar'){
			$nama_pasar = $this->input->post('nama_pasar');
			$cek = $this->M_auth->cekloginpasar($username, $nama_pasar, $pass);
			$row = $cek->row();
			$total = $cek->num_rows();
		}

		if ($total > 0) {
			if($level == 'Admin'){
			$this->session->set_userdata(
				$data=[
					'username'=>$row->username,
					'nama_pegawai'=>$row->nama_pegawai,
					'pass'=>$row->pass,
					'level'=>$row->level,
					'is_active'=>1,
				]
			);
			}elseif($level == 'Dinas'){
			$this->session->set_userdata(
				$data=[
					'username'=>$row->username,
					'nama_pegawai'=>$row->nama_pegawai,
					'pass'=>$row->pass,
					'level'=>$row->level,
					'is_active'=>1,
				]
			);
		}elseif($level == 'Kdinas'){
			$this->session->set_userdata(
				$data=[
					'username'=>$row->username,
					'nama_pegawai'=>$row->nama_pegawai,
					'pass'=>$row->pass,
					'level'=>$row->level,
					'is_active'=>1,
				]
			);
			}elseif($level == 'Pasar'){
				$this->session->set_userdata(
				$data=[
					'username'=>$row->username,
					'nama_pegawai'=>$row->nama_pegawai,
					'pass'=>$row->pass,
					'nama_pasar'=>$row->nama_pasar,
					'id_pasar' => $row->id_pasar,
					'level'=>$row->level,
					'is_active'=>1,
				]
			);
			}
					if($row->level=='Pasar'){ 
						 redirect('Pasar/welcome','refresh');
					}elseif($row->level=='Admin'){
						//$this->session->set_flashdata('pesan','Login Berhasil');
						redirect('admin/welcome','refresh');
					}elseif($row->level=='Kdinas'){
						//$this->session->set_flashdata('pesan','Login Berhasil');
						redirect('Kdinas/welcome','refresh');
					}elseif($row->level=='Dinas'){
						//$this->session->set_flashdata('pesan','Login Berhasil');
						redirect('dinas/welcome','refresh');
					}
			
		} else {
			$this->session->set_flashdata('pesan', 	'<div class="alert alert-danger"><center><b>LOGIN GAGAL</b></br>Periksa Kembali Username dan Password Anda</center></div>');
			redirect('Auth/Index','refresh');
		}
	}

}

	public function proseslogin()
	{	

		if (isset($_POST['login'])) {
		$username = $this->input->post('username');
		$pass = md5($this->input->post('pass'));

		$cek = $this->M_auth->ceklogin($username, $pass);
		$row = $cek->row();
		$total = $cek->num_rows();

		if ($total > 0) {
			$this->session->set_userdata(
				$data=[
					'username'=>$row->username,
					'nama_pegawai'=>$row->nama_pegawai,
					'pass'=>$row->pass,
					'level'=>$row->level,
					'is_active'=>1,
				]
			);
				if($row->level=='Admin'){
					//$this->session->set_flashdata('pesan','Login Berhasil');
					redirect('admin/welcome','refresh');
				}elseif($row->level=='Dinas'){
					//$this->session->set_flashdata('pesan','Login Berhasil');
					redirect('dinas/welcome','refresh');
				}
			
		} else {
			$this->session->set_flashdata('pesan', 	'<div class="alert alert-danger"><center><b>LOGIN GAGAL</b></br>Periksa Kembali Username dan Password Anda</center></div>');
			redirect('auth','refresh');
		}
	}
}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Index/','refresh');
	}
}