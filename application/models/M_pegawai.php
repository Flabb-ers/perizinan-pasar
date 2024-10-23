<?php

class M_pegawai extends CI_Model {

	public function read()
	{
		return $this->db->get('tbl_pegawai')->result();
	}

	public function addData($data)
	{
		return $this->db->insert('tbl_pegawai',$data);
	}

	public function tampilData($id)
	{
		return $this->db->get_where('tbl_pegawai',['id_pegawai' => $id]);
	}

	public function editData($id, $data)
	{
		return $this->db->update('tbl_pegawai', $data, ['id_pegawai' => $id] );
	}

	public function hapusData($id)
	{
		return $this->db->delete('tbl_pegawai',['id_pegawai' => $id] );
	}


	public function ambilOp()
 	{		
		$this->db->select('tbl_op.*, tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_kios','tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$query = $this->db->get();

 		return $query;
 	}

	public function tampilJoin()
 	{
 		$this->db->select('*');
 		$this->db->from('tbl_pegawai');
 		$this->db->join('tbl_pasar','tbl_pegawai.id_pasar = tbl_pasar.id_pasar','left');
 		$this->db->order_by('tbl_pegawai.id_pegawai', 'DESC');
 		$query = $this->db->get();

 		return $query;
 	}

	 	public function tampilPasar()
	{
		return $this->db->get('tbl_pasar');
	}

	public function updateprofile( $id, $nama_pegawai )
	{	
		// return $this->db->update('tbl_pegawai', ['nama_pegawai' => $nama_pegawai], ['username' => $username], ['nama_pegawai' => $id]);
		return $this->db->query("UPDATE tbl_pegawai SET nama_pegawai='$nama_pegawai' WHERE username='$id'");
	}


}
