<?php

class M_cetak extends CI_Model {


	public function read()
	{
 		$this->db->select('tbl_op.*, tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_kios','tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$query = $this->db->get();

 		return $query;
 	}

 	public function readPasar($id)
	{	
		$now = date('Y-m-d');

 		$this->db->select('tbl_op.*,tbl_jenis.*, tbl_pengajuan.*, tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_jenis','tbl_op.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_pengajuan','tbl_op.id_pengajuan = tbl_pengajuan.id_pengajuan');
		$this->db->join('tbl_kios','tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->like('tbl_pasar.nama_pasar',  $id);
		$this->db->where('tbl_pengajuan.status', 'Selesai');
		$this->db->where('tbl_op.batas_berlaku >=', $now);
		$this->db->order_by('tbl_op.id_objek_pajak', 'DESC');
 		$query = $this->db->get();
 		return $query;
 	}

 		public function tampilData($id)
	{
		$this->db->select('tbl_op.*,tbl_pengajuan.*,tbl_jenis.*, tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_jenis','tbl_op.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_pengajuan','tbl_op.id_pengajuan = tbl_pengajuan.id_pengajuan');
		$this->db->join('tbl_kios','tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->where('tbl_op.id_objek_pajak', $id);
 		$query = $this->db->get();

 		return $query;
	}

	public function tampilKios()
	{
		$this->db->select('*');
		$this->db->from('tbl_kios');
		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$query = $this->db->get();

 		return $query;
	}

	public function tampilPasar()
	{
		return $this->db->get('tbl_pasar');
	}

	public function tampilTarif()
	{
		return $this->db->get('tbl_tarif');
	}

	public function tampilPengajuan()
	{
		return $this->db->get('tbl_pengajuan');
	}

	public function tampilPimpinan()
	{
		$this->db->select('tbl_pimpinan.*, tbl_pegawai.nama_pegawai');
		$this->db->from('tbl_pimpinan');
 		$this->db->join('tbl_pegawai','tbl_pimpinan.id_pegawai = tbl_pegawai.id_pegawai');
 		$this->db->where('tbl_pimpinan.status', 'Aktif');
 		$query = $this->db->get();

 		return $query;
	}

	public function tampilPegawai()
	{
		return $this->db->get('tbl_pegawai');
	}
}
