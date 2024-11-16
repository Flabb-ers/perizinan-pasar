<?php

class M_pasar extends CI_Model
{

	public function read()
	{
		$this->db->order_by('id_pasar', 'DESC');
		$query = $this->db->get('tbl_pasar');
		return $query->result();
	}

	public function pasarAll(){
		$this->db->order_by('nama_pasar','ASC');
		$query = $this->db->get('tbl_pasar');
		return $query->result();
	}

	public function tampilDetail()
	{
		return $this->db->get('tbl_kios')->result();
	}

	public function addData($data)
	{
		return $this->db->insert('tbl_pasar', $data);
	}

	public function tampilData($id)
	{
		return $this->db->get_where('tbl_pasar', ['id_pasar' => $id]);
	}

	public function editData($id, $data)
	{
		return $this->db->update('tbl_pasar', $data, ['id_pasar' => $id]);
	}

	public function hapusData($id)
	{
		return $this->db->delete('tbl_pasar', ['id_pasar' => $id]);
	}

	public function addDataImport($data)
	{
		return $this->db->insert_batch('tbl_pasar', $data);
	}

	public function getById($id_pasar)
	{
		$this->db->where('id_pasar', $id_pasar);
		$query = $this->db->get('tbl_pasar');
		return $query->row();
	}
}
