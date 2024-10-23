<?php

class M_pimpinan extends CI_Model {

	public function read()
	{
		return $this->db->get('tbl_pimpinan');
	}

	public function addData($data)
	{
		return $this->db->insert('tbl_pimpinan',$data);
	}

	public function tampilData($id)
	{
		return $this->db->get_where('tbl_pimpinan',['id_pimpinan' => $id]);
	}

	public function editData($id, $data)
	{
		return $this->db->update('tbl_pimpinan', $data, ['id_pimpinan' => $id] );
	}

	public function hapusData($id)
	{
		return $this->db->delete('tbl_pimpinan',['id_pimpinan' => $id] );
	}

	public function tampilJoin()
 	{
 		$this->db->select('*');
 		$this->db->from('tbl_pimpinan');
 		$this->db->join('tbl_pegawai','tbl_pimpinan.id_pegawai = tbl_pegawai.id_pegawai','left');
 		$this->db->order_by('tbl_pimpinan.id_pimpinan', 'DESC');
 		$query = $this->db->get();

 		return $query;
 	}

 	public function tampilPegawai()
	{
		return $this->db->get('tbl_pegawai');
	}

	public function untukCetak()
	{
		return $this->db->get_where('tbl_pimpinan', ['status' => 'Aktif']);
	}

	

}
