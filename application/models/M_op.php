<?php

class M_op extends CI_Model
{

	public function read()
	{
		return $this->db->get('tbl_op');
	}

	public function read2()
	{
		$this->db->select('tbl_op.*,tbl_jenis.*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_jenis', 'tbl_op.id_jenis = tbl_jenis.id_jenis');
		$query = $this->db->get();

		return $query;
	}

	public function getActiveOP()
	{
		$now = date('Y-m-d');

		$this->db->select('tbl_op.*, tbl_jenis.*, tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_jenis', 'tbl_op.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios', 'tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->where('tbl_op.batas_berlaku >=', $now);
		$this->db->order_by('tbl_op.id_objek_pajak', 'DESC');
		$query = $this->db->get();

		return $query;
	}

	public function getActiveOPLevelPasar($id)
	{
		$now = date('Y-m-d');

		$this->db->select('tbl_op.*, tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_kios', 'tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->like('tbl_pasar.nama_pasar',  $id);
		$this->db->where('tbl_op.batas_berlaku >=', $now);
		$query = $this->db->get();

		return $query;
	}

	public function getNonActiveOP()
	{
		$now = date('Y-m-d');

		$this->db->select('tbl_op.*,tbl_jenis.*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_jenis', 'tbl_op.id_jenis = tbl_jenis.id_jenis');
		$this->db->where('tbl_op.batas_berlaku <', $now);
		$query = $this->db->get();

		return $query;
	}

	public function getNonActiveOPLevelPasar($id)
	{
		$now = date('Y-m-d');

		$this->db->select('tbl_op.*, tbl_pengajuan.*, tbl_jenis.*, tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_pengajuan', 'tbl_op.id_pengajuan = tbl_pengajuan.id_pengajuan');
		$this->db->join('tbl_jenis', 'tbl_op.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios', 'tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->like('tbl_pasar.nama_pasar',  $id);
		$this->db->where('tbl_op.batas_berlaku <', $now);

		$query = $this->db->get();

		return $query;
	}

	public function getNPWRD($id)
	{
		$now = date('Y-m-d');

		$this->db->select('tbl_op.*, tbl_pengajuan.*, tbl_jenis.id_jenis, tbl_kios.id_kios, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_pengajuan', 'tbl_op.id_pengajuan = tbl_pengajuan.id_pengajuan');
		$this->db->join('tbl_jenis', 'tbl_op.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios', 'tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->where('tbl_op.npwrd',  $id);
		$this->db->where('tbl_op.batas_berlaku <', $now);

		$query = $this->db->get();

		return $query->num_rows();
	}

	public function cariNPWRD($id)
	{
		$now = date('Y-m-d');

		$this->db->select('tbl_op.*, tbl_jenis.id_jenis, tbl_kios.id_kios, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_pengajuan', 'tbl_op.id_pengajuan = tbl_pengajuan.id_pengajuan');
		$this->db->join('tbl_jenis', 'tbl_op.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios', 'tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->like('tbl_op.nama',  $id);
		$this->db->where('tbl_op.batas_berlaku <', $now);

		$query = $this->db->get();

		return $query->num_rows();
	}

	public function getNamaPasarKios($id)
	{
		$now = date('Y-m-d');

		$this->db->select('tbl_op.*, tbl_pengajuan.*, tbl_jenis.id_jenis, tbl_tarif.jenis, tbl_kios.id_kios, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_pengajuan', 'tbl_op.id_pengajuan = tbl_pengajuan.id_pengajuan');
		$this->db->join('tbl_jenis', 'tbl_op.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios', 'tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->where('tbl_pasar.nama_pasar',  $id);
		$this->db->where('tbl_op.batas_berlaku <', $now);

		$query = $this->db->get();

		return $query->num_rows();
	}

	public function addData($data)
	{
		return $this->db->insert('tbl_op', $data);
	}

	public function tampilData($id)
	{
		return $this->db->get_where('tbl_op', ['id_objek_pajak' => $id]);
	}



	public function tampilData2($id)
	{
		$this->db->select('tbl_op.*, tbl_pengajuan.*, tbl_jenis.*,tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_pengajuan', 'tbl_op.id_pengajuan = tbl_pengajuan.id_pengajuan');
		$this->db->join('tbl_jenis', 'tbl_op.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios', 'tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->where('tbl_op.id_objek_pajak', $id);
		$this->db->order_by('tbl_op.id_objek_pajak', 'DESC');
		$query = $this->db->get();

		return $query;
	}

	public function editData($id, $data)
	{
		return $this->db->update('tbl_op', $data, ['id_objek_pajak' => $id]);
	}

	public function hapusData($id)
	{
		return $this->db->delete('tbl_op', ['id_objek_pajak' => $id]);
	}

	public function tampilJoinActiveOP()
	{
		$now = date('Y-m-d');

		$this->db->select('tbl_op.*,tbl_jenis.*, tbl_pengajuan.*, tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_pengajuan', 'tbl_op.id_pengajuan = tbl_pengajuan.id_pengajuan');
		$this->db->join('tbl_jenis', 'tbl_op.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios', 'tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->where('tbl_op.batas_berlaku >=', $now);
		$query = $this->db->get();

		return $query;
	}



	public function tampilJoinNonActiveOP()
	{
		$now = date('Y-m-d');

		$this->db->select('tbl_op.*,tbl_jenis.*, tbl_pengajuan.*, tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_pengajuan', 'tbl_op.id_pengajuan = tbl_pengajuan.id_pengajuan');
		$this->db->join('tbl_jenis', 'tbl_op.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios', 'tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->where('tbl_op.batas_berlaku <', $now);
		$query = $this->db->get();

		return $query;
	}

	public function tampilJoin()
	{
		$this->db->select('tbl_op.*,tbl_jenis.*, tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_pengajuan', 'tbl_op.id_pengajuan = tbl_pengajuan.id_pengajuan');
		$this->db->join('tbl_jenis', 'tbl_op.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios', 'tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->order_by('tbl_op.id_objek_pajak', 'DESC');
		$query = $this->db->get();

		return $query;
	}

	public function tampilJoin2()
	{
		$this->db->select('tbl_op.*, tbl_pengajuan.*, tbl_jenis.*, tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_pengajuan', 'tbl_op.id_pengajuan = tbl_pengajuan.id_pengajuan');
		$this->db->join('tbl_jenis', 'tbl_pengajuan.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios', 'tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->where('tbl_pengajuan.status', 'Menunggu TTD');
		$this->db->order_by('tbl_kios.id_kios', 'DESC');
		$query = $this->db->get();

		return $query;
	}

	public function tampilJoinWhere($id)
	{
		$this->db->select('tbl_op.*, tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_kios', 'tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->like('nama_pasar',  $id);
		$query = $this->db->get();

		return $query;
	}

	public function tampilJoinKios()
	{
		$this->db->select('tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->order_by('tbl_kios.id_kios', 'DESC');
		$query = $this->db->get();

		return $query;
	}

	public function tampilJoinwhere2($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_pasar', 'tbl_op.id_pasar = tbl_pasar.id_pasar');
		$this->db->like('nama_pasar',  $id);
		$query = $this->db->get();

		return $query;
	}

	public function tampilWherePasar($id)
	{
		$this->db->select('tbl_op.*,tbl_jenis.*, tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_jenis', 'tbl_op.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios', 'tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->where("DATEDIFF(batas_berlaku, CURDATE()) BETWEEN 28 and 30");
		$this->db->like('tbl_pasar.nama_pasar',  $id);
		$query = $this->db->get();

		return $query;
	}

	public function tampilAdminOP()
	{
		$this->db->select('tbl_op.*, tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_kios', 'tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->order_by('tbl_op.id_objek_pajak', 'DESC');
		$query = $this->db->get();

		return $query;
	}

	public function tampilCetakPasar($id)
	{
		$this->db->select('tbl_op.*, tbl_pengajuan.*, tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_pengajuan', 'tbl_op.id_pengajuan = tbl_pengajuan.id_pengajuan');
		$this->db->join('tbl_kios', 'tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->like('tbl_pasar.nama_pasar',  $id);
		$this->db->where('tbl_pengajuan.status', 'prt');
		$query = $this->db->get();

		return $query;
	}

	public function tampilPasar()
	{
		return $this->db->get('tbl_pasar');
	}


	public function tampilPengajuan()
	{
		$this->db->select('*');
		$this->db->from('tbl_pengajuan');
		$this->db->join('tbl_jenis', 'tbl_pengajuan.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios', 'tbl_pengajuan.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->where('status_op', 'Belum');
		$this->db->where('status_npwrd', 'Sudah');
		$query = $this->db->get();

		return $query;
	}

	public function tampilProsesPengajuan()
	{
		$this->db->select('*');
		$this->db->from('tbl_pengajuan');
		$this->db->join('tbl_jenis', 'tbl_pengajuan.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios', 'tbl_pengajuan.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->where('status_op', 'Belum');
		$this->db->where('status_npwrd', 'Sudah');
		$this->db->where('jenis_pengajuan', 'Perpanjang');
		$query = $this->db->get();

		return $query;
	}

	public function tampilTarif()
	{
		return $this->db->get('tbl_tarif');
	}


	public function print($id)
	{
		$this->db->select('tbl_op.id_objek_pajak,tbl_pasar.*,tbl_tarif.*,tbl_wp.nama_wp,tbl_wp.alamat_wp,
			tbl_wp.nik,tbl_wp.npwpd');
		$this->db->from('tbl_op');
		$this->db->join('tbl_permohonan', 'tbl_permohonan.id_permohonan = tbl_op.id_permohonan');
		$this->db->join('tbl_wp', 'tbl_op.id_wajib_pajak = tbl_wp.id_wajib_pajak');
		$this->db->join('tbl_pasar', 'tbl_op.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_op.id_tarif = tbl_tarif.id_tarif');
		$this->db->join('tbl_pimpinan', 'tbl_op.id_pimpinan = tbl_pimpinan.id_pimpinan');
		$this->db->where('tbl_op.id_objek_pajak', $id);
		$query = $this->db->get();

		return $query;
	}

	public function filterByDate($tgl_awal, $tgl_akhir)
	{ {
			$now = date('Y-m-d');

			$this->db->select('tbl_op.*, tbl_pengajuan.nik, tbl_jenis.*, tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
			$this->db->from('tbl_op');
			$this->db->join('tbl_jenis', 'tbl_op.id_jenis = tbl_jenis.id_jenis');
			$this->db->join('tbl_pengajuan', 'tbl_op.id_pengajuan = tbl_pengajuan.id_pengajuan');
			$this->db->join('tbl_kios', 'tbl_op.id_kios = tbl_kios.id_kios');
			$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
			$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
			$this->db->where('tbl_op.batas_berlaku >=', $now);
			$this->db->where('tgl_daftar >=', $tgl_awal);
			$this->db->where('tgl_daftar <=', $tgl_akhir);
			$query = $this->db->get();

			return $query->result();
		}
	}

	public function filterByDatePasar($tgl_awal, $tgl_akhir, $id_pasar)
	{
		$this->db->select('tbl_op.*,tbl_jenis.*, tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_jenis', 'tbl_op.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios', 'tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->where('tanggal >=', $tgl_awal);
		$this->db->where('tanggal <=', $tgl_akhir);
		$this->db->like('tbl_pasar.nama_pasar',  $id_pasar);
		$query = $this->db->get();

		return $query->result();
	}



	public function filterByDateDinas($tgl_awal, $tgl_akhir, $id_pasar)
	{
		$now = date('Y-m-d');

		$this->db->select('tbl_op.*, tbl_pengajuan.nik, tbl_jenis.*, tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_jenis', 'tbl_op.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_pengajuan', 'tbl_op.id_pengajuan = tbl_pengajuan.id_pengajuan');
		$this->db->join('tbl_kios', 'tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->where('tbl_op.batas_berlaku >=', $now);
		$this->db->where('tbl_pasar.id_pasar', $id_pasar);
		$this->db->where('tgl_daftar >=', $tgl_awal);
		$this->db->where('tgl_daftar <=', $tgl_akhir);
		$query = $this->db->get();

		return $query->result();
	}

	public function tampilJoinKioss()
	{
		$this->db->select('*');
		$this->db->from('tbl_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$query = $this->db->get();

		return $query;
	}

	public function addDataImport($data)
	{
		$this->db->insert_batch('tbl_op', $data);

		if ($this->db->affected_rows() > 0) {
			return 1;
		} else {
			return 0;
		}
	}

	public function addImportWp($data)
	{
		$this->db->insert_batch('tbl_objek', $data);
	}


	public function filterNonAktif($id_pasar)
	{
		$now = date('Y-m-d');

		$this->db->select('tbl_op.*, tbl_pengajuan.nik, tbl_jenis.*, tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_jenis', 'tbl_op.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_pengajuan', 'tbl_op.id_pengajuan = tbl_pengajuan.id_pengajuan');
		$this->db->join('tbl_kios', 'tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->where('tbl_op.batas_berlaku <', $now);
		$this->db->where('tbl_pasar.id_pasar', $id_pasar);
		$query = $this->db->get();

		return $query->result();
	}

	public function filterByDateNonaktif()
	{ {
			$now = date('Y-m-d');

			$this->db->select('tbl_op.*, tbl_pengajuan.nik, tbl_jenis.*, tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
			$this->db->from('tbl_op');
			$this->db->join('tbl_jenis', 'tbl_op.id_jenis = tbl_jenis.id_jenis');
			$this->db->join('tbl_pengajuan', 'tbl_op.id_pengajuan = tbl_pengajuan.id_pengajuan');
			$this->db->join('tbl_kios', 'tbl_op.id_kios = tbl_kios.id_kios');
			$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
			$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
			$this->db->where('tbl_op.batas_berlaku <', $now);
			$query = $this->db->get();

			return $query->result();
		}
	}
}
