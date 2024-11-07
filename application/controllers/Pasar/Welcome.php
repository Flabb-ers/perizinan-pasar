<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
		$this->load->model('M_pegawai');
		$this->load->model('M_kios');
		$this->load->model('M_op');

		if ($this->session->userdata('level') !== 'Pasar') {
			redirect('auth');
		}
	}

	public function index()
	{
		$dataop = $this->M_pegawai->ambilOp()->result();

		$notif_data = [];
		$jumlah_notif = 0;

		date_default_timezone_set('Asia/Jakarta');

		foreach ($dataop as $key) {
			$tgl_sekarang = strtotime(date('Y-m-d'));
			$tgl_batas = strtotime($key->batas_berlaku);
			$jarak_hari = floor(($tgl_batas - $tgl_sekarang) / (60 * 60 * 24));
			$is_past = ($jarak_hari < 0);

			// Tambahkan kondisi untuk hari yang sama (jarak_hari == 0)
			if ($jarak_hari == 0) {
				// Tampilkan jika masa berlaku hari ini
				$jumlah_notif++;
				$notif_data[] = [
					'nama' => $key->nama,
					'jenis' => $key->jenis,
					'nama_blok' => $key->nama_blok,
					'no_blok' => $key->no_blok,
					'jarak_hari' => $jarak_hari,
				];
			} elseif (!$is_past && $jarak_hari <= 31 && $jarak_hari >= 1) {
				// Tampilkan jika masa berlaku dalam 31 hari
				$jumlah_notif++;
				$notif_data[] = [
					'nama' => $key->nama,
					'jenis' => $key->jenis,
					'nama_blok' => $key->nama_blok,
					'no_blok' => $key->no_blok,
					'jarak_hari' => $jarak_hari,
				];
			} elseif ($is_past) {
				// Tampilkan jika masa berlaku sudah lewat
				$jumlah_notif++;
				$notif_data[] = [
					'nama' => $key->nama,
					'jenis' => $key->jenis,
					'nama_blok' => $key->nama_blok,
					'no_blok' => $key->no_blok,
					'jarak_hari' => $jarak_hari,
				];
			}
		}

		$this->session->set_userdata('jumlah_notif', $jumlah_notif);
		$this->session->set_userdata('notif_data', $notif_data);

		$data = [
			'datapegawai' => $this->M_pegawai->tampilJoin()->result(),
			'datakios' => $this->M_kios->tampilJoin(),
			'dataop' => $dataop,
		];

		$this->template->load('pages/index', 'pasar/v_home', $data);
	}
}
